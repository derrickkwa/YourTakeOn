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
	
	function settings()
	{
		$user = $this->Users->getUserbyID($this->session->userdata('userID'));
		$data['error'] = Array();
		$data['success'] = '';
		if($this->input->post('password')!=''){
			if($this->input->post('password')==$this->input->post('confirmpassword')){
				$userdata->password = md5($this->input->post('password'));
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
			if($user->email==''){
				array_push($data['error'], "Email cannot be empty");
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