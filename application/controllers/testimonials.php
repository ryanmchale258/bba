<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('testimonials_model');
	}	

	public function index() {
		$data['arrTestimonials'] = $this->testimonials_model->getAll();
		$this->load->view('template/head', $data);
		$this->load->view('testimonials');
		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}
	
}