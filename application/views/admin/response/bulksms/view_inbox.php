<?php if(!empty($newinbox) ) :?>
<div>
	<h3>New Messages</h3>
	<table>
		<tr>
			<td>id</td>
			<td>Message id</td>
			<td>Sender</td>
			<td>Message</td>
			<td>Date and Time</td>
			<td>Mark as</td>
		</tr>
		<tbody>
			<?php foreach ($newinbox as $caller) :?>
			<tr>
				<td class="inb"><?php echo $caller->id;?></td>
				<td><?php echo $caller->message_id;?></td>
				<td><?php echo $caller->number;?></td>
				<td><?php echo $caller->message;?></td>
				<td><?php echo $caller->txtdate;?></td>
				<td><a class="bin" href="#">Read</a></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>

<?php endif;?>
<div>
	<h3>Read Messages</h3>
	<table>
		<tr>
			<td>Message id</td>
			<td>Sender</td>
			<td>Message</td>
			<td>Date and Time</td>
		</tr>
		<tbody>
			<?php foreach ($oldinbox as $caller) :?>
			<tr>
				<td><?php echo $caller->message_id;?></td>
				<td><?php echo $caller->number;?></td>
				<td><?php echo $caller->message;?></td>
				<td><?php echo $caller->txtdate;?></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
