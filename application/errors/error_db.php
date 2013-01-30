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
			<h1><?php echo $heading; ?></h1>
			<p><?php echo $message; ?></p>
			<a href="javascript:history.back()" class="back_link btn btn-small">Go back</a>
            <h1></h1>
		
		</div>
	</body>
</html>