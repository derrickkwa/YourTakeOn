<?php
class post extends CI_Controller {
		
	function index()
	{
		redirect('/home');
	}
	
	function top()
	{
		$this->load->view('header');
		
		$topideas['posts'] = $this->Ideas->getTop(10, 'ideas');
		
		$this->load->view('top', $topideas);
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
			$vid_type = $this->input->post('type');
		
			if($title != '' && $blurb !='' && $userID !=false&&$vid_type!=''){
				$idea = $this->Ideas->addIdea($title,$blurb, $userID, $vid_url,$vid_type);
				redirect('/user');	
			} else {
				$this->load->view('header');
				$this->load->view('postidea_form');
			
				$sidebardata['avgrating'] = $this->Users->getAverageRating($this->session->userdata('userID'));
				$sidebardata['posts'] = $this->Posts->getUserPosts($this->session->userdata('userID'));
				$sidebardata['totalposts'] = count($sidebardata['posts']);
				$this->load->view('user_sidebar', $sidebardata);

			}
		}
	}
	
	function view($postID)
	{
	
		$data = $this->Ideas->getIdea($postID);
		$data->prev_idea = false;
		$this->load->view('header');
		$this->load->view('homepage', $data);
		
	}
	
	function delete($postID)
	{
		$this->Ideas->deleteIdea($postID, $this->session->userdata('userID'));
		redirect('/user');
	}
}
?>