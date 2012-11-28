
<p> <a href="<?php echo base_url() . 'master/hospitals/section/addhospital';?>" >Add Hospitals</a></p>

<div>
	<h3>Hospitals</h3>
	<table>
		<thead>
			<tr>
		      <th>Name</th>
		      <th>Address</th>
		      <th>Phone</th>
		      <th>Status</th>
		      <th>Action</th>
		    </tr>
		 </thead>
		 
		<?php foreach ($hospitals as $name):?>
		<tbody>
			<tr>
				<td><?php echo $name->name;?></td>
				<td><?php echo $name->address;?></td>
				<td><?php echo $name->phone;?></td>
				<td>
				<?php if ($name->status == 1):?>
				<?php echo 'Active';?>
				<?php else :?>
				<?php echo 'Inactive'; ?>
				</td>
				<?php endif;?>
				<td><a href="<?php echo base_url() . 'master/hospitals/section/edithospital/' . strencode($name->h_id);?>">Edit</a>|<a href="<?php echo base_url() . 'master/hospitals/section/deletehospital/' . strencode($name->h_id);?>">Delete</a></td>
			</tr>
		</tbody>
		<?php endforeach;?>
	</table>
	</br>
	
</div>