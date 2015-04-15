<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->helper('form');
		$this->load->helper('captcha');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();
		$data['pgTitle'] = "Contact Us";
		$options = array('id' => 'contactform');
		$data['formstart'] = form_open('send/contactus', $options);
		$data['name'] = form_input(array(
			            'name' => 'name',
			            'type' => 'text',
			            'placeholder' => 'Name',
			            'value' => set_value('fname')
        ));
        $data['email'] = form_input(array(
			            'name' => 'email',
			            'type' => 'text',
			            'placeholder' => 'Email',
			            'value' => set_value('email')
        ));
        $data['subject'] = form_input(array(
			            'name' => 'subject',
			            'type' => 'text',
			            'placeholder' => 'Subject',
			            'value' => set_value('subject')
        ));
        $data['message'] = form_textarea(array(
			            'name' => 'message',
			            'value' => set_value('message')
        ));
		$data['captcha'] = create_captcha(array(
						'img_path' => './captcha/',
						'img_url' => base_url() . 'captcha/'
		));
		$captodb = array(
					    'captcha_time'	=> $data['captcha']['time'],
					    'ip_address'	=> $this->input->ip_address(),
					    'word'	=> $data['captcha']['word']
	    );
		$query = $this->db->insert_string('captcha', $captodb);
		$this->db->query($query);
		$data['cap_verify'] = form_input(array(
			            'name' => 'captcha',
			            'type' => 'text',
			            'placeholder' => 'Enter characters'
        ));
		$data['bodyclass'] = 'contact';
		$this->load->view('template/head', $data);
		$this->load->view('template/header');

		$this->load->view('contact/form');

		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}
	
}