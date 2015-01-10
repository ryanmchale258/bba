<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('testimonials_model');
		$this->load->model('navigation_model');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();
		$data['arrTestimonials'] = $this->testimonials_model->getAll();

		$data['bodyclass'] = "testimonials";
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('testimonials/content');
		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}
	
}