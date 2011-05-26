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
      
      	function addIdea($posttitle, $postblurb, $userID, $vid_url)
		{
			$this->posttitle = $posttitle;
			$this->postblurb = $postblurb;
			$this->userID = $userID;
			$this->vid_url = $vid_url;
			
			$this->db->insert('posts', $this);
			
			return $this;
		}
		
		function getIdea($postID){
			
			$query = $this->db->get_where('posts', array('postID' => $postID));
			$idea = $query->row();
			return $idea;
			
		}
		
		function getUserIdeas($userID)
		{
			$query = $this->db->get_where('posts', array('userID' => $userID));
			
			//calculate new rating
			$idea = $query->result();
			
			return $idea;
		}
		
		// Gets a random idea from the database, subject to some conditions
		function getRandomIdea()
		{
			$userID = $this->session->userdata('userID');
				
			// Gets ideas which the user didn't submit him/herself
		//	$this->db->limit(1);
			$this->db->where('userID !=', $userID);
			$this->db->order_by('postID', 'random');
			$query = $this->db->get('posts');
			$num_rows = $query->num_rows();
		
			if ($num_rows > 0){				
			
				$i = 0;
				$random_row = $query->row($i);
				
				//Checks through all those that fit criteria for those not voted for before.
				while (($this->hasVoted($random_row->postID) >= 1) && ($i <= ($num_rows))){
			
					$i++;
					$random_row = $query->row($i);
					}
			
				if ($i < $num_rows){
				return $random_row;
				}
				
			}
			
				
		}
		
		//Checks if user has voted for said idea before (barring those not logged in)
		function hasVoted($postID){
			$userID = $this->session->userdata('userID');	

			if ($userID != 0){
				
				$this->db->where('postID', $postID);
				$this->db->where('userID', $userID);
				$query = $this->db->get('votes');
			
				return $query->num_rows();
			}	

			else{
				return 0;
			}	
		}
		
		function updateRating($postID){
			$this->db->select_avg('rating');
			$query = $this->db->get_where('votes', array('postID' => $postID));
			
			$avgrating = $query->first_row();
			
			$this->db->where('postID',$postID);
			$this->db->from('votes');
			$totalvotes = $this->db->count_all_results();
			$this->db->where('postID',$postID);
			$this->db->update('posts', array('rating'=>$avgrating->rating, 'totalvotes'=>$totalvotes));
			return $avgrating;
		}
		
		function getTop($count){
			$this->db->order_by("rating", "desc");
			$query = $this->db->get('posts', $count);
			$topideas = $query->result();
			
			return $topideas;
		}
		
		function deleteIdea($postID, $userID){
			//only delete if the idea belongs to logged in user
			$this->db->delete('posts', array('postID'=>$postID,'userID'=>$userID));
		}
    }  
?>