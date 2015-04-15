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
			$this->email->to('ryan.mchale258@gmail.com'); 

			$this->email->subject($this->input->post('subject'));
			$this->email->message($this->input->post('message'));	

			if($this->email->send()){
				redirect('page/thankyou');
			}else{
				echo $this->email->print_debugger();
			}
		}

	}

}