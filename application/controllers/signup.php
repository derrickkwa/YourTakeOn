<?php
class signup extends CI_Controller {

	function index()
	{
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		
		//Checks if input passwords match
		if($password != $this->input->post('confirmpassword')){
			echo "Passwords do not match.";
			$this->load->view('signup_form');
		
		
		// Checks if input fields are empty. If not, adds them to database and session
		} elseif($password != '' && $email != '' && $firstname != '' && $lastname != '') {
				$password = md5($password);
		
				$user = $this->Users->AddUser($email, $password, $firstname, $lastname);
				
				$this->session->set_userdata('userID', $user->userID);
				$this->session->set_userdata('email',$user->email);
				$this->session->set_userdata('firstname',$user->firstname);
				$this->session->set_userdata('lastname',$user->lastname);
				$this->session->set_userdata('logged_in',True);   // Why? what will reset it to False?
				
				
				$data['userID'] = $this->session->userdata('userID');
				$data['email'] = $this->session->userdata('email');
				$data['firstname'] = $this->session->userdata('firstname');
				$data['lastname'] = $this->session->userdata('lastname');
		
				$this->load->view('dashboard', $data);
		
		} else {
			$this->load->view('signup_form');
		}
	}
}
?>