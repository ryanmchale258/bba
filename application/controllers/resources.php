<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resources extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->model('orderform_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Resource Title', 'trim|required');
		$this->form_validation->set_rules('desc', 'Description', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Price', 'trim');
		$this->form_validation->set_rules('cd', 'CD Price', 'trim');
		$this->form_validation->set_rules('manual', 'Manual Price', 'trim');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();
		$data['pgTitle'] = "Resources";
		
		$data['bodyclass'] = 'services';
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('resources/resources');

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
			$data['header'] = "Add a New Resource or Presentation";
			$data['pgTitle'] = 'Add Resource';
			$data['formstart'] = form_open('resources/insert_record/resources');
			$data['title'] = form_input(array(
				            'name' => 'title',
				            'type' => 'text',
				            'placeholder' => 'Resource Title',
				            'value' => set_value('title')
	        ));
	        $data['desc'] = form_textarea(array(
				            'name' => 'desc',
				            'type' => 'text',
				            'placeholder' => 'Description',
				            'value' => set_value('Description')
	        ));
	        $data['emailcheck'] = form_checkbox('emailprice', 'Email', FALSE, 'onClick="toggleInput(\'email\')"');
	        $data['manualcheck'] = form_checkbox('manualprice', 'Manual', FALSE, 'onClick="toggleInput(\'manual\')"');
	        $data['cdcheck'] = form_checkbox('cdprice', 'CD', FALSE, 'onClick="toggleInput(\'cd\')"');
	        $data['indcheck'] = form_checkbox('indprice', 'Individual', FALSE, 'onClick="togglePres()"');
	        $data['discper'] = form_input(array(
				            'name' => 'discper',
				            'type' => 'text',
					        'class' => 'insentence',
				            'value' => set_value('discper')
	        ));
	        $data['ind'] = form_input(array(
				            'name' => 'ind',
				            'type' => 'text',
					        'class' => 'insentence',
				            'value' => set_value('ind')
	        ));
	        $data['peramt'] = form_input(array(
				            'name' => 'peramt',
				            'type' => 'text',
					        'class' => 'insentence',
				            'value' => set_value('peramt')
	        ));
	        $data['combo'] = form_input(array(
				            'name' => 'combo',
				            'type' => 'text',
					        'class' => 'insentence',
				            'value' => set_value('combo')
	        ));
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/options');
			$this->load->view('cms/resourceform');
			$this->load->view('template/footer');

			$this->load->view('template/scripts');
			$this->load->view('cms/tinymce-init');
			$this->load->view('template/close');
		}else{
			$data['success'] = true;
			$data['items'] = $this->orderform_model->getResources();
			$data['header'] = "Add a New Resource";
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/options');
			$this->load->view('cms/resourceslist');
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
				$resource = $this->orderform_model->getToEdit($record);
					$id = $resource->resource_id;
					$title = $resource->resource_name;
					$desc = $resource->resource_desc;
					$email = $resource->resource_emailprice;
					$cd = $resource->resource_cdprice;
					$manual = $resource->resource_manualprice;
					$ind = $resource->resource_individualprice;
					$pres = $resource->resource_presentations;
					$discper = $resource->resource_discount;
					$peramt = $resource->resource_discountreq;
					$combo = $resource->resource_comboprice;
				$data['bodyclass'] = "addpage";
				$data['pgTitle'] = 'Add Resource';
				$data['header'] = "Edit Resource";
				$data['formstart'] = form_open('resources/update_record/resources/' . $id);
				$data['title'] = form_input(array(
					            'name' => 'title',
					            'type' => 'text',
					            'placeholder' => 'Resource Title',
					            'value' => $title
		        ));
		        $data['desc'] = form_textarea(array(
					            'name' => 'desc',
					            'type' => 'text',
					            'placeholder' => 'Description',
					            'value' => $desc
		        ));
		        $data['emailcheck'] = form_checkbox('emailprice', 'Email', FALSE, 'onClick="toggleInput(\'email\')"');
		        $data['manualcheck'] = form_checkbox('manualprice', 'Manual', FALSE, 'onClick="toggleInput(\'manual\')"');
		        $data['cdcheck'] = form_checkbox('cdprice', 'CD', FALSE, 'onClick="toggleInput(\'cd\')"');
		        $data['indcheck'] = form_checkbox('indprice', 'Individual', FALSE, 'onClick="togglePres()"');
		        $prices = array();
		        if(!empty($email)){
		        	$data['emailcheck'] = form_checkbox('emailprice', 'Email', TRUE, 'onClick="toggleInput(\'email\')"');
			        $prices['email'] = array('<label for="email">Email Price:</label>', form_input(array(
						            'name' => 'email',
						            'type' => 'text',
						            'value' => $email
			        )));
			    }
			    if(!empty($cd)){
			    	$data['cdcheck'] = form_checkbox('cdprice', 'CD', TRUE, 'onClick="toggleInput(\'cd\')"');
			        $prices['cd'] = array('<label for="cd">CD Price:</label>', form_input(array(
						            'name' => 'cd',
						            'type' => 'text',
						            'value' => $cd
			        )));
		        }
			    if(!empty($manual)){
			    	$data['manualcheck'] = form_checkbox('manualprice', 'Manual', TRUE, 'onClick="toggleInput(\'manual\')"');
			        $prices['manual'] = array('<label for="manual">Manual Price:</label>', form_input(array(
						            'name' => 'manual',
						            'type' => 'text',
						            'value' => $manual
			        )));
		    	}
		    	if(!empty($ind)){
			    	$data['indcheck'] = form_checkbox('indprice', 'Individual', TRUE, 'onClick="togglePres()"');
			    	if(!empty($pres)){
			    		$preslist = array();
			    		foreach($pres as $p) {
			    			$preslist[] = form_input(array(
								            'name' => 'presentationitems[]',
								            'type' => 'text',
								            'value' => $p->presentation_name
					        )); 
			    		}
			    		$data['preslist'] = $preslist;
			    		$data['indprice'] = $ind;
			    	}
		    	}
		    	$data['prices'] = $prices;
		    	$data['discper'] = form_input(array(
					            'name' => 'discper',
					            'type' => 'text',
					            'class' => 'insentence',
					            'value' => $discper
		        ));
		        $data['ind'] = form_input(array(
					            'name' => 'ind',
					            'type' => 'text',
						        'class' => 'insentence',
					            'value' => $ind
		        ));
		        $data['peramt'] = form_input(array(
					            'name' => 'peramt',
					            'type' => 'text',
					            'class' => 'insentence',
					            'value' => $peramt
		        ));
		        $data['combo'] = form_input(array(
					            'name' => 'combo',
					            'type' => 'text',
					            'class' => 'insentence',
					            'value' => $combo
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/options');
				$this->load->view('cms/resourceform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('template/close');
			}else{
				$data['bodyclass'] = "addpage";
				$data['pgTitle'] = 'Edit Resource';
				$data['header'] = "Edit Resource";
				$data['formstart'] = form_open('resources/update_record/resources/' . $id);
				$data['title'] = form_input(array(
					            'name' => 'title',
					            'type' => 'text',
					            'placeholder' => 'Resource Title',
					            'value' => set_value('title')
		        ));
		        $data['desc'] = form_textarea(array(
					            'name' => 'desc',
					            'type' => 'text',
					            'placeholder' => 'Description',
					            'value' => set_value('Description')
		        ));
		        $data['emailcheck'] = form_checkbox('emailprice', 'Email', FALSE, 'onClick="toggleInput(\'email\')"');
		        $data['manualcheck'] = form_checkbox('manualprice', 'Manual', FALSE, 'onClick="toggleInput(\'manual\')"');
		        $data['cdcheck'] = form_checkbox('cdprice', 'CD', FALSE, 'onClick="toggleInput(\'cd\')"');
		        $data['indcheck'] = form_checkbox('indprice', 'Individual', FALSE, 'onClick="togglePres()"');
		        $prices = array();
		        if(!empty($email)){
		        	$data['emailcheck'] = form_checkbox('emailprice', 'Email', TRUE, 'onClick="toggleInput(\'email\')"');
			        $prices['email'] = array('<label for="email">Email Price:</label>', form_input(array(
						            'name' => 'email',
						            'type' => 'text',
						            'value' => set_value('email')
			        )));
			    }
			    if(!empty($cd)){
			    	$data['cdcheck'] = form_checkbox('cdprice', 'CD', TRUE, 'onClick="toggleInput(\'cd\')"');
			        $prices['cd'] = array('<label for="cd">CD Price:</label>', form_input(array(
						            'name' => 'cd',
						            'type' => 'text',
						            'value' => set_value('cd')
			        )));
		        }
			    if(!empty($manual)){
			    	$data['manualcheck'] = form_checkbox('manualprice', 'Manual', TRUE, 'onClick="toggleInput(\'manual\')"');
			        $prices['manual'] = array('<label for="manual">Manual Price:</label>', form_input(array(
						            'name' => 'manual',
						            'type' => 'text',
						            'value' => set_value('manual')
			        )));
		    	}
		    	if(!empty($ind)){
			    	$data['indcheck'] = form_checkbox('indprice', 'Individual', TRUE, 'onClick="togglePres()"');
			    	if(!empty($pres)){
			    		$preslist = array();
			    		foreach($pres as $p) {
			    			$preslist[] = form_input(array(
								            'name' => 'presentationitems[]',
								            'type' => 'text',
								            'value' => set_value('presentationitems[]')
					        )); 
			    		}
			    		$data['preslist'] = $preslist;
			    	}
		    	}
		    	$data['prices'] = $prices;
		    	$data['discper'] = form_input(array(
					            'name' => 'discper',
					            'type' => 'text',
					            'class' => 'insentence',
					            'value' => set_value('discper')
		        ));
		        $data['ind'] = form_input(array(
					            'name' => 'ind',
					            'type' => 'text',
						        'class' => 'insentence',
					            'value' => set_value('ind')
		        ));
		        $data['peramt'] = form_input(array(
					            'name' => 'peramt',
					            'type' => 'text',
					            'class' => 'insentence',
					            'value' => set_value('peramt')
		        ));
		        $data['combo'] = form_input(array(
					            'name' => 'combo',
					            'type' => 'text',
					            'class' => 'insentence',
					            'value' => set_value('combo')
		        ));
		        $data['id'] = form_hidden('id', $id);
				$this->load->view('cms/head', $data);
				$this->load->view('cms/header');
				$this->load->view('cms/options');
				$this->load->view('cms/resourceform');
				$this->load->view('template/footer');

				$this->load->view('template/scripts');
				$this->load->view('cms/tinymce-init');
				$this->load->view('template/close');
			}
		}else{
			$data['items'] = $this->orderform_model->getResources()['resources'];
			$data['presentations'] = $this->orderform_model->getResources()['presentations'];
			$data['header'] = "Choose Resource to Edit";
			$data['pgTitle'] = 'Edit Resource';
			$this->load->view('cms/head', $data);
			$this->load->view('cms/header');
			$this->load->view('cms/delete_overlay');
			$this->load->view('cms/options');
			$this->load->view('cms/resourceslist');
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
			redirect('resources/edit');
		}else{
			$this->add();
		}
	}

	public function update_record($function, $record){
		$this->load->model('update_model');
		if($this->form_validation->run() != FALSE){
			$this->update_model->$function();
			redirect('resources/edit');
		}else{
			$this->edit($record);
		}

	}

	public function delete_record($function, $record){
		$this->load->model('delete_model');
		$this->delete_model->$function($record);

		redirect('resources/edit');
	}
	
}