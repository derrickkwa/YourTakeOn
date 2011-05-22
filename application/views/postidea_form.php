<?php
    $titleinput = array(
		'name' 	=> 'title',
		'id'       	=> 'title',
		'value'   	=> '',
		'maxlength'	=> '60'
   	);
			
	$blurb = array(
		'name'		=> 'blurb',
		'id'		=> 'blurb',
		'value'		=> '',
		'maxlength'	=> '255'
	);
	
	$postidea = array(
    	'name' => 'post',
    	'id' => 'post',
    	'value' => 'postidea',
    	'type' => 'submit',
    	'content' => 'Post Idea'
	);
	
	echo form_open('/idea/add');
	echo form_fieldset('post new idea');
    echo form_label('title:','title');
    echo form_input($titleinput);
	echo br();
	echo form_label('description:','blurb');
	echo form_input($blurb);
	echo form_fieldset_close();
	
	echo form_button($postidea);
	echo form_close();
?>