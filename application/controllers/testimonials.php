<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('testimonials_model');
		$this->load->model('navigation_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('author', 'Author', 'trim|required');
		$this->form_validation->set_rules('position', 'Position', 'trim');
		$this->form_validation->set_rules('company', 'Company', 'trim');
		$this->form_validation->set_rules('location', 'Location', 'trim');
		$this->form_validation->set_rules('shrt', 'Testimonial Excerpt', 'trim|required');
		$this->form_validation->set_rules('testimonial', 'Testimonial', 'trim|required');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();
		$data['arrTestimonials'] = $this->testimonials_model->getAll();
		$data['pgTitle'] = "Testimonials";

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
	        $data['shrt'] = form_textarea(array(
				            'name' => 'shrt',
				            'rows' => 4,
				            'value' => set_value('shrt')
	        ));
	        $data['testimonial'] = form_textarea(array(
				            'name' => 'testimonial',
				            'value' => set_value('testimonial')
	        ));
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/options');
			$this->load->view('cms/testimonialsform');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('cms/tinymce-init');
			$this->load->view('template/close');
		}else{
			$data['success'] = true;
			$data['items'] = $this->testimonials_model->getAll();
			$data['header'] = "Add a New Testimonial";
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/options');
			$this->load->view('cms/testimonialslist');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('cms/deletescript');
			$this->load->view('template/close');
		}

	}

	public function edit($record = null){
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		if($record != null){
			if($this->form_validation->run() == FALSE){
				$testimonial = $this->testimonials_model->getToEdit($record);
					$id = $testimonial->testimonials_id;
					$author = $testimonial->testimonials_author;
					$position = $testimonial->testimonials_position;
					$company = $testimonial->testimonials_company;
					$location = $testimonial->testimonials_location;
					$shrt = $testimonial->testimonials_shrt;
					$testimonial = $testimonial->testimonials_content;
				$data['bodyclass'] = "addpage";
				$data['header'] = "Edit Testimonial";
				$data['formstart'] = form_open('testimonials/update_record/testimonials/' . $id);
				$data['author'] = form_input(array(
					            'name' => 'author',
					            'type' => 'text',
					            'placeholder' => 'Name',
					            'value' => $author
		        ));
		        $data['position'] = form_input(array(
					            'name' => 'position',
					            'type' => 'text',
					            'placeholder' => 'Position',
					            'value' => $position
		        ));
		        $data['company'] = form_input(array(
					            'name' => 'company',
					            'type' => 'text',
					            'placeholder' => 'Company',
					            'value' => $company
		        ));
		        $data['location'] = form_input(array(
					            'name' => 'location',
					            'type' => 'text',
					            'placeholder' => 'Location',
					            'value' => $location
		        ));
		        $data['shrt'] = form_textarea(array(
					            'name' => 'shrt',
					            'rows' => 4,
					            'value' => $shrt
		        ));
		        $data['testimonial'] = form_textarea(array(
					            'name' => 'testimonial',
					            'value' => $testimonial
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/options');
				$this->load->view('cms/testimonialsform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('template/close');
			}else{
				$data['bodyclass'] = "addpage";
				$data['header'] = "Edit Testimonial";
				$data['formstart'] = form_open('testimonials/update_record/testimonials/' . $id);
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
		        $data['shrt'] = form_textarea(array(
					            'name' => 'shrt',
					            'rows' => 4,
					            'value' => set_value('shrt')
		        ));
		        $data['testimonial'] = form_textarea(array(
					            'name' => 'testimonial',
					            'value' => set_value('testimonial')
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/options');
				$this->load->view('cms/testimonialsform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('cms/tinymce-init');
				$this->load->view('template/close');
			}
		}else{
			$data['items'] = $this->testimonials_model->getAll();
			$data['header'] = "Choose Testimonial to Edit";
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/options');
			$this->load->view('cms/testimonialslist');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('cms/deletescript');
			$this->load->view('template/close');
		}

	}

	public function insert_record($function) {
		$this->load->model('insert_model');
		if($this->form_validation->run() != FALSE){
			$this->insert_model->$function();
		}
		
		//$this->add();
		redirect('testimonials/edit');
	}

	public function update_record($function, $record){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			$this->update_model->$function();
			//$this->edit();
			redirect('testimonials/edit');
		}else{
			$this->edit($record);
		}

	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		//$this->edit();
		redirect('testimonials/edit');
	}
	
}