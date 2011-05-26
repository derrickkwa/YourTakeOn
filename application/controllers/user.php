<?php
class user extends CI_Controller {
	function index()
	{
		
		if($this->sessauth->checkLoggedIn()==false){
			redirect('/user/login');
		} else {
			$this->load->view('header');
			$data = $this->session->userdata;
			$user = $this->Users->getUserbyID($this->session->userdata('userID'));
			$data['ideas'] = $this->Ideas->getUserIdeas($this->session->userdata('userID'));
			
			$this->load->view('dashboard',$data);
			
			$sidebardata['avgrating'] = $this->Users->getAverageRating($this->session->userdata('userID'));
			$sidebardata['ideas'] = $data['ideas'];
			$sidebardata['totalideas'] = count($sidebardata['ideas']);
			$this->load->view('user_sidebar', $sidebardata);
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
				$data['error']='Login failed. Try again.';
				$data['email'] = $email;
				$headerdata['hidenav'] = true;
				$this->load->view('header',$headerdata);
				$this->load->view('login_form',$data);
			}
		} else{
			$this->load->view('header');
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
		$data['error'] = Array();
		$data['email'] = '';
		$data['firstname'] = '';
		$data['lastname'] = '';
		$success = 1;
		
		//first, check if it's a form being submitted
		if($password != '' || $email != '' || $firstname != '' || $lastname != '') {
			$data['email'] = $email;
			$data['firstname'] = $firstname;
			$data['lastname'] = $lastname;
			
			if($password != $this->input->post('confirmpassword')){
				array_push($data['error'], "Passwords do not match.");
				$success = 0;
			}
			$this->load->helper('email');
			if (valid_email($email)==false){
				array_push($data['error'], "Email address is not valid.");
				$success = 0;
			} 
			
			if($email == ''){
				array_push($data['error'], "Email address cannot be empty.");
			}
			if($firstname == '' || $lastname == ''){
				array_push($data['error'], "Name cannot be empty.");
			}
			
			if($success==1) {
				$password = md5($password);
		
				$user = $this->Users->AddUser($email, $password, $firstname, $lastname);
				
				$this->sessauth->setSession($user);
				//$this->load->view('dashboard', $this->session->userdata);
				redirect('/user');
			}

		} 
		
		$this->load->view('signup_form', $data);
	}
	
	function settings()
	{
		$user = $this->Users->getUserbyID($this->session->userdata('userID'));
		$data['error'] = Array();
		$data['success'] = '';
		if($this->input->post('password')!=''){
			if($this->input->post('password')==$this->input->post('confirmpassword')){
				$user->password = md5($this->input->post('password'));
			} else {
				array_push($data['error'], "Passwords don't match");
			}
		}
		if($this->input->post('submitted')==1){
			$user->firstname = $this->input->post('firstname');
			$user->lastname = $this->input->post('lastname');
			$user->email = $this->input->post('email');
			if($user->firstname==''||$user->lastname==''){
			
				array_push($data['error'], "Name cannot be empty");
			}
			$this->load->helper('email');
			if($user->email==''){
				array_push($data['error'], "Email cannot be empty");
			}
			if(valid_email($user->email)==false){
				array_push($data['error'], "Email is not valid.");
			}
			if(count($data['error'])==0){
				$data['success'] = "Account details updated successfully.";
				$this->Users->updateUser($user);
			}
		}
		$data['user'] = $user;

		$this->load->view('header');
		$this->load->view('settings',$data);
		$sidebardata['avgrating'] = $this->Users->getAverageRating($this->session->userdata('userID'));
		$sidebardata['ideas'] = $this->Ideas->getUserIdeas($this->session->userdata('userID'));
		$sidebardata['totalideas'] = count($sidebardata['ideas']);
		$this->load->view('user_sidebar',$sidebardata);
		
	}
	
}
?>