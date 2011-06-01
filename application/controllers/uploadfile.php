<?php
class uploadfile extends CI_Controller {
	function index(){
		redirect('/home');
	}
		
	function upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'mpg|flv|mp4|mov';
		$config['max_size'] = '5120';

		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload($this->input->post('filename')))
		{
			$errors = array('error' => $this->upload->display_errors());

			foreach($errors as $error){
				echo $error;
			}
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			echo $data;
		}
		
	}
	
}
?>