<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('staffbio_model');
		$this->load->model('navigation_model');
		$this->load->helper('form');
		$this->load->helper('fileupload_helper');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('degree', 'Degree', 'trim');
		$this->form_validation->set_rules('designation', 'Designation', 'trim');
		$this->form_validation->set_rules('bio', 'Biography', 'trim|required');
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

	public function add($error = null){
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		if($this->form_validation->run() == FALSE){
			if($error){
				$data['imgerror'] = $error;
			}else{
				$data['imgerror'] = '';
			}
			$data['bodyclass'] = "addstaff";
			$data['header'] = "Add a New Staff Member";
			$data['formstart'] = form_open_multipart('staff/insert_record/staff');
			$data['pgTitle'] = 'Add Staff';
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
	        $data['imagesource'] = base_url() . 'img/staffbios/upload.png';
	        $data['img'] = form_input(array(
									'name' => 'userfile',
									'type' => 'file',
									'id' => 'imgInputOv',
									'onchange' => 'readURL(this)'
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
			$this->load->view('cms/readurl');
			$this->load->view('template/close');
		}else{
			$data['success'] = true;
			$data['items'] = $this->staffbio_model->getAll();
			$data['header'] = "Choose Staff Member to Edit";
			$data['pgTitle'] = 'Add Staff';
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

	public function edit($record = null, $error = null){
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		if($record != null){
			if($error){
				$data['imgerror'] = $error;
			}else{
				$data['imgerror'] = '';
			}
			if($this->form_validation->run() == FALSE){
				$staffbio = $this->staffbio_model->getToEdit($record);
					$id = $staffbio->staffbios_id;
					$name = $staffbio->staffbios_name;
					$degree = $staffbio->staffbios_degree;
					$designation = $staffbio->staffbios_designation;
					$imgpath = $staffbio->staffbios_photo;
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
				$data['bodyclass'] = "addstaff";
				$data['header'] = "Edit Staff Member";
				$data['formstart'] = form_open_multipart('staff/update_record/staff/' . $id);
				$data['pgTitle'] = 'Edit Staff';
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
		        if((empty($imgpath) === FALSE) && (stristr($imgpath, 'default') === FALSE)){
					$data['imagesource'] = base_url() . 'img/staffbios/' . $imgpath;
				}else{
					$data['imagesource'] = base_url() . 'img/staffbios/upload.png';
				}
				$data['img'] = form_input(array(
										'name' => 'userfile',
										'type' => 'file',
										'id' => 'imgInputOv',
										'onchange' => 'readURL(this)'
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
				$this->load->view('cms/tinymce-init');
				$this->load->view('cms/readurl');
				$this->load->view('template/close');
			}else{
				if($error){
					$data['imgerror'] = $error;
				}else{
					$data['imgerror'] = '';
				}
				$data['bodyclass'] = "addstaff";
				$data['header'] = "Edit Staff Member";
				$data['pgTitle'] = 'Edit Staff';
				$data['formstart'] = form_open_multipart('staff/update_record/staff/' . $id);
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
		        $data['imagesource'] = base_url() . 'img/staffbios/upload.png';
				$data['image'] = form_input(array(
										'name' => 'userfile',
										'type' => 'file',
										'id' => 'imgInputOv',
										'onchange' => 'readURL(this)'
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
				$this->load->view('cms/readurl');
				$this->load->view('template/close');
			}
		}else{
			$data['items'] = $this->staffbio_model->getAll();
			$data['header'] = "Choose Staff Member to Edit";
			$data['pgTitle'] = 'Edit Staff';
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

	public function insert_record() {
		$this->load->model('insert_model');
		$file_name = rand(1,50000) . '_' . str_replace(' ', '-', strtolower($_POST['name'])) . '_bioimage';
    	$filepath = './img/staffbios/';
    	$origpath = $_FILES['userfile']['name'];
		$ext = pathinfo($origpath, PATHINFO_EXTENSION);
		$upload = upload_file($file_name, $filepath);
		if($this->form_validation->run() != FALSE){
			$data = array(
				'staffbios_name' => $_POST['name'],
				'staffbios_degree' => $_POST['degree'],
				'staffbios_designation' => $_POST['designation'],
				'staffbios_photo' => $file_name . '.' . $ext,
				'staffbios_bio' => $_POST['bio'],
				'staffbios_streetnumber' => $_POST['streetnumber'],
				'staffbios_streetname' => $_POST['streetname'],
				'staffbios_city' => $_POST['city'],
				'staffbios_province' => $_POST['province'],
				'staffbios_phone' => $_POST['phone'],
				'staffbios_fax' => $_POST['fax'],
				'staffbios_mobile' => $_POST['mobile'],
				'staffbios_email' => $_POST['email'],
				'staffbios_rr' => $_POST['rr'],
				'staffbios_postalcode' => $_POST['postalcode']
			);
			if($upload['status'] != false){
				$this->insert_model->staff($data);
				redirect(base_url() . index_page() . 'staff/edit');
			}else{
				$this->add($upload['message']);
			}
		}else{
			$this->add();
			//redirect('options/add');
		}
	}

	public function update_record($function, $record){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			if(!empty($_FILES['userfile']['name'])){
				$file_name = rand(1,50000) . '_' . str_replace(' ', '-', strtolower($_POST['name'])) . '_bioimage';
    			$filepath = './img/staffbios/';
		    	$origpath = $_FILES['userfile']['name'];
				$ext = pathinfo($origpath, PATHINFO_EXTENSION);
				$upload = upload_file($file_name, $filepath);
				$data = array(
					'staffbios_name' => $_POST['name'],
					'staffbios_degree' => $_POST['degree'],
					'staffbios_designation' => $_POST['designation'],
					'staffbios_photo' => $file_name . '.' . $ext,
					'staffbios_bio' => $_POST['bio'],
					'staffbios_streetnumber' => $_POST['streetnumber'],
					'staffbios_streetname' => $_POST['streetname'],
					'staffbios_city' => $_POST['city'],
					'staffbios_province' => $_POST['province'],
					'staffbios_phone' => $_POST['phone'],
					'staffbios_fax' => $_POST['fax'],
					'staffbios_mobile' => $_POST['mobile'],
					'staffbios_email' => $_POST['email'],
					'staffbios_rr' => $_POST['rr'],
					'staffbios_postalcode' => $_POST['postalcode']
				);
				if($upload['status'] != false){
					$this->update_model->staff($record, $data);
					redirect(base_url() . index_page() . 'staff/edit');
				}else{
					$this->edit($record, $upload['message']);
				}
			}else{
				$data = array(
					'staffbios_name' => $_POST['name'],
					'staffbios_degree' => $_POST['degree'],
					'staffbios_designation' => $_POST['designation'],
					'staffbios_bio' => $_POST['bio'],
					'staffbios_streetnumber' => $_POST['streetnumber'],
					'staffbios_streetname' => $_POST['streetname'],
					'staffbios_city' => $_POST['city'],
					'staffbios_province' => $_POST['province'],
					'staffbios_phone' => $_POST['phone'],
					'staffbios_fax' => $_POST['fax'],
					'staffbios_mobile' => $_POST['mobile'],
					'staffbios_email' => $_POST['email'],
					'staffbios_rr' => $_POST['rr'],
					'staffbios_postalcode' => $_POST['postalcode']
				);
			}
			$this->update_model->staff($record, $data);
			redirect(base_url() . index_page() . 'staff/edit/' . $record);
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