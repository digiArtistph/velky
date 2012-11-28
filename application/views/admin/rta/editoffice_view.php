<div>
	<p>Your are editing station id: No. <?php echo $office[0]->r_id;?></p>
	<p><a href="<?php echo base_url() . 'master/rta';?>">Back</a></p>
	<h3>Add Office</h3>
	<?php echo form_open( base_url() . 'master/rta/validateupdateoffice' );?>
		<input type="hidden" name="id" value=<?php echo strencode($office[0]->r_id);?>>
		<p><label>Office: </label><input type="text" name="office" value="<?php echo $office[0]->office;?>" /><span><?php echo form_error('station'); ?></span></p>
		<p><label>Address: </label><input type="text" name="address" value="<?php echo $office[0]->address;?>" /><span><?php echo form_error('address'); ?></span></p>
		<p><label>Phone: </label><input type="text" name="phone" value="<?php echo $office[0]->phone;?>" /><span><?php echo form_error('phone'); ?></span></p>
		<p><label>Contact Person: </label><input type="text" name="contactperson" value="<?php echo $office[0]->contactperson;?>" /><span><?php echo form_error('contactperson'); ?></span></p>
		<p><label>Status: </label>
			<?php if ($office[0]->status == 1):?>
			<input type="radio" name="status" value="1" checked="checked"/><label>Active</label>
			<input type="radio" name="status" value="0" /><label>InActive</label>
			<?php else :?>
			<input type="radio" name="status" value="1"/><label>Active</label>
			<input type="radio" name="status" value="0" checked="checked"/><label>InActive</label>
			<?php endif;?>
			<span><?php echo form_error('status'); ?></span>
		</p>
		<p><input type="submit" value="Update Office"/></p>
	<?php echo form_close();?>
</div>