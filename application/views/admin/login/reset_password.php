<div id="reset_pass">
	<h3>Reset Password</h3>

	<?php echo form_open(base_url(). 'admin/password_recovery/validate_reset_password' );?>
	<p><label>Email:</label><input type="text" name="email"/><span><?php echo form_error('email'); ?></span></p>
	<p><label>Confirm Email:</label><input type="text" name="email_conf"/><span><?php echo form_error('email_conf'); ?></span></p>
	<p><input type="submit" value="send"></p>
	<?php echo form_close();?>
</div> 