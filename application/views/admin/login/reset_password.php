<div id="reset_pass">
	<h3>Reset Password</h3>

	<?php echo form_open(base_url(). 'admin/password_recovery/validate_reset_password' );?>
	<p><label>Email:</label><input type="text" name="email"/></p>
	<p><label>Confirm Email:</label><input type="text" name="email_conf"/></p>
	<p><input type="submit" value="send"></p>
	<?php echo form_close();?>
</div> 