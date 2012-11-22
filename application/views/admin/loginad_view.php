<!DOCTYPE html >
<html>
<head>
<meta charset="utf-08" />
<title>Back-End Interface</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />

</head>
<body>
<?php echo form_open(base_url() . 'admin/loginad/validate', array('class' => 'loginad')); ?>
<fieldset>
<legend>Sign-In</legend>
<?php echo validation_errors('<div class="error">', '</div>'); ?>
	<p><label>Username: </label><input type="text" name="email" /></p>
    <p><label>Password: </label><input type="password" name="pword" /></p>
    <p class="submitbtn"><input type="submit" value="Login" /></p>
	
<?php echo form_close(); ?>
<p class="forgotpword"><a href="#">Forgot Password?</a></p>
</fieldset>
</body>

</html>