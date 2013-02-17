<div>
	<h3>Callers</h3>
	<table>
		<tr>
			<td>Message id</td>
			<td>Sender</td>
			<td>Message</td>
			<td>Date and Time</td>
			<td>Number's</td>
			<td>Referring id id</td>
		</tr>
		<tbody>
			<?php foreach ($callers as $caller) :?>
			<tr>
				<td><?php echo $caller[0];?></td>
				<td><?php echo $caller[1];?></td>
				<td><?php echo $caller[2];?></td>
				<td><?php echo $caller[3];?></td>
				<td><?php echo $caller[4];?></td>
				<td><?php echo $caller[5];?></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>

<div>
	<h3>Entity</h3>
	<table>
		<tr>
			<td>Message id</td>
			<td>Sender</td>
			<td>Message</td>
			<td>Date and Time</td>
			<td>Number's</td>
			<td>Referring id id</td>
		</tr>
		<tbody>
			<?php foreach ($entities as $entity) :?>
			<tr>
				<td><?php echo $entity[0];?></td>
				<td><?php echo $entity[1];?></td>
				<td><?php echo $entity[2];?></td>
				<td><?php echo $entity[3];?></td>
				<td><?php echo $entity[4];?></td>
				<td><?php echo $entity[5];?></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>