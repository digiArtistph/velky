<div>
	<h3>Add Office</h3>
	<?php echo form_open( base_url() . 'master/police/validatenewoffice' );?>
		<p><label>Station: </label><input class="textboxA" type="text" name="station" /><span><?php echo form_error('station'); ?></span></p>
		<p><label>Address: </label><input class="textboxB" type="text" name="address" /><span><?php echo form_error('address'); ?></span></p>
		<p><label>Phone: </label><input class="textboxC" type="text" name="phone" /><span><?php echo form_error('phone'); ?></span></p>
		<p><label>Contact Person: </label><input class="textboxD" type="text" name="contactperson" /><span><?php echo form_error('contactperson'); ?></span></p>
		<p><input class="button" type="submit" value="Add Office"/></p>
	<?php echo form_close();?>
</div>