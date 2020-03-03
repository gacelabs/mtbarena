<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $class_name = FALSE;
	public $device_id = FALSE;
	public $shall_not_pass = FALSE;
	public $ajax_shall_not_pass = TRUE;

	public function __construct()
	{
		parent::__construct();
		// debug($this, 1);
		$this->class_name = trim(strtolower(get_called_class()));
		// debug($this->class_name, 1);
		$this->load->library('accounts');
		// debug($this->accounts->has_session, 1);
		
		/*CHECK ACCOUNT LOGINS HERE*/
		if ($this->accounts->has_session) {
			/*FOR NOW ALLOW ALL PAGES WITH SESSION*/
		} else {
			/*now if ajax and ajax_shall_not_pass is TRUE redirect*/
			if ($this->input->is_ajax_request() AND $this->ajax_shall_not_pass) {
				redirect(base_url());
			}
			/*now if not ajax and shall_not_pass is TRUE redirect*/
			if (!$this->input->is_ajax_request() AND $this->shall_not_pass) {
				redirect(base_url());
			}
		}
		// debug($this->uri->segment_array());
		// debug($this->session, 1);
	}

}