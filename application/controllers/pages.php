<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pages_model');
		$this->load->model('navigation_model');
		$this->load->model('staffbio_model');
		$this->load->helper('form');
	}

	public function display_page($slug) {	
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();
		$data['pgdata'] = $this->pages_model->getPage($slug)->row();
		
		$data['bodyclass'] = 'page';
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('template/content');
		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}

	public function add() {
		$data['bodyclass'] = "addpage";
		$data['header'] = "Add a New Page";
		$data['navparents'] = $this->navigation_model->getParents();
		$data['formstart'] = form_open('pages/insert_record/pages');
		$data['pagename'] = form_input(array(
			            'name' => 'pagename',
			            'type' => 'text',
			            'placeholder' => 'Page Name'
        ));
        $data['slug'] = form_input(array(
			            'name' => 'slug',
			            'type' => 'text',
			            'placeholder' => 'URL Segment'
        ));
        $data['metadesc'] = form_textarea(array(
			            'name' => 'metadesc',
			            'id' => 'metadesc',
			            'rows' => '3',
			            'placeholder' => 'Meta Description'
        ));
        $data['body'] = form_textarea(array(
			            'name' => 'content',
			            'class' => 'richtext'
        ));
		$this->load->view('cms/head', $data);
		$this->load->view('cms/header');
		$this->load->view('cms/pagesform');
		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('cms/tinymce-init');
		$this->load->view('template/close');
	}

	public function insert_record($function) {
		$this->load->model('insert_model');
		$this->insert_model->$function();

		if($function == "pages"){
			$this->add();
		}

	}

	// public function update_record($function){
	// 	$this->update_model->$function();

	// }

	// public function delete_record($function, $record){
	// 	$this->load->model('delete_model');
	// 	$this->delete_model->$function($record);

	// }

}