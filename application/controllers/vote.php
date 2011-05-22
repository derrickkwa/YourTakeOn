<?php
class vote extends CI_Controller {
		
	function index()
	{
		
		$rating = $this->input->post('rating');
		$postID = $this->input->post('postID');
		
		$this->Votes->rateIdea($rating,$postID);
		
		//go back to home page after voting
		redirect('/home');
	}
	
}
?>