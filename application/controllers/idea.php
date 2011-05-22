<?php
class idea extends CI_Controller {
		
	function index()
	{
		redirect('/home');
	}
	
	function add()
	{
		$title = $this->input->post('title');
		$blurb = $this->input->post('blurb');
		$userID = $this->session->userdata('userID');
		
		if($title != '' && $blurb !='' && $userID !=false){
			$idea = $this->Ideas->addIdea($title,$blurb, $userID);
			redirect('/user');	
		} else {
			$this->load->view('postidea_form');
		}
	}
}
?>