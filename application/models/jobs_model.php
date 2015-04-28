<?php

class Jobs_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$jobpostings = $this->db->get_where('tbl_jobs');
		return $jobpostings->result();
	}

	public function getToEdit($record){
		$job = $this->db->get_where('tbl_jobs', array('jobs_id' => $record));
		return $job->row();
	}

}