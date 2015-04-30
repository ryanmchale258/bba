<?php

class Settings_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getShippingInfo(){
		$shipping = $this->db->get('tbl_shipping');
		return $shipping;
	}

	public function getEmail(){
		$email = $this->db->get_where('tbl_settings', array('settings_id'=>2));
		return $email->row();
	}

}