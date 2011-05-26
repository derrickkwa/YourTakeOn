<?php if(isset($error)){
	echo '<div class="error">'.$error.'</div>';
	}
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
	
	$keep_login = array(
		'name' => 'keep_login',
		'id' => 'keep_login',
		'checked' => '0',
		'type' => 'checkbox',
		'value' => '1'
	);
	
	
	
	echo form_open('/user/login');
	?>
	<fieldset>
	<legend>Login</legend>
	<div>
	<label for="email">Email Address</label>
	<input type="text" id="email" name="email" class="email field required" />
	</div>
	<div>
		<label for="password">Password</label>
		<input type="password" id="password" name="password" class="password field required" />
	</div>
	<div>
	<input type="checkbox" id="keep_login" name="keep_login" value="1" checked="0" style="display: inline;">
	<label for="keep_login" style="display: inline;">Keep me logged in</label>
	</div>
	<?php
	echo form_fieldset_close();
	
	echo form_button($signup);

	echo form_close();
?>