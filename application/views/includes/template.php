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
		<div class="style_switcher">
			<div class="sepH_c">
				<p>Colors:</p>
				<div class="clearfix">
					<a href="javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
					<a href="javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
					<a href="javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
					<a href="javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
					<a href="javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
					<a href="javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
				</div>
			</div>
			<div class="sepH_c">
				<p>Backgrounds:</p>
				<div class="clearfix">
					<span class="style_item jQptrn style_active ptrn_def" title=""></span>
					<span class="ssw_ptrn_a style_item jQptrn" title="ptrn_a"></span>
					<span class="ssw_ptrn_b style_item jQptrn" title="ptrn_b"></span>
					<span class="ssw_ptrn_c style_item jQptrn" title="ptrn_c"></span>
					<span class="ssw_ptrn_d style_item jQptrn" title="ptrn_d"></span>
					<span class="ssw_ptrn_e style_item jQptrn" title="ptrn_e"></span>
				</div>
			</div>
			<div class="sepH_c">
				<p>Layout:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fluid" value="" checked /> Fluid</label>
					<label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fixed" value="gebo-fixed" /> Fixed</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Sidebar position:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_left" value="" checked /> Left</label>
					<label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_right" value="sidebar_right" /> Right</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Show top menu on:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_click" value="" checked /> Click</label>
					<label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_hover" value="menu_hover" /> Hover</label>
				</div>
			</div>
			
			<div class="gh_button-group">
				<a href="#" id="showCss" class="btn btn-primary btn-mini">Show CSS</a>
				<a href="#" id="resetDefault" class="btn btn-mini">Reset</a>
			</div>
			<div class="hide">
				<ul id="ssw_styles">
					<li class="small ssw_mbColor sepH_a" style="display:none">body {<span class="ssw_mColor sepH_a" style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor" style="display:none">background-color: #<span></span> </span>}</li>
					<li class="small ssw_lColor sepH_a" style="display:none">a { color: #<span></span> }</li>
				</ul>
			</div>
		</div>
		
		<div id="maincontainer" class="clearfix">
			<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <?php $this->load->view('includes/navigation'); ?>
                </div>
                
            </header>
            
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    <!-- breadcrumbs here -->
                    <?php $this->load->view('includes/breadcrumbs'); ?>
                    
                    <?php $this->load->view($main_content); ?>
                        
                </div>
            </div>
            
			<!-- sidebar -->
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <?php $this->load->view('includes/sidebar'); ?>
			
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
			
			<!-- bootstrap plugins -->
			<script src="<?php echo base_url('theme/js/bootstrap.plugins.min.js'); ?>"></script>
			<!-- autosize textareas -->
			<script src="<?php echo base_url('theme/js/forms/jquery.autosize.min.js'); ?>"></script>
			<!-- enhanced select -->
			<script src="<?php echo base_url('theme/lib/chosen/chosen.jquery.min.js'); ?>"></script>
			<!-- user profile functions -->
			<script src="<?php echo base_url('theme/js/gebo_user_profile.js'); ?>"></script> 
			
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
		
		</div>
</body>
</html>