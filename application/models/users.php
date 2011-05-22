<?php  
    class Users extends CI_Model {  
      
  		function __construct()
    		{
        	parent::__construct();
    	}
      
      	function addUser($user)
		{
			$this->db->insert('users', $user);
		}
    }  
?>  