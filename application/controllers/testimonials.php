<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('testimonials_model');
		$this->load->model('navigation_model');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();
		$data['arrTestimonials'] = $this->testimonials_model->getAll();

		$data['bodyclass'] = "testimonials";
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('testimonials/content');
		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}

	public function add(){
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		if($this->form_validation->run() == FALSE){
			$data['bodyclass'] = "addpage";
			$data['header'] = "Add a New Testimonial";
			$data['formstart'] = form_open('testimonials/insert_record/testimonials');
			$data['author'] = form_input(array(
				            'name' => 'author',
				            'type' => 'text',
				            'placeholder' => 'Name',
				            'value' => set_value('author')
	        ));
	        $data['position'] = form_input(array(
				            'name' => 'position',
				            'type' => 'text',
				            'placeholder' => 'Position',
				            'value' => set_value('position')
	        ));
	        $data['company'] = form_input(array(
				            'name' => 'company',
				            'type' => 'text',
				            'placeholder' => 'Company',
				            'value' => set_value('company')
	        ));
	        $data['location'] = form_input(array(
				            'name' => 'location',
				            'type' => 'text',
				            'placeholder' => 'Location',
				            'value' => set_value('location')
	        ));
	        $data['testimonial'] = form_textarea(array(
				            'name' => 'testimonial',
				            'class' => 'richtext',
				            'value' => set_value('testimonial')
	        ));
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/testimonialsform');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('cms/tinymce-init');
			$this->load->view('template/close');
		}else{
			$data['success'] = true;
			$data['items'] = $this->testimonials_model->getEditList();
			$data['header'] = "Add a New Testimonial";
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/testimonialslist');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('cms/deletescript');
			$this->load->view('template/close');
		}

	}

	public function edit(){
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

	}

	public function insert_record($function) {
		$this->load->model('insert_model');
		if($this->form_validation->run() != FALSE){
			$this->insert_model->$function();
		}
		
		$this->add();
	}

	public function update_record($function, $record){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			$this->update_model->$function();
			$this->edit();
		}else{
			$this->edit($record);
		}

	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		$this->edit();
	}
	
}