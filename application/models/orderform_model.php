<?php

class Orderform_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getAll(){
		$this->db->distinct();
		$this->db->from('tbl_resource');
		$this->db->join('tbl_presentation', 'tbl_resource.resource_id = tbl_presentation.resource_id', 'left');
		$this->db->group_by('tbl_resource.resource_id');

		$resources = $this->db->get();
		return $resources->result();

	}

	public function getPresentations($rid){
		$this->db->select('*');
		$this->db->from('tbl_resource');
		$this->db->join('tbl_presentation', 'tbl_resource.resource_id = tbl_presentation.resource_id');
		$this->db->where('tbl_presentation.resource_id', $rid);

		$presentations = $this->db->get();
		return $presentations->result();
	}
}