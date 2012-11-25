<fieldset>

<legend>Sign-In</legend>
	<?php echo form_open(base_url() . 'login_to/validate_login'); ?>
	<?php echo validation_errors('<div class="error">', '</div>'); ?>
		<p><label>Username: </label><input type="text" name="email" /></p>
   		<p><label>Password: </label><input type="password" name="pword" /></p>
   
	 <div class="colleft">
    	<ul>
        	<li><input id="rememberme" type="checkbox" name="rememberme" /> <label for="rememberme">Remember me</label></li>
            <li><p><a href="<?php echo base_url(). 'admin/password_recovery/forgot_password/' . strencode('admin');?>">Forgot Password?</a></p></li>
        </ul>
    </div>
    
    <div class="colright">
    	<input type="submit" value="Login" />
    </div>
<?php echo form_close(); ?>

</fieldset>