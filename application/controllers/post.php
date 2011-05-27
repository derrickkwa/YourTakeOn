<?php
class post extends CI_Controller {
		
	function index()
	{
		redirect('/home');
	}
	
	function top()
	{
		$this->load->view('header');
		
		$topposts['ideas'] = $this->Posts->getTop(10, 'idea');
		$topposts['songs'] = $this->Posts->getTop(10, 'song');
		$topposts['others'] = $this->Posts->getTop(10, 'misc');
		$topposts['all'] = $this->Posts->getTop(10, 'all');
		
		$this->load->view('top', $topposts);
	}
	
	function add()
	{
		if($this->sessauth->checkLoggedIn()==false){
			redirect('/user/login');
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
			
				$this->globalfuncs->displaysidebar();
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