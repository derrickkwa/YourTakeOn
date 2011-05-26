<?php
class vote extends CI_Controller {
		
	function index()
	{
		
		if($this->input->post('rating')!=false){
			$rating = $this->input->post('rating');
			$postID = $this->input->post('postID');
			$userID = $this->session->userdata('userID');
		
			$this->Votes->rateIdea($rating,$postID,$userID);
		
			$this->session->set_userdata('last_post', $postID);
		}
		//echo $rating . ' ' . $postID . ' ' . $userID;
		//go back to home page after voting
		redirect('/home');
	}
	
}
?>