<?php
class signup extends CI_Controller {

	function index()
	{
		$this->load->view('signup_form');
	}
	
	function register()
	{
		/*if($this->users->addUser()==0){
			echo 'fail';
		} else {
			echo 'user added';
		}*/
		
		$user->email = $this->input->post('email');
		$user->password = $this->input->post('password');
		$user->firstname = $this->input->post('firstname');
		$user->lastname = $this->input->post('lastname');
		
		if($user->password != $this->input->post('confirmpassword')){
			echo 'fail';
		} elseif($user->password != '' && $user->email != '' && $user->firstname != '' && $user->lastname != '') {
				$user->password = md5($user->password);
		
				$this->Users->AddUser($user);
				
				$this->load->view('dashboard');
		}
	}
}
?>