<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Edit Accident Type</h2>
        <!--<a class="ext_disabled btn" href="<?php echo base_url("master/accident_type"); ?>">Cancel Edit Accident Type</a>-->
    </div>
</div>

<div class="row-fluid">
	<div class="span12">
    	 <?php echo form_open("master/accident_type/validateeditaccidenttype", array('class' => 'form-vertical')); ?>
         
         <div class="control-group formSep">
			<?php if($accidenttype) : ?>
                <?php foreach($accidenttype as $atype): ?>
                <input type="hidden" name="at_id" value="<?php echo $at_id; ?>" />
                
                	<label class="control-label">Name<span class="f_req">*</span></label>
                    <div class="controls">
                    	<input type="text" name="name" value="<?php echo $atype->name; ?>" class="input-xlarge"/><span class="help-inline error"><?php echo form_error('name'); ?></span>
				</div>
                <?php endforeach; ?>
            <?php endif; ?>
            
       
    	</div><div class="control-group"><input class="btn btn-gebo span2" type="submit" value="Save" /> <a class="ext_disabled btn" href="<?php echo base_url("master/accident_type"); ?>">Cancel</a></div> <?php echo form_close(); ?>
    </div>
</div>
   
