<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Globalfuncs {
	
	var $CI;
	
	public function displaysidebar(){
		$CI =& get_instance();
		$CI->load->library('session');
		$CI->load->model('Users');
		$CI->load->model('Posts');
		$sidebardata['avgrating'] = $CI->Users->getAverageRating($CI->session->userdata('userID'));
		$sidebardata['posts'] = $CI->Posts->getUserPosts($CI->session->userdata('userID'));
		$sidebardata['totalposts'] = count($sidebardata['posts']);
		$CI->load->view('user_sidebar',$sidebardata);
	}
}

/* End of file Someclass.php */