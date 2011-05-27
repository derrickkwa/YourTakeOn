<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sessauth {
	
	var $CI;
	
    public function setSession($user)
    {
    	$CI=& get_instance();
    	$CI->load->library('session');
    	// Creates session
		$CI->session->set_userdata('userID', $user->userID);
		$CI->session->set_userdata('email',$user->email);
		$CI->session->set_userdata('firstname',$user->firstname);
		$CI->session->set_userdata('lastname',$user->lastname);
		$CI->session->set_userdata('logged_in',True);
					
    }
	
	public function checkLoggedIn()
	{
		$CI=& get_instance();
		$CI->load->library('session');
		$CI->load->library('encrypt');
		if($CI->session->userdata('logged_in')==true){
			return true;
		} else {
			if($CI->input->cookie('yto_meep')!=false){
				$details = explode('12345',$CI->encrypt->decode($CI->input->cookie('yto_meep',TRUE)));
				
				$user = $CI->Users->getUser($details[0],$details[1]);
				
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