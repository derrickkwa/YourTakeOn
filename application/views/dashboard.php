<div class="content">
<div class="main">
<div>
	<h2>Your Posts</h2>
	<?php
		foreach($posts as $post){
			?>
			<div style="width: 300px; margin: 15px 0; float: left;">
				<h4 style="display:inline;"><?php echo anchor('/post/view/'.$post->postID, $post->posttitle); ?> - <?php echo round($post->rating, 2); ?></h4>
				<?php echo anchor('post/delete/'.$post->postID,'[delete]'); ?><br />
				<?php echo $post->postblurb; ?><br />
				<img src="http://yourtakeon.com/vids/thumbnails/<?php echo $post->vid_url; ?>.jpg" style="width: 230px;" />
				
			</div>
	<?php }
	?>
</div>
</div>
