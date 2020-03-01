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

	public function compare_first_load($limit=FALSE, $offset=FALSE, $clause=FALSE)
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
		$query = $this->db->get('compares');
		if ($query->num_rows()) {
			$compares = $query->result_array();
			foreach ($compares as $key => $row) {
				$bikes = json_decode($row['bike_data']);
				$compares[$key]['bike_data'] = [];
				$url = '';
				$bike_data = $this->query("
				SELECT DISTINCT 
						u.store_name, CONCAT(b.id, '-', b.user_id, '/mtb/', REPLACE(LOWER(REPLACE(b.bike_model, ' ', '-')), '\'', ''), '-full-specifications') AS bike_url, b.*
					FROM bike_items b 
						INNER JOIN users u ON u.id = b.user_id 
					WHERE b.id IN (".implode(',', $bikes->id).")
				");
				// debug($bike_data, 1);
				if ($bike_data) {
					$compares[$key]['bike_data'] = $bike_data;
					foreach ($bike_data as $index => $bike) {
						$url .= 'bike_'.($index+1).'='.urlencode(preg_replace("/['-]/", '', strtolower($bike['bike_model']))).'&';
					}
					// $url .= strtolower(preg_replace('/\s+/', '-', $bike_data[0]['bike_model'])).($index == 0 ? '-and-' : '');
				}
				// $compares[$key]['bike_data'] = array_chunk($bike_data, 2);
				$compares[$key]['compare_url'] = 'compare/?'.$url.'&ref='.base64_encode($row['id']);
				// $compares[$key]['compare_url'] = $row['id'].'-'.$row['user_id'].'/compare/'.str_replace("'", '', $url);
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
					$bike_data = $this->query("
					SELECT DISTINCT 
							u.store_name, CONCAT(b.id, '-', b.user_id, '/mtb/', REPLACE(LOWER(REPLACE(b.bike_model, ' ', '-')), '\'', ''), '-full-specifications') AS bike_url, b.*
						FROM bike_items b 
							INNER JOIN users u ON u.id = b.user_id 
						WHERE b.id IN (".implode(',', $data['id']).")
					");
					if ($bike_data) {
						$bikes = $bike_data;
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