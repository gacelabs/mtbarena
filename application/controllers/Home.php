<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mtb-compare-specs',
				'assets/css/mtb-single-bike-specs',
				'assets/css/news-feed-box',
				'assets/css/mediaquery',
				'assets/css/post_bike'
			),
			'title' => 'MTB Arena | Home',
			'body_id' => 'landing',
			'body_class' => 'landing',
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
		$this->load->view('page_templates/home_template', $structure);
	}
}
