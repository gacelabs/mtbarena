<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {
	
	public $ajax_shall_not_pass = FALSE;

	public function count_heart($method=FALSE)
	{
		// debug($_SERVER['REMOTE_ADDR'], 1);
		$post = $this->input->post();
		if ($post) {
			$data = json_decode($post['data'], TRUE);
			// debug($post, 1);
			if (count($data)) {
				if (is_null($this->accounts->profile)) {
					$user_id = 0;
				} else {
					$user_id = $this->accounts->profile['id'];
				}
				// debug($data, 1);
				$was_counted = FALSE;
				if ($method) {
					switch ($method) {
						case 'compare':
							$bike_data_1 = json_encode(['id'=>[$data[0], $data[1]]]);
							$bike_data_2 = json_encode(['id'=>[$data[1], $data[0]]]);
							$compares = $this->custom_model->get('compares', "(bike_data = '$bike_data_1' OR bike_data = '$bike_data_2')", 'id', 'row');
							// debug($compares, 1);
							$where = "is_compare = 1 AND post_id = ".$compares['id']." AND ip_address = '".$_SERVER['REMOTE_ADDR']."'";
							if ($this->custom_model->get('likes_map', $where) == FALSE) {
								$this->custom_model->save_count('compares', $compares);
								$this->custom_model->add('likes_map', ['is_compare'=>1, 'user_id'=>$user_id, 'post_id'=>$compares['id'], 'ip_address'=>$_SERVER['REMOTE_ADDR']]);
								$was_counted = TRUE;
							}
							break;
						
						default:
							foreach ($data as $key => $id) {
								/*check map if already have counted*/
								$where = "is_compare = 0 AND post_id = $id AND ip_address = '".$_SERVER['REMOTE_ADDR']."'";
								if ($this->custom_model->get('likes_map', $where) == FALSE) {
									$this->custom_model->save_count('bike_items', ['id'=>$id]);
									$this->custom_model->add('likes_map', ['user_id'=>$user_id, 'post_id'=>$id, 'ip_address'=>$_SERVER['REMOTE_ADDR']]);
									$was_counted = TRUE;
								}
							}
							break;
					}
				}
				if ($was_counted) {
					echo json_encode(['count'=>1]);
				} else {
					echo 0;
				}
			}
		}
		exit();
	}

	public function fbshare()
	{
		$get = $this->input->get();
		if ($get) {
			$body = curl_get_shares($get['url']);
			// debug($body, 1);
			if (isset($body['engagement'])) {
				$share_count = $body['engagement']['share_count'];
				switch (strtolower($get['class'])) {
					case 'compare':
						$this->custom_model->save_count('compares', ['id'=>$get['id']], 'share_count', $share_count);
						break;
					
					default:
						$this->custom_model->save_count('bike_items', ['id'=>$get['id']], 'share_count', $share_count);
						break;
				}
				echo json_encode($body);
			}
		}
		exit();
	}

	public function view_count()
	{
		// debug($_SERVER['REMOTE_ADDR'], 1);
		$get = $this->input->get();
		// debug($get, 1);
		if ($get) {
			$data = $get['data'];
			if (count($data)) {
				if (is_null($this->accounts->profile)) {
					$user_id = 0;
				} else {
					$data['user_id'] = $this->accounts->profile['id'];
				}
				$class_name = $data['class'];
				unset($data['class']);
				$data['ip_address'] = $_SERVER['REMOTE_ADDR'];
				// debug($data, 1);
				$has_counted = FALSE;
				if (isset($class_name)) {
					switch (strtolower($class_name)) {
						case 'compare':
							break;
						
						default:
							/*check map if already have counted*/
							if ($this->custom_model->get('views_map', $data) == FALSE) {
								$this->custom_model->save_count('bike_items', ['id'=>$data['post_id']], 'view_count');
								$this->custom_model->add('views_map', $data);
								$has_counted = TRUE;
							}
							break;
					}
				}
				if ($has_counted) {
					echo 1;
				} else {
					echo 0;
				}
			}
		}
		exit();
	}
}