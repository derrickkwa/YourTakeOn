Welcome <?php echo $firstname.' '.$lastname; ?>

<div>
	Current Ideas
	
	<ul>
		<?php
			foreach($ideas as $idea){
				echo '<li>'.$idea->posttitle.' - '.$idea->postblurb . '(Average Rating: '.$idea->rating.')</li>';
			}
		?>
	</ul>
</div>