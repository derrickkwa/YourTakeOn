<?php
class login extends CI_Controller {

	function index()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
	
		//If fields are not empty, try to match from database
		if($email != NULL && $password != NULL){
			$user = $this->Users->getUser($email,$password);
			echo "check 1 ";
			
			
			//Assigns session info if database entry found
			if($user!=false){
				
				echo "check 2. ";
				$this->session->set_userdata('userID', $user->userID);
				$this->session->set_userdata('email',$user->email);
				$this->session->set_userdata('firstname',$user->firstname);
				$this->session->set_userdata('lastname',$user->lastname);
				$this->session->set_userdata('logged_in',True);  // Again I don't understand why this. :/
				
				
				$data['userID'] = $this->session->userdata('userID');
				$data['email'] = $this->session->userdata('email');
				$data['firstname'] = $this->session->userdata('firstname');
				$data['lastname'] = $this->session->userdata('lastname');
		
				$this->load->view('dashboard', $data);
			} else {
								echo "check 3. ";
				$this->load->view('login_form');
			}
		} else{
							echo "check 4. ";
			$this->load->view('login_form');
		}
	}
	
}
?>