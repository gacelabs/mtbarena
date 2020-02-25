<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Compare extends MY_Controller {

	public function index()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mtb-compare-specs',
				'assets/css/mediaquery'
			),
			'title' => 'Bike Model 1 VS. Bike Model 2',
			'body_id' => 'compare',
			'body_class' => 'compare',
			'page_nav' => 'page_statics/main_nav',
			'page_left_column' => array(
				'column_visibility_class' => 'hidden-xs',
				'ui_elements' => array(
					'widget_elements/most_viewed_bikes',
					'widget_elements/popular_comparison'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => '',
				'bikes_to_compare' => 2,
				'ui_elements' => array(
					'page_elements/mtb_compare_specs'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'hidden-xs',
				'ui_elements' => array(
				)
			),
			'page_footer' => array(
				'column_visibility_class' => '',
				'ui_elements' => array(
				)
			),
			'modals' => array(
				'modal_elements/login',
				'modal_elements/change_model'
			),
			'page_data' => array(

			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/masonry.min.js').'"></script>'
			)
		);
		$this->load->view('page_templates/compare_template', $structure);
	}
}
