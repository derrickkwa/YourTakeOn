Welcome <?php echo $firstname.' '.$lastname ?>
<div>
<?php
	echo anchor('idea/add', 'Post New Idea');
?>
</div>
<div>
<?php
	echo anchor('user/logout', 'Log Out');
?>
</div>
<div>
	Current Ideas
	
	<ul>
		<?php
			foreach($ideas as $idea){
				echo '<li>'.$idea->posttitle.' - '.$idea->postblurb . '</li>';
			}
		?>
	</ul>
</div>
