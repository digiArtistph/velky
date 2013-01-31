<div class="sidebar">
				
				<div class="antiScroll">
					<div class="antiscroll-inner">
						<div class="antiscroll-content">
					
							<div class="sidebar_inner">
								<form action="#" class="input-append" method="post" >
									<!--<input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>-->
								</form>
								<div class="accordion" id="side_accordion">
									
									<div class="accordion-group">
										<div class="accordion-heading">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#side_accordion" href="#collapseOne">
												<i class="icon-folder-close"></i> Content
											</a>
										</div>
										<div id="collapseOne" class="accordion-body collapse">
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
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#side_accordion" href="#collapseTwo">
												<i class="icon-fire"></i> Modules
											</a>
										</div>
										<div id="collapseTwo" class="accordion-body  <?php echo toggleButton('admin', TRUE); ?>  collapse">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Dashboard</a></li>
													<li <?php echo toggleButton('accident/accident'); ?>><a class="ext_disabled" href="<?php echo base_url('accident/accident'); ?>">Accident Report</a></li>													
												</ul>
											</div>
										</div>
									</div>
                                    
									<div class="accordion-group">
										<div class="accordion-heading">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#side_accordion" href="#collapseThree">
												<i class="icon-signal"></i> Reports
											</a>
										</div>
										<div id="collapseThree" class="accordion-body  collapse">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="http://localhost/velky/reports/accidents" class="ext_disabled">Accidents</a></li>
													<li><a href="http://localhost/velky/reports/hospitalsambulances" class="ext_disabled">Hospitals and Ambulances</a></li>
													<li><a href="http://localhost/velky/reports/nearestrespondents" class="ext_disabled">Nearest Respondents</a></li>
													
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#side_accordion" href="#collapseFour">
												<i class="icon-cog"></i> Configuration
											</a>
										</div>
										<div id="collapseFour" class="accordion-body  <?php echo toggleButton('system', TRUE); ?>  collapse">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li class="nav-header">System</li>
													<li><a href="javascript:void(0)" class="ext_disabled">Settings</a></li>
                                                    <li class="nav-header">Tasks</li>
													<li><a href="javascript:void(0)" class="ext_disabled">Cron</a></li>                                                    
													<li class="divider"></li>
													<li><a href="javascript:void(0)" class="ext_disabled">Help</a></li>
												</ul>
												
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading sdb_h_active">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#side_accordion" href="#collapseFive">
												<i class="icon-th-list"></i> Utility
											</a>
										</div>
										<div id="collapseFive" class="accordion-body <?php echo toggleButton('master', TRUE); ?> collapse">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li class="nav-header">Master Files</li>
													<li <?php echo toggleButton('master/hospitals'); ?>><a href="<?php echo base_url('master/hospitals'); ?>" class="ext_disabled">Hospitals</a></li>                                                    													
                                                    <li <?php echo toggleButton('master/police'); ?>><a href="<?php echo base_url('master/police'); ?>" class="ext_disabled">Police</a></li>
                                                    <li <?php echo toggleButton('master/rta'); ?>><a href="<?php echo base_url('master/rta'); ?>" class="ext_disabled">RTA</a></li>
                                                    <li <?php echo toggleButton('master/barangay'); ?>><a href="<?php echo base_url('master/barangay'); ?>" class="ext_disabled">Barangay</a></li>
                                                    <li <?php echo toggleButton('master/accident_type'); ?>><a href="<?php echo base_url('master/accident_type'); ?>" class="ext_disabled">Accident Type</a></li>
                                                    <li <?php echo toggleButton('master/users'); ?>><a href="<?php echo base_url('master/users'); ?>" class="ext_disabled">Users</a></li>                                                    
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
											   <i class="icon-th"></i> Calculator
											</a>
										</div>
										<div class="accordion-body collapse" id="collapse7">
											<div class="accordion-inner">
												<form name="Calc" id="calc">
													<div class="formSep control-group input-append">
														<input type="text" style="width:130px" name="Input" /><button type="button" class="btn" name="clear" value="c" onclick="Calc.Input.value = ''"><i class="icon-remove"></i></button>
													</div>
													<div class="control-group">
														<input type="button" class="btn btn-large" name="seven" value="7" onclick="Calc.Input.value += '7'" />
														<input type="button" class="btn btn-large" name="eight" value="8" onclick="Calc.Input.value += '8'" />
														<input type="button" class="btn btn-large" name="nine" value="9" onclick="Calc.Input.value += '9'" />
														<input type="button" class="btn btn-large" name="div" value="/" onclick="Calc.Input.value += ' / '">
													</div>
													<div class="control-group">
														<input type="button" class="btn btn-large" name="four" value="4" onclick="Calc.Input.value += '4'" />
														<input type="button" class="btn btn-large" name="five" value="5" onclick="Calc.Input.value += '5'" />
														<input type="button" class="btn btn-large" name="six" value="6" onclick="Calc.Input.value += '6'" />
														<input type="button" class="btn btn-large" name="times" value="x" onclick="Calc.Input.value += ' * '" />
													</div>
													<div class="control-group">
														<input type="button" class="btn btn-large" name="one" value="1" onclick="Calc.Input.value += '1'" />
														<input type="button" class="btn btn-large" name="two" value="2" onclick="Calc.Input.value += '2'" />
														<input type="button" class="btn btn-large" name="three" value="3" onclick="Calc.Input.value += '3'" />
														<input type="button" class="btn btn-large" name="minus" value="-" onclick="Calc.Input.value += ' - '" />
													</div>
													<div class="formSep control-group">
														<input type="button" class="btn btn-large" name="dot" value="." onclick="Calc.Input.value += '.'" />
														<input type="button" class="btn btn-large" name="zero" value="0" onclick="Calc.Input.value += '0'" />
														<input type="button" class="btn btn-large" name="DoIt" value="=" onclick="Calc.Input.value = Math.round( eval(Calc.Input.value) * 1000)/1000" />
														<input type="button" class="btn btn-large" name="plus" value="+" onclick="Calc.Input.value += ' + '" />
													</div>
													Contributed by <a href="http://themeforest.net/user/maumao">maumao</a>
												</form>
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
			
			</div>