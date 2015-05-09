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

	public function admin() {
		$record = array(
					'admin_firstname' => $_POST['fname'],
					'admin_lastname' => $_POST['lname'],
					'admin_username' => $_POST['username'],
					'admin_email' => $_POST['email'],
					'admin_level' => $_POST['level']
				);

		$this->db->where('admin_id', $_POST['id']);
		$this->db->update('tbl_admin', $record);
	}

	public function newpass($id, $encpass) {
		$record = array(
					'admin_password' => $encpass,
					'admin_lastsession' => null
				);

		$this->db->where('admin_id', $id);
		$this->db->update('tbl_admin', $record);
	}

	public function admin_login($userId){
		$this->db->where('admin_id', $userId);
		$this->db->update('tbl_admin', array('admin_lastsession' => $this->session->userdata('session_id'), 'admin_lastlogin' => $this->session->userdata('last_activity'))); 
	}

	public function first_login($userId, $newpass){
		$this->db->where('admin_id', $userId);
		$this->db->update('tbl_admin', array('admin_password' => $newpass, 'admin_lastsession' => $this->session->userdata('session_id'), 'admin_lastlogin' => $this->session->userdata('last_activity')));
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

		$this->db->where('testimonials_id', $_POST['id']);
		$this->db->update('tbl_testimonials', $record);
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

		$this->db->where('jobs_id', $_POST['id']);
		$this->db->update('tbl_jobs', $record);
	}

	public function resources() {

		$this->db->delete('tbl_presentation', array('resource_id' => $_POST['id']));


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
			$indprice = number_format((float)str_replace('$', '', $_POST['ind']), 2, '.', '');
			$haschecklist = '1';
		}else{
			$indprice = '';
			$haschecklist = '0';
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
					'resource_emailprice' => $emailprice,
					'resource_manualprice' => $comboprice,
					'resource_checklist' => $haschecklist,
					'resource_individualprice' => $indprice,
					'resource_discount' => $discountprice,
					'resource_discountreq' => $_POST['peramt']
				);

		$this->db->where('resource_id', $_POST['id']);
		$this->db->update('tbl_resource', $record);

		if(isset($_POST['indprice'])){
			foreach($_POST['presentationitems'] as $pres){
				if(!empty($pres)){
					$presrecord = array(
							'presentation_name' => $pres,
							'resource_id' => $_POST['id']
						);
					$this->db->insert('tbl_presentation', $presrecord);
				}
			}
		}
	}

	public function staff($record, $data) {
		$this->db->where('staffbios_id', $record);
		$this->db->update('tbl_staffbios', $data);
	}

	public function settings() {
		$record = array(
					'settings_email' => $_POST['main-contact']
				);

		$this->db->where('settings_id', 2);
		$this->db->update('tbl_settings', $record);
	}

}