<div class="content">
	<div class="main">
		<div>
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
		</div>
		<div class="clear">
				<h1><?php echo $posttitle; ?></h1>
				<p><?php echo $postblurb; ?></p>
				<?php $url = 'http://yourtakeon.com/vids/'.$vid_url.'.flv'; ?>
				<script type="text/javascript" src="<?php echo base_url(); ?>/public/flowplayer/flowplayer-3.2.6.min.js"></script>
				<!-- this A tag is where your Flowplayer will be placed. it can be anywhere -->
					<div href="<?php echo $url; ?>" id="player" style="display:block;width:550px; height: 350px; background-image: url('http://yourtakeon.com/vids/thumbnails/<?php echo $vid_url; ?>.jpg');">
						<img src="<?php echo base_url(); ?>public/flowplayer/play_large.png"  style="margin-top: 125px;margin-left: 225px;"/>
					</div> 
	
				<!-- this will install flowplayer inside previous A- tag. -->
				<script>
					flowplayer("player", {
					
						src: "<?php echo base_url(); ?>public/flowplayer/flowplayer-3.2.7.swf", 
						
						wmode: "transparent"
					},{

					// change the default controlbar to modern
						plugins: {
							controls: {
							url: '<?php echo base_url(); ?>public/flowplayer/flowplayer.controls-tube-3.2.5.swf',
			
							/*buttonColor: 'rgba(0, 0, 0, 0.9)',
							buttonOverColor: '#000000',
							backgroundColor: '#D7D7D7',
							backgroundGradient: 'medium',
							sliderColor: '#FFFFFF',*/
			
							sliderBorder: '1px solid #808080',
							volumeSliderColor: '#FFFFFF',
							volumeBorder: '1px solid #808080',
			
						//	timeColor: '#ff00000',
						//	durationColor: '#0000ff'
							}
						},
	
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
		</div>
	</div>
	<div class="secondary">
		<?php if($prev_idea!=false){ ?>
			<div style="margin-top: 13em; padding: 10px; background: #0088aa;">
				You just rated:
				<h2><?php echo $prev_idea->posttitle; ?></h2>
				<p><?php echo $prev_idea->postblurb; ?></p>
				Average Rating:
				<h2><?php echo round($prev_idea->rating,2); ?></h2>
				based of <?php echo $prev_idea->totalvotes; ?> votes
			</div>
		<?php } ?>
	</div>
</div>