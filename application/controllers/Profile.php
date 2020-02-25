<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function index()
	{
		redirect(base_url('login'));
	}

	public function sign_in()
	{
		// $post = ['username'=>'bong', 'password'=>2];
		$post = $this->input->post();
		$is_ok = $this->accounts->login($post);
		// debug($is_ok, 1);
		if ($is_ok) {
			redirect(base_url()); /*direct to the home when login success*/
		} else {
			$this->load->view('welcome_message');
		}
	}

	public function sign_out()
	{
		return $this->accounts->logout('home'); /*this will redirect to default page */
	}

	public function sign_up()
	{
		// $post = ['username'=>'leng2', 'password'=>23, 're_password'=>23];
		$post = $this->input->post();
		$return = $this->accounts->register($post, 'settings'); /*this will redirect to settings page */
		// debug($this->session);
		// debug($return, 1);
	}
}
