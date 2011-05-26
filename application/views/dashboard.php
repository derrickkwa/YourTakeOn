<div class="content">
<div class="main">
<div>
	<h2>Your Ideas</h2>
	<?php
		foreach($ideas as $idea){
			?>
			<div style="width: 300px; margin: 15px 0; float: left;">
				<h4><?php echo $idea->posttitle; ?> - <?php echo round($idea->rating, 2); ?></h4>
				<?php echo $idea->postblurb; ?><br />
				<img src="http://yourtakeon.com/vids/thumbnails/<?php echo $idea->vid_url; ?>.jpg" style="width: 230px;" />
				
			</div>
	<?php }
	?>
</div>
</div>
