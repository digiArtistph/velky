<div>
	<h3>Add Barangay</h3>
	<?php echo form_open( base_url() . 'master/barangay/validatenewbarangay' );?>
		<p><label>Name: </label><input type="text" name="name" /><span><?php echo form_error('name'); ?></span></p>
		<p><input type="submit" value="Submit barangay"/>
		<input type="reset" value="Reset"/></p>
	<?php echo form_close();?>
</div>