<div>
	<p>Your are editing Accident id: No. <?php echo $accidents[0]->a_id;?></p>
	<p><a href="<?php echo base_url() . 'master/accident';?>">Back</a></p>
	
	<h3>Report Accident</h3>
	
	<?php echo form_open( base_url() . 'master/accident/validateupdatereport' );?>
		<input type="hidden" name="id" value=<?php echo strencode($accidents[0]->a_id);?>>
		<p><label>Accident Type: </label>
			<select class="select" name="accidenttype">
			<?php foreach ($types as $type):?>
				<?php if($type->at_id != $accidents[0]->at_id):?>
				<option value="<?php echo $type->at_id;?>"><?php echo $type->name;?></option>
				<?php else:?>
				<option value="<?php echo $type->at_id;?>" selected="selected"><?php echo $type->name;?></option>
				<?php endif;?>
			<?php endforeach;?>
			</select><a href="<?php echo base_url() . 'master/accident_type/section/addaccident_type'?>">Add accident type</a>
		</p>
		<p><label>Barangay: </label><input class="textboxA" type="text" name="barangay" value="<?php echo $accidents[0]->brgy;?>"/><span><?php echo form_error('barangay'); ?></span></p>
		<p><label>Details: </label><textarea class="textarea" rows="4" cols="20" name="details"><?php echo $accidents[0]->details;?></textarea> <span><?php echo form_error('details'); ?></span></p>
		<p><label>Caller: </label><input class="textboxB" type="text" name="caller"  value="<?php echo $accidents[0]->caller;?>"/><span><?php echo form_error('caller'); ?></span></p>
		<p><label>Accident Date: </label><input class="textboxB" type="text" name="acdntdate" value="<?php echo $accidents[0]->acdntdate;?>"/><span><?php echo form_error('acdntdate'); ?></span></p>
		<p><label>Report Date: </label><input class="textboxD" type="text" name="rptdate" value="<?php echo $accidents[0]->rptdate;?>"/><span><?php echo form_error('rptdate'); ?></span></p>
		<p><input class="button" type="submit" value="Edit Report"/></p>
	<?php echo form_close();?>
</div>