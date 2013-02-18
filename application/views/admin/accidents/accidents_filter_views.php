<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Reports</h2>
    </div>
	<div class="span12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Filter by date</a></li>
                <li><a data-toggle="tab" href="#tab2">Filter by month</a></li>
                <li><a data-toggle="tab" href="#tab3">Filter by barangay</a></li>
            </ul>
            <div class="tab-content">
                <div id="tab1" class="tab-pane active">
                
                	<div class="span12">

                        <div class="controls">
                        	<div class="span3">
                        <label>From: </label><input type="text" data-date-format="yyyy-mm-dd" readonly="readonly" name="acdntdatefrom" class="input-xlarge" id="dp1"><span class="accdatesInfo"></span>
                        	</div>
                            
                            <div class="span3">
                        <label>To: </label><input type="text" data-date-format="yyyy-mm-dd" readonly="readonly" name="acdntdateto" class="input-xlarge" id="dp2"><span class="accdatesInfo"></span>
                        	</div>
                            
                            <div class="span3">
								<label>&nbsp;</label><button class="btn velkyreportfilter velkybydate" type="submit">Go</button>
                            </div>
                            
                        </div>

                   	</div>
                    
                    <div class="span8"><!-- AJAX HERE -->
                    
                    </div>
                                  
                </div>
                
                
                <div id="tab2" class="tab-pane">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et tellus felis, sit amet interdum tellus. Suspendisse sit amet scelerisque dui. Vivamus faucibus magna quis augue venenatis ullamcorper. Proin eget mauris eget orci lobortis luctus ac a sem. Curabitur feugiat, eros consectetur egestas iaculis,
                    </p>
                </div>
                <div id="tab3" class="tab-pane">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et tellus felis, sit amet interdum tellus. Suspendisse sit amet scelerisque dui. Vivamus faucibus magna quis augue venenatis ullamcorper. Proin eget mauris eget orci lobortis luctus ac a sem. Curabitur feugiat, eros consectetur egestas iaculis,
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et tellus felis, sit amet interdum tellus. Suspendisse sit amet scelerisque dui. Vivamus faucibus magna quis augue venenatis ullamcorper. Proin eget mauris eget orci lobortis luctus ac a sem. Curabitur feugiat, eros consectetur egestas iaculis,
                    </p>
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