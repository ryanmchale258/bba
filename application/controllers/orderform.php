<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orderform extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('navigation_model');
		$this->load->model('orderform_model');
	}	

	public function index() {
		$data['navmenu'] = $this->navigation_model->getTopNav();
		$data['mobmenu'] = $this->navigation_model->getMobNav();
		$data['arrResources'] = $this->orderform_model->getAll();
		$resources = $this->orderform_model->getAll();
		//$resourceId = 3;
		//$data['arrPresentations'] = $this->orderform_model->getPresentations($resourceId);
		//$data['arrPresentations'] = $this->orderform_model->getPresentations($resourceId);


		foreach($resources as $row):
			$rid = $row->resource_id;
			if($row->presentation_id != null){
				//print_r($row->resource_id);
				$data['arrPresentations'.$rid] = $this->orderform_model->getPresentations($row->resource_id);
			}
		endforeach;
		
		$data['bodyclass'] = 'services';
		$this->load->view('template/head', $data);
		$this->load->view('template/header');
		$this->load->view('orderform/orderform');

		$this->load->view('template/footer');

		$this->load->view('template/scripts');
		$this->load->view('template/close');
	}
	
}