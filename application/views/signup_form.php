<div class="main">
	<?php 
	foreach($error as $errormsg){
		echo '<div class="error">'.$errormsg.'</div>';	
	}
	
	
    echo form_open('/user/signup');
	?>
	<fieldset>
	<legend>Login Info</legend>
	<div>
	<label for="email">Email Address</label>
	<input type="text" id="email" name="email" class="email field required" />
	</div>
	<div>
		<label for="password">Password</label>
		<input type="password" id="password" name="password" class="password field required" />
	</div>
	<div>
		<label for="confirmpassword">Confirm Password</label>
		<input type="password" id="confirmpassword" name="confirmpassword" class="field required" />
	</div>
	
	</fieldset>
	
	<fieldset>
		<legend>User Info</legend>
		<div>
			<label for="firstname">First Name</label>
			<input type="text" id="firstname" name="firstname" class="field required" />
		</div>
		<div>
			<label for="lastname">Last Name</label>
			<input type="text" id="lastname" name="lastname" class="field required" />
		</div>
	</fieldset>
	<button type="submit">Sign Up</button>
	</form>
</div>
