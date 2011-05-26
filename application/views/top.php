<div class="content">
	<div class="full">
		<h2>Top 10 Ideas</h2>
		<?php
		foreach($ideas as $idea){
			?>
			<div style="width: 450px; margin: 20px 0; float: left;">
				<h4><?php echo $idea->posttitle; ?> - <?php echo round($idea->rating, 2); ?></h4>
				<?php echo $idea->postblurb; ?><br />
				<img src="http://yourtakeon.com/vids/thumbnails/<?php echo $idea->vid_url; ?>.jpg" style="width: 300px;" />
				
			</div>
		<?php }
		?>
	</div>
</div>
