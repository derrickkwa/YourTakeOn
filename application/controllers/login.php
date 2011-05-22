<?php
class login extends CI_Controller {

	function index()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		if($email != false && $password != false){
			$user = $this->Users->getUser($email,$password);
			
			if($user!=false){
				
				$this->session->set_userdata('userID', $user->userID);
				$this->session->set_userdata('email',$user->email);
				$this->session->set_userdata('firstname',$user->firstname);
				$this->session->set_userdata('lastname',$user->lastname);
				$this->session->set_userdata('logged_in',True);
				
				$this->load->view('dashboard', $this->session->userdata);
			} else {
				$this->load->view('login_form');
			}
		} else{
			$this->load->view('login_form');
		}
	}
	
}
?>