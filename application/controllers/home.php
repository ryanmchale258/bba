<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getNav();
		$this->load->view('template/head', $data);
		$this->load->view('template/nav');
		$this->load->view('slider');
		$this->load->view('template/scripts');
		$this->load->view('slickinit');
		$this->load->view('template/close');
	}
	
}