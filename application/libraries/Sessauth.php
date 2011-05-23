<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sessauth {
	
	var $CI;
	
    public function setSession($user)
    {
    	$this->CI=& get_instance();
    	$this->CI->load->library('session');
    	// Creates session
		$this->CI->session->set_userdata('userID', $user->userID);
		$this->CI->session->set_userdata('email',$user->email);
		$this->CI->session->set_userdata('firstname',$user->firstname);
		$this->CI->session->set_userdata('lastname',$user->lastname);
		$this->CI->session->set_userdata('logged_in',True);
					
    }
	
	public function checkLoggedIn()
	{
		$this->CI=& get_instance();
		$this->CI->load->library('session');
		$this->CI->load->library('encrypt');
		if($this->CI->session->userdata('logged_in')==true){
			return true;
		} else {
			if($this->CI->input->cookie('yto_meep')!=false){
				$details = explode('12345',$this->CI->encrypt->decode($this->CI->input->cookie('yto_meep',TRUE)));
				
				$user = $this->CI->Users->getUser($details[0],$details[1]);
				
				if($user==false){ //if cookie value does not correspond to a user, redirect to login
					return false;
				} else {
					$this->setSession($user);
					return true;
				}
			} else {
				return false;
			}
		}
	}
}

/* End of file Someclass.php */