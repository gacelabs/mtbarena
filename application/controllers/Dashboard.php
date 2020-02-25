<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
			),
			'title' => 'MTB Arena | Dashboard',
			'body_id' => 'dashboard',
			'body_class' => 'dashboard',
			'page_nav' => 'page_statics/main_nav',
			'page_left_column' => array(
				'column_visibility_class' => 'hidden-xs',
				'ui_elements' => array(
					'dashboard_elements/menu',
				),
			),
			'page_right_column' => array(
				'column_visibility_class' => 'hidden-xs',
				'ui_elements' => array(
					'dashboard_elements/post_bike'
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

		$this->load->view('page_templates/dashboard_template', $structure);
	}

	public function add_item()
	{
		$post = $this->input->post();
		// debug($_FILES, 1);
		$filename = files_upload($_FILES, TRUE, 'bikes/images');
		$post['feat_photo'] = $filename;
		// debug($post, 1);
		return $this->custom_model->add('bike_item', $post, 'dashboard'); /*redirect to dashboard*/
	}
}
