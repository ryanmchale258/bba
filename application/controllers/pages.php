<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pages_model');
	}

	public function display_page($slug) {	

		$data['pgdata'] = $this->pages_model->getPage($slug)->row();

		$this->load->view('template/head', $data);
		$this->load->view('body');
		$this->load->view('template/scripts');
		$this->load->view('template/close');

	}

}