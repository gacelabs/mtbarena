<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_Model extends MY_Model {

	public function home_first_load($limit=2)
	{
		return $this->query("SELECT u.store_name, b.* FROM bike_item b INNER JOIN users u ON u.id = b.user_id ORDER BY b.view_count DESC, b.updated DESC LIMIT $limit");
	}
}