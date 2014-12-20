n<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}	

	public function index() {
		$this->load->view('template/head');
		$this->load->view('slider');
		$this->load->view('template/scripts');
		$this->load->view('slickinit');
		$this->load->view('template/close');
	}
	
}