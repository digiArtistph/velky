<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Edit Hospital</h2>
    </div>
</div>

<div class="row-fluid">
	<div class="span6">
    
    <?php echo form_open( base_url('master/hospitals/validateupdatehospital'), array('class' => 'form-vertical'));?>
    <input type="hidden" name="id" value=<?php echo strencode($name[0]->h_id);?> />
    	<div class="control-group formSep"><label class="control-label">Name<span class="f_req">*</span></label>
        	<div class="controls">
            <input type="text" name="name" class="textbox" value="<?php echo $name[0]->name;?>" /><span class="help-inline error"><?php echo form_error('name'); ?></span>
            </div>
        </div>
        
        <div class="control-group formSep"><label class="control-label">Address<span class="f_req">*</span></label>
        	<div class="controls">
            <input type="text" name="address" class="textbox" value="<?php echo $name[0]->address;?>" /><span class="help-inline error"><?php echo form_error('address'); ?></span>
            </div>
        </div>
        
        <div class="control-group formSep"><label class="control-label">Phone<span class="f_req">*</span></label>
        	<div class="controls">
            <input type="text" name="phone" class="textbox" value="<?php echo $name[0]->phone;?>" /><span class="help-inline error"><?php echo form_error('phone'); ?></span>
            </div>
        </div>
    
    <div class="control-group"><input type="submit" value="Save" class="btn btn-gebo span3"/> <a class="ext_disabled btn" href="<?php echo base_url() . 'master/hospitals';?>">Cancel</a></div>
	<?php echo form_close();?>
    
    </div>
</div>