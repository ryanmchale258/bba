<?php

class Testimonials_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$testimonials = $this->db->get('tbl_testimonials');
		return $testimonials->result();
	}

}