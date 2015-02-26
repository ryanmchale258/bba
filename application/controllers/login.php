<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->model('testimonials_model');
		$this->load->helper('form');
		$this->load->model('login_model');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();

		$data['formstart'] = form_open('login/submit', array(
						'method' => 'GET',
						'id' => 'loginform'
		));
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

	public function submit() {
		$user = $_GET['username'];
		$pass = $_GET['password'];

		$result = $this->login_model->verify($user,$pass);

		if($result == 1){

			$data['bodyclass'] = "adminhome";
			$this->load->view('template/head', $data);
			$this->load->view('cms/header');
			$this->load->view('home/content');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('template/close');
		}elseif($result == 0){
			$this->index();
		}
	}

	public function logout() {
		$this->login_model->logout();
		$this->index();
	}
	
}