<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public $shall_not_pass = TRUE;
	public $ajax_shall_not_pass = FALSE;

	public function index()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/post-bike',
				'assets/css/bs-select.min',
				'assets/DataTables/datatables.min'
			),
			'title' => 'MTB Arena | Dashboard',
			'body_id' => 'dashboard',
			'body_class' => 'posts-list',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-12 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/menu'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-9 col-md-9 col-sm-9 col-xs-12 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/posts_list'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
				'ui_elements' => array(
				)
			),
			'page_footer' => array(
				'column_visibility_class' => '',
				'ui_elements' => array(

				)
			),
			'modals' => array(
				'modal_elements/import_bikes'
			),
			'page_data' => array(
				'specs' => $this->custom_model->bike_items("", ['user_id'=>$this->accounts->profile['id']]),
				'blogs' => $this->custom_model->blog_posts("", FALSE, ['user_id'=>$this->accounts->profile['id']]),
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bs-select.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/defaults.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/post-bike.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/DataTables/datatables.min.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}

	public function post_bike()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/tagify',
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/post-bike',
				'assets/css/post-bike-tagify',
				'assets/css/bs-select.min'
			),
			'title' => 'Post new bike | MTB Arena',
			'body_id' => 'dashboard',
			'body_class' => 'post-bike',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/menu'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-9 col-md-9 col-sm-9 col-xs-padding',
				'ui_elements' => array(
					// 'dashboard_elements/post_bike_form'
					'dashboard_elements/post_bike_form_tagify'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
				'ui_elements' => array(
				)
			),
			'page_footer' => array(
				'column_visibility_class' => '',
				'ui_elements' => array(

				)
			),
			'modals' => array(
				
			),
			'page_data' => array(
				'specs' => $this->custom_model->bike_items(3),
				'fields' => $this->custom_model->fields_data(),
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bs-select.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/jquery.tagify.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/typeahead.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/defaults.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/post-tagify.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/post-bike.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}

	public function edit_bike($id=0)
	{
		$edit_bike = $this->custom_model->bike_items(1, "b.id = '".$id."'", 'row');
		// debug($edit_bike, 1);
		$fields_data = isset($edit_bike['fields_data']) ? $edit_bike['fields_data'] : FALSE;
		unset($edit_bike['fields_data']);
		if ($id==0 || $id=='' || empty($edit_bike)) {
			redirect(base_url('dashboard'), 'refresh');
		}

		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/tagify',
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/post-bike',
				'assets/css/post-bike-tagify',
				'assets/css/bs-select.min'
			),
			'title' => 'Edit | MTB Arena',
			'body_id' => 'dashboard',
			'body_class' => 'edit-bike',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/menu',
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-6 col-md-6 col-sm-6 col-xs-padding',
				'ui_elements' => array(
					// 'dashboard_elements/post_bike_form'
					'dashboard_elements/post_bike_form_tagify'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/post_bike_props'
				)
			),
			'page_footer' => array(
				'column_visibility_class' => '',
				'ui_elements' => array(

				)
			),
			'modals' => array(
				
			),
			'page_data' => array(
				'specs' => $this->custom_model->bike_items(3),
				'id' => $id,
				'json' => json_encode($edit_bike),
				'is_edit' => 1,
				'paginate' => $this->custom_model->bike_paginate($id),
				'fields' => $this->custom_model->fields_data(),
				'fields_data' => $fields_data
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bs-select.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/jquery.tagify.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/typeahead.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/defaults.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/post-tagify.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/post-bike.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}

	public function store()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/bs-select.min'
			),
			'title' => 'MTB Arena | Store',
			'body_id' => 'dashboard',
			'body_class' => 'store',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/menu'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-9 col-md-9 col-sm-9 col-xs-padding',
				'ui_elements' => array(
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
				'ui_elements' => array(
				)
			),
			'page_footer' => array(
				'column_visibility_class' => '',
				'ui_elements' => array(

				)
			),
			'modals' => array(
				
			),
			'page_data' => array(

			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bs-select.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/dashboard.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}

	public function profile()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/bs-select.min'
			),
			'title' => 'MTB Arena | Profile',
			'body_id' => 'dashboard',
			'body_class' => 'profile',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/menu'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-9 col-md-9 col-sm-9 col-xs-padding',
				'ui_elements' => array(
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
				'ui_elements' => array(
				)
			),
			'page_footer' => array(
				'column_visibility_class' => '',
				'ui_elements' => array(

				)
			),
			'modals' => array(
				
			),
			'page_data' => array(

			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bs-select.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/dashboard.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}

	public function add_item()
	{
		$post = $this->input->post();
		// debug($post, 1);
		// debug($_FILES);
		if ($post) {
			$account = $this->accounts->profile;
			$filename = files_upload($_FILES, TRUE, 'bikes/images/'.clean_string_name($account['store_name'].'-'.$account['id']), $post['bike_model']);
			$post['feat_photo'] = $filename;
			$post['user_id'] = $this->accounts->profile['id'];
			$fields_data = [];
			foreach ($post as $field => $row) {
				if (!in_array($field, ['bike_model', 'feat_photo', 'user_id', 'price_tag', 'external_link'])) {
					foreach ($row as $base => $fields) {
						$fields_data[$base] = [];
						foreach ($fields as $column => $value) {
							$fields_data[clean_string_name($base, '_')][clean_string_name($column, '_')] = json_decode($value, TRUE);
						}
					}
					// debug($fields_data, 1);
					unset($post[$field]);
				}
			}
			$post['fields_data'] = json_encode($fields_data);
			// debug($post, 1);
			return $this->custom_model->new('bike_items', $post, 'dashboard'); /*redirect to dashboard*/
		}
		return FALSE;
	}

	public function edit_item($id=0)
	{
		$post = $this->input->post();
		// debug($_FILES); exit();
		if ($post AND $id) {
			$account = $this->accounts->profile;
			if ($bike_item = $this->custom_model->get('bike_items', ['id'=>$id, 'user_id'=>$account['id']], FALSE, 'row')) {
				if (isset($_FILES['feat_photo']) AND $_FILES['feat_photo']['error'] == 0) {
					$filename = files_upload($_FILES, TRUE, 'bikes/images/'.clean_string_name($account['store_name'].'-'.$account['id']), $post['bike_model']);
					$post['feat_photo'] = $filename;
				}
				$post['user_id'] = $this->accounts->profile['id'];
				$fields_data = [];
				foreach ($post as $field => $row) {
					if (!in_array($field, ['bike_model', 'feat_photo', 'user_id', 'price_tag', 'external_link'])) {
						foreach ($row as $base => $fields) {
							$fields_data[clean_string_name($base, '_')] = [];
							foreach ($fields as $column => $value) {
								$fields_data[clean_string_name($base, '_')][clean_string_name($column, '_')] = json_decode($value, TRUE);
							}
						}
						// debug($fields_data);
						unset($post[$field]);
					}
				}
				$post['fields_data'] = json_encode($fields_data);
				// debug($post, 1);
				$assembled_data = TRUE;
				if ($account['is_admin']) {
					$assembled_data = assemble_fields_data($fields_data);
					// debug($this->save_fields($assembled_data), 1);
					$this->save_fields($assembled_data);
				}
				if ($assembled_data) {
					return $this->custom_model->save('bike_items', $post, ['id'=>$id], 'dashboard/edit-bike/'.$id);
					/*redirect to dashboard edit*/
				}
			}
		}
		return FALSE;
	}

	public function search($query='')
	{
		$this->load->model('custom_model');
		$post = $this->input->get();
		$and = "";
		// debug($post, 1);
		if ($post) {
			$query = trim($post['keyword']);
			if (isset($post['id:not'])) {
				$and = " AND b.id != '".$post['id:not']."'";
			} elseif (isset($post['id:notin'])) {
				$and = " AND b.id NOT IN (".implode(',', $post['id:notin']).")";
			} elseif (isset($post['id:in'])) {
				$and = " AND b.id IN (".implode(',', $post['id:in']).")";
			} elseif (isset($post['id:is'])) {
				$and = " AND b.id = '".$post['id:is']."'";
			}
		}
		// debug($and, 1);
		// $bike_items = $this->custom_model->bike_items(FALSE, "b.bike_model LIKE '%$query%'".$and);
		$bike_items = bike_search(urldecode($query), $and);
		// debug($bike_items, 1);
		echo json_encode($bike_items);
	}

	public function specs_template()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/post-bike',
				'assets/css/post-bike-tagify',
				'assets/css/bs-select.min'
			),
			'title' => 'Post fields | MTB Arena',
			'body_id' => 'dashboard',
			'body_class' => 'post-fields specs-template',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/menu'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-9 col-md-9 col-sm-9 col-xs-padding',
				'ui_elements' => array(
					// 'dashboard_elements/post_bike_form'
					'dashboard_elements/post_bike_field_values'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
				'ui_elements' => array(
				)
			),
			'page_footer' => array(
				'column_visibility_class' => '',
				'ui_elements' => array(

				)
			),
			'modals' => array(

			),
			'page_data' => array(
				'fields' => $this->custom_model->fields_data(),
				'csv_file_path' => $this->export_headers()
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bs-select.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/defaults.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/post-fields.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}

	public function save_fields($passpost=FALSE)
	{
		$post = $this->input->post();
		$passed = FALSE;
		if ($passpost) {
			$passed = TRUE;
			$post = $passpost;
		}
		// debug($post, 1);
		$result = $to_remove = [];
		if ($post) {
			function sortByOrder($a, $b) {
				return $a['sort'] - $b['sort'];
			}
			$account = $this->accounts->profile;
			$save_data = $json_data = [];
			foreach ($post as $table => $data) {
				foreach ($data as $key => $row) {
					foreach ($row as $index => $value) {
						if (is_string($value)) $value = trim($value);
						if (!empty($value)) {
							if (is_array($value) AND $index == 'values') {
								// debug($value);
								foreach ($value as $idx => $var) {
									$empty_cnt = 0;
									$variable = array_values($var);
									// debug($variable);
									foreach ($variable as $val) {
										if (empty(trim($val))) $empty_cnt++;
									}
									if (!isset($save_data[$key])) {
										$save_data[$key] = [];
									}
									if (isset($value[$idx]) AND isset($value[$idx]['column']) AND strlen(trim($value[$idx]['column']))) {
										$value[$idx]['column'] = strtolower($value[$idx]['column']);
										$values = []; 
										if (is_array($value[$idx]['data']) AND count($value[$idx]['data'])) {
											$exploded = $value[$idx]['data'];
										} else {
											$exploded = explode(',', $value[$idx]['data']);
										}
										foreach ($exploded as $dataValue) {
											if (trim($dataValue) != '') {
												$values[] = ['value' => trim($dataValue)];
											}
										}
										$json_data[$key][$value[$idx]['column']]['base'] = $row['base'];
										$json_data[$key][$value[$idx]['column']]['whitelist'] = $values;
										$json_data[$key][$value[$idx]['column']]['max'] = $value[$idx]['max'];
									}
									if (isset($value[$idx]) AND isset($value[$idx]['sort'])) {
										$value[$idx]['sort'] = trim($value[$idx]['sort']) == '' ? 0 : trim($value[$idx]['sort']);
									}
									// echo "$idx - $empty_cnt == ".(count($variable)-1)." <br>";
									if ($empty_cnt >= count($variable)-1) {
										$record = $this->custom_model->get('fields_data', ['id' => $row['id']], FALSE, 'row');
										$to_remove[$record['path']] = $record['id'];
										unset($value[$idx]);
										if (isset($save_data[$key])) unset($save_data[$key]);
										if (isset($json_data[$key])) unset($json_data[$key]);
									}
								}

								if (count($value)) {
									usort($value, 'sortByOrder');
									// $save_data[$key][$index] = $value;
									$save_data[$key][$index] = json_encode($value);
								}
							} else {
								if ($index == 'path') {
									if (!empty($row['base']) AND $value == 'assets/data/jsons/spec_template/') {
										$value .= clean_string_name($row['base']).'.json';
									} elseif (!empty($row['base'])) {
										$value = 'assets/data/jsons/spec_template/'.clean_string_name($row['base']).'.json';
									} else {
										$value = FALSE;
									}
								} elseif ($index == 'base') {
									$value = strtolower($value);
								}
								if ($value) {
									$save_data[$key][$index] = $value;
								}
							}
						}
					}
				}
				// debug($json_data, 1);
				if (count($json_data)) {
					$json_file = [];
					foreach ($json_data as $key => $json) {
						$json_file[$key] = json_encode($json);
					}
				}
				/*debug($json_file);
				debug($to_remove);
				debug($save_data, 1); exit();*/
				if (count($save_data) AND isset($json_file)) {
					foreach ($save_data as $key => $save) {
						if (!isset($save['path'])) {
							$save['path'] = "assets/data/jsons/spec_template/".clean_string_name($save['base']).".json";
						}
						if (isset($save['id'])) {
							$this->custom_model->save($table, $save, ['id' => $save['id']]);
						} else {
							$this->custom_model->new($table, $save);
						}
						file_put_contents(get_root_path($save['path']), $json_file[$key]);
					}
					$result[] = TRUE;
				}
				if (count($to_remove)) {
					foreach ($to_remove as $file => $id) {
						$this->custom_model->remove($table, ['id' => $id]);
						@unlink(get_root_path($file));
					}
				}
			}
			if ($passed == FALSE) {
				if (count($result)) {
					return redirect(base_url('dashboard/specs-template'));
				}
			} else {
				return TRUE;
			}
		}
		return FALSE;
	}

	private function export_headers()
	{
		$fields_data = $this->custom_model->fields_data();
		// debug($fields_data, 1);
		if ($fields_data) {
			$headers = ['Bike Model Name', 'Featured Photo'];
			foreach ($fields_data as $key => $row) {
				$base = $row['base'];
				foreach ($row['values'] as $index => $field) {
					$headers[] = ucwords($base.' '.$field['column']);
				}
			}
		}
		$headers[] = 'Price tag (affordable | mid | premium)';
		$headers[] = 'Exteral link';
		// debug([$headers], 1);
		$file = array_to_csv([$headers], 'post-bike-headers.csv');
		// debug($file, 1);
		return $file;
		// return forceDownLoad($file);
	}

	public function import_posts($type='bikes')
	{
		if ($_FILES) {
			$name = $_FILES['csv_file']['name'];
			$ext = trim(strtolower(pathinfo(basename($name), PATHINFO_EXTENSION)));
			// debug($ext, 1);
			if ($ext == 'csv') {
				// $csv = csv_to_array($_FILES['csv_file']['tmp_name']);
				$filename = files_upload($_FILES, TRUE, 'csv/imports/', 'tmp_csv_file.csv');
				// debug(get_root_path($filename), 1);
				$array = csv_to_array($filename);
				unlink(get_root_path($filename));
				// debug($array, 1);
				if ($array) {
					$fields_data = $this->custom_model->fields_data();
					// debug($fields_data, 1);
					if ($fields_data) {
						$headers = ['bike_model'=>'', 'feat_photo'=>'', 'fields_data'=>[], 'price_tag'=>'', 'external_link'=>''];
						$now = 1;
						foreach ($fields_data as $key => $row) {
							$base = $row['base'];
							$now+=count($row['values']);
							foreach ($row['values'] as $index => $field) {
								$headers['fields_data'][$base.'-'.$now][$field['column']] = '';
							}
						}
					}
					// debug($headers, 1);
					$post = []; $fields_data_row = 0;
					$account = $this->accounts->profile;
					foreach ($array as $key => $data) {
						$tmp = $headers;
						foreach ($data as $index => $value) {
							if ($index == 0) {
								$tmp['bike_model'] = $value;
							} elseif ($index == 1) {
								if (file_exists($value)) {
									$ext = strtolower(pathinfo(basename($value), PATHINFO_EXTENSION));
									$image = file_get_contents($value);
									$user_path = 'assets/data/files/bikes/images/'.clean_string_name($account['store_name'].'-'.$account['id']);
									$feat_photo = $user_path.'/'.$data[0].'.'.$ext;
									$path = get_root_path($feat_photo);
									file_put_contents($path, $image);
									$tmp['feat_photo'] = $feat_photo;
								}
							} else {
								break;
							}
						}
						$tmp_data = $data; unset($tmp_data[0]); unset($tmp_data[1]);
						foreach ($tmp['fields_data'] as $rowindex => $fields) {
							$keys = array_keys($fields);
							$exploded = explode('-', $rowindex);
							foreach ($tmp_data as $index => $value) {
								if (!in_array($index, [0,1])) {
									if ($index != $exploded[1]) {
										$tmp['fields_data'][str_replace(' ', '_', $exploded[0])][reset($keys)] = $value;
										array_shift($keys);
									} else {
										$tmp['fields_data'][str_replace(' ', '_', $exploded[0])][reset($keys)] = $value;
										unset($tmp['fields_data'][$rowindex]);
										foreach ($tmp_data as $k => $v) {
											if ($k <= $index) unset($tmp_data[$k]);
										}
										break;
									}
								}
							}
						}
						$tmp['external_link'] = end($data);
						$tmp['price_tag'] = isset($data[key($data)-1]) ? $data[key($data)-1] : '';
						$post[] = $tmp;
					}
					// debug($post, 1);
					if (count($post)) {
						foreach ($post as $postdata) {
							$postdata['user_id'] = $account['id'];
							$postdata['fields_data'] = json_encode($postdata['fields_data']);
							// debug($postdata, 1);
							$this->custom_model->new('bike_items', $postdata);
						}
					}
				}
			}
		}
		return redirect(base_url('dashboard')); 
	}

	public function ads_panel($method=FALSE, $id=FALSE)
	{
		if ($method == FALSE) {
			$ad = FALSE;
			if ($id > 0) {
				$ad = $this->custom_model->get('ads_panel', ['id' => $id]);
			}
			$structure = array(
				'metas' => array(
					''
				),
				'css_links' => array(
					'assets/css/mediaquery',
					'assets/css/dashboard',
					'assets/css/post-bike',
					'assets/css/post-bike-tagify',
					'assets/css/bs-select.min'
				),
				'title' => 'Post fields | MTB Arena',
				'body_id' => 'dashboard',
				'body_class' => 'post-fields specs-template',
				'page_nav' => 'page_statics/main_nav',
				'bikes_to_compare' => '',
				'page_left_column' => array(
					'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
					'ui_elements' => array(
						'dashboard_elements/menu'
					),
				),
				'page_center_column' => array(
					'column_visibility_class' => 'col-lg-9 col-md-9 col-sm-9 col-xs-padding',
					'ui_elements' => array(
						// 'dashboard_elements/post_bike_form'
						'dashboard_elements/post_ads'
					)
				),
				'page_right_column' => array(
					'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
					'ui_elements' => array(
					)
				),
				'page_footer' => array(
					'column_visibility_class' => '',
					'ui_elements' => array(

					)
				),
				'modals' => array(

				),
				'page_data' => array(
					'ads' => $this->custom_model->get('ads_panel'),
					'ad' => $ad
				),
				'footer_scripts' => array(
					'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
					'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
					'<script type="text/javascript" src="'.base_url('assets/js/bs-select.min.js').'"></script>',
					'<script type="text/javascript" src="'.base_url('assets/js/defaults.js').'"></script>',
					'<script type="text/javascript" src="'.base_url('assets/js/post-fields.js').'"></script>'
				)
			);
			$this->load->view('page_templates/main_template', $structure);
		} elseif ($method == 'save') {
			$post = $this->input->post();
			if ($post) {
				$account = $this->accounts->profile;
				if ($id > 0) {
					$ad = $this->custom_model->get('ads_panel', ['id' => $id], FALSE, 'row');
					if ($ad) {
						if (isset($_FILES['ad_photo']) AND $_FILES['ad_photo']['error'] == 0) {
							$filename = files_upload($_FILES, TRUE, 'ads/images/'.clean_string_name($account['store_name'].'-'.$account['id']), $post['name']);
							$post['image'] = $filename;
						}
						return $this->custom_model->save('ads_panel', $post, ['id' => $id], 'dashboard/ads_panel'); /*redirect to dashboard/ads_panel*/
					}
					redirect(base_url('dashboard/ads_panel/0/'.$id.'?error=Ad does not exists!'));
				} else {
					$filename = files_upload($_FILES, TRUE, 'ads/images/'.clean_string_name($account['store_name'].'-'.$account['id']), $post['name']);
					// debug($filename);
					$post['image'] = $filename;
					// debug($post, 1);
					return $this->custom_model->new('ads_panel', $post, 'dashboard/ads_panel'); /*redirect to dashboard/ads_panel*/
				}
			}
		} elseif ($method == 'edit') {
			redirect(base_url('dashboard/ads_panel/0/'.$id));
		}
	}
}
