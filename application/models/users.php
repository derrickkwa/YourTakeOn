<?php  
    class Users extends CI_Model {
    	var $userID = '';  
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
			
			return $this;
		}
		
		function getUser($email, $password)
		{
			$this->email = $email;
			$this->password = md5($password);
			
			$query = $this->db->get_where('users', array('email' => $email, 'password' => md5($password)));
			if ($query->num_rows() > 0){
				
				$row = $query->row();
				
				$this->userID = $row->userID;
				$this->email = $row->email;
				$this->firstname = $row->firstname;
				$this->lastname = $row->lastname;
				
				return $this;
				
			} else {
				return false;
			}
			
		}
    }  
?>