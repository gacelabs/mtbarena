<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $device_id = FALSE;
	public $shall_not_pass = FALSE;

	public function __construct()
	{
		parent::__construct();
		// debug($this->session, 1);
		$class_name = trim(strtolower(get_called_class()));
		// debug($class_name, 1);
		$this->load->library('accounts');
		// debug($this->accounts->has_session, 1);
		
		/*CHECK ACCOUNT LOGINS HERE*/
		// debug($this->shall_not_pass, 1);
		if ($this->accounts->has_session) {
			if (!$this->shall_not_pass) {
				if (!in_array('logout', $this->uri->segment_array())) {
					redirect(base_url());
				}
			}
		} elseif (!$this->shall_not_pass) {
			redirect(base_url());
		}
		// debug($this->uri->segment_array());
		// debug($this->session, 1);
	}

}