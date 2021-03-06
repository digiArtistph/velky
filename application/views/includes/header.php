<?php if($section == 'home' || $section == "master" || $section == 'reports'): ?>
    <!-- Bootstrap framework -->
        <link rel="stylesheet" href="<?php echo base_url('theme/bootstrap/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('theme/bootstrap/css/bootstrap-responsive.min.css'); ?>" />
    <!-- gebo blue theme-->
        <link rel="stylesheet" href="<?php echo base_url('theme/css/blue.css'); ?>" id="link_theme" />
    <!-- breadcrumbs-->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/jBreadcrumbs/css/BreadCrumb.css'); ?>" />
    <!-- tooltips-->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/qtip2/jquery.qtip.min.css'); ?>" />
    <!-- notifications -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/sticky/sticky.css'); ?>" />    
    <!-- splashy icons -->
        <link rel="stylesheet" href="<?php echo base_url('theme/img/splashy/splashy.css'); ?>" />
    <!-- enhanced select -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/chosen/chosen.css'); ?>" />
    <!-- colorbox -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/colorbox/colorbox.css'); ?>" />
    
    <!-- datepicker -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/datepicker/datepicker.css'); ?>" />
            
    <!-- main styles -->
        <link rel="stylesheet" href="<?php echo base_url('theme/css/style.css'); ?>" />
        
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
    
    <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('theme/img/favicon.ico'); ?>" />
    
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo base_url('theme/css/ie.css'); ?>" />
        <script src="<?php echo base_url('theme/js/ie/html5.js'); ?>"></script>
        <script src="<?php echo base_url('theme/js/ie/respond.min.js'); ?>"></script>
    <![endif]-->

    
    <script>
        //* hide all elements & show preloader
        document.documentElement.className += 'js';
    </script>

<?php elseif($section == "admin"): ?>

	<!-- Bootstrap framework -->
    <link rel="stylesheet" href="<?php echo base_url('theme/bootstrap/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('theme/bootstrap/css/bootstrap-responsive.min.css'); ?>" />
    <!-- theme color-->
    <link rel="stylesheet" href="<?php echo base_url('theme/css/blue.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('theme/css/brown.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('theme/css/dark.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('theme/css/green.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('theme/css/eastern_blue.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('theme/css/tamarillo.css'); ?>" />
    <!-- tooltip -->    
    <link rel="stylesheet" href="<?php echo base_url('theme/lib/qtip2/jquery.qtip.min.css'); ?>" />
    <!-- main styles -->
    <link rel="stylesheet" href="<?php echo base_url('theme/css/style.css'); ?>" />
    <!-- splashy icons -->
	<link rel="stylesheet" href="<?php echo base_url('theme/img/splashy/splashy.css'); ?>" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('theme/img/favicon.ico'); ?>" />
    
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
    <!--[if lte IE 8]>
    <script src="<?php echo base_url('theme/js/ie/html5.js'); ?>"></script>
    <script src="<?php echo base_url('theme/js/ie/respond.min.js'); ?>"></script>
    <![endif]-->
    
<?php elseif($section == "accident"): ?>

    <!-- Bootstrap framework -->
    <link rel="stylesheet" href="<?php echo base_url('theme/bootstrap/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('theme/bootstrap/css/bootstrap-responsive.min.css'); ?>" />
    <!-- jQuery UI theme-->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/jquery-ui/css/Aristo/Aristo.css'); ?>" />
    <!-- gebo blue theme-->
        <link rel="stylesheet" href="<?php echo base_url('theme/css/blue.css'); ?>" id="link_theme" />
    <!-- breadcrumbs-->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/jBreadcrumbs/css/BreadCrumb.css'); ?>" />
    <!-- tooltips-->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/qtip2/jquery.qtip.min.css'); ?>" />
    <!-- notifications -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/sticky/sticky.css'); ?>" />
    <!-- code prettify -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/google-code-prettify/prettify.css'); ?>" />    
    <!-- notifications -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/sticky/sticky.css'); ?>" />
    <!-- splashy icons -->
        <link rel="stylesheet" href="<?php echo base_url('theme/img/splashy/splashy.css'); ?>" />
    <!-- datepicker -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/datepicker/datepicker.css'); ?>" />
    <!-- tag handler -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/tag_handler/css/jquery.taghandler.css'); ?>" />
    <!-- nice form elements -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/uniform/Aristo/uniform.aristo.css'); ?>" />
    <!-- multiselect -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/multi-select/css/multi-select.css'); ?>" />
    <!-- enhanced select -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/chosen/chosen.css'); ?>" />
    <!-- upload -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/plupload/js/jquery.plupload.queue/css/plupload-gebo.css'); ?>" />
    <!-- colorbox -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/colorbox/colorbox.css'); ?>" />
    <!-- colorpicker -->
        <link rel="stylesheet" href="<?php echo base_url('theme/lib/colorpicker/css/colorpicker.css'); ?>" />	
        
    <!-- main styles -->
        <link rel="stylesheet" href="<?php echo base_url('theme/css/style.css'); ?>" />
        
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />

    <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('theme/img/favicon.ico'); ?>" />
    
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo base_url('theme/css/ie.css'); ?>" />
        <script src="<?php echo base_url('theme/js/ie/html5.js'); ?>"></script>
        <script src="<?php echo base_url('theme/js/ie/respond.min.js'); ?>"></script>
    <![endif]-->
    
    <script>
        //* hide all elements & show preloader
        document.documentElement.className += 'js';
    </script>

<?php endif; ?>
