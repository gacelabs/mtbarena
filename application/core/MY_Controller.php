<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $device_id = FALSE;

	public function __construct()
	{
		parent::__construct();
		// debug($this->session, 1);
		$class_name = trim(strtolower(get_called_class()));
		// debug($class_name, 1);
		$this->load->library('accounts');
		// debug($this->accounts->has_session, 1);
		
		/*CHECK ACCOUNT LOGINS HERE*/
		if ($this->accounts->has_session AND !in_array($class_name, ['home'])) {
			// debug($this->session, 1);
			redirect(base_url());
		} elseif (!in_array($class_name, ['home', 'profile'])) {
			redirect(base_url());
		}
		// debug($this->uri->segment_array());
		// debug($this->session, 1);
	}

}