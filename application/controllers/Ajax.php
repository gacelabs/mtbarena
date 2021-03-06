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
				$method = strtolower($method);
				if ($method) {
					switch ($method) {
						case 'home': case 'compare': case 'compares': case 'match_ups':
							if ($method == 'compare') {
								$table = 'compares';
							} elseif (in_array($method, ['home', 'match_ups'])) {
								$table = 'match_ups';
							} else {
								$table = 'compares';
								$method = 'compare';
							}

							if (isset($data[1])) {
								$bike_data_1 = json_encode(['id'=>[$data[0], $data[1]]]);
								$bike_data_2 = json_encode(['id'=>[$data[1], $data[0]]]);
								$result = $this->custom_model->get($table, "(bike_data = '$bike_data_1' OR bike_data = '$bike_data_2')", 'id', 'row');
							} else {
								$bike_data = json_encode(['id'=>[$data[0]]]);
								$result = $this->custom_model->get($table, "bike_data = '$bike_data'", 'id', 'row');
							}
							// debug($result, 1);

							$where = "class = '$method' AND post_id = '".$result['id']."' AND ip_address = '".$_SERVER['REMOTE_ADDR']."'";
							if ($this->custom_model->get('likes_map', $where) == FALSE) {
								$this->custom_model->save_count($table, $result);
								$this->custom_model->new('likes_map', ['class'=>$method, 'user_id'=>$user_id, 'post_id'=>$result['id'], 'ip_address'=>$_SERVER['REMOTE_ADDR']]);
								$was_counted = TRUE;
							}
							break;
						
						default:
							if ($method == 'postblog') $table = 'blog_posts';
							if (in_array($method, ['bike_items', 'singlebike'])) $table = 'bike_items';

							if (isset($table)) {
								foreach ($data as $key => $id) {
									/*check map if already have counted*/
									$where = "class = '$method' AND post_id = $id AND ip_address = '".$_SERVER['REMOTE_ADDR']."'";
									if ($this->custom_model->get('likes_map', $where) == FALSE) {
										$this->custom_model->save_count($table, ['id'=>$id]);
										$this->custom_model->new('likes_map', ['user_id'=>$user_id, 'class'=>$method, 'post_id'=>$id, 'ip_address'=>$_SERVER['REMOTE_ADDR']]);
										$was_counted = TRUE;
									}
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
						$table = 'compares';
					break;
					case 'postblog':
						$table = 'blog_posts';
					break;
					default:
						$table = 'bike_items';
					break;
				}
				$this->custom_model->save_count($table, ['id'=>$get['id']], 'share_count', $share_count);
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
				$data['user_id'] = 0;
				if ($this->accounts->profile) {
					$data['user_id'] = $this->accounts->profile['id'];
				}
				$class_name = $data['class'];
				unset($data['class']);
				$data['ip_address'] = $_SERVER['REMOTE_ADDR'];
				// debug($data, 1);
				$result = FALSE;
				if (isset($class_name)) {
					switch (strtolower($class_name)) {
						case 'compare':
							break;
						
						default:
							/*check map if already have counted*/
							if ($this->custom_model->get('views_map', $data) == FALSE) {
								$this->custom_model->save_count('bike_items', ['id'=>$data['post_id']], 'view_count');
								$this->custom_model->new('views_map', $data);
								$result = $this->custom_model->get('bike_items', ['id'=>$data['post_id']], 'view_count', 'row');
							}
							break;
					}
				}
				if ($result) {
					echo $result['view_count'];
				} else {
					echo 0;
				}
			}
		}
		exit();
	}

	public function upload_image()
	{
		$file_dir = 'blog/images/'.clean_string_name($this->accounts->profile['store_name'].$this->accounts->profile['id']);
		// debug($file_dir, 1);
		echo tinymce_upload($file_dir); exit();
	}
}