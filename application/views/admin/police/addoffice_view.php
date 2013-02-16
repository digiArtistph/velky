<div class="row-fluid">
	<div class="span12">
		<h2 class="heading">Add New Police Office</h2>
    </div>

</div>

<div class="row-fluid">
	<div class="span6">

		<?php echo form_open( base_url() . 'master/police/validatenewoffice', array('class' => 'form-vertical', 'id' => 'velkyAddPolice'));?>
            	<div class="control-group formSep">
                	<label>Station<span class="f_req">*</span></label>
                	<div class="controls">
                    	<input class="input-xlarge" type="text" name="station" /><span class="help-inline error velkyStationValidation"><?php echo form_error('station'); ?></span>
                    </div>
                </div>
            
            	<div class="control-group formSep">
            		<label>Address<span class="f_req">*</span></label>
                    <div class="controls">
                    	<input class="input-xlarge" type="text" name="address" /><span class="help-inline error"><?php echo form_error('address'); ?></span>
                        </div>
                   </div>
                 <div class="control-group formSep">
            		<label>Mobile No. ex(092532122342 or 092532122342,092532122342)<span class="f_req">*</span></label>
                    <div class="controls">
                    	<input class="input-xlarge" type="text" name="mobile" /><span class="help-inline error velkyMobileNumValidation"><?php echo form_error('mobile'); ?></span>
                        </div>
                   </div>
                   
            	<div class="control-group formSep">
            	<label>Telephone No.<span class="f_req">*</span></label>
                <div class="controls">
                	<input class="input-xlarge" type="text" name="phone" /><span class="help-inline error"><?php echo form_error('phone'); ?></span>
                    </div>
               </div>
               
            	<div class="control-group formSep">
            <label>Contact Person</label>
            <div class="controls">
            	<input class="input-xlarge" type="text" name="contactperson" /><span class="help-inline error"><?php echo form_error('contactperson'); ?></span></div>
            </div>
            
            <div class="control-group"><input class="btn btn-gebo span3" type="submit" value="Save"/> <a class="ext_disabled btn" href="<?php echo base_url("master/police"); ?>">Cancel</a></div>
            </div>
        <?php echo form_close();?>
        </div>
    </div>
