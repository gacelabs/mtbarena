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
				u.store_name, CONCAT(b.user_id, '-', b.id, '/mtb/', LOWER(REPLACE(b.bike_model, ' ', '-')), '-full-specifications') AS bike_url, b.*
			FROM bike_items b 
				INNER JOIN users u ON u.id = b.user_id 
			$where_clause
			ORDER BY b.view_count DESC, b.updated DESC 
		$limit_by
		");
	}

	public function compare_first_load($limit=FALSE, $offset=FALSE)
	{
		if ($limit) {
			if ($offset) {
				$query = $this->db->order_by('popularity', 'DESC')->limit($limit, $offset)->get('compares');
			} else {
				$query = $this->db->order_by('popularity', 'DESC')->limit($limit)->get('compares');
			}
		} else {
			$query = $this->db->order_by('popularity', 'DESC')->get('compares');
		}
		if ($query->num_rows()) {
			$compares = $query->result_array();
			foreach ($compares as $key => $row) {
				$bikes = json_decode($row['bike_data']);
				$compares[$key]['bike_data'] = [];
				$url = '';
				foreach ($bikes->id as $index => $id) {
					$bike_data = $this->query("
					SELECT DISTINCT 
							u.store_name, b.* 
						FROM bike_items b 
							INNER JOIN users u ON u.id = b.user_id 
						WHERE b.id = $id
					");
					if (isset($bike_data[0])) {
						$compares[$key]['bike_data'][] = $bike_data[0];
						// $url .= 'bike_'.($index+1).'='.urlencode($bike_data[0]['bike_model']).'&';
						$url .= strtolower(preg_replace('/\s+/', '-', $bike_data[0]['bike_model'])).($index == 0 ? '-and-' : '');
					}
				}
				// $compares[$key]['bike_data'] = array_chunk($bike_data, 2);
				// $compares[$key]['compare_url'] = $url.'_ref='.base64_encode(serialize(json_encode($bikes->id)));
				$compares[$key]['compare_url'] = $row['id'].'-'.$row['user_id'].'/compare/'.$url;
			}
			// debug($compares, 1);
			return $compares;
		}
		return FALSE;
	}
}