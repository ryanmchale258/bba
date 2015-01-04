<?php

class Staffbio_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$staffbios = $this->db->get('tbl_staffbios');
		return $staffbios->result();
	}

}