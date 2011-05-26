<?php
class idea extends CI_Controller {
		
	function index()
	{
		redirect('/home');
	}
	
	function add()
	{
		if($this->sessauth->checkLoggedIn()==false){
			redirect('/home');
		} else {
			$title = $this->input->post('title');
			$blurb = $this->input->post('blurb');
			$userID = $this->session->userdata('userID');
			$vid_url = $this->input->post('vid_url');
		
			if($title != '' && $blurb !='' && $userID !=false){
				$idea = $this->Ideas->addIdea($title,$blurb, $userID, $vid_url);
				redirect('/user');	
			} else {
				$this->load->view('header');
				$this->load->view('postidea_form');
			
				$sidebardata['avgrating'] = $this->Users->getAverageRating($this->session->userdata('userID'));
				$sidebardata['ideas'] = $this->Ideas->getUserIdeas($this->session->userdata('userID'));
				$sidebardata['totalideas'] = count($sidebardata['ideas']);
				$this->load->view('user_sidebar', $sidebardata);

			}
		}
	}
}
?>