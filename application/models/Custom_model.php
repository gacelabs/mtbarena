<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_Model extends MY_Model {

	public function home_first_load($limit=2)
	{
		return $this->query("
		SELECT DISTINCT 
				u.store_name, b.*
			FROM bike_items b 
				INNER JOIN users u ON u.id = b.user_id 
			ORDER BY b.view_count DESC, b.updated DESC 
		LIMIT $limit
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
				$url = '/compare/?';
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
						$url .= 'bike_'.($index+1).'='.urlencode($bike_data[0]['bike_model']).'&';
					}
				}
				$compares[$key]['compare_url'] = $url.'_ref='.base64_encode(serialize(json_encode($row)));
				// $compares[$key]['bike_data'] = array_chunk($bike_data, 2);
			}
			// debug($compares, 1);
			return $compares;
		}
		return FALSE;
	}
}