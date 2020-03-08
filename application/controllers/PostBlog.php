<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PostBlog extends MY_Controller {
	public $shall_not_pass = TRUE;
	public $ajax_shall_not_pass = FALSE;

	public function post_blog()
	{
		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/post-blog'
			),
			'title' => 'Post new blog | MTB Arena',
			'body_id' => 'dashboard',
			'body_class' => 'post-blog',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/menu'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-6 col-md-6 col-sm-6 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/post_blog_form'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/post_blog_props'
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
				'specs' => $this->custom_model->bike_items(3),
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/jquery.tinymce.min.js').'" referrerpolicy="origin"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.image.plugin.min').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.code.plugin.min').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.link.plugin.min').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.wordcount.plugin.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/post-blog.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}

	public function edit_blog($id=0)
	{
		$blog_post = $this->custom_model->blog_posts(FALSE, FALSE, "id = '".$id."'");

		if ($id==0 || $id=='' || empty($blog_post)) {
			redirect(base_url('post-blog'), 'refresh');
		}

		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/post-blog',
				'assets/css/edit-blog'
			),
			'title' => 'Edit blog | MTB Arena',
			'body_id' => 'dashboard',
			'body_class' => 'edit-blog',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/menu'
				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-6 col-md-6 col-sm-6 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/post_blog_form'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-padding',
				'ui_elements' => array(
					'dashboard_elements/post_blog_props'
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
				'specs' => $this->custom_model->bike_items(3),
				'id' => $id,
				'json' => json_encode($blog_post),
				'is_edit' => 1,
				'paginate' => $this->custom_model->bike_paginate($id)
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/jquery.tinymce.min.js').'" referrerpolicy="origin"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.image.plugin.min').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.code.plugin.min').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.link.plugin.min').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/tinymce.wordcount.plugin.min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/post-blog.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}

	public function view_blog($user_id, $blog_title)
	{
		$return = $this->custom_model->blog_posts(FALSE, FALSE, "user_id = '".$user_id."' AND blog_segment = '".$blog_title."' ");
		$allBlogs = $this->custom_model->blog_posts(5);

		if ($user_id && $blog_title && $allBlogs) {
			$blog_data = $return;
		} else {
			redirect(base_url('home'), 'refresh');
		}

		$structure = array(
			'metas' => array(
				''
			),
			'css_links' => array(
				'assets/css/mediaquery',
				'assets/css/dashboard',
				'assets/css/view-blog',
				'assets/css/blog-archives'
			),
			'title' => 'Blog Title Here | MTB Arena',
			'body_id' => 'postBlog',
			'body_class' => 'view-blog',
			'page_nav' => 'page_statics/main_nav',
			'bikes_to_compare' => '',
			'page_left_column' => array(
				'column_visibility_class' => 'hidden-lg hidden-md hidden-sm hidden-xs',
				'ui_elements' => array(

				),
			),
			'page_center_column' => array(
				'column_visibility_class' => 'col-lg-8 col-md-8 col-sm-8 col-xs-padding',
				'ui_elements' => array(
					'page_elements/view_blog'
				)
			),
			'page_right_column' => array(
				'column_visibility_class' => 'col-lg-4 col-md-4 col-sm-4 col-xs-padding',
				'ui_elements' => array(
					'widget_elements/blog_archives'
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
				'blog_data' => $blog_data,
				'user_data' => $account = $this->accounts->profile,
				'all_blogs' => $allBlogs
			),
			'footer_scripts' => array(
				'<script type="text/javascript" src="'.base_url('assets/js/jquery-min.js').'"></script>',
				'<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>'
			)
		);

		$this->load->view('page_templates/main_template', $structure);
	}

	public function add_item()
	{
		$post = $this->input->post();
		// debug($post, 1);
		if ($post) {
			$account = $this->accounts->profile;
			$file_path = 'blog/images/'.clean_string_name($account['store_name'].$account['id']);
			$file = clean_string_name($post['blog_segment']).'.png';
			$filename = save_image($post['blog_feat_photo'], $file_path, $file);
			// debug($filename, 1);
			$post['blog_feat_photo'] = $filename;
			$post['user_id'] = $this->accounts->profile['id'];
			$post['blog_url'] = $account['id'].'/blogs/'.$post['blog_segment'];
			// debug($post, 1);
			return $this->custom_model->add('blog_posts', $post, 'dashboard'); /*redirect to dashboard*/
		}
		return FALSE;
	}

	public function edit_item($id=0)
	{
		$post = $this->input->post();
		// debug($_FILES); exit();
		if ($post AND $id) {
			$account = $this->accounts->profile;
			/*check if the post is yours*/
			if ($blog_post = $this->custom_model->get('blog_posts', ['id'=>$id, 'user_id'=>$account['id']], FALSE, 'row')) {
				if (isset($post['blog_feat_photo']) AND strlen(trim($post['blog_feat_photo'])) > 0) {
					$file_path = 'blog/images/'.clean_string_name($account['store_name'].$account['id']);
					$file = clean_string_name($post['blog_segment']).'.png';
					$filename = save_image($post['blog_feat_photo'], $file_path, $file);
					// debug($filename, 1);
					$post['blog_feat_photo'] = $filename;
				} else {
					unset($post['blog_feat_photo']);
				}
				$post['user_id'] = $this->accounts->profile['id'];
				$post['blog_url'] = $account['id'].'/blogs/'.$post['blog_segment'];
				// debug($post, 1);
				return $this->custom_model->save('blog_posts', $post, ['id'=>$id], 'dashboard/edit-blog/'.$id); /*redirect to dashboard edit*/
			}
		}
		return FALSE;
	}
}