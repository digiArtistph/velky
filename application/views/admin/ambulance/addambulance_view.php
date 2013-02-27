<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Add New Ambulance</h2>
    </div>
</div>

<div class="row-fluid">
	<div class="span6">
    	
        <?php echo form_open( base_url() . 'master/ambulances/validatenewambulance', array('class' => 'form-vertical'));?>
        
        <div class="control-group formSep"><label class="control-label">Hospital<span class="f_req">*</span></label>
        	<div class="controls">
            <select class="select" name="h_id">
            	<option selected="selected" value="">Select a hospital...</option>
			<?php foreach ($types as $type):?>
			<option value="<?php echo $type->h_id;?>"><?php echo $type->name;?></option>
			<?php endforeach;?>
			</select>
            <span class="help-inline error"><?php echo form_error('h_id'); ?></span>
            </div>
        </div>
        
        <div class="control-group formSep">
          <label class="control-label">Plate No.<span class="f_req">*</span></label>
        	<div class="controls">
            <input type="text" name="plateno" class="input-xlarge" value="<?php echo set_value('plateno');?>" /><span class="help-inline error"><?php echo form_error('plateno'); ?></span>
            </div>
        </div>
        
        
        <div class="control-growup formSep">
          <label class="control-label">Capacity<span class="f_req">*</span></label>
        	<div class="controls">
            <input type="text" name="capacity" class="input-xlarge" value="<?php echo set_value('capacity');?>"/><span class="help-inline error"><?php echo form_error('capacity'); ?></span>
            </div>
        </div>
        
        <div class="control-group">
        <input type="submit" value="Save" class="btn btn-gebo span3"/> <a class="ext_disabled btn" href="<?php echo base_url('master/ambulances');?>" >Cancel</a>
        </div>
        <?php echo form_close();?>
    </div>
</div>
	