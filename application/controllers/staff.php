<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('staffbio_model');
		$this->load->model('navigation_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('degree', 'Degree', 'trim');
		$this->form_validation->set_rules('designation', 'Designation', 'trim');
		$this->form_validation->set_rules('bio', 'Biography', 'trim|required');
		$this->form_validation->set_rules('tagline', 'Brief Tagline', 'trim|required');
		$this->form_validation->set_rules('streetnumber', 'Street Number', 'trim|required');
		$this->form_validation->set_rules('streetname', 'Testimonial', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('province', 'Province', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('fax', 'Fax Number', 'trim');
		$this->form_validation->set_rules('mobile', 'Mobile Phone Number', 'trim');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required');
		$this->form_validation->set_rules('rr', 'Rural Route Number', 'trim');
		$this->form_validation->set_rules('postalcode', 'Postal Code', 'trim|required');
	}	

	public function add(){
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		if($this->form_validation->run() == FALSE){
			$data['bodyclass'] = "addpage";
			$data['header'] = "Add a New Staff Member";
			$data['formstart'] = form_open('staff/insert_record/staff');
			$data['name'] = form_input(array(
				            'name' => 'name',
				            'type' => 'text',
				            'placeholder' => 'Firstname Lastname',
				            'value' => set_value('name')
	        ));
	        $data['degree'] = form_input(array(
				            'name' => 'degree',
				            'type' => 'text',
				            'placeholder' => 'B.sc.',
				            'value' => set_value('degree')
	        ));
	        $data['designation'] = form_input(array(
				            'name' => 'designation',
				            'type' => 'text',
				            'placeholder' => 'RD',
				            'value' => set_value('designation')
	        ));
	        $data['streetnumber'] = form_input(array(
				            'name' => 'streetnumber',
				            'type' => 'text',
				            'placeholder' => '555',
				            'value' => set_value('streetnumber')
	        ));
	        $data['streetname'] = form_input(array(
				            'name' => 'streetname',
				            'type' => 'text',
				            'placeholder' => 'Maple Street',
				            'value' => set_value('streetname')
	        ));
	        $data['city'] = form_input(array(
				            'name' => 'city',
				            'type' => 'text',
				            'placeholder' => 'London',
				            'value' => set_value('city')
	        ));
	        $data['province'] = form_input(array(
				            'name' => 'province',
				            'type' => 'text',
				            'placeholder' => 'ON',
				            'value' => set_value('province')
	        ));
	        $data['phone'] = form_input(array(
				            'name' => 'phone',
				            'type' => 'text',
				            'placeholder' => '(555) 555-5555',
				            'value' => set_value('phone')
	        ));
	        $data['fax'] = form_input(array(
				            'name' => 'fax',
				            'type' => 'text',
				            'placeholder' => '(222) 222-2222',
				            'value' => set_value('fax')
	        ));
	        $data['mobile'] = form_input(array(
				            'name' => 'mobile',
				            'type' => 'text',
				            'placeholder' => '(333) 333-3333',
				            'value' => set_value('mobile')
	        ));
	        $data['email'] = form_input(array(
				            'name' => 'email',
				            'type' => 'email',
				            'placeholder' => 'address@domain.com',
				            'value' => set_value('email')
	        ));
	        $data['rr'] = form_input(array(
				            'name' => 'rr',
				            'type' => 'text',
				            'placeholder' => 'RR#1',
				            'value' => set_value('rr')
	        ));
	        $data['postalcode'] = form_input(array(
				            'name' => 'postalcode',
				            'type' => 'text',
				            'placeholder' => 'A1A 1A1',
				            'value' => set_value('postalcode')
	        ));
	        $data['tagline'] = form_input(array(
				            'name' => 'tagline',
				            'type' => 'text',
				            'placeholder' => 'Short Description of Staff Member',
				            'value' => set_value('designation')
	        ));
	        $data['bio'] = form_textarea(array(
				            'name' => 'bio',
				            'placeholder' => 'A longer biography of Staff Member',
				            'class' => 'richtext',
				            'value' => set_value('bio')
	        ));
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/options');
			$this->load->view('cms/staffbioform');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('cms/tinymce-init');
			$this->load->view('template/close');
		}else{
			$data['success'] = true;
			$data['items'] = $this->staffbio_model->getAll();
			$data['header'] = "Choose Staff Member to Edit";
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/options');
			$this->load->view('cms/stafflist');
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
				$staffbio = $this->staffbio_model->getToEdit($record);
					$id = $staffbio->staffbios_id;
					$name = $staffbio->staffbios_name;
					$degree = $staffbio->staffbios_degree;
					$designation = $staffbio->staffbios_designation;
					$tagline = $staffbio->staffbios_tagline;
					$streetnumber = $staffbio->staffbios_streetnumber;
					$bio = $staffbio->staffbios_bio;
					$streetname = $staffbio->staffbios_streetname;
					$city = $staffbio->staffbios_city;
					$province = $staffbio->staffbios_province;
					$phone = $staffbio->staffbios_phone;
					$fax = $staffbio->staffbios_fax;
					$mobile = $staffbio->staffbios_mobile;
					$email = $staffbio->staffbios_email;
					$rr = $staffbio->staffbios_rr;
					$postalcode = $staffbio->staffbios_postalcode;
				$data['bodyclass'] = "addpage";
				$data['header'] = "Edit Staff Member";
				$data['formstart'] = form_open('staff/update_record/staff/' . $id);
				$data['name'] = form_input(array(
					            'name' => 'name',
					            'type' => 'text',
					            'placeholder' => 'Firstname Lastname',
					            'value' => $name
		        ));
		        $data['degree'] = form_input(array(
					            'name' => 'degree',
					            'type' => 'text',
					            'placeholder' => 'B.sc.',
					            'value' => $degree
		        ));
		        $data['designation'] = form_input(array(
					            'name' => 'designation',
					            'type' => 'text',
					            'placeholder' => 'RD',
					            'value' => $designation
		        ));
		        $data['streetnumber'] = form_input(array(
					            'name' => 'streetnumber',
					            'type' => 'text',
					            'placeholder' => '555',
					            'value' => $streetnumber
		        ));
		        $data['streetname'] = form_input(array(
					            'name' => 'streetname',
					            'type' => 'text',
					            'placeholder' => 'Maple Street',
					            'value' => $streetname
		        ));
		        $data['city'] = form_input(array(
					            'name' => 'city',
					            'type' => 'text',
					            'placeholder' => 'London',
					            'value' => $city
		        ));
		        $data['province'] = form_input(array(
					            'name' => 'province',
					            'type' => 'text',
					            'placeholder' => 'ON',
					            'value' => $province
		        ));
		        $data['phone'] = form_input(array(
					            'name' => 'phone',
					            'type' => 'text',
					            'placeholder' => '(555) 555-5555',
					            'value' => $phone
		        ));
		        $data['fax'] = form_input(array(
					            'name' => 'fax',
					            'type' => 'text',
					            'placeholder' => '(222) 222-2222',
					            'value' => $fax
		        ));
		        $data['mobile'] = form_input(array(
					            'name' => 'mobile',
					            'type' => 'text',
					            'placeholder' => '(333) 333-3333',
					            'value' => $mobile
		        ));
		        $data['email'] = form_input(array(
					            'name' => 'email',
					            'type' => 'email',
					            'placeholder' => 'address@domain.com',
					            'value' => $email
		        ));
		        $data['rr'] = form_input(array(
					            'name' => 'rr',
					            'type' => 'text',
					            'placeholder' => 'RR#1',
					            'value' => $rr
		        ));
		        $data['postalcode'] = form_input(array(
					            'name' => 'postalcode',
					            'type' => 'text',
					            'placeholder' => 'A1A 1A1',
					            'value' => $postalcode
		        ));
		        $data['tagline'] = form_input(array(
					            'name' => 'tagline',
					            'type' => 'text',
					            'placeholder' => 'Short Description of Staff Member',
					            'value' => $tagline
		        ));
		        $data['bio'] = form_textarea(array(
					            'name' => 'bio',
					            'placeholder' => 'A longer biography of Staff Member',
					            'class' => 'richtext',
					            'value' => $bio
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/options');
				$this->load->view('cms/staffbioform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('template/close');
			}else{
				$data['bodyclass'] = "addpage";
				$data['header'] = "Edit Staff Member";
				$data['formstart'] = form_open('staff/update_record/staff/' . $id);
				$data['name'] = form_input(array(
					            'name' => 'name',
					            'type' => 'text',
					            'placeholder' => 'Firstname Lastname',
					            'value' => set_value('name')
		        ));
		        $data['degree'] = form_input(array(
					            'name' => 'degree',
					            'type' => 'text',
					            'placeholder' => 'B.sc.',
					            'value' => set_value('degree')
		        ));
		        $data['designation'] = form_input(array(
					            'name' => 'designation',
					            'type' => 'text',
					            'placeholder' => 'RD',
					            'value' => set_value('designation')
		        ));
		        $data['streetnumber'] = form_input(array(
					            'name' => 'streetnumber',
					            'type' => 'text',
					            'placeholder' => '555',
					            'value' => set_value('streetnumber')
		        ));
		        $data['streetname'] = form_input(array(
					            'name' => 'streetname',
					            'type' => 'text',
					            'placeholder' => 'Maple Street',
					            'value' => set_value('streetname')
		        ));
		        $data['city'] = form_input(array(
					            'name' => 'city',
					            'type' => 'text',
					            'placeholder' => 'London',
					            'value' => set_value('city')
		        ));
		        $data['province'] = form_input(array(
					            'name' => 'province',
					            'type' => 'text',
					            'placeholder' => 'ON',
					            'value' => set_value('province')
		        ));
		        $data['phone'] = form_input(array(
					            'name' => 'phone',
					            'type' => 'text',
					            'placeholder' => '(555) 555-5555',
					            'value' => set_value('phone')
		        ));
		        $data['fax'] = form_input(array(
					            'name' => 'fax',
					            'type' => 'text',
					            'placeholder' => '(222) 222-2222',
					            'value' => set_value('fax')
		        ));
		        $data['mobile'] = form_input(array(
					            'name' => 'mobile',
					            'type' => 'text',
					            'placeholder' => '(333) 333-3333',
					            'value' => set_value('mobile')
		        ));
		        $data['email'] = form_input(array(
					            'name' => 'email',
					            'type' => 'email',
					            'placeholder' => 'address@domain.com',
					            'value' => set_value('email')
		        ));
		        $data['rr'] = form_input(array(
					            'name' => 'rr',
					            'type' => 'text',
					            'placeholder' => 'RR#1',
					            'value' => set_value('rr')
		        ));
		        $data['postalcode'] = form_input(array(
					            'name' => 'postalcode',
					            'type' => 'text',
					            'placeholder' => 'A1A 1A1',
					            'value' => set_value('postalcode')
		        ));
		        $data['tagline'] = form_input(array(
					            'name' => 'tagline',
					            'type' => 'text',
					            'placeholder' => 'Short Description of Staff Member',
					            'value' => set_value('designation')
		        ));
		        $data['bio'] = form_textarea(array(
					            'name' => 'bio',
					            'placeholder' => 'A longer biography of Staff Member',
					            'class' => 'richtext',
					            'value' => set_value('bio')
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/options');
				$this->load->view('cms/staffbioform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('cms/tinymce-init');
				$this->load->view('template/close');
			}
		}else{
			$data['items'] = $this->staffbio_model->getAll();
			$data['header'] = "Choose Staff Member to Edit";
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/options');
			$this->load->view('cms/stafflist');
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
		redirect('staff/edit');
	}

	public function update_record($function, $record){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			$this->update_model->$function();
			//$this->edit();
			redirect('staff/edit');
		}else{
			$this->edit($record);
		}

	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		//$this->edit();
		redirect('staff/edit');
	}
	
}