<div>
	<h3>Add Barangay</h3>
	<?php echo form_open( base_url() . 'master/barangay/validatenewbarangay' );?>
		<p><label class="label">Name: </label><input type="text" name="name" value="<?php echo set_value('name');?>" class="textbox"/><span><?php echo form_error('name'); ?></span></p>
		<p><input type="submit" value="Submit barangay" class="button"/>
		<input type="reset" value="Reset" class="button"/></p>
	<?php echo form_close();?>
</div>