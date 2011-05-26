<div class="content">
<div class="main">
<?php 
	if($success!=''){
		echo'<div class="success">'.$success.'</div>';
	} else {
		foreach($error as $errormsg){
			echo '<div class="error">'.$errormsg.'</div>';
		}
	}
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#savesettings').submit(function(event){
		$('#submitted').val(1);
	});
});
</script>
<?php echo form_open('/user/settings', array('id'=>'savesettings')); ?>
<fieldset>
	<legend>Change Password</legend>
	<div>
		<label for="password">New Password</label>
		<input id="password" name="password" type="password" class="field password" />
	</div>
	<div>
		<label for="confirmpassword">Confirm  New Password</label>
		<input id="confirmpassword" name="confirmpassword" type="password" class="field password" />
	</div>
</fieldset>
<fieldset>
	<legend>User Info</legend>
	<div>
		<label for="email">Email Address</label>
		<input id="email" name="email" type="text" class="email field" value="<?php echo $user->email; ?>" />
	</div>
	<div>
		<label for="firstname">First Name</label>
		<input id="firstname" name="firstname" type="text" class="field" value="<?php echo $user->firstname; ?>" />
	</div>
	<div>
		<label for="lastname">Last Name</label>
		<input id="lastname" name="lastname" type="text" class="field" value="<?php echo $user->lastname; ?>" />
	</div>
</fieldset>
<input type="hidden" id="submitted" name="submitted" value="0">

<button type="submit" id="save">Save</button>
</form>
</div>
