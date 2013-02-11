<div>
	<table>
	<?php if(!$msgs): ?>
	<tr>
		<td>No messages in your inbox.</td>
	</tr>

	<?php else: ?>
		<tr><td><?php echo count($msgs)." inbox messages, as follows:"; ?></td></tr>

            <?php foreach($msgs as $item) :?>
				<tr>
					<td><?php echo "Message ID: ".$item[0]."";?></td>
				</tr>
				<tr>
					<td><?php echo "Sender: ".$item[1]."";?></td>
				</tr>
				<tr>
					<td><?php echo "Message: ".$item[2]."";?></td>
				</tr>
				<tr>
					<td><?php echo "Date & Time: ".$item[3]."";?></td>
				</tr>
				<tr>
					<td><?php echo "MSISDN: ".$item[4].""; ?></td>
				</tr>
				<tr>
					<td><?php echo "Referring message ID: ".$item[5]."";?></td>
				</tr>
				<?php endforeach;?>
	<?php endif;?>
	</table>
</div>