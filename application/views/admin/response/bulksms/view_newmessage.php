<?php if(!empty($newinbox) ) {
	foreach ($newinbox as $caller) :?>
		
		<tr class="rowlink">
			<td><?php echo $caller->message_id;?></td>
			<td><?php echo $caller->number;?></td>
			<td><?php echo $caller->message;?></td>
			<td><?php echo $caller->txtdate;?></td>
			<td><a href="<?php echo base_url() . 'response/inbox/updateInboxMessage/' . $caller->id;?>">Read</a></td>
			
		</tr>
			<?php endforeach;?>

<?php }?>