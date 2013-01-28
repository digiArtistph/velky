<p> <a href="<?php echo base_url() . 'master/accident/section/addaccident';?>" >Create Accident Report</a></p>

<div>
	<h3>Reports Views</h3>
	<table>
		<thead>
			<tr>
		      <th>Type of Accident</th>
		      <th>Barangay Location</th>
		      <th>Details</th>
		      <th>Caller</th>
		      <th>Date of Accident</th>
		      <th>Date Reported</th>
		      <th>Action</th>
		    </tr>
		 </thead>
		 
		<?php foreach ($accidents as $accident):?>
		<tbody>
			<tr>
				<td><?php echo $accident->name;?></td>
				<td><?php echo $accident->brgy;?></td>
				<td><?php echo $accident->details;?></td>
				<td><?php echo $accident->caller;?></td>
				<td><?php echo $accident->acdntdate;?></td>
				<td><?php echo $accident->rptdate;?></td>
				<td><a href="<?php echo base_url() . 'master/accident/section/editreport/' . strencode($accident->a_id);?>">Edit</a>|<a href="<?php echo base_url() . 'master/accident/section/deletereport/' . strencode($accident->a_id);?>">Delete</a></td>
			</tr>
		</tbody>
		<?php endforeach;?>
	</table>
	
</div>