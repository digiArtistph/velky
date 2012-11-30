<div>
	<p><a href="<?php echo base_url() . 'master/barangay';?>">Back</a></p>
	<h3>Edit Barangay</h3>
	<?php echo form_open( base_url() . 'master/barangay/validateupdatebarangay' );?>
		<input type="hidden" name="id" value=<?php echo strencode($name[0]->b_id);?>>
		<p><label class="label">Name: </label><input type="text" name="name" value="<?php echo $name[0]->name;?>" class="textbox"/><span><?php echo form_error('name'); ?></span></p>
		<p><label class="label">Status: </label>
			<?php if ($name[0]->status == 1):?>
			<input type="radio" name="status" value="1" checked="checked" class="radiobutton"/><label class="label">Active</label>
			<input type="radio" name="status" value="0" class="radiobutton" /><label class="label">InActive</label>
			<?php else :?>
			<input type="radio" name="status" value="1" class="radiobutton"/><label class="label">Active</label>
			<input type="radio" name="status" value="0" checked="checked" class="radiobutton"/><label class="label">InActive</label>
			<?php endif;?>
			<span><?php echo form_error('status'); ?></span>
		</p>
		<p><input type="submit" value="Update barangay" class="button"/></p>
	<?php echo form_close();?>
</div>