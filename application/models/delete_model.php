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

}