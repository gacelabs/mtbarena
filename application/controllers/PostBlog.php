<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PostBlog extends MY_Controller {
	public $shall_not_pass = TRUE;
	public $ajax_shall_not_pass = FALSE;

	public function post_blog()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/post-blog'
			),
			'title' => 'Post new blog | MTB Arena',
			'body_id' => 'dashboard',
			'body_class' => 'post-blog',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/menu'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-6 col-md-6 col-sm-6 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/post_blog_form'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/post_blog_props'
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
				'<script type="text/javascript" src="'.base_url('assets/js/jquery.tinymce.min.js').'" referrerpolicy="origin"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.image.plugin.min').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.link.plugin.min').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.wordcount.plugin.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/post-blog.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}

	public function edit_blog()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/edit-blog'
			),
			'title' => 'Edit blog | MTB Arena',
			'body_id' => 'dashboard',
			'body_class' => 'edit-blog',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/menu'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-6 col-md-6 col-sm-6 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/post_blog_form'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/post_blog_props'
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
				'<script type="text/javascript" src="'.base_url('assets/js/jquery.tinymce.min.js').'" referrerpolicy="origin"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.image.plugin.min').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.link.plugin.min').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.wordcount.plugin.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/post-blog.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}
}