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
	
	$confirmpassword = array(
		'name'		=> 'confirmpassword',
		'id'		=> 'confirmpassword',
		'value'		=> '',
		'maxlength'	=> '255'
	);
	
	$firstname = array(
		'name'		=> 'firstname',
		'id'		=> 'firstname',
		'value'		=> '',
		'maxlength'	=> '30'
	);
	
	$lastname = array(
		'name'		=> 'lastname',
		'id'		=> 'lastname',
		'value'		=> '',
		'maxlength'	=> '30'
	);
	
	$signup = array(
    	'name' => 'signup',
    	'id' => 'signup',
    	'value' => 'signup',
    	'type' => 'submit',
    	'content' => 'Sign Up'
	);
	
    echo form_open('/user/signup');
	echo form_fieldset('login info');
    echo form_label('email address:','email');
    echo form_input($emailinput);
	echo br();
	echo form_label('password:','password');
	echo form_password($password);
	echo br();
	echo form_label('confirm password:','confirmpassword');
	echo form_password($confirmpassword);
	echo form_fieldset_close();

	echo form_fieldset('user info');
	echo form_label('first name:', 'firstname');
	echo form_input($firstname);
	echo br();
	echo form_label('last name:','lastname');
	echo form_input($lastname);
	echo form_fieldset_close();
	
	echo form_button($signup);
	echo form_close();
?>