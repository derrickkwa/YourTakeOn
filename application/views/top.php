<script type="text/javascript">
$(document).ready(function(){
	var current = '#topposts';
	
	$('#filter a').click(function(event){
		$(current).hide(200);
		var show = $(this).attr('href');
		$('#filter .selected').removeClass('selected');
		$(this).addClass("selected");
		$(show).show(200);
		current = show;
		show = '';
		return false;
	
	});
});
</script>
<div class="full">
	<h2>Top 10 Leaderboard</h2>
	<h5 id="filter">View: <a href="#topposts" class="selected">All</a> | <a href="#topideas">Ideas</a> | <a href="#topsongs">Songs</a> | <a href="#topothers">Misc</a></h5>
	<div id="topposts" class="clear">
		<?php
		foreach($all as $idea){
			?>
			<div style="width: 450px; margin: 20px 0; float: left;">
				<h4><?php echo anchor('/idea/view/'.$idea->postID, $idea->posttitle); ?> - <?php echo round($idea->rating, 2); ?></h4>
				<?php echo $idea->postblurb; ?><br />
				<img src="http://yourtakeon.com/vids/thumbnails/<?php echo $idea->vid_url; ?>.jpg" style="width: 300px;" />
				
			</div>
		<?php }
		?>
	</div>
	<div id="topideas" class="clear hidden">
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
	<div id="topsongs" class="clear hidden">
		<?php
		foreach($songs as $song){
			?>
			<div style="width: 450px; margin: 20px 0; float: left;">
				<h4><?php echo anchor('/idea/view/'.$song->postID, $song->posttitle); ?> - <?php echo round($song->rating, 2); ?></h4>
				<?php echo $song->postblurb; ?><br />
				<img src="http://yourtakeon.com/vids/thumbnails/<?php echo $song->vid_url; ?>.jpg" style="width: 300px;" />
				
			</div>
		<?php }
		?>
	</div>
	<div id="topothers" class="clear hidden">
		<?php
		foreach($others as $other){
			?>
			<div style="width: 450px; margin: 20px 0; float: left;">
				<h4><?php echo anchor('/idea/view/'.$other->postID, $other->posttitle); ?> - <?php echo round($other->rating, 2); ?></h4>
				<?php echo $other->postblurb; ?><br />
				<img src="http://yourtakeon.com/vids/thumbnails/<?php echo $other->vid_url; ?>.jpg" style="width: 300px;" />
				
			</div>
		<?php }
		?>
	</div>
</div>
