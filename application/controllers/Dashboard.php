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
					'dashboard_elements/post_bike_form_checkbox'
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
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/post-bike',
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
				'<script type="text/javascript" src="'.base_url('assets/js/defaults.js').'"></script>',
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
}
