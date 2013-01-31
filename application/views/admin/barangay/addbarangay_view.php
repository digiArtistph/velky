<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Add Barangay</h2>
        <!--<a class="ext_disabled btn" href="<?php echo base_url("master/barangay"); ?>">Cancel New Barangay</a>-->
    </div>
</div>

<div class="row-fluid">
	<div class="span8">
	<?php echo form_open( base_url() . 'master/barangay/validatenewbarangay', array('class' => 'form-vertical'));?>
		<div class="control-group formSep">
        	<label class="control-label">Name of Barangay<span class="f_req">*</span></label>
            <div class="controls">
            	<input type="text" name="name" value="<?php echo set_value('name');?>" class="input-xlarge"/><span class="help-inline error"><?php echo form_error('name'); ?></span>
            </div>
        </div>

		<div class="control-group">
        	<input type="submit" value="Save" class="btn btn-gebo span2"/> <a class="ext_disabled btn" href="<?php echo base_url("master/barangay"); ?>">Cancel</a>
        </div>
		
	<?php echo form_close();?>
    </div>
</div>