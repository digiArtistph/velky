<div class="antiScroll">
    <div class="antiscroll-inner">
        <div class="antiscroll-content">
					
							<div class="sidebar_inner">
								<form action="#" class="input-append" method="post" >
									<!--<input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>-->
								</form>
								<div id="side_accordion" class="accordion">
									
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-folder-close"></i> Content
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseOne">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Articles</a></li>
													<li><a href="javascript:void(0)">News</a></li>
													<li><a href="javascript:void(0)">Newsletters</a></li>
													<li><a href="javascript:void(0)">Comments</a></li>
												</ul>
											</div>
										</div>
									</div>
                                    <div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-fire"></i> Modules
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseTwo">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Dashboard</a></li>
													<li><a href="javascript:void(0)">Accident Report</a></li>													
												</ul>
											</div>
										</div>
									</div>
                                    
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-signal"></i> Reports
											</a>
										</div>
										<div class="accordion-body <?php echo toggleButton('reports', TRUE); ?> collapse" id="collapseThree">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li <?php echo toggleButton('reports/accidents'); ?>><a class="ext_disabled" href="<?php echo base_url('reports/accidents'); ?>">Accidents</a></li>
													<li <?php echo toggleButton('reports/hospitalsambulances'); ?>><a class="ext_disabled" href="<?php echo base_url('reports/hospitalsambulances'); ?>">Hospitals and Ambulances</a></li>
													<li <?php echo toggleButton('reports/nearestrespondents'); ?>><a class="ext_disabled" href="<?php echo base_url('reports/nearestrespondents'); ?>">Nearest Respondents</a></li>
													
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-cog"></i> Configuration
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseFour">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li class="nav-header">System</li>
													<li><a class="ext_disabled" href="javascript:void(0)">Settings</a></li>
                                                    <li class="nav-header">Tasks</li>
													<li><a class="ext_disabled" href="javascript:void(0)">Cron</a></li>                                                    
													<li class="divider"></li>
													<li><a class="ext_disabled" href="javascript:void(0)">Help</a></li>
												</ul>
												
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseFive" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-th-list"></i> Utility
											</a>
										</div>
										<div class="accordion-body <?php echo toggleButton('master', TRUE); ?> collapse" id="collapseFive">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li class="nav-header">Master Files</li>
													<li <?php echo toggleButton('master/hospitals'); ?>><a class="ext_disabled" href="<?php echo base_url('master/hospitals'); ?>">Hospitals</a></li>                                                    													
                                                    <li <?php echo toggleButton('master/police'); ?>><a class="ext_disabled" href="<?php echo base_url('master/police'); ?>">Police</a></li>
                                                    <li <?php echo toggleButton('master/rta'); ?>><a class="ext_disabled" href="<?php echo base_url('master/rta'); ?>">RTA</a></li>
                                                    <li <?php echo toggleButton('master/barangay'); ?>><a class="ext_disabled" href="<?php echo base_url('master/barangay'); ?>">Barangay</a></li>
                                                    <li <?php echo toggleButton('master/accident_type'); ?>><a class="ext_disabled" href="<?php echo base_url('master/accident_type'); ?>">Accident Type</a></li>
                                                    <li <?php echo toggleButton('master/users'); ?>><a class="ext_disabled" href="<?php echo base_url('master/users'); ?>">Users</a></li>                                                    
												</ul>
											</div>
										</div>
									</div>
									
									
								</div>
								
								<div class="push"></div>
							</div>
							   
							<!--<div class="sidebar_info">
								<ul class="unstyled">
									<li>
										<span class="act act-warning">65</span>
										<strong>New comments</strong>
									</li>
									<li>
										<span class="act act-success">10</span>
										<strong>New articles</strong>
									</li>
									<li>
										<span class="act act-danger">85</span>
										<strong>New registrations</strong>
									</li>
								</ul>
							</div>--> 
						
						</div>
    </div>
</div>