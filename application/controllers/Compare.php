<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Compare extends MY_Controller {

	public function index()
	{
		$this->load->model('custom_model');
		$post = $this->input->get();
		if ($post) {
			debug($post, 1);
		} else {
			$structure = array(
				'metas' => array(
					''
				),
				'css_links' => array(
					'assets/css/defaults',
					'assets/css/mtb-compare-bike-tiles',
					'assets/css/mediaquery',
				),
				'title' => 'Bike Model 1 VS. Bike Model 2',
				'body_id' => 'compare',
				'body_class' => 'compare',
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
						'page_elements/mtb_compare_bike_tiles'
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
					'compares' => $this->custom_model->compare_first_load(),
					'mostviews' => $this->custom_model->home_first_load(10),
					'populars' => $this->custom_model->compare_first_load(10)
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

	public function add()
	{
		$post = $this->input->post();
		$post['bike_data'] = json_encode(['id' => [2,1]]);
		// debug($post, 1);
		return $this->custom_model->add('compares', $post, 'compare'); /*redirect to compare*/
	}
}
