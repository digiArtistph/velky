<div>
	<p><a href="<?php echo base_url() . 'reports/ambulance';?>">Back</a></p>
	<h3>Edit Ambulance</h3>
	<?php echo form_open( base_url() . 'reports/ambulance/validateupdateambulance' );?>
		<input type="hidden" name="id" value=<?php echo strencode($plateno[0]->amb_id);?>>
		<p><label>Hospitals: </label>
			<select class="select" name="hospitals">
			<?php foreach ($types as $type):?>
			<option value="<?php echo $type->h_id;?>"><?php echo $type->name;?></option>
			<?php endforeach;?>
			</select>
		<p><label class="label">Name: </label><input type="text" name="plateno" class="textbox" value="<?php echo $plateno[0]->plateno;?>" /><span><?php echo form_error('plateno'); ?></span></p>
		<p><label class="label">Capacity: </label><input type="text" name="capacity" class="textbox" value="<?php echo $plateno[0]->capacity;?>" /><span><?php echo form_error('capacity'); ?></span></p>
		<p><label class="label">Status: </label>
			<?php if ($plateno[0]->active == 1):?>
			<input type="radio" name="active" value="1" checked="checked" class="radiobutton"/><label class="label">Active</label>
			<input type="radio" name="active" value="0" class="radiobutton"/><label class="label">InActive</label>
			<?php else :?>
			<input type="radio" name="active" value="1" class="radiobutton"/><label class="label">Active</label>
			<input type="radio" name="active" value="0" checked="checked" class="radiobutton"/><label class="label">InActive</label>
			<?php endif;?>
			<span><?php echo form_error('active'); ?></span>
		</p>
		<p><input type="submit" value="Update Ambulance" class="button"/></p>
	<?php echo form_close();?>
</div>