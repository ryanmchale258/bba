<?php

class Delete_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function pages($record) {
		$this->db->delete('tbl_pages', array('pages_id' => $record));
	}

	public function admin($record) {
		$this->db->delete('tbl_admin', array('admin_id' => $record));
	}

	public function testimonials($record) {
		$this->db->delete('tbl_testimonials', array('testimonials_id' => $record));
	}

	public function jobopenings($record) {
		$this->db->delete('tbl_jobs', array('jobs_id' => $record));
	}

	public function resources($record) {
		$this->db->delete('tbl_resource', array('resource_id' => $record));
		$this->db->delete('tbl_presentation', array('resource_id' => $record));
	}

	public function staff($record) {
		$this->db->delete('tbl_staffbios', array('staffbios_id' => $record));
	}

}