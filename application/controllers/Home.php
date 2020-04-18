<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$this->load->model('custom_model');
		$home = curl_get_shares(current_full_url());
		// debug($home, 1);

		$today = date('Y-m-d');
		$matchup_date = $this->session->userdata('matchup_date');
		$todays_matchup = $this->session->userdata('todays_matchup');
		// debug($matchup_date != NULL AND $matchup_date != $today); exit();

		/*check saved matchup_date is not today*/
		if ($matchup_date != NULL AND $matchup_date != $today) {
			$this->session->unset_userdata('todays_matchup');
			$this->session->unset_userdata('matchup_date');
			/*get again*/
			$matchup_date = $this->session->userdata('todays_matchup');
			$todays_matchup = $this->session->userdata('todays_matchup');
		}

		/*check and resetup todays match up*/
		if ($matchup_date == NULL AND $todays_matchup == NULL) {
			$items_data = $this->custom_model->bike_items();
			$results = check_and_save_matchup($items_data);
			$where = construct_where($results['id'], $results['table'].'.');
			// debug($where, 1);
			if ($results['table'] == 'compares') {
				$items_data = $this->custom_model->compared_bikes($where);
				$bike_items = manipulate_bike_display_data($items_data, $results['id'], 'compares');
			} else {
				$items_data = $this->custom_model->matchup_bikes($where);
				$bike_items = manipulate_bike_display_data($items_data, $results['id'], 'match_ups');
			}
			/*reset*/
			$this->session->set_userdata('matchup_date', $today);
			$this->session->set_userdata('todays_matchup', $bike_items);
		} else {
			/*not yet tomorrow*/
			$bike_items = $todays_matchup;
		}
		// debug($bike_items, 1);

		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/defaults',
				'assets/css/mtb-bike-specs-tabled',
				'assets/css/news-feed-box',
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
					// 'widget_elements/bike_finder',
					'widget_elements/popular_comparison_list'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-9 col-md-9 col-sm-9 col-xs-padding',
				'ui_elements' => array(
					'page_elements/mtb_bike_specs_tabled',
					'page_elements/news_feed_box'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
				'ui_elements' => array(
				)
			),
			'page_footer' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm',
				'ui_elements' => array(
					'widget_elements/most_viewed_bikes_list',
					'widget_elements/popular_comparison_list'
				)
			),
			'modals' => array(
				'modal_elements/login'
			),
			'page_data' => array(
				'bikes' => $bike_items,
				'share_count' => isset($home['engagement']) ? $home['engagement']['share_count'] : 0,
				'mostviews' => $this->custom_model->bike_items(10),
				'populars' => $this->custom_model->compare_items(10),
				'feed' => $this->custom_model->blog_posts(10, FALSE, FALSE, TRUE),
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

	public function privacy()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/defaults'
			),
			'title' => 'Home | MTB Arena',
			'body_id' => 'landing',
			'body_class' => 'landing',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => 2,
			'page_left_column' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
				'ui_elements' => array(
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-9 col-md-9 col-sm-9 col-xs-padding',
				'ui_elements' => array(
					'page_elements/privacy_content',
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
				'ui_elements' => array(
				)
			),
			'page_footer' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm',
				'ui_elements' => array(
				)
			),
			'modals' => array(
				'modal_elements/login'
			),
			'page_data' => array(
				
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}

	public function terms()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/defaults'
			),
			'title' => 'Home | MTB Arena',
			'body_id' => 'landing',
			'body_class' => 'landing',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => 2,
			'page_left_column' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
				'ui_elements' => array(
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-9 col-md-9 col-sm-9 col-xs-padding',
				'ui_elements' => array(
					'page_elements/terms_content',
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
				'ui_elements' => array(
				)
			),
			'page_footer' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm',
				'ui_elements' => array(
				)
			),
			'modals' => array(
				'modal_elements/login'
			),
			'page_data' => array(
				
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}
}
