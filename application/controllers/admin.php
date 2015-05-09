<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('form_validation');
		$this->load->model('admin_model');
	}	

	public function add() {
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[75]|callback_check_if_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|matches[emailconf]|callback_check_if_email_exists');
		$this->form_validation->set_rules('emailconf', 'Email Confirmation', 'required');

		if($this->form_validation->run() == FALSE){
			$data['pgTitle'] = 'Add User';
			$data['bodyclass'] = "createadmin";
			$data['header'] = "Add a New User";
			$data['formstart'] = form_open('admin/insert_record/admin');
			$data['fname'] = form_input(array(
				            'name' => 'fname',
				            'type' => 'text',
				            'placeholder' => 'First Name',
				            'value' => set_value('fname')
	        ));
	        $data['lname'] = form_input(array(
				            'name' => 'lname',
				            'type' => 'text',
				            'placeholder' => 'Last Name',
				            'value' => set_value('lname')
	        ));
	        $data['username'] = form_input(array(
				            'name' => 'username',
				            'type' => 'text',
				            'placeholder' => 'Username',
				            'value' => set_value('username')
	        ));
	        $data['email'] = form_input(array(
				            'name' => 'email',
				            'type' => 'text',
				            'placeholder' => 'Email',
				            'value' => set_value('email')
	        ));
	        $data['emailconf'] = form_input(array(
				            'name' => 'emailconf',
				            'type' => 'text',
				            'placeholder' => 'Email'
	        ));
	        $options = array(
						'0'  => 'Administrator',
						'1'  => 'Super Admin'
	        );
	        $data['level'] = form_dropdown('level', $options, '0');
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/options');
			$this->load->view('cms/adminform');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('template/close');
		}else{
			$data['success'] = true;
			$data['items'] = $this->admin_model->getAdmins();
			$data['header'] = "Choose User to Edit";
			$data['pgTitle'] = 'Add User';
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/options');
			$this->load->view('cms/adminlist');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('cms/deletescript');
			$this->load->view('template/close');
		}
	}

	public function edit($record = null) {
		if(!$this->session->userdata('is_logged_in')){
			redirect('login');
		}

		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[75]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|matches[emailconf]');
		$this->form_validation->set_rules('emailconf', 'Email Confirmation', 'required');
		
		if($record != null){
			if($this->form_validation->run() == FALSE){
				$admindata = $this->admin_model->getAdmin($record);
					$id = $admindata->admin_id;
					$username = $admindata->admin_username;
					$firstname = $admindata->admin_firstname;
					$lastname = $admindata->admin_lastname;
					$email = $admindata->admin_email;
					$level = $admindata->admin_level;
				$data['bodyclass'] = "addpage";
				$data['header'] = "Edit User";
				$data['pgTitle'] = 'Edit User';
				$data['formstart'] = form_open('admin/update_record/admin/' . $id);
				$data['fname'] = form_input(array(
					            'name' => 'fname',
					            'type' => 'text',
					            'placeholder' => 'First Name',
					            'value' => $firstname
		        ));
		        $data['lname'] = form_input(array(
					            'name' => 'lname',
					            'type' => 'text',
					            'placeholder' => 'Last Name',
					            'value' => $lastname
		        ));
		        $data['username'] = form_input(array(
					            'name' => 'username',
					            'type' => 'text',
					            'placeholder' => 'Username',
					            'value' => $username
		        ));
		        $data['email'] = form_input(array(
					            'name' => 'email',
					            'type' => 'text',
					            'placeholder' => 'Email',
					            'value' => $email
		        ));
		        $data['emailconf'] = form_input(array(
					            'name' => 'emailconf',
					            'type' => 'text',
					            'placeholder' => 'Email',
					            'value' => $email
		        ));
		        $options = array(
							'0'  => 'Administrator',
							'1'  => 'Super Admin'
		        );
		        $data['level'] = form_dropdown('level', $options, $level);

		        $data['id'] = form_hidden('id', $id);
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/options');
				$this->load->view('cms/adminform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('cms/tinymce-init');
				$this->load->view('template/close');
			}else{
				$data['bodyclass'] = "addpage";
				$data['header'] = "Add a New Page";
				$data['bodyclass'] = "createadmin";
				$data['header'] = "Edit User";
				$data['pgTitle'] = 'Edit User';
				$data['formstart'] = form_open('admin/update_record/admin/' . set_value('id'));
				$data['fname'] = form_input(array(
					            'name' => 'fname',
					            'type' => 'text',
					            'placeholder' => 'First Name',
					            'value' => set_value('fname')
		        ));
		        $data['lname'] = form_input(array(
					            'name' => 'lname',
					            'type' => 'text',
					            'placeholder' => 'Last Name',
					            'value' => set_value('lname')
		        ));
		        $data['username'] = form_input(array(
					            'name' => 'username',
					            'type' => 'text',
					            'placeholder' => 'Username',
					            'value' => set_value('username')
		        ));
		        $data['email'] = form_input(array(
					            'name' => 'email',
					            'type' => 'text',
					            'placeholder' => 'Email',
					            'value' => set_value('email')
		        ));
		        $data['emailconf'] = form_input(array(
					            'name' => 'emailconf',
					            'type' => 'text',
					            'placeholder' => 'Email',
					            'value' => set_value('email')
		        ));
		        $options = array(
							'0'  => 'Administrator',
							'1'  => 'Super Admin'
		        );
		        $data['level'] = form_dropdown('level', $options, set_value('level'));
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/options');
				$this->load->view('cms/adminform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('template/close');
			}
		}else{
			$data['items'] = $this->admin_model->getAdmins();
			$data['header'] = "Choose User to Edit";
			$data['pgTitle'] = 'Edit User';
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/options');
			$this->load->view('cms/adminlist');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('cms/deletescript');
			$this->load->view('template/close');
		}
		
	}

	public function check_if_username_exists($requested_username) {
		$this->load->model('admin_model');
		$username_available = $this->admin_model->check_if_username_exists($requested_username);

		if($username_available){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function check_if_email_exists($requested_email) {
		$this->load->model('admin_model');
		$email_available = $this->admin_model->check_if_email_exists($requested_email);

		if($email_available){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function insert_record($function) {
		$this->load->model('insert_model');
		$this->load->library('email');
		$this->load->library('encrypt');
		$this->load->helper('string');
		$pass = random_string('alnum', 8);

		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[75]|callback_check_if_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|matches[emailconf]|callback_check_if_email_exists');
		$this->form_validation->set_rules('emailconf', 'Email Confirmation', 'required');

		if($this->form_validation->run() != FALSE){
			$this->email->from('no-reply@barkerblagrave-rds.com', 'Barker Blagrave & Associates');
			$this->email->to($_POST['email']); 
			$this->email->subject('New Administrator Signup');
			$this->email->message('You have been registered as an administrator on barkerblagrave.com. Your username is ' . $_POST['username'] . ' and your temporary password is ' .  $pass . '. Visit www.barkerblagrave.com/login to sign in.');	
			$this->email->send();
			//echo $this->email->print_debugger();

			$encpass = $this->encrypt->sha1($pass);

			$this->insert_model->$function($encpass);

			redirect('admin/add');
		}else{
			$this->add();
		}
		
		//$this->add();
	}

	public function update_record($function, $record){
		$this->load->model('update_model');

		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[75]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|matches[emailconf]');
		$this->form_validation->set_rules('emailconf', 'Email Confirmation', 'required');

		if($this->form_validation->run() != FALSE){
			$this->update_model->$function();
			redirect('admin/edit');
		}else{
			$this->edit($record);
		}

		//$this->edit($record);
	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		//$this->edit();
		redirect('admin/edit');
	}

	public function newpass($id){
		$this->load->model('update_model');
		$emailAddress = $this->admin_model->getAdmin($id)->admin_email;
		$this->load->model('insert_model');
		$this->load->library('email');
		$this->load->library('encrypt');
		$this->load->helper('string');
		$pass = random_string('alnum', 8);

		$this->email->from('no-reply@barkerblagrave-rds.com', 'Barker Blagrave & Associates');
		$this->email->to($emailAddress); 
		$this->email->subject('Password Reset');
		$this->email->message('Your password has been reset to ' .  $pass . '. Please sign in with your temporary password in order to change it to a password of your choice. You can sign in at http://www.barkerblagrave.com/login.');	
		$this->email->send();
		//echo $this->email->print_debugger();

		$encpass = $this->encrypt->sha1($pass);

		$this->update_model->newpass($id, $encpass);

		redirect('admin/edit');
	}

	
}