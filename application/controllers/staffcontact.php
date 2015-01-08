<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StaffContact extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->model('staffbio_model');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();
		$data['footermenu'] = $this->navigation_model->getFtNav();
		
		$data['stafflist'] = $this->staffbio_model->getAll();
		$data['bodyclass'] = 'staff';
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('staff/contact');

		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}
}
	