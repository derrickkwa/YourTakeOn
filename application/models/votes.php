<?php  
    class Votes extends CI_Model {
    	var $postID = '';
		var $voteID = '';
		var $rating = '';
		
  		function __construct()
    		{
        	parent::__construct();
    	}
      
      	function rateIdea($rating, $postID){
      		$this->rating = $rating;
			$this->postID = $postID;
			
			$this->db->insert('votes', $this);
			
			//update idea rating
			$this->Ideas->updateRating($postID);
			
			return $this;
		}
	
		
    }  
?>