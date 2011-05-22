<?php  
    class Users extends CI_Model {  
      
  		function __construct()
    		{
        	parent::__construct();
    	}
      
      	function addUser()
		{
			$this->email = $this->input->post('email');
			$this->password = $this->input->post('password');
			$this->firstname = $this->input->post('firstname');
			$this->lastname = $this->input->post('lastname');
			
			if($this->password != $this->input->post('confirmpassword')){
				return 0;
			} elseif($this->password != '' && $this->email != '' && $this->firstname != '' && $this->lastname != '') {
				$this->password = md5($this->password);
				$this->db->insert('users', $this);
				return 1;
			}
		}
    }  
?>  