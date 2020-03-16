<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SingleBike extends MY_Controller {

	public function index($id_user_id=FALSE, $bike_model=FALSE)
	{
		$bike_items = FALSE;
		if ($bike_model) {
			$where = construct_where($id_user_id, 'b.');
			$items_data = $this->custom_model->bike_items(1, $where);
			// debug($items_data, 1);
			$bike_items = manipulate_bike_display_data($items_data, $items_data[0]['id'], 'bike_items');
			// debug($bike_items, 1);
		}
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/defaults',
				'assets/css/mtb-bike-specs',
				'assets/css/mediaquery'
			),
			'title' => fix_title($bike_model) . ' Full Specifications | MTB Arena',
			'body_id' => 'singleBike',
			'body_class' => 'single-bike',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => 1,
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
