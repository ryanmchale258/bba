<?php

class Navigation_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getNav(){
		$toplvl = $this->db->get_where('tbl_pages', array( 'pages_navlvl' => 1 ));
		return $toplvl->result();
	}

}