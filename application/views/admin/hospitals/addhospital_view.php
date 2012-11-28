<div>
	<h3>Add Hospitals</h3>
	<?php echo form_open( base_url() . 'master/hospitals/validatenewhospital' );?>
		<p><label>Name: </label><input type="text" name="name" /><span><?php echo form_error('name'); ?></span></p>
		<p><label>Address: </label><input type="text" name="address" /><span><?php echo form_error('address'); ?></span></p>
		<p><label>Phone: </label><input type="text" name="phone" /><span><?php echo form_error('phone'); ?></span></p>
		<p><label>Status: </label>
			<input type="radio" name="status" value="1"/><label>Active</label>
			<input type="radio" name="status" value="0"/><label>InActive</label>
			<span><?php echo form_error('status'); ?></span>
		</p>
		<p><input type="submit" value="Add Hospital"/>
		<input type="reset" value="Reset"/></p>
	<?php echo form_close();?>
</div>