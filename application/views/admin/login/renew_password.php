<div id="renew_pass">
	<h3>Renew Password</h3>

	<?php echo form_open(base_url(). 'admin/loginad/renew_password' ); // echo form_open(base_url(). 'login/validate_renew_password' );?>
	<p><label>Email:</label><input type="text" name="email"/></p>
	<p><label>Password:</label><input type="password" name="pass"/></p>
	<p><label>Password Confirmation:</label><input type="password" name="pass_conf"/></p>
	<p><input type="submit" value="Renew"></p>
	<?php echo form_close();?>
</div> 