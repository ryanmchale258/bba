<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pages_model');
		$this->load->model('navigation_model');
		$this->load->model('staffbio_model');
	}

	public function display_page($slug) {	
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();
		$data['pgdata'] = $this->pages_model->getPage($slug)->row();
		
		$data['bodyclass'] = 'page';
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('template/content');
		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}

}