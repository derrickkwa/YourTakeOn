<h1>Welcome to YourTakeOn</h1>
<?php

	$ratings = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10');
	$votebutton = array(
		'name'		=> 'votebutton',
		'id'		=> 'votebutton',
		'value'		=> 'votebutton',
		'type'		=> 'submit',
		'content'	=> 'Rate idea'
	);
	
	echo $posttitle;
	echo '<br />';
	echo $postblurb;
	
	$url = 'http://yourtakeon.com/vids/'.$vid_url.'.flv';
?>
<script type="text/javascript" src="http://localhost/yourtakeon/public/flowplayer/flowplayer-3.2.6.min.js"></script>
<!-- this A tag is where your Flowplayer will be placed. it can be anywhere -->
				<a href="<?php echo $url; ?>" style="display:block;width:550px; height: 350px;" id="player"> 
				</a> 
	
			<!-- this will install flowplayer inside previous A- tag. -->
			<script>
				flowplayer("player", "http://localhost/yourtakeon/public/flowplayer/flowplayer-3.2.7.swf", {

	// change the default controlbar to modern
	plugins: {
		controls: {
			url: 'http://localhost/yourtakeon/public/flowplayer/flowplayer.controls-tube-3.2.5.swf'/*,
			
			buttonColor: 'rgba(0, 0, 0, 0.9)',
			buttonOverColor: '#000000',
			backgroundColor: '#D7D7D7',
			backgroundGradient: 'medium',
			sliderColor: '#FFFFFF',
			
			sliderBorder: '1px solid #808080',
			volumeSliderColor: '#FFFFFF',
			volumeBorder: '1px solid #808080',
			
			timeColor: '#000000',
			durationColor: '#535353'*/
		}
	},
	clip: {
    	autoPlay: false
    }
	
});
			</script>
<?php
	echo form_open('/vote');
	echo form_dropdown('rating',$ratings);
	echo form_hidden('postID', $postID);
	echo form_button($votebutton);
	echo form_close();
?>