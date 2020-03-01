<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $class_name = FALSE;
	public $device_id = FALSE;
	public $shall_not_pass = FALSE;
	public $ajax_shall_not_pass = TRUE;

	public function __construct()
	{
		parent::__construct();
		$this->class_name = trim(strtolower(get_called_class()));
		// debug($class_name, 1);
		$this->load->library('accounts');
		// debug($this->accounts->has_session, 1);
		
		/*CHECK ACCOUNT LOGINS HERE*/
		if ($this->accounts->has_session) {
			/*FOR NOW ALLOW ALL PAGES WITH SESSION*/
		} elseif ($this->shall_not_pass) {
			if ($this->ajax_shall_not_pass) {
				redirect(base_url());
			}
		}
		// debug($this->uri->segment_array());
		// debug($this->session, 1);
	}

}