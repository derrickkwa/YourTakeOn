<div class="secondary" style="border-left: 2px solid #dddddd; padding: 0 10px;">
	<h4>Average Rating of Your Posts</h4>
	<h1><?php echo round($avgrating,2); ?></h1>
	<br />
	<p>
	
	<h4><?php echo $totalposts; ?> Posts Submitted</h4>
	<table>
			<?php foreach($posts as $post){ ?>
				<tr><td style="border-right: 1px solid #3d3d3d;"><?php echo $post->posttitle; ?></td><td style="padding-left: 1em;"><?php echo $post->rating; ?></td></tr>
			<?php }?>
	</table>
	
	</p>
	<?php echo anchor('/user','Go to Dashboard'); ?>
</div>
