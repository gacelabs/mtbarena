<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {

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
							$where = "is_compare != 0 AND user_id = '$user_id' AND post_id = ".$compares['id']." AND ip_address = '".$_SERVER['REMOTE_ADDR']."'";
							if ($this->custom_model->get('likes_map', $where) == FALSE) {
								$this->custom_model->save_count('compares', $compares);
								$this->custom_model->add('likes_map', ['is_compare'=>1, 'user_id'=>$user_id, 'post_id'=>$compares['id'], 'ip_address'=>$_SERVER['REMOTE_ADDR']]);
								$was_counted = TRUE;
							}
							break;
						
						default:
							foreach ($data as $key => $id) {
								/*check map if already have counted*/
								$where = "is_compare = 0 AND user_id = '$user_id' AND post_id = $id AND ip_address = '".$_SERVER['REMOTE_ADDR']."'";
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
				}
			}
		}
		exit();
	}
}