<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index($query='')
	{
		$this->load->model('custom_model');
		$post = $this->input->get();
		// $post['query'] = "se";
		// debug($post, 1);
		if ($post) $query = trim($post['keyword']);
		if (mb_strlen($query) === 0){
			/*no need for empty search right?*/
			$bike_items = $this->custom_model->bike_items('all');
		} else {
			$bike_items = bike_search(urldecode($query));
		}
		// debug($bike_items, 1);
		if ($this->input->is_ajax_request()) {
			echo json_encode($bike_items);
		} else {
			$structure = array(
				'metas' => array(
					''
				),
				'css_links' => array(
					'assets/css/defaults',
					'assets/css/mtb-bike-specs',
					'assets/css/search',
					'assets/css/mediaquery'
				),
				'title' => 'MTB Arena | Search',
				'body_id' => 'search',
				'body_class' => 'search',
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
						'page_elements/mtb_bike_search'
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
					'bikes' => $bike_items,
					'mostviews' => $this->custom_model->bike_items(10),
					'populars' => $this->custom_model->compare_items(10)
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
}