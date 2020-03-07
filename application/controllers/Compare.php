<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Compare extends MY_Controller {

	public function index($compare_id=FALSE, $bike_model=FALSE)
	{
		$this->load->model('custom_model');
		$get = $this->input->get();
		// debug(is_url_parsable(), 1);
		if ($get) {
			// $compare_id = trim(base64_decode($get['ref']));
			$compare_id = trim($get['ref']);
			$bike_model = trim($get['bike_1'].' ~and~ '.$get['bike_2']);
		} elseif (is_url_parsable()) {
			$get = parse_mtb_query($compare_id);
			$compare_id = trim($get['ref']);
			$bike_model = trim($get['bike_1'].' ~and~ '.$get['bike_2']);
			// debug($bike_model, 1);
		}
		if ($compare_id AND $bike_model) {
			$where = construct_where($compare_id, 'compares.');
			$bikes = $this->custom_model->compared_bikes($where);
			$compares = $this->custom_model->get('compares', $where, 'share_count', 'row');
			// debug($compares, 1);
			$structure = array(
				'metas' => array(
					''
				),
				'css_links' => array(
					'assets/css/defaults',
					'assets/css/mtb-bike-specs',
					'assets/css/mediaquery'
				),
				'title' => fix_title($get['bike_1']).' ~ '.fix_title($get['bike_2']).' | MTB Arena',
				'body_id' => 'compare',
				'body_class' => 'compare',
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
					'bikes' => $bikes,
					'id' => $compare_id,
					'share_count' => $compares['share_count'],
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
		} else {
			$compares = $this->custom_model->compare_items();
			$structure = array(
				'metas' => array(
					''
				),
				'css_links' => array(
					'assets/css/defaults',
					'assets/css/mtb-compare-bike-tiles',
					'assets/css/mediaquery',
				),
				'title' => 'Compare | MTB Arena',
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
					'compares' => $compares,
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

	public function add()
	{
		$post = $this->input->post();
		if ($post) {
			// $post['bike_data'] = json_encode(['id' => [1,3]]);
			$post['bike_data'] = json_encode($post['bike_data']);
			$post['user_id'] = $this->accounts->profile['id'];
		}
		debug($post, 1);
		return $this->custom_model->add('compares', $post, 'compare'); /*redirect to compare*/
	}

	public function check()
	{
		$this->load->model('custom_model');
		$get = $this->input->get();
		// $get['query'] = "se";
		// if ($get) $query = trim($get['keyword']);
		if ($get) {
			// debug($get, 1);
			$proper = $reverse = ['id'=>[]];
			foreach ($get as $key => $id) $proper['id'][] = $id;
			foreach (array_reverse($get) as $key => $id) $reverse['id'][] = $id;
			$bike_data_1 = json_encode($proper);
			$bike_data_2 = json_encode($reverse);
			$compare = $this->custom_model->get('compares', "(bike_data = '$bike_data_1' OR bike_data = '$bike_data_2')", 'id', 'row');
			// debug($compare, 1);
			if ($compare) {
				$compare_id = $compare['id'];
			} else {
				/*insert new here*/
				// debug($bike_data_1, 1);
				$post = [];
				$post['bike_data'] = $bike_data_1;
				$post['user_id'] = "'".$this->accounts->profile['id']."'";
				$compare_id = $this->custom_model->add('compares', $post);
			}
			$data = $this->custom_model->compare_items(FALSE, FALSE, "compares.id = '".$compare_id."'");
			// debug($data, 1);
			foreach ($data as $key => $row) {
				$count = (int)$row['popularity'] + 1;
				/*before that add count to the popularity*/
				$this->custom_model->save('compares', ['popularity'=>$count], ['id'=>$compare_id]);
				// debug($row, 1);
				redirect(base_url($row['compare_url']));
			}
		}
		// debug($get, 1);
		redirect(base_url('compare'));
	}
}
