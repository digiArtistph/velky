
<p> <a href="<?php echo base_url() . 'reports/ambulance/section/addambulance';?>" >Add Ambulance</a></p>

<div>
	<h3>Ambulance</h3>
	<table>
		<thead>
			<tr>
			  <th>Hospitals</th>
		      <th>Plate No</th>
		      <th>Capacity</th>
		      <th>Status</th>
		      <th>Action</th>
		    </tr>
		 </thead>
		
		 <?php foreach ($hospitals_ambulances as $name):?>
		 
		 <tbody>
		 	<tr>
		 		<td><?php echo $name->name;?></td>
				<td><?php echo $name->plateno;?></td>
				<td><?php echo $name->capacity;?></td>
				<td>
				<?php if ($name->active == 1):?>
				<?php echo 'Active';?>
				<?php else :?>
				<?php echo 'Inactive'; ?>
				</td>
				<?php endif;?>
				<td><a href="<?php echo base_url() . 'reports/ambulance/section/editambulance/' . strencode($name->amb_id);?>">Edit</a> |<a href="<?php echo base_url() . 'reports/ambulance/section/deleteambulance/' . strencode($name->amb_id);?>">Delete</a></td>
			</tr>
		</tbody>
		
		<?php endforeach;?>
	</table>
	
</div>