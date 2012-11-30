
<p> <a href="<?php echo base_url() . 'master/rta/section/addoffice';?>" >Create RTA Office</a></p>

<div>
	<h3>RTA Offices</h3>
	<table>
		<thead>
			<tr>
		      <th>Office</th>
		      <th>Address</th>
		      <th>Phone</th>
		      <th>Contact Person</th>
		      <th>Action</th>
		    </tr>
		 </thead>
		 
		<?php foreach ($offices as $office):?>
		<tbody>
			<tr>
				<td><?php echo $office->office;?></td>
				<td><?php echo $office->address;?></td>
				<td><?php echo $office->phone;?></td>
				<td><?php echo $office->contactperson;?></td>
				<td><a href="<?php echo base_url() . 'master/rta/section/editoffice/' . strencode($office->r_id);?>">Edit</a>|<a href="<?php echo base_url() . 'master/rta/section/deleteoffice/' . strencode($office->r_id);?>">Delete</a></td>
			</tr>
		</tbody>
		<?php endforeach;?>
	</table>
	
</div>