<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}	

	public function index() {
		$data['bodyclass'] = "adminhome";
		$this->load->view('template/head', $data);
		$this->load->view('cms/header');
		$this->load->view('home/content');
		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}
	
}