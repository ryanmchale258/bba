<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Structure extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->model('staffbio_model');
		$this->load->model('testimonials_model');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();
		$data['randTestimonial'] = $this->testimonials_model->getRandom();
		$data['pgTitle'] = "Who We Are";
		
		$data['stafflist'] = $this->staffbio_model->getAll();
		$data['bodyclass'] = 'staff';
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('about/structure');
		$this->load->view('home/sidebar');

		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}
	
}