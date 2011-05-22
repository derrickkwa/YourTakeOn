<?php
class logout extends CI_Controller {

	function index()
	{
		$this->session->sess_destroy();
		$this->load->view('logged_out');
	}
	
}
?>