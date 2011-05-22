<?php
class signup extends CI_Controller {

	function index()
	{
		$this->load->view('signup_form');
	}
	
	function register()
	{
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		
		if($password != $this->input->post('confirmpassword')){
			echo 'fail';
		} elseif($password != '' && $email != '' && $firstname != '' && $lastname != '') {
				$password = md5($password);
		
				$this->Users->AddUser($email, $password, $firstname, $lastname);
				
				$this->load->view('dashboard');
		}
	}
}
?>