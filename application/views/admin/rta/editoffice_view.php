<div>
	<p>Your are editing station id: No. <?php echo $office[0]->office;?></p>
	<p><a href="<?php echo base_url() . 'master/rta';?>">Back</a></p>
	<h3>Add Office</h3>
	<?php echo form_open( base_url() . 'master/rta/validateupdateoffice' );?>
		<input type="hidden" name="id" value=<?php echo strencode($office[0]->r_id);?>>
		<p><label>Office: </label><input  class="textboxA" type="text" name="office" value="<?php echo $office[0]->office;?>" /><span><?php echo form_error('station'); ?></span></p>
		<p><label>Address: </label><input class="textboxB" type="text" name="address" value="<?php echo $office[0]->address;?>" /><span><?php echo form_error('address'); ?></span></p>
		<p><label>Mobile No.: </label><input class="textboxC" type="text" name="mobile" value="<?php echo $office[0]->mobile;?>" /><span><?php echo form_error('mobile'); ?></span></p>
		<p><label>Telephone No.: </label><input class="textboxD" type="text" name="phone" value="<?php echo $office[0]->phone;?>" /><span><?php echo form_error('phone'); ?></span></p>
		<p><label>Contact Person: </label><input class="textboxE" type="text" name="contactperson" value="<?php echo $office[0]->contactperson;?>" /><span><?php echo form_error('contactperson'); ?></span></p>
		<p><input class="button" type="submit" value="Update Office"/></p>
	<?php echo form_close();?>
</div>