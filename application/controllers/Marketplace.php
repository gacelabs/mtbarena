<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Marketplace extends MY_Controller {

	public function index()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mtb-compare-specs',
				'assets/css/mtb-single-specs',
				'assets/css/mediaquery',
			),
			'title' => 'MTB Arena | Marketplace',
			'body_id' => 'landing',
			'body_class' => 'landing',
			'page_nav' => 'page_statics/main_nav',
			'page_left_column' => array(
				'column_visibility_class' => 'hidden-xs',
				'ui_elements' => array(
					'page_elements/marketplace',
					'page_elements/top_bike_shops',
					'page_elements/most_viewed_bikes',
					'page_elements/popular_comparison'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => '',
				'ui_elements' => array(
					'page_elements/mtb_compare_specs_featured',
					'page_elements/news_feed_box'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'hidden-xs',
				'ui_elements' => array(
					'page_elements/ride_events'
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
				'<script type="text/javascript" src="'.base_url('assets/js/masonry.min.js').'"></script>'
			)
		);

		$this->load->view('page_templates/marketplace_template', $structure);
	}
}
