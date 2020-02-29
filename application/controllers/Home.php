<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$this->load->model('custom_model');
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/defaults',
				'assets/css/mtb-bike-specs',
				'assets/css/mediaquery'
			),
			'title' => 'Home | MTB Arena',
			'body_id' => 'landing',
			'body_class' => 'landing',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => 2,
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
					'page_elements/mtb_bike_specs'
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
				'modal_elements/login'
			),
			'page_data' => array(
				'bikes' => $this->custom_model->bike_items(),
				'mostviews' => $this->custom_model->bike_items(10)
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/defaults.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/mtb-bike-specs.js').'"></script>'
			)
		);
		$this->load->view('page_templates/main_template', $structure);
	}
}
