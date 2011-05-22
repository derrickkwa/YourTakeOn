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
		$this->Users->AddUser();
		$this->load->view('dashboard');
	}
}
?>