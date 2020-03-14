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
				'assets/css/bs-select.min'
			),
			'title' => 'MTB Arena | Dashboard',
			'body_id' => 'dashboard',
			'body_class' => 'posts-list',
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
				
			),
			'page_data' => array(
				'specs' => $this->custom_model->bike_items(10, ['user_id'=>$this->accounts->profile['id']]),
				'blogs' => $this->custom_model->blog_posts(10, FALSE, ['user_id'=>$this->accounts->profile['id']]),
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bs-select.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/defaults.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/post-bike.js').'"></script>'
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
				'assets/css/post-bike-checkbox',
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
					'dashboard_elements/post_bike_form_typeahead'
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
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bs-select.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tagify.min.js').'"></script>',
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
		$edit_bike = $this->custom_model->bike_items(FALSE, "b.id = '".$id."'");

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
				'assets/css/post-bike-checkbox',
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
					'dashboard_elements/post_bike_form'
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
				'paginate' => $this->custom_model->bike_paginate($id)
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bs-select.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tagify.min.js').'"></script>',
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
		// debug($_FILES);
		if ($post) {
			$account = $this->accounts->profile;
			$filename = files_upload($_FILES, TRUE, 'bikes/images/'.clean_string_name($account['store_name'].'-'.$account['id']), $post['bike_model']);
			$post['feat_photo'] = $filename;
			$post['user_id'] = $this->accounts->profile['id'];
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
				// debug($post, 1);
				return $this->custom_model->save('bike_items', $post, ['id'=>$id], 'dashboard/edit-bike/'.$id); /*redirect to dashboard edit*/
			}
		}
		return FALSE;
	}

	public function search($query='')
	{
		$this->load->model('custom_model');
		$post = $this->input->get();
		$and = "";
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
		// debug($post, 1);
		// $bike_items = $this->custom_model->bike_items(FALSE, "b.bike_model LIKE '%$query%'".$and);
		$bike_items = bike_search(urldecode($query), $and);
		// debug($bike_items, 1);
		echo json_encode($bike_items);
	}

	public function settings()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/post-bike',
				'assets/css/post-bike-checkbox',
				'assets/css/bs-select.min'
			),
			'title' => 'Post fields | MTB Arena',
			'body_id' => 'dashboard',
			'body_class' => 'post-fields',
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

	public function save_fields()
	{
		$post = $this->input->post();
		// debug($post);
		$result = [];
		if ($post) {
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
									foreach ($variable as $val) {
										if (empty(trim($val))) $empty_cnt++;
									}
									if (!isset($save_data[$key])) {
										$save_data[$key] = [];
									}
									if (isset($value[$idx]) AND isset($value[$idx]['column']) AND strlen(trim($value[$idx]['column']))) {
										$value[$idx]['column'] = strtolower($value[$idx]['column']);
										if (isset($value[$idx]['data']) AND count($value[$idx]['data'])) {
											$json_data[$key][$value[$idx]['column']]['whitelist'] = explode(',', $value[$idx]['data']);
											$json_data[$key][$value[$idx]['column']]['max'] = $value[$idx]['max'] ? $value[$idx]['max'] : 3;
										}
									}
									if (count($variable) == $empty_cnt) {
										unset($value[$idx]);
									}
								}

								if (count($value)) {
									$save_data[$key][$index] = json_encode($value);
									// $save_data[$key][$index] = $value;
								}
							} else {
								if ($index == 'path') {
									if (!empty($row['base']) AND $value == 'assets/data/jsons/') {
										$value .= clean_string_name($row['base']).'.json';
									} elseif (empty($row['base']) AND $value == 'assets/data/jsons/') {
										$value = FALSE;
									} else {
										$value = 'assets/data/jsons/'.clean_string_name($row['base']).'.json';
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
				if (count($json_data)) {
					$json_file = [];
					foreach ($json_data as $key => $json) {
						$json_file[] = json_encode($json);
					}
					// debug($json_file);
				}
				// debug($save_data, 1);
				if (count($save_data)) {
					foreach ($save_data as $key => $save) {
						if (isset($save['id'])) {
							$this->custom_model->save($table, $save, ['id' => $save['id']]);
						} else {
							$this->custom_model->new($table, $save);
						}
						@file_put_contents(get_root_path($save['path']), $json_file[$key]);
					}
					$result[] = TRUE;
				}
			}
			if (count($result)) {
				return redirect(base_url('dashboard/settings'));
			}
		}
		return FALSE;
	}
}
