<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Add New RTA Office</h2>
    </div>
</div>

<div class="row-fluid">
	<div class="span6">
		<?php echo form_open( base_url() . 'master/rta/validatenewoffice', array('class' => 'form-vertical'));?>
        
        <div class="control-group formSep">
        	<label>Office<span class="f_req">*</span></label>
        	<div class="controls">
            	<input class="input-xlarge" type="text" name="office" /><span class="help-inline error"><?php echo form_error('office'); ?></span>
            </div>
            </div>
            
            <div class="control-group formSep">
            	<label>Address<span class="f_req">*</span></label>
            	<div class="controls">
                	<input class="input-xlarge" type="text" name="address" /><span class="help-inline error"><?php echo form_error('address'); ?></span>
                </div>
            
            </div>
            
            <div class="control-group formSep">
            	<label>Phone<span class="f_req">*</span></label>
            	<div class="controls">
                	<input class="input-xlarge" type="text" name="phone" /><span class="help-inline error"><?php echo form_error('phone'); ?></span>
                </div>
            </div>
            
            <div class="control-group formSep">
            	<label>Contact Person</label>
            	<div class="controls">
                	<input class="input-xlarge" type="text" name="contactperson" /><span class="help-inline error"><?php echo form_error('contactperson'); ?></span>
                </div>
            
            </div>
            

            
		<div class="control-group">
        	<input class="btn btn-gebo span3" type="submit" value="Save"/> <a class="ext_disabled btn" href="<?php echo base_url("master/rta"); ?>">Cancel</a>
		</div>
            
            
            
        <?php echo form_close();?>
    </div>
	
</div>