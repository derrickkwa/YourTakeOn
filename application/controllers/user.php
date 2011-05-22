<?php
class user extends CI_Controller {
	function index()
	{
		if($this->session->userdata('logged_in')==false){
			$this->load->view('login_form');
		}else{
			$data = $this->session->userdata;
			$data['ideas'] = $this->Ideas->getUserIdeas($this->session->userdata('userID'));
			$this->load->view('dashboard',$data);
		}
	}
	
	function login()
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
				
				//$this->load->view('dashboard', $this->session->userdata);
				redirect('/user');
			} else {
				$this->load->view('login_form');
			}
		} else{
			$this->load->view('login_form');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('logged_out');
		redirect('/home');
	}
	
	function signup()
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
				
				//create session to keep user logged in, after signing up
				$this->session->set_userdata('userID', $user->userID);
				$this->session->set_userdata('email',$user->email);
				$this->session->set_userdata('firstname',$user->firstname);
				$this->session->set_userdata('lastname',$user->lastname);
				$this->session->set_userdata('logged_in',True);
				
				//$this->load->view('dashboard', $this->session->userdata);
				redirect('/user');
		
		} else {
			$this->load->view('signup_form');
		}
	}
}
?>