<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->library('email');
	}

	public function contactus()	{
		$this->email->from($this->input->post('email'), $this->input->post('name'));
		$this->email->to('ryan.mchale258@gmail.com'); 

		$this->email->subject($this->input->post('subject'));
		$this->email->message($this->input->post('message'));	

		if($this->email->send()){
			redirect('home');
		}else{
			echo $this->email->print_debugger();
		}

	}

}