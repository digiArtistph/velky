<div>
	<h3>Report Accident</h3>
	<?php $attrib = array('id' => 'add_report'); echo form_open( base_url() . 'master/accident/validateaddreport', $attrib);?>
		<p><label>Accident Type: </label>
			<select class="select" name="accidenttype">
			<?php foreach ($types as $type):?>
			<option value="<?php echo $type->at_id;?>"><?php echo $type->name;?></option>
			<?php endforeach;?>
			</select><a href="<?php echo base_url() . 'master/accident_type/section/addaccident_type'?>">Add accident type</a>
		</p>
		<p><label>Barangay: </label><input class="textboxA" type="text" name="barangay" /><span><?php echo form_error('barangay'); ?></span></p>
		<p><label>Details: </label><textarea class="textareaA" rows="4" cols="20" name="details"></textarea> <span><?php echo form_error('details'); ?></span></p>
		<p><label>Caller: </label><input class="textboxB" type="text" name="caller" /><span><?php echo form_error('caller'); ?></span></p>
		<p><label>Accident Date: </label><input class="textboxC" type="text" name="acdntdate" /><span><?php echo form_error('acdntdate'); ?></span></p>
		<p><label>Report Date: </label><input class="textboxD" type="text" name="rptdate" /><span><?php echo form_error('rptdate'); ?></span></p>
		<p><input class="button" type="submit" value="Create Report"/></p>
	<?php echo form_close();?>
</div>

<div>
	<h3>Broadcast to:</h3>
	<?php $attrib2 = array('id' => 'submitsms'); echo form_open( base_url() . 'master/accident/validatesendsms', $attrib2); ?>
	<p><span><?php echo form_error('broadcastto'); ?></span></p>
	<p><input type="checkbox" name="broadcastto[]" value="rta" class="checkbox"/><label>RTA</label></p>
	<p><input type="checkbox" name="broadcastto[]" value="police" class="checkbox" /><label>Police</label></p>
	<p><input type="checkbox" name="broadcastto[]" value="hospitals" class="checkbox"/><label>Hospitals</label></p>
	<p><label>Message: </label><textarea rows="4" cols="20" name="message"  class="textarea"></textarea><span><?php echo form_error('message'); ?></span></p>
	
	<p><input type="radio" name="smstype" value="isms" class="radiobtn"/>Multi Modem iSMS<span><?php echo form_error('smstype');?></span></p>
	<p><input type="radio" name="smstype" value="bulk" class="radiobtn">Bulk SMS<span><?php echo form_error('smstype');?></span></p>
	<p><input id="sendsms" type="submit" value="Send Sms"/></p>
	
	<?php echo form_close();?>
</div>