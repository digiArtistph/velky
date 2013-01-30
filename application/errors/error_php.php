<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">



</div>

<?php
	$pattern = '/[\w]+$/';
	$base_url = '';
	$server = $_SERVER['SERVER_NAME'];	
	preg_match($pattern, dirname($_SERVER["SCRIPT_FILENAME"]), $matches);
	$system = $matches[0];
	$base_url .= sprintf("http://%s/%s/", $server, $system);	
?>
<!DOCTYPE html>
<html lang="en" class="error_page">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Error Page - 404</title>
		<!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo $base_url; ?>theme/bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo $base_url; ?>theme/bootstrap/css/bootstrap-responsive.min.css" />
		<!-- main styles -->
            <link rel="stylesheet" href="<?php echo $base_url; ?>theme/css/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Jockey+One" />
            
	</head>
	<body>
		<div class="error_box">			
            <h1>A PHP Error was encountered</h1>
            
            <p>Severity: <?php echo $severity; ?></p>
            <p>Message:  <?php echo $message; ?></p>
            <p>Filename: <?php echo $filepath; ?></p>
            <p>Line Number: <?php echo $line; ?></p>
		</div>
	</body>
</html>