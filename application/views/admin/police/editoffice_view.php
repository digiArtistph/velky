<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Add Office</h2>
    </div>	
</div>
	
<div class="row-fluid">
	<div class="span6">

        <?php echo form_open( base_url() . 'master/police/validateupdateoffice', array('class' => 'form-vertical', 'id' => 'velkyUpdatePolice'));?>
        <input type="hidden" name="id" value=<?php echo strencode($office[0]->p_id);?> />
        <div class="control-group formSep"><label>Station<span class="f_req">*</span></label>
        	<div class="controls">
            	<input class="input-xlarge" type="text" name="station" value="<?php echo $office[0]->station;?>" /><span class="help-inline"><?php echo form_error('station'); ?></span>
            </div>
        </div>
        
        
        <div class="control-group formSep">
        	<label>Address: </label>
        	<div class="controls">
            	<input class="input-xlarge" type="text" name="address" value="<?php echo $office[0]->address;?>" /><span><?php echo form_error('address'); ?></span>
            </div>
        </div>
        
        <div class="control-group formSep">
        	<label>Mobile No.: </label>
        	<div class="controls">
            	<input class="input-xlarge" type="text" name="mobile" value="<?php echo $office[0]->mobile;?>" /><span><?php echo form_error('mobile'); ?></span>
            </div>
        </div>
        
        <div class="control-group formSep">
        	<label>Telephone No.: </label>
        	<div class="controls">
            	<input class="textboxC" type="text" name="phone" value="<?php echo $office[0]->phone;?>" /><span><?php echo form_error('phone'); ?></span>
            </div>
        </div>
        
        <div class="control-group formSep">
        	<label>Contact Person: </label>
        	<div class="controls">
            	<input class="textboxD" type="text" name="contactperson" value="<?php echo $office[0]->contactperson;?>" /><span><?php echo form_error('contactperson'); ?></span>
            </div>
        </div>
        
        <div class="control-group">
        	<input class="btn btn-gebo span3" type="submit" value="Save"/> <a class="ext_disabled btn" href="<?php echo base_url() . 'master/police';?>">Cancel</a>
		</div>
        <?php echo form_close();?>
        </div>
</div>