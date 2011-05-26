<div class="secondary" style="border-left: 2px solid #dddddd; padding: 0 10px;">
	<h4>Average Rating of Your Ideas</h4>
	<h1><?php echo round($avgrating,2); ?></h1>
	<br />
	<p>
	
	<h4><?php echo $totalideas; ?> Ideas Submitted</h4>
	<table>
			<?php foreach($ideas as $idea){ ?>
				<tr><td style="border-right: 1px solid #3d3d3d;"><?php echo $idea->posttitle; ?></td><td style="padding-left: 1em;"><?php echo $idea->rating; ?></td></tr>
			<?php }?>
	</table>
	
	</p>
	<?php echo anchor('/user','Go to Dashboard'); ?>
</div>
