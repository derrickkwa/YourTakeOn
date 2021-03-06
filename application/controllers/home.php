<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		
		
		$randompost = $this->Posts->getRandomPost();
		if ($randompost != NULL){
			$data = $randompost;
			$prevpost = $this->Posts->getPost($this->session->userdata('last_post'));
			$data->prev_post = $prevpost;
			
			$this->load->view('homepage',$data);
			
			//clear previdea from session;
			$this->session->set_userdata('last_post',false);
		}
		else{
			$this->load->view('homepage_nonew');
		}	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */