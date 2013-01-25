
<p> <a href="<?php echo base_url() . 'reports/ambulance/section/addambulance';?>" >Add Ambulance</a></p>

<div>
	<h3>Ambulance</h3>
	<table>
		<thead>
			<tr>
		      <th>Plate No</th>
		      <th>Capacity</th>
		      <th>Status</th>
		      <th>Action</th>
		    </tr>
		 </thead>
		 
		<?php foreach ($ambulances as $plateno):?>
		<tbody>
			<tr>
				<td><?php echo $plateno->plateno;?></td>
				<td><?php echo $plateno->capacity;?></td>
				<td>
				<?php if ($plateno->active == 1):?>
				<?php echo 'Active';?>
				<?php else :?>
				<?php echo 'Inactive'; ?>
				</td>
				<?php endif;?>
				<td><a href="<?php echo base_url() . 'reports/ambulance/section/editambulance/' . strencode($plateno->amb_id);?>">Edit</a> |<a href="<?php echo base_url() . 'reports/ambulance/section/deleteambulance/' . strencode($plateno->amb_id);?>">Delete</a></td>
			</tr>
		</tbody>
		<?php endforeach;?>
	</table>
	
</div>