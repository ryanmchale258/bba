<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobopenings extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->model('jobs_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Job Title', 'trim|required');
		$this->form_validation->set_rules('type', 'Job Type', 'trim|required');
		$this->form_validation->set_rules('startdate', 'Start Date', 'trim|required');
		$this->form_validation->set_rules('location', 'Location', 'trim|required');
		$this->form_validation->set_rules('desc', 'Job Description', 'trim|required');
		$this->form_validation->set_rules('quals', 'Qualificatioins and Requirements', 'trim|required');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();
		$data['pgTitle'] = "Job Openings";

		
		$data['jobs'] = $this->jobs_model->getAll();
		$data['bodyclass'] = 'jobs';
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('contact/jobopenings');

		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}

	public function add(){
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		if($this->form_validation->run() == FALSE){
			$data['bodyclass'] = "addjob";
			$data['header'] = "Add a New Job Opening";
			$data['formstart'] = form_open('jobopenings/insert_record/jobopenings');
			$data['title'] = form_input(array(
				            'name' => 'title',
				            'type' => 'text',
				            'placeholder' => 'Job Title',
				            'value' => set_value('title')
	        ));
	        $data['type'] = form_input(array(
				            'name' => 'type',
				            'type' => 'text',
				            'placeholder' => 'Job Type',
				            'value' => set_value('type')
	        ));
	        $data['location'] = form_input(array(
				            'name' => 'location',
				            'type' => 'text',
				            'placeholder' => 'Location',
				            'value' => set_value('location')
	        ));
	        $data['startdate'] = form_input(array(
				            'name' => 'startdate',
				            'type' => 'text',
				            'placeholder' => 'dd/mm/yyyy',
				            'value' => set_value('startdate')
	        ));
	        $data['desc'] = form_textarea(array(
				            'name' => 'desc',
				            'class' => 'richtext',
				            'id' => 'jobdesc',
				            'value' => set_value('desc')
	        ));
	        $data['quals'] = form_textarea(array(
				            'name' => 'quals',
				            'class' => 'richtext',
				            'value' => set_value('quals')
	        ));
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/options');
			$this->load->view('cms/jobsform');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('cms/tinymce-init');
			$this->load->view('template/close');
		}else{
			$data['success'] = true;
			$data['items'] = $this->jobs_model->getAll();
			$data['header'] = "Choose a Job to Edit";
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/options');
			$this->load->view('cms/jobslist');
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
				$job = $this->jobs_model->getToEdit($record);
					$id = $job->jobs_id;
					$title = $job->jobs_title;
					$type = $job->jobs_type;
					$startdate = $job->jobs_start;
					$location = $job->jobs_location;
					$desc = $job->jobs_desc;
					$quals = $job->jobs_reqs;
				$data['bodyclass'] = "addjob";
				$data['header'] = "Edit Job";
				$data['formstart'] = form_open('jobopenings/update_record/jobopenings/' . $id);
				$data['title'] = form_input(array(
					            'name' => 'title',
					            'type' => 'text',
					            'placeholder' => 'Name',
					            'value' => $title
		        ));
		        $data['type'] = form_input(array(
					            'name' => 'type',
					            'type' => 'text',
					            'placeholder' => 'Type',
					            'value' => $type
		        ));
		        $data['location'] = form_input(array(
					            'name' => 'location',
					            'type' => 'text',
					            'placeholder' => 'Location',
					            'value' => $location
		        ));
		        $data['startdate'] = form_input(array(
					            'name' => 'startdate',
					            'type' => 'text',
					            'placeholder' => 'dd/mm/yyyy',
					            'value' => $startdate
		        ));
		        $data['desc'] = form_textarea(array(
					            'name' => 'desc',
					            'class' => 'richtext',
					            'id' => 'jobdesc',
					            'value' => $desc
		        ));
		        $data['quals'] = form_textarea(array(
					            'name' => 'quals',
					            'class' => 'richtext',
					            'value' => $quals
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/options');
				$this->load->view('cms/jobsform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('cms/tinymce-init');
				$this->load->view('template/close');
			}else{
				$data['bodyclass'] = "addjob";
				$data['header'] = "Edit Job";
				$data['formstart'] = form_open('jobopenings/update_record/jobopenings/' . $id);
				$data['title'] = form_input(array(
					            'name' => 'title',
					            'type' => 'text',
					            'placeholder' => 'Job Title',
					            'value' => set_value('title')
		        ));
		        $data['type'] = form_input(array(
					            'name' => 'type',
					            'type' => 'text',
					            'placeholder' => 'Type',
					            'value' => set_value('type')
		        ));
		        $data['startdate'] = form_input(array(
					            'name' => 'startdate',
					            'type' => 'text',
					            'placeholder' => 'dd/mm/yyyy',
					            'value' => set_value('startdate')
		        ));
		        $data['location'] = form_input(array(
					            'name' => 'location',
					            'type' => 'text',
					            'placeholder' => 'Location',
					            'value' => set_value('location')
		        ));
		        $data['desc'] = form_textarea(array(
					            'name' => 'desc',
					            'class' => 'richtext',
					            'id' => 'jobdesc',
					            'value' => set_value('desc')
		        ));
		        $data['quals'] = form_textarea(array(
					            'name' => 'quals',
					            'class' => 'richtext',
					            'value' => set_value('quals')
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/options');
				$this->load->view('cms/jobsform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('cms/tinymce-init');
				$this->load->view('template/close');
			}
		}else{
			$data['items'] = $this->jobs_model->getAll();
			$data['header'] = "Choose a Job to Edit";
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/options');
			$this->load->view('cms/jobslist');
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
		redirect('admin/edit');
	}

	public function update_record($function, $record){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			$this->update_model->$function();
			//$this->edit();
			redirect('admin/edit');
		}else{
			$this->edit($record);
		}

	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		//$this->edit();
		redirect('admin/edit');
	}
	
}