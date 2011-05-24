<?php
class vote extends CI_Controller {
		
	function index()
	{
		
		$rating = $this->input->post('rating');
		$postID = $this->input->post('postID');
		$userID = $this->session->userdata('userID');
				
		$this->Votes->rateIdea($rating,$postID,$userID);
		
		//go back to home page after voting
		redirect('/home');
	}
	
}
?>