<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="url" content="<?php echo base_url();?>" />
    <title><?php echo (isset($title)) ? $title : ''; ?></title>
    <?php getHeader(); ?>
</head>
    
<body>
    <div class="MainContainer">
    	<div id="userLog">Hello User! <a href="#">Logout</a></div>
    	<div id="left">
        	<?php getSideBar(); ?>
        </div>
        <?php $this->load->view($main_content); ?>
    </div>
	<div id="footer"><?php getFooter(); ?></div>
</body>
</html>