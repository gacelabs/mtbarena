<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function add($table=FALSE, $post=FALSE, $redirect_url='')
	{
		if ($table AND $post) {
			$this->db->insert($table, $post);
			if ($redirect_url != '') {
				redirect(base_url($redirect_url == 'home' ? '' : $redirect_url));
			} else {
				return $this->db->insert_id();
			}
		}
		return FALSE;
	}
}
