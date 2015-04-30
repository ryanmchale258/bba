<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('settings_model');
		$this->form_validation->set_rules('main-contact', 'Email Address', 'trim|required|valid_email');
	}	

	public function index() {
		$data['bodyclass'] = "settingshome";
		$data['pgTitle'] = "Settings";

		if($this->form_validation->run() == FALSE){
			$email = $this->settings_model->getEmail();
			$mainemail = $email->settings_email;
			$data['formstart'] = form_open('settings/update_record/settings');
			$data['contactemail'] = form_input(array(
				            'name' => 'main-contact',
				            'type' => 'email',
				            'placeholder' => $mainemail,
				            'value' => $mainemail
	        ));
	        $this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/settings');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('template/close');
		}else{
			$email = $this->settings_model->getEmail();
			$mainemail = $email->settings_email;
			$data['formstart'] = form_open('settings/update_record/settings');
			$data['contactemail'] = form_input(array(
				            'name' => 'main-contact',
				            'type' => 'email',
				            'placeholder' => $mainemail,
				            'value' => $mainemail
	        ));
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/settings');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('template/close');
		}

	}

	public function success() {
		$data['bodyclass'] = "settingshome";
		$data['pgTitle'] = "Settings";
		$data['successmessage'] = 'Settings changed successfully';

		if($this->form_validation->run() == FALSE){
			$email = $this->settings_model->getEmail();
			$mainemail = $email->settings_email;
			$data['formstart'] = form_open('settings/update_record/settings');
			$data['contactemail'] = form_input(array(
				            'name' => 'main-contact',
				            'type' => 'email',
				            'placeholder' => $mainemail,
				            'value' => $mainemail
	        ));
	        $this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/settings');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('template/close');
		}else{
			$email = $this->settings_model->getEmail();
			$mainemail = $email->settings_email;
			$data['formstart'] = form_open('settings/update_record/settings');
			$data['contactemail'] = form_input(array(
				            'name' => 'main-contact',
				            'type' => 'email',
				            'placeholder' => $mainemail,
				            'value' => $mainemail
	        ));
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/settings');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('template/close');
		}

	}

	public function update_record($function){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			$this->update_model->$function();
			//$this->edit();
			redirect('settings/success');
		}else{
			$this->edit($record);
		}

	}

	public function restore_record($function){
		$this->load->model('update_model');
		$this->update_model->$function();

		redirect('settings/success');


	}
	
}