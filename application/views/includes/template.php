<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="url" content="<?php echo base_url();?>" />
    <title><?php echo (isset($title)) ? $title : ''; ?></title>
    <?php getHeader(); ?>
</head>
    
<body>
	<div id="loading_layer" style="display:none"><img src="<?php echo base_url('theme/img/ajax_loader.gif'); ?>" alt="" /></div>
    <div id="maincontainer">
        <div class="navbar navbar-fixed-top">
        	<!--//top fixed navigation bar-->            
            <?php $this->load->view('includes/navigation'); ?>
        </div>
        
        <div id="contentwrapper">
            <div class="main_content">
            	<?php $this->load->view($main_content); ?>
            </div>
        </div>
    	
        <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
        <div class="sidebar">
	        <!--//sidebar content-->
            <?php getSideBar(); ?>
        </div>
        
    	<!--//js scripts-->
        <script src="<?php echo base_url('theme/js/jquery.min.js'); ?>"></script>
			<!-- smart resize event -->
			<script src="<?php echo base_url('theme/js/jquery.debouncedresize.min.js'); ?>"></script>
			<!-- hidden elements width/height -->
			<script src="<?php echo base_url('theme/js/jquery.actual.min.js'); ?>"></script>
			<!-- js cookie plugin -->
			<script src="<?php echo base_url('theme/js/jquery_cookie.min.js'); ?>"></script>
			<!-- main bootstrap js -->
			<script src="<?php echo base_url('theme/bootstrap/js/bootstrap.min.js'); ?>"></script>
			<!-- tooltips -->
			<script src="<?php echo base_url('theme/lib/qtip2/jquery.qtip.min.js'); ?>"></script>
			<!-- jBreadcrumbs -->
			<script src="<?php echo base_url('theme/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js'); ?>"></script>
			<!-- sticky messages -->
            <script src="<?php echo base_url('theme/lib/sticky/sticky.min.js'); ?>"></script>
			<!-- fix for ios orientation change -->
			<script src="<?php echo base_url('theme/js/ios-orientationchange-fix.js'); ?>"></script>
			<!-- scrollbar -->
			<script src="<?php echo base_url('theme/lib/antiscroll/antiscroll.js'); ?>"></script>
			<script src="<?php echo base_url('theme/lib/antiscroll/jquery-mousewheel.js'); ?>"></script>
			<!-- lightbox -->
            <script src="<?php echo base_url('theme/lib/colorbox/jquery.colorbox.min.js'); ?>"></script>
			<!-- mobile nav -->
			<script src="<?php echo base_url('theme/js/selectNav.js'); ?>"></script>
            <!-- common functions -->
			<script src="<?php echo base_url('theme/js/gebo_common.js'); ?>"></script>
            
			<!-- smoke_js -->
			<script src="<?php echo base_url('theme/lib/smoke/smoke.js'); ?>"></script>
            <!-- notifications functions -->
            <script src="<?php echo base_url('theme/js/gebo_notifications.js'); ?>"></script>
    
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
    </div>

</body>
</html>