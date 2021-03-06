<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Marketplace extends MY_Controller {

	public function index()
	{
		$this->load->model('custom_model');
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
			),
			'title' => 'MTB Arena | Marketplace',
			'body_id' => 'marketplace',
			'body_class' => 'marketplace',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding hidden-xs',
				'ui_elements' => array(
					'widget_elements/most_viewed_bikes_list',
					'widget_elements/popular_comparison_list'
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
				'compares' => $this->custom_model->compare_items(),
				'mostviews' => $this->custom_model->bike_items(10),
				'populars' => $this->custom_model->compare_items(10)
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/defaults.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/masonry.min.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}
}
