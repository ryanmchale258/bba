<?php

class Jobs_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$jobpostings = $this->db->get('tbl_jobs');
		return $jobpostings->result();
	}

}