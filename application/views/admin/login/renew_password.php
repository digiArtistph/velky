<div id="renew_pass">
	<h3>Renew Password</h3>

	<?php echo form_open(base_url(). 'admin/password_recovery/validate_renew_password' ); // echo form_open(base_url(). 'login/validate_renew_password' );?>
	<p><input type="hidden" name="email" value="<?php echo $email;?>"/></p>
	<p><label>Password:</label><input type="password" name="pass"/><span><?php echo form_error('pass'); ?></span></p>
	<p><label>Password Confirmation:</label><input type="password" name="pass_conf"/><span><?php echo form_error('pass_conf'); ?></span></p>
	<p><input type="submit" value="Renew"></p>
	<?php echo form_close();?>
</div> 