<?php
class signup extends CI_Controller {

	function index()
	{
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		
		if($password != $this->input->post('confirmpassword')){
			echo 'fail';
			$this->load->view('signup_form');
		
		} elseif($password != '' && $email != '' && $firstname != '' && $lastname != '') {
				$password = md5($password);
		
				$user = $this->Users->AddUser($email, $password, $firstname, $lastname);
				
				$this->session->set_userdata('userID', $user->userID);
				$this->session->set_userdata('email',$user->email);
				$this->session->set_userdata('firstname',$user->firstname);
				$this->session->set_userdata('lastname',$user->lastname);
				$this->session->set_userdata('logged_in',True);
				
				$this->load->view('dashboard', $this->session->userdata);
		
		} else {
			$this->load->view('signup_form');
		}
	}
}
?>