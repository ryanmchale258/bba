<?php

class Staffbio_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$staffbios = $this->db->get('tbl_staffbios');
		return $staffbios->result();
	}

	public function getToEdit($record){
		$staffbio = $this->db->get_where('tbl_staffbios', array('staffbios_id' => $record));
		return $staffbio->row();
	}

	public function getCompany(){
		$companyInfo = $this->db->get('tbl_company');
		return $companyInfo->row();
	}

}