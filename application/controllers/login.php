<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->model('testimonials_model');
		$this->load->helper('form');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();

		$data['formstart'] = form_open('login/submit');
		$data['username'] = form_input(array(
			              'name' => 'username',
			              'type' => 'text',
			              'placeholder' => 'username'
        ));
        $data['password'] = form_input(array(
			              'name' => 'password',
			              'type' => 'password',
			              'placeholder' => 'password'
        ));
		$data['bodyclass'] = "home";
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('cms/login');
		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}
	
}