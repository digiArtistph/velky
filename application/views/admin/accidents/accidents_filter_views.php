<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Reports</h2>
    </div>
	<div class="span12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Filtered Report</a></li>
                <li><a data-toggle="tab" href="#tab2">Graph</a></li>
                
            </ul>
            <div class="tab-content">
                <div id="tab1" class="tab-pane active">

                	<div class="row-fluid">
                    	<div class="span2 offset10">                 		
                        	<a class="btn velkyloaddata" data-toggle="modal" data-backdrop="static" href="#filteredReports">Advanced Filters</a>                      
                        </div>
                    </div>
                    
                    <div class="modal hide fade" id="filteredReports">
                    	<div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>Filtered Report</h3>
                        
                    </div>
                    	<div class="modal-body">
							
							<div class="row-span">
                            	<div class="span12">
                                	<label class="label label-inverse">Date Range</label>
                                </div>
                            </div>
                        	<div class="row-fluid">
                            	
                            	<div class="span6">
                                <label class="label">From</label><input id="dp1" class="span12" data-date-format="yyyy-mm-dd" name="datefrom" type="text"  />
                                </div>
                                
                                <div class="span6">
                                	<label class="label">To</label> <input id="dp2" class="span12" name="dateto" data-date-format="yyyy-mm-dd" type="text"  />
                                </div>
                            </div>
                        	<div class="row-fluid">
                            	<div class="span6">
                                	<label class="label label-inverse">Barangay</label><select class="chzn_a span12" name="barangay">
                                   <option value="">Select a barangay...</option>
                                        <?php foreach($barangay as $bry): ?>
                                        <option value="<?php echo $bry->b_id; ?>"><?php echo $bry->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="span6">
                                	<label class="label label-inverse">Accident Type</label><select name="accidenttype" class="chzn_b span12">
                                   		<option value="">Select an accident type...</option>
                                        <?php foreach($accidenttype as $actype): ?>
                                        	<option value="<?php echo $actype->at_id; ?>"><?php echo $actype->name; ?></option>
                                        <?php endforeach; ?>
                                   </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                        <a href="#" class="btn ext_disabled velkyFilteredReport" data-dismiss="modal">Generate Report</a>
                    </div>
                    </div>
                    
                    <div class="row-fluid velkyreportcontainer">
                    
                    </div>
                </div>
                
                
                <div id="tab2" class="tab-pane">
                    <div class="row-fluid">
						<div class="span4">
							<h3 class="heading">Donut chart</h3>
							<div id="fl_a" style="height:220px;width:80%;margin:40px auto 10px"></div>
							<div class="clearfix chart_colors">
								<label class="radio inline"><input type="radio" value="ch_blue" name="ch_color" id="chC_blue" />Blue</label>
								<label class="radio inline"><input type="radio" value="ch_green" name="ch_color" id="chC_green" />Green</label>
								<label class="radio inline"><input type="radio" value="ch_brown" name="ch_color" id="chC_brown" checked="checked" />Brown</label>
							</div>
						</div>
						<div class="span8">
							<h3 class="heading">Multiple axes chart with multihighlight</h3>
							<div id="fl_b" style="height:270px;width:90%;margin:15px auto 0"></div>
						</div>
					</div>
					
					<div class="row-fluid">
						<div class="span6">
							<h3 class="heading">Ordered bars chart</h3>
							<div id="fl_c" style="height:270px;width:90%;margin:15px auto 0"></div>
						</div>
						<div class="span6">
							<h3 class="heading">Combined chart</h3>
							<div id="fl_d" style="height:270px;width:90%;margin:15px auto 0"></div>
						</div>
					</div>
					
					<div class="row-fluid">
						<div class="span12">
							<h3 class="heading">Pyramid chart</h3>
							<div id="fl_e" style="height:480px;width:90%;margin:15px auto 0"></div>
						</div>
					</div>
                </div>
                
            </div>
        </div>
	</div>        
</div>


<!--<div>
	<h3>Reports Views</h3>
	<ul class="menu">
        	<li><a class="ext_disabled" href="<?php echo base_url('reports/accidents/section/dayaccidents'); ?>">View by Day</a></li>
            <li><a class="ext_disabled" href="<?php echo base_url('reports/accidents/section/weekaccidents'); ?>">View by Week</a></li>
            <li><a class="ext_disabled" href="<?php echo base_url('reports/accidents/section/monthaccidents'); ?>">View by Month</a></li>
            <li><a class="ext_disabled" href="<?php echo base_url('reports/accidents/section/yearaccidents'); ?>">View by Year</a></li>
            <li><a class="ext_disabled" href="<?php echo base_url('reports/accidents/section/barangayaccidents'); ?>">View by Barangay</a></li>
    </ul>
	
</div>-->