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
		$email_setting  = array('mailtype'=>'html');
		$this->email->initialize($email_setting);
			$this->email->from('no-reply@barkerblagrave-rds.com', 'Order Form Submission');
			$this->email->to('sarah@faulds.ca'); 

			$this->email->subject('Order Form Submission: ' . $this->input->post('name'));

			$selectedPresentations  = 'None';
			if(isset($_POST['presentations']) && is_array($_POST['presentations']) && count($_POST['presentations']) > 0){
			    $selectedPresentations = implode(',<br>', $_POST['presentations']);
			}
			
			$message = '
				<html>
			        <head>
			            <title>Contact Form Submissions</title>
			        </head>
			        <body>
			        	<p>Contact form submission. User details:<br>
							Name: ' . $this->input->post('name') . '<br>
							Title: ' . $this->input->post('title') . '<br>
							LTC Home Name: ' . $this->input->post('homeName') . '<br>
							Phone: ' . $this->input->post('phone') . '<br>
							Ext: ' . $this->input->post('ext') . '<br>
							Email: ' . $this->input->post('email') . '<br>
							Street: ' . $this->input->post('street') . '<br>
							City: ' . $this->input->post('city') . '<br>
							Province: ' . $this->input->post('province') . '<br>
							Postal: ' . $this->input->post('postal') . '<br>
			        	</p>
			        	<p>Order details:<br>
							Quality Care Audits CD x ' . $this->input->post('cd-qualitycareaudits') . '<br>
							Diabetes Update P&P CD x ' . $this->input->post('cd-diabetesupdate') . '<br>
							Diabetes Update P&P Email x ' . $this->input->post('email-diabetesupdate') . '<br><br>
							Presentations Requested: <br>
							' . $selectedPresentations . '<br><br>
							Policy Pointers I CD x ' . $this->input->post('cd-policypointers') . '<br>
							Policy Pointers I Email x ' . $this->input->post('manual-policypointers') . '<br>
							Policy Pointers I Combo x ' . $this->input->post('combo-policypointers') . '<br><br>
							Policy Pointers II CD x ' . $this->input->post('cd-policypointers2') . '<br>
							Policy Pointers II Email x ' . $this->input->post('manual-policypointers2') . '<br>
							Policy Pointers II Combo x ' . $this->input->post('combo-policypointers2') . '<br>
			        	</p>
			        </body>
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