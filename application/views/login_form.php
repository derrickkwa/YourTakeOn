<?php
    $emailinput = array(
		'name' 	=> 'email',
		'id'       	=> 'email',
		'value'   	=> '',
		'maxlength'	=> '255'
   	);
			
	$password = array(
		'name'		=> 'password',
		'id'		=> 'password',
		'value'		=> '',
		'maxlength'	=> '255'
	);
	
	$signup = array(
    	'name' => 'signup',
    	'id' => 'signup',
    	'value' => 'signup',
    	'type' => 'submit',
    	'content' => 'Log In'
	);
	
	
	echo form_open('/user/login');
	echo form_fieldset('login info');
    echo form_label('email address:','email');
    echo form_input($emailinput);
	echo br();
	echo form_label('password:','password');
	echo form_password($password);
	echo form_fieldset_close();
	
	echo form_button($signup);
	echo form_close();
?>