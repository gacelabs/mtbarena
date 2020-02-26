<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{
		redirect(base_url('dashboard/store'), 'refresh');
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
				'assets/css/bs-select.min'
			),
			'title' => 'MTB Arena | Post a bike',
			'body_id' => 'dashboard',
			'body_class' => 'post-bike',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding hidden-xs',
				'ui_elements' => array(
					'dashboard_elements/menu'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-9 col-md-9 col-sm-9 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/post_bike'
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
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding hidden-xs',
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
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding hidden-xs',
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
		// debug($_FILES, 1);
		$filename = files_upload($_FILES, TRUE, 'bikes/images');
		$post['feat_photo'] = $filename;
		// debug($post, 1);
		return $this->custom_model->add('bike_item', $post, 'dashboard'); /*redirect to dashboard*/
	}
}
