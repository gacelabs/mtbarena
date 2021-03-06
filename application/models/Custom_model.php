<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_Model extends MY_Model {

	public function bike_items($limit=2, $clause=FALSE, $func='result')
	{
		$limit_by = $where_clause = '';
		if (is_numeric($limit) AND $limit > 0) {
			$limit_by = 'LIMIT '.$limit;
		}
		if ($clause) {
			if (is_array($clause)) {
				// debug($clause, 1);
				$where_clause = 'WHERE ';
				foreach ($clause as $field => $value) {
					if (count($clause) > 1) {
						$where_clause .= "AND ".$field." = '".$value."'";
					} else {
						$where_clause .= $field." = '".$value."'";
					}
				}
			} else {
				$where_clause = 'WHERE '.$clause;
			}
		}
		$return = $this->query("
		SELECT DISTINCT 
				u.store_name, CONCAT(b.id, '-', b.user_id, '/mtb/', REPLACE(LOWER(REPLACE(b.bike_model, ' ', '-')), '\'', ''), '-full-specifications') AS bike_url, b.*
			FROM bike_items b 
				INNER JOIN users u ON u.id = b.user_id 
			$where_clause
			ORDER BY b.view_count DESC/*, b.updated DESC */
		$limit_by
		", $func);

		if ($return) {
			$result = [];
			if ($func == 'row') {
				$return = [$return];
			}
			// debug($return);
			foreach ($return as $key => $row) {
				foreach ($row as $field => $value) {
					if ($field == 'fields_data') {
						$data = json_decode($value, TRUE);
						// debug($data);
						if ($data) {
							foreach ($data as $base => $fields) {
								if (!empty($fields)) {
									// debug($fields);
									foreach ($fields as $column => $json) {
										if (!isset($result[$key]['fields_data'][clean_string_name($base, '_')][clean_string_name($column, '_')])) {
											$result[$key]['fields_data'][clean_string_name($base, '_')][clean_string_name($column, '_')] = '';
										}
										$result[$key]['fields_data'][clean_string_name($base, '_')][clean_string_name($column, '_')] = json_encode($json);
									}
								}
							}
						}
					} else {
						$result[$key][$field] = $value;
					}
				}
			}
			if ($func == 'row') {
				$result = $result[0];
			}
			// debug($result, 1);
			return $result;
		}
		return FALSE;
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
						$url .= 'bike'.($index+1).'_'.clean_string_name($bike['bike_model']).':';
					}
				}
				// $compares[$key]['compare_url'] = 'compare/?'.$url.'&ref='.base64_encode($row['id']);
				$compares[$key]['compare_url'] = 'compare/'.$url.'ref_'.$row['id'];
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

	public function save_count($table=FALSE, $where=FALSE, $field='like_count', $count=FALSE)
	{
		if ($table AND $where AND $field) {
			/*check if the id exist*/
			if ($data = $this->get($table, $where, FALSE, 'row')) {
				$post = [$field => $data[$field] + 1];
				if ($count) $post = [$field => $count];
				$result = $this->save($table, $post, ['id' => $data['id']]);
				return $this->db->affected_rows();
			}
		}
		return FALSE;
	}

	public function bike_paginate($id=0)
	{
		$return = $this->query("SELECT DISTINCT b.id,
			CONCAT('dashboard/edit-bike/', b.id) AS edit_url, 
			CONCAT(b.id, '-', b.user_id, '/mtb/', REPLACE(LOWER(REPLACE(b.bike_model, ' ', '-')), '\'', ''), '-full-specifications') AS bike_url
			FROM bike_items b 
			ORDER BY b.id
		");
		$result = [];
		if ($return) {
			foreach ($return as $key => $row) {
				if ($key == 0) {
					$result['first'] = $return[$key]['edit_url'];
				}
				if ($row['id'] == $id) {
					if ($key != 0) {
						$result['prev'] = $return[$key-1]['edit_url'];
					} else {
						$result['prev'] = 0;
					}
					// $result[] = $row['edit_url'];
					if (isset($return[$key+1])) {
						$result['next'] = $return[$key+1]['edit_url'];
					} else {
						$result['next'] = 0;
					}
				}
				if (count($return)-1 == $key) {
					$result['last'] = $return[$key]['edit_url'];
				}
			}
		}
		// debug($result); exit();
		return $result;
	}

	public function blog_posts($limit=FALSE, $offset=FALSE, $clause=FALSE, $is_view=FALSE)
	{
		if ($limit) {
			if ($offset) {
				$this->db->limit($limit, $offset);
			} else {
				$this->db->limit($limit);
			}
		}
		if ($clause) {
			$this->db->where($clause);
		}
		$this->db->select("(SELECT store_name FROM users WHERE id = blog_posts.user_id) AS store_name, blog_posts.*");
		$this->db->order_by('updated', 'DESC');
		$query = $this->db->get('blog_posts');

		if ($query->num_rows()) {
			$blog_posts = $query->result_array();
			if ($is_view) {
				foreach ($blog_posts as $key => $posts) {
					$blog_posts[$key]['blog_content'] = get_shortcode_values($posts['blog_content']);
				}
			}
			// debug($blog_posts, 1);
			return $blog_posts;
		}
		return FALSE;
	}

	public function fields_data($clause=FALSE, $field=FALSE, $method='result')
	{
		$fields_data = $this->get('fields_data', $clause, $field, $method);
		// debug($fields_data, 1);
		if ($fields_data) {
			usort($fields_data, function($a, $b) {
				return $a['sort'] - $b['sort'];
			});
			foreach ($fields_data as $key => $row) {
				$data = json_decode($row['values'], TRUE);
				$fields_data[$key]['values'] = $data;
			}
			// debug($fields_data, 1);
			return $fields_data;
		}
		return FALSE;
	}

	public function matchup_bikes($clause=FALSE, $field=FALSE, $method='result')
	{
		if ($clause) {
			$match_ups = $this->get('match_ups', $clause, $field, $method);
			// debug($match_ups, 1);
			if ($match_ups) {
				$bikes = [];
				foreach ($match_ups as $key => $row) {
					$data = json_decode($row['bike_data'], TRUE);
					$bike_data = isset($data['id']) ? $data['id'] : $data;
					foreach ($bike_data as $index => $id) {
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
}