<?php  
    class Users extends CI_Model {  
    	var $email = '';
		var $password = '';
		var $firstname = '';
		var $lastname = '';
		
  		function __construct()
    		{
        	parent::__construct();
    	}
      
      	function addUser($email, $password, $firstname, $lastname)
		{
			$this->email = $email;
			$this->password = $password;
			$this->firstname = $firstname;
			$this->lastname = $lastname;
			$this->db->insert('users', $this);
		}
    }  
?>  