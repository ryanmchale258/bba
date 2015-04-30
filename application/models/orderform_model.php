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

	public function getResources(){

		$resources = $this->db->get('tbl_resource')->result();
		$presentations = array();

		foreach($resources as $row){
			if($row->resource_checklist == 1){
				$this->db->select('*');
				$this->db->where('resource_id', $row->resource_id);
				$pres = $this->db->get('tbl_presentation')->result();
				foreach($pres as $p){
					array_push($presentations, $p);
				}
			}
		}

		$data = array('resources' => $resources, 'presentations' => $presentations);

		return $data;

	}

	public function getPresentations($rid){
		$this->db->select('*');
		$this->db->from('tbl_resource');
		$this->db->join('tbl_presentation', 'tbl_resource.resource_id = tbl_presentation.resource_id');
		$this->db->where('tbl_presentation.resource_id', $rid);

		$presentations = $this->db->get();
		return $presentations->result();
	}

	public function getShippingInfo(){
		$shipping = $this->db->get('tbl_shipping');

		return $shipping->result();
	}

	public function getToEdit($record){
		$page = $this->db->get_where('tbl_resource', array('resource_id' => $record));
		return $page->row();
	}
}