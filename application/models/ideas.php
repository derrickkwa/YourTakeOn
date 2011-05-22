<?php  
    class Ideas extends CI_Model {
    	var $postID = '';  
    	var $userID = '';
		var $posttitle= '';
		var $postblurb = '';
		var $last_modified = '';
		
  		function __construct()
    		{
        	parent::__construct();
    	}
      
      	function addIdea($posttitle, $postblurb, $userID)
		{
			$this->posttitle = $posttitle;
			$this->postblurb = $postblurb;
			$this->userID = $userID;
			
			$this->db->insert('posts', $this);
			
			return $this;
		}
		
		function getUserIdeas($userID)
		{
			$query = $this->db->get_where('posts', array('userID' => $userID));
			return $query->result();
		}
    }  
?>