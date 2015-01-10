<?php

class Testimonials_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$testimonials = $this->db->get('tbl_testimonials');
		return $testimonials->result();
	}

	public function getRandom(){
		$this->db->select('*');
		$this->db->order_by('testimonials_id', 'RANDOM');
		$this->db->limit(1);
		$testimonial = $this->db->get('tbl_testimonials');
		return $testimonial->row();
	}

}