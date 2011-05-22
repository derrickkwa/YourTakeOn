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
	
	echo form_open('/vote');
	echo form_dropdown('rating',$ratings);
	echo form_hidden('postID', $postID);
	echo form_button($votebutton);
	echo form_close();
?>