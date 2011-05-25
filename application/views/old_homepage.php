<div class="content">
	<div class="full">
		<div class="cols cols3">
			<?php
			if($prev_idea!=false){
			?>
				<div class="col first" style="margin-top: 8em; padding: 10px; width: 20%; background: #0088aa;">
				You just rated:
				<h2><?php echo $prev_idea->posttitle; ?></h2>
				<p><?php echo $prev_idea->postblurb; ?></p>
				Average Rating:
				<h2><?php echo $prev_idea->rating; ?></h2>
				based of <?php echo $prev_idea->totalvotes; ?> votes
				</div>
			<?php
			} else { //blank div if no previous votes?>
				<div class="col first" style="margin-top: 8em; padding: 10px; width: 20%; ">
					&nbsp;
				</div>
			<?php
			}
			?>
			<div class="col" style="width: 60%;">
				<ul id="ratings">
					<li class="first">1</li>
					<li>2</li>
					<li>3</li>
					<li>4</li>
					<li>5</li>
					<li>6</li>
					<li>7</li>
					<li>8</li>
					<li>9</li>
					<li>10</li>
				</ul>
				<h1><?php echo $posttitle; ?></h1>
				<p><?php echo $postblurb; ?></p>
				<?php $url = 'http://yourtakeon.com/vids/'.$vid_url.'.flv'; ?>
				<script type="text/javascript" src="<?php echo base_url(); ?>/public/flowplayer/flowplayer-3.2.6.min.js"></script>
				<!-- this A tag is where your Flowplayer will be placed. it can be anywhere -->
					<a href="<?php echo $url; ?>" style="display:block;width:550px; height: 350px;" id="player"> </a> 
	
				<!-- this will install flowplayer inside previous A- tag. -->
				<script>
					flowplayer("player", "<?php echo base_url(); ?>/public/flowplayer/flowplayer-3.2.7.swf", {

					// change the default controlbar to modern
						plugins: {
							controls: {
							url: '<?php echo base_url(); ?>/public/flowplayer/flowplayer.controls-tube-3.2.5.swf',
			
							buttonColor: 'rgba(0, 0, 0, 0.9)',
							buttonOverColor: '#000000',
							backgroundColor: '#D7D7D7',
							backgroundGradient: 'medium',
							sliderColor: '#FFFFFF',
			
							sliderBorder: '1px solid #808080',
							volumeSliderColor: '#FFFFFF',
							volumeBorder: '1px solid #808080',
			
							timeColor: '#000000',
							durationColor: '#535353'
							}
						},
						clip: {
    						autoPlay: false
   						 }
	
					});
					
					$(document).ready(function(){
						$('#ratings').children('li').click(function(event){
							$('#rating').val($(this).text());
							$('#ratingform').submit();
						});
					});
			</script>
	<?php echo form_open('/vote', array('id'=>'ratingform', 'name'=>'ratingform')); ?>
	<input type="hidden" id="rating" name="rating" />
	<input type="hidden" id="postID" name="postID" value="<?php echo $postID; ?>" />
	</form>
