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
		if(isset($_POST['comboprice'])){
			$comboprice = number_format((float)str_replace('$', '', $_POST['combo']), 2, '.', '');
		}else{
			$comboprice = '';
		}
		$record = array(
					'resource_name' => $_POST['title'],
					'resource_slug' => str_replace(' ', '-', strtolower($_POST['title'])),
					'resource_desc' => $_POST['desc'],
					'resource_cdprice' => $cdprice,
					'resource_emailprice' => $emailprice,
					'resource_comboprice' => $comboprice,
					'resource_manualprice' => $comboprice
				);

		$this->db->insert('tbl_resource', $record);
	}

	public function staff() {
		$record = array(
					'staffbios_name' => $_POST['name'],
					'staffbios_degree' => $_POST['degree'],
					'staffbios_designation' => $_POST['designation'],
					'staffbios_bio' => $_POST['bio'],
					'staffbios_tagline' => $_POST['tagline'],
					'staffbios_streetnumber' => $_POST['streetnumber'],
					'staffbios_streetname' => $_POST['streetname'],
					'staffbios_city' => $_POST['city'],
					'staffbios_province' => $_POST['province'],
					'staffbios_phone' => $_POST['phone'],
					'staffbios_fax' => $_POST['fax'],
					'staffbios_mobile' => $_POST['mobile'],
					'staffbios_email' => $_POST['email'],
					'staffbios_rr' => $_POST['rr'],
					'staffbios_postalcode' => $_POST['postalcode']
				);

		$this->db->insert('tbl_staffbios', $record);
	}

}