<div>
	<p>Your are editing station id: No. <?php echo $name[0]->h_id;?></p>
	<p><a href="<?php echo base_url() . 'master/hospitals';?>">Back</a></p>
	<h3>Edit Hospital</h3>
	<?php echo form_open( base_url() . 'master/hospitals/validateupdatehospital' );?>
		<input type="hidden" name="id" value=<?php echo strencode($name[0]->h_id);?>>
		<p><label>Name: </label><input type="text" name="name" value="<?php echo $name[0]->name;?>" /><span><?php echo form_error('name'); ?></span></p>
		<p><label>Address: </label><input type="text" name="address" value="<?php echo $name[0]->address;?>" /><span><?php echo form_error('address'); ?></span></p>
		<p><label>Phone: </label><input type="text" name="phone" value="<?php echo $name[0]->phone;?>" /><span><?php echo form_error('phone'); ?></span></p>
		<p><label>Status: </label>
			<?php if ($name[0]->status == 1):?>
			<input type="radio" name="status" value="1" checked="checked"/><label>Active</label>
			<input type="radio" name="status" value="0" /><label>InActive</label>
			<?php else :?>
			<input type="radio" name="status" value="1"/><label>Active</label>
			<input type="radio" name="status" value="0" checked="checked"/><label>InActive</label>
			<?php endif;?>
			<span><?php echo form_error('status'); ?></span>
		</p>
		<p><input type="submit" value="Update Hospital"/></p>
	<?php echo form_close();?>
</div>