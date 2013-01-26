<div>
	<h3>SMS Alert</h3>
	
	<?php echo form_open( base_url() . 'master/smscontrol/validateSend' );?>
		
	<div>
		<p><label>Recepient: </label><input class="textboxA" type="text" name="recepient" /><span><?php echo form_error('barangay'); ?></span></p>
		<p><label>Message: </label><textarea class="textarea" rows="=20" cols="20" name="message"></textarea> <span><?php echo form_error('details'); ?></span></p>
		<input type="submit" value="Send"/>
	</div>
	<?php echo form_close();?>
</div>