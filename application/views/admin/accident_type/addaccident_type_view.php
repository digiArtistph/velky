<div class="row-fluid">
    	<div class="span12">
        	<h2 class="heading">Add New Accident Type</h2>
			<!--<a class="ext_disabled btn" href="<?php echo base_url("master/accident_type"); ?>">Cancel New Accident Type</a>-->
        </div>
</div>

<div class="row-fluid">
	<div class="span12">
    
        <div class="row-fluild">
            <div class="span12">
            	<?php echo form_open("master/accident_type/validateaddaccidenttype", array('class' => 'form-vertical')); ?>
                
                <div class="control-group formSep">
                 	<label for="u_name" class="control-label">Name<span class="f_req">*</span></label>
                    <div class="controls">
                    	<input id="u_name"  type="text" name="name" value="<?php echo set_value('name'); ?>" class="input-xlarge"/><span class="help-inline error"><?php echo form_error('name'); ?></span>
                    </div>                  
            </div>
            	
            <div class="control-group">
            	<input class="btn btn-gebo span2" type="submit" value="Save" /> <a class="ext_disabled btn" href="<?php echo base_url("master/accident_type"); ?>">Cancel</a>
            </div>
            
    <?php echo form_close(); ?>
            </div>
        </div>
        
    </div>
</div>
