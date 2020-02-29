<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $device_id = FALSE;
	public $shall_not_pass = FALSE;

	public function __construct()
	{
		parent::__construct();
		$class_name = trim(strtolower(get_called_class()));
		// debug($class_name, 1);
		$this->load->library('accounts');
		// debug($this->accounts->has_session, 1);
		
		/*CHECK ACCOUNT LOGINS HERE*/
		if ($this->accounts->has_session) {
			/*FOR NOW ALLOW ALL PAGES WITH SESSION*/
		} elseif ($this->shall_not_pass) {
			if (!$this->input->is_ajax_request()) {
				redirect(base_url());
			}
		}
		// debug($this->uri->segment_array());
		// debug($this->session, 1);
	}

}