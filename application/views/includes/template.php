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
            <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="dashboard.html"><i class="icon-home icon-white"></i> Gebo Admin</a>
                            <ul class="nav user_menu pull-right">
                                <li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
                                        <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>
                                        <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
                                    </div>
                                </li>
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Johny Smith <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="user_profile.html">My Profile</a></li>
                                    <li><a href="javascrip:void(0)">Another action</a></li>
                                    <li class="divider"></li>
                                    <li><a href="login.html">Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
							<ul class="nav" id="mobile-nav">
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Forms <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="form_elements.html">Form elements</a></li>
										<li><a href="form_extended.html">Extended form elements</a></li>
										<li><a href="form_validation.html">Form Validation</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Components <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="alerts_btns.html">Alerts & Buttons</a></li>
										<li><a href="icons.html">Icons</a></li>
										<li><a href="notifications.html">Notifications</a></li>
										<li><a href="tables.html">Tables</a></li>
										<li><a href="tables_more.html">Tables (more examples)</a></li>
										<li><a href="tabs_accordion.html">Tabs & Accordion</a></li>
										<li><a href="tooltips.html">Tooltips, Popovers</a></li>
										<li><a href="typography.html">Typography</a></li>
										<li><a href="widgets.html">Widget boxes</a></li>
										<li class="dropdown">
											<a href="#">Sub menu <b class="caret-right"></b></a>
											<ul class="dropdown-menu">
												<li><a href="#">Sub menu 1.1</a></li>
												<li><a href="#">Sub menu 1.2</a></li>
												<li><a href="#">Sub menu 1.3</a></li>
												<li>
													<a href="#">Sub menu 1.4 <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="#">Sub menu 1.4.1</a></li>
														<li><a href="#">Sub menu 1.4.2</a></li>
														<li><a href="#">Sub menu 1.4.3</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-wrench icon-white"></i> Plugins <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="charts.html">Charts</a></li>
										<li><a href="calendar.html">Calendar</a></li>
										<li><a href="datatable.html">Datatable</a></li>
										<li><a href="file_manager.html">File Manager</a></li>
										<li><a href="floating_header.html">Floating List Header</a></li>
										<li><a href="google_maps.html">Google Maps</a></li>
										<li><a href="gallery.html">Gallery Grid</a></li>
										<li><a href="wizard.html">Wizard</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-file icon-white"></i> Pages <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="chat.html">Chat</a></li>
										<li><a href="error_404.html">Error 404</a></li>
										<li><a href="invoice.html">Invoice</a></li>
										<li><a href="mailbox.html">Mailbox</a></li>
										<li><a href="search_page.html">Search page</a></li>
										<li><a href="user_profile.html">User profile</a></li>
										<li><a href="user_static.html">User profile (static)</a></li>
									</ul>
								</li>
								<li>
								</li>
								<li>
									<a href="documentation.html"><i class="icon-book icon-white"></i> Help</a>
								</li>
							</ul>
                        </div>
                    </div>
                </div>
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