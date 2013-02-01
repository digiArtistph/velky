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
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('js/utility.js'); ?>"></script>
    
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
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('theme/img/favicon.ico'); ?>" />
    
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
    <!--[if lte IE 8]>
    <script src="<?php echo base_url('theme/js/ie/html5.js'); ?>"></script>
    <script src="<?php echo base_url('theme/js/ie/respond.min.js'); ?>"></script>
    <![endif]-->
<?php endif; ?>
