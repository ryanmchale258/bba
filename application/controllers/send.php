<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->library('email');
	}

	public function contactus()	{
		$expiration = time()-7200; // Two hour limit
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);

		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		if ($row->count == 0){
		    redirect('contact');
		}else{
			$this->email->from($this->input->post('email'), $this->input->post('name'));
			$this->email->to('sarah@faulds.ca'); 

			$this->email->subject($this->input->post('subject'));
			$this->email->message($this->input->post('message'));	

			if($this->email->send()){
				redirect('page/thankyou');
			}else{
				echo $this->email->print_debugger();
			}
		}

	}

	public function orderform()	{
		$this->load->model('orderform_model');
		$arrResources = $this->orderform_model->getAll();
		$email_setting  = array('mailtype'=>'html');
		$this->email->initialize($email_setting);
			$this->email->from('no-reply@barkerblagrave-rds.com', 'Order Form Submission');
			$this->email->to('ryan.mchale258@gmail.com'); 

			$this->email->subject('Order Form Submission: ' . $this->input->post('name'));

			$selectedPresentations  = 'None';
			if(isset($_POST['presentations']) && is_array($_POST['presentations']) && count($_POST['presentations']) > 0){
			    $selectedPresentations = implode(',<br>', $_POST['presentations']);
			}
			
			$message = '
				<html>
			        <head>
			            <title>Contact Form Submissions</title>
			            <style>
							.form-details {
								background-color: #f9f9f9;
								padding: 20px;
							}

							.form-details p:nth-child(odd) {
								background-color: #ececec;
							}
			            </style>
			        </head>
			        <body class="form-details">
			        	<p>Contact form submission. User details:<br>
							<strong>Name:</strong> ' . $this->input->post('name') . '<br>
							<strong>Title:</strong> ' . $this->input->post('title') . '<br>
							<strong>LTC Home Name:</strong> ' . $this->input->post('homeName') . '<br>
							<strong>Phone:</strong> ' . $this->input->post('phone') . '<br>
							<strong>Ext:</strong> ' . $this->input->post('ext') . '<br>
							<strong>Email:</strong> ' . $this->input->post('email') . '<br>
							<strong>Street:</strong> ' . $this->input->post('street') . '<br>
							<strong>City:</strong> ' . $this->input->post('city') . '<br>
							<strong>Province:</strong> ' . $this->input->post('province') . '<br>
							<strong>Postal:</strong> ' . $this->input->post('postal') . '<br>
			        	</p>
			        	<h1>Order details:</h1>';

		        		foreach($arrResources as $row):
		        			$message .= '<p>';
		        			if($row->resource_checklist == 1){
								$message .= $row->resource_name . ': ' .'<br>';
								$selectedPresentations  = 'None';
								if(isset($_POST[$row->resource_slug]) && is_array($_POST[$row->resource_slug]) && count($_POST[$row->resource_slug]) > 0){
								    $selectedPresentations = implode(',<br>', $_POST[$row->resource_slug]);
								    $message .= $selectedPresentations . '<br>';
								}
							}
		        			if($row->resource_cdprice != null && $row->resource_checklist == 0){
								$message .= $row->resource_name . ' CD x ' . $this->input->post('cd-' . $row->resource_slug) . '<br>';
							}
							if($row->resource_emailprice != null && $row->resource_checklist == 0){
								$message .= $row->resource_name . ' Email x ' . $this->input->post('email-' . $row->resource_slug) . '<br>';
							}
							if($row->resource_manualprice != null && $row->resource_checklist == 0){
								$message .= $row->resource_name . ' Manual x ' . $this->input->post('manual-' . $row->resource_slug) . '<br>';
							}
							if($row->resource_comboprice != null && $row->presentation_id == null && $row->resource_checklist == 0){
								$message .= $row->resource_name . ' Combo x ' . $this->input->post('combo-' . $row->resource_slug) . '<br>';
							}elseif($row->resource_comboprice != null && $row->presentation_id != null && $row->resource_checklist == 0){
								$message .= $row->resource_name . ' Combo x ' . $this->input->post('combo-' . $row->resource_slug) . '<br>';
							}

							$message .= 'Section total: ' . $this->input->post('price-' . $row->resource_slug) . '<br>';
							$message .= '</p>';
		        		endforeach;

		    $message .= '<p>Subtotal: ' . $this->input->post('price-subtotal') . '<br>' .
		    			'Shipping: ' . $this->input->post('price-shipping') . '<br>' . 
		    			'Grandtotal: ' . $this->input->post('price-grandtotal')
		    			.'</p>';

		    $message .=  '</body>
			    </html>
			';

			$this->email->message($message);	

			if($this->email->send()){
				redirect('page/thankyou');
			}else{
				echo $this->email->print_debugger();
			}

	}

}