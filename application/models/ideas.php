<?php  
    class Ideas extends CI_Model {
    	var $postID = '';  
    	var $userID = '';
		var $posttitle= '';
		var $postblurb = '';
		var $last_modified = '';
		var $rating = '';
		
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
			
			//calculate new rating
			$idea = $query->result();
			
			return $idea;
		}
		
		function getRandomIdea()
		{
			$this->db->limit(1);
			$this->db->order_by('postID', 'random');
			$query = $this->db->get('posts');
			
			$random_row = $query->first_row();
			return $random_row;
			
		}
		
		function updateRating($postID){
			$this->db->select_avg('rating');
			$query = $this->db->get_where('votes', array('postID' => $postID));
			
			$avgrating = $query->first_row();
			
			$this->db->where('postID',$postID);
			$this->db->update('posts', array('rating'=>$avgrating->rating));
			return $avgrating;
		}
    }  
?>