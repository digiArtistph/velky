
<p> <a href="<?php echo base_url() . 'master/police/section/addoffice';?>" >Create Police Office</a></p>

<div>
	<h3>Police Offices</h3>
	<table>
		<thead>
			<tr>
		      <th>Station</th>
		      <th>Address</th>
		      <th>Phone</th>
		      <th>Contact Person</th>
		      <th>Action</th>
		    </tr>
		 </thead>
		 
		<?php foreach ($offices as $office):?>
		<tbody>
			<tr>
				<td><?php echo $office->station;?></td>
				<td><?php echo $office->address;?></td>
				<td><?php echo $office->phone;?></td>
				<td><?php echo $office->contactperson;?></td>
				<td><a href="<?php echo base_url() . 'master/police/section/editoffice/' . strencode($office->p_id);?>">Edit</a>|<a href="<?php echo base_url() . 'master/police/section/deleteoffice/' . strencode($office->p_id);?>">Delete</a></td>
			</tr>
		</tbody>
		<?php endforeach;?>
	</table>
	
</div>