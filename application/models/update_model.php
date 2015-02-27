<?php

class Update_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function pages() {
		if($_POST['parent'] != NULL){
			$level = 2;
		}else{
			$level = 0;
		}
		$record = array(
					'pages_slug' => $_POST['slug'],
					'pages_title' => $_POST['pagename'],
					'pages_meta' => $_POST['metadesc'],
					'pages_content' => $_POST['content'],
					'pages_navlvl' => $level,
					'pages_navprnt' => $_POST['parent'],
					'pages_weight' => $_POST['weight']
				);

		$this->db->where('pages_id', $_POST['id']);
		$this->db->update('tbl_pages', $record);
	}

}