<?php

class Pages_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getPage($slug){
		$page = $this->db->get_where('tbl_pages', array('pages_slug' => $slug));
		return $page;
	}

}