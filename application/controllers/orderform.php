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
		$data['arrShipping'] = $this->orderform_model->getShippingInfo();
		//$resourceId = 3;
		//$data['arrPresentations'] = $this->orderform_model->getPresentations($resourceId);
		//$data['arrPresentations'] = $this->orderform_model->getPresentations($resourceId);


		foreach($resources as $row):
		
			if($row->presentation_id != null){
				$rid = $row->resource_id;
				//print_r($row->resource_id);
				$arrPresentations = 'arrPresentations'.$rid;
				$data[$arrPresentations] = $this->orderform_model->getPresentations($row->resource_id);
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