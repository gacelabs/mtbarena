<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_Model extends MY_Model {

	public function bike_items($limit=2, $clause=FALSE)
	{
		$limit_by = $where_clause = '';
		if (is_numeric($limit) AND $limit > 0) {
			$limit_by = 'LIMIT '.$limit;
		}
		if ($clause) {
			$where_clause = 'WHERE '.$clause;
		}
		return $this->query("
		SELECT DISTINCT 
				u.store_name, CONCAT(b.id, '-', b.user_id, '/mtb/', REPLACE(LOWER(REPLACE(b.bike_model, ' ', '-')), '\'', ''), '-full-specifications') AS bike_url, b.*
			FROM bike_items b 
				INNER JOIN users u ON u.id = b.user_id 
			$where_clause
			ORDER BY b.view_count DESC, b.updated DESC 
		$limit_by
		");
	}

	public function compare_items($limit=FALSE, $offset=FALSE, $clause=FALSE)
	{
		if ($limit) {
			if ($offset) {
				$this->db->order_by('popularity', 'DESC')->limit($limit, $offset);
			} else {
				$this->db->order_by('popularity', 'DESC')->limit($limit);
			}
		} else {
			$this->db->order_by('popularity', 'DESC');
		}
		if ($clause) {
			$this->db->where($clause);
		}
		$this->db->order_by('updated', 'DESC');
		$query = $this->db->get('compares');
		if ($query->num_rows()) {
			$compares = $query->result_array();
			// debug($compares, 1);
			$results = [];
			foreach ($compares as $key => $row) {
				$bikes = json_decode($row['bike_data'], TRUE);
				// debug($bikes, 1);
				$compares[$key]['bike_data'] = [];
				$url = '';
				foreach ($bikes['id'] as $index => $id) {
					$bike = $this->query("
					SELECT DISTINCT 
							u.store_name, CONCAT(b.id, '-', b.user_id, '/mtb/', REPLACE(LOWER(REPLACE(b.bike_model, ' ', '-')), '\'', ''), '-full-specifications') AS bike_url, b.*
						FROM bike_items b 
							INNER JOIN users u ON u.id = b.user_id 
						WHERE b.id = '$id'
					", 'row');
					// debug($bike, 1);
					if ($bike) {
						// debug($compares[$key]['bike_data'], 1);
						$compares[$key]['bike_data'][] = $bike;
						$url .= 'bike_'.($index+1).'='.clean_string_name($bike['bike_model']).'&';
					}
				}
				$compares[$key]['compare_url'] = 'compare/?'.$url.'&ref='.base64_encode($row['id']);
				$compares[$key]['ids'] = $bikes['id'];
			}
			// debug($compares, 1);
			return $compares;
		}
		return FALSE;
	}

	public function compared_bikes($clause=FALSE, $field=FALSE, $method='result')
	{
		if ($clause) {
			$compares = $this->get('compares', $clause, $field, $method);
			// debug($compares, 1);
			if ($compares) {
				$bikes = [];
				foreach ($compares as $key => $row) {
					$data = json_decode($row['bike_data'], TRUE);
					foreach ($data['id'] as $index => $id) {
						$bike = $this->query("
						SELECT DISTINCT 
								u.store_name, CONCAT(b.id, '-', b.user_id, '/mtb/', REPLACE(LOWER(REPLACE(b.bike_model, ' ', '-')), '\'', ''), '-full-specifications') AS bike_url, b.*
							FROM bike_items b 
								INNER JOIN users u ON u.id = b.user_id 
							WHERE b.id = '$id'
						", 'row');
						$bikes[] = $bike;
					}
				}
				// debug($bikes, 1);
				return $bikes;
			}
		}
		return FALSE;
	}

	public function save_count($table=FALSE, $where=FALSE, $field='like_count')
	{
		if ($table AND $where AND $field) {
			/*check if the id exist*/
			if ($data = $this->get($table, $where, FALSE, 'row')) {
				$result = $this->save($table, [$field => $data[$field] + 1], ['id' => $data['id']]);
				return $this->db->affected_rows();
			}
		}
		return FALSE;
	}
}