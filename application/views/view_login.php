<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Velky</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;	
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	ul
	{
	list-style-type: none;
	padding: 5px;
	margin: 0px;
	}
	ul li
	{
	background-repeat: no-repeat;
	background-position: 0px 5px; 
	padding-left: 14px; 
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to Our Site</h1>
<div id=login_form>

<?php echo form_open(base_url().'login/validate_login' )?>
<ul>
	<li>
		<label>Email</label>
		<div>
		<?php echo form_input(array('id' => 'email', 'name' => 'email'))?> 
		</div>
	</li>
	<li>
		<label>Password</label>
		<div>
		<?php echo form_password(array('id' => 'password', 'name' => 'password'))?> 
		</div>
	</li>
	<li>
	<?php if($this->session->flashdata('message')) : ?>
    <p><?=$this->session->flashdata('message')?></p>
	<?php endif; ?>
		<?php echo validation_errors(); ?>
	</li>
	
	<li><?php echo form_submit(array('name'=> 'submit'), 'LOGIN')?></li>
	
</ul>
<?php echo form_close(); ?>
</div>
	
</div>

</body>
</html>