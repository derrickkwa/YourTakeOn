<?php
class user extends CI_Controller {
	function index()
	{
		
		if($this->sessauth->checkLoggedIn()==false){
			redirect('/user/login');
		} else {
			$this->load->view('header');
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

				// Creates session
				$this->sessauth->setSession($user);
				
				// Creates long-term cookie
				if ($this->input->post('keep_login') == 1){
					
					$cookie = array(
   					'name'   => 'yto_meep',
					'value'  => $this->encrypt->encode($user->email.'12345'.$password),
					'expire' => '865000',
					//'domain' => '.yourtakeon.com',
					//'path'   => '/',
					//'secure' => FALSE
					);

					$this->input->set_cookie($cookie);
				}
				
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
		delete_cookie('yto_meep');
		$this->load->view('logged_out');
		redirect('/home');
	}
	
	function signup()
	{
		$this->load->view('header');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		
		
		// Checks for input password mismatch
		if($password != $this->input->post('confirmpassword')){
			echo "Passwords do not match.";
			$this->load->view('signup_form');
		
		
		} elseif($password != '' && $email != '' && $firstname != '' && $lastname != '') {
				$password = md5($password);
		
				$user = $this->Users->AddUser($email, $password, $firstname, $lastname);
				
				$this->sessauth->setSession($user);
				//$this->load->view('dashboard', $this->session->userdata);
				redirect('/user');
		
		} else {
			$this->load->view('signup_form');
		}
	}
}
?>