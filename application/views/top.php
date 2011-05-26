<div class="full">
	<div id="topposts">
		<h2>Top 10 Posts</h2>
		<?php
		foreach($ideas as $idea){
			?>
			<div style="width: 450px; margin: 20px 0; float: left;">
				<h4><?php echo anchor('/idea/view/'.$idea->postID, $idea->posttitle); ?> - <?php echo round($idea->rating, 2); ?></h4>
				<?php echo $idea->postblurb; ?><br />
				<img src="http://yourtakeon.com/vids/thumbnails/<?php echo $idea->vid_url; ?>.jpg" style="width: 300px;" />
				
			</div>
		<?php }
		?>
	</div>
	<div id="topideas">
		<h2>Top 10 Pitches</h2>
		<?php
		foreach($ideas as $idea){
			?>
			<div style="width: 450px; margin: 20px 0; float: left;">
				<h4><?php echo anchor('/idea/view/'.$idea->postID, $idea->posttitle); ?> - <?php echo round($idea->rating, 2); ?></h4>
				<?php echo $idea->postblurb; ?><br />
				<img src="http://yourtakeon.com/vids/thumbnails/<?php echo $idea->vid_url; ?>.jpg" style="width: 300px;" />
				
			</div>
		<?php }
		?>
	</div>
	<div id="topmusic"">
		<h2>Top 10 Songs</h2>
		<?php
		foreach($ideas as $idea){
			?>
			<div style="width: 450px; margin: 20px 0; float: left;">
				<h4><?php echo anchor('/idea/view/'.$idea->postID, $idea->posttitle); ?> - <?php echo round($idea->rating, 2); ?></h4>
				<?php echo $idea->postblurb; ?><br />
				<img src="http://yourtakeon.com/vids/thumbnails/<?php echo $idea->vid_url; ?>.jpg" style="width: 300px;" />
				
			</div>
		<?php }
		?>
	</div>
	<div id="topothers">
		<h2>Top 10 Misc Videos</h2>
		<?php
		foreach($ideas as $idea){
			?>
			<div style="width: 450px; margin: 20px 0; float: left;">
				<h4><?php echo anchor('/idea/view/'.$idea->postID, $idea->posttitle); ?> - <?php echo round($idea->rating, 2); ?></h4>
				<?php echo $idea->postblurb; ?><br />
				<img src="http://yourtakeon.com/vids/thumbnails/<?php echo $idea->vid_url; ?>.jpg" style="width: 300px;" />
				
			</div>
		<?php }
		?>
	</div>
</div>
