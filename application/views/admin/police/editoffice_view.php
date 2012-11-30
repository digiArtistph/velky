<div>
	<p>Your are editing station id: No. <?php echo $office[0]->station;?></p>
	<p><a href="<?php echo base_url() . 'master/police';?>">Back</a></p>
	
	<h3>Add Office</h3>
	
	<?php echo form_open( base_url() . 'master/police/validateupdateoffice' );?>
		<input type="hidden" name="id" value=<?php echo strencode($office[0]->p_id);?>>
		<p><label>Station: </label><input class="textboxA" type="text" name="station" value="<?php echo $office[0]->station;?>" /><span><?php echo form_error('station'); ?></span></p>
		<p><label>Address: </label><input class="textboxB" type="text" name="address" value="<?php echo $office[0]->address;?>" /><span><?php echo form_error('address'); ?></span></p>
		<p><label>Phone: </label><input class="textboxC" type="text" name="phone" value="<?php echo $office[0]->phone;?>" /><span><?php echo form_error('phone'); ?></span></p>
		<p><label>Contact Person: </label><input class="textboxD" type="text" name="contactperson" value="<?php echo $office[0]->contactperson;?>" /><span><?php echo form_error('contactperson'); ?></span></p>
		<p><input class="button" type="submit" value="Update Office"/></p>
	<?php echo form_close();?>
</div>