<?php if(!empty($newinbox) ) {
	foreach ($newinbox as $caller) :?>
		
		<tr class="rowlink">
			<td class="val_message"><?php echo $caller->id;?></td>
			<td><?php echo $caller->message_id;?></td>
			<td><?php echo $caller->number;?></td>
			<td><?php echo $caller->message;?></td>
			<td><?php echo $caller->txtdate;?></td>
			<td><a class="messages_gen" href="#">Read</a></td>
			
		</tr>
			<?php endforeach;?>

<?php }?>