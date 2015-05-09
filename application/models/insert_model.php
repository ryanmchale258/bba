<?php

class Insert_model extends CI_Model {

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

		$this->db->insert('tbl_pages', $record);
	}

	public function admin($encpass) {
		$record = array(
					'admin_firstname' => $_POST['fname'],
					'admin_lastname' => $_POST['lname'],
					'admin_username' => $_POST['username'],
					'admin_password' => $encpass,
					'admin_email' => $_POST['email'],
					'admin_level' => $_POST['level']
				);

		$this->db->insert('tbl_admin', $record);
	}

	public function testimonials() {
		$record = array(
					'testimonials_author' => $_POST['author'],
					'testimonials_position' => $_POST['position'],
					'testimonials_company' => $_POST['company'],
					'testimonials_location' => $_POST['location'],
					'testimonials_shrt' => $_POST['shrt'],
					'testimonials_content' => $_POST['testimonial']
				);

		$this->db->insert('tbl_testimonials', $record);
	}

	public function jobopenings() {
		$record = array(
					'jobs_title' => $_POST['title'],
					'jobs_type' => $_POST['type'],
					'jobs_location' => $_POST['location'],
					'jobs_start' => date("Y-m-d", strtotime($_POST['startdate'])),
					'jobs_desc' => $_POST['desc'],
					'jobs_reqs' => $_POST['quals']
				);

		$this->db->insert('tbl_jobs', $record);
	}

	public function resources() {
		if(isset($_POST['cdprice'])){
			$cdprice = number_format((float)str_replace('$', '', $_POST['cd']), 2, '.', '');
		}else{
			$cdprice = '';
		}
		if(isset($_POST['emailprice'])){
			$emailprice = number_format((float)str_replace('$', '', $_POST['email']), 2, '.', '');
		}else{
			$emailprice = '';
		}
		if(isset($_POST['manualprice'])){
			$manualprice = number_format((float)str_replace('$', '', $_POST['manual']), 2, '.', '');
		}else{
			$manualprice = '';
		}
		if(isset($_POST['indprice'])){
			$haschecklist = '1';
			$indprice = number_format((float)str_replace('$', '', $_POST['ind']), 2, '.', '');
		}else{
			$haschecklist = '0';
			$indprice = '';
		}
		if(isset($_POST['discper'])){
			$discountprice = number_format((float)str_replace('$', '', $_POST['discper']), 2, '.', '');
		}else{
			$discountprice = '';
		}

		$record = array(
					'resource_name' => $_POST['title'],
					'resource_slug' => str_replace(' ', '-', strtolower($_POST['title'])),
					'resource_desc' => $_POST['desc'],
					'resource_cdprice' => $cdprice,
					'resource_checklist' => $haschecklist,
					'resource_emailprice' => $emailprice,
					'resource_manualprice' => $manualprice,
					'resource_checklist' => $haschecklist,
					'resource_individualprice' => $indprice,
					'resource_discount' => $discountprice,
					'resource_discountreq' => $_POST['peramt']
				);

		$this->db->insert('tbl_resource', $record);
		$this->db->trans_complete();
    	$query = $this->db->query('SELECT LAST_INSERT_ID()');
    	$row = $query->row_array();
    	$prev_id = $row['LAST_INSERT_ID()'];

		if(isset($_POST['presentationitems'])){
			foreach($_POST['presentationitems'] as $pres){
				if(!empty($pres)){
					$record = array(
							'presentation_name' => $pres,
							'resource_id' => $prev_id
						);
					$this->db->insert('tbl_presentation', $record);
				}
			}
		}
	}

	public function staff($record) {
		$this->db->insert('tbl_staffbios', $record);
	}

}