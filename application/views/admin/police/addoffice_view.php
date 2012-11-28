<div>
	<h3>Add Office</h3>
	<?php echo form_open( base_url() . 'master/police/validatenewoffice' );?>
		<p><label>Station: </label><input type="text" name="station" /><span><?php echo form_error('station'); ?></span></p>
		<p><label>Address: </label><input type="text" name="address" /><span><?php echo form_error('address'); ?></span></p>
		<p><label>Phone: </label><input type="text" name="phone" /><span><?php echo form_error('phone'); ?></span></p>
		<p><label>Contact Person: </label><input type="text" name="contactperson" /><span><?php echo form_error('contactperson'); ?></span></p>
		<p><label>Status: </label>
			<input type="radio" name="status" value="1"/><label>Active</label>
			<input type="radio" name="status" value="0"/><label>InActive</label>
			<span><?php echo form_error('status'); ?></span>
		</p>
		<p><input type="submit" value="Add Office"/></p>
	<?php echo form_close();?>
</div>