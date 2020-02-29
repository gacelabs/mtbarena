<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_Model extends MY_Model {

	public function home_first_load($limit=2)
	{
		return $this->query("
		SELECT DISTINCT u.store_name, b.* 
			FROM bike_items b 
				INNER JOIN users u ON u.id = b.user_id 
			ORDER BY b.view_count DESC, b.updated DESC 
		LIMIT $limit
		");
	}

	public function compare_first_load($limit=FALSE)
	{
		if ($limit) {
			$query = $this->db->order_by('popularity', 'DESC')->limit($limit)->get('compares');
		} else {
			$query = $this->db->order_by('popularity', 'DESC')->get('compares');
		}
		if ($query->num_rows()) {
			$compares = $query->result_array();
			foreach ($compares as $key => $row) {
				$bikes = json_decode($row['bike_data']);
				$compares[$key]['bike_data'] = [];
				foreach ($bikes->id as $index => $id) {
					$bike_data = $this->query("
					SELECT DISTINCT u.store_name, b.* 
						FROM bike_items b 
							INNER JOIN users u ON u.id = b.user_id 
						WHERE b.id = $id
					");
					if ($bike_data) {
						$compares[$key]['bike_data'][] = $bike_data[0];
					}
				}
				// $compares[$key]['bike_data'] = array_chunk($bike_data, 2);
			}
			// debug($compares, 1);
			return $compares;
		}
		return FALSE;
	}
}