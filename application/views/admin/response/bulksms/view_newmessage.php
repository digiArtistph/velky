<?php if(!empty($newinbox) ) {
	foreach ($newinbox as $caller) :?>
		
		<tr class="rowlink">
			<a href="#"><td><?php echo $caller->message_id;?></td>
			<td><?php echo $caller->number;?></td>
			<td><?php echo $caller->message;?></td>
			<td><?php echo $caller->txtdate;?></td>
			</a>
		</tr>
			<?php endforeach;?>

<?php }?>