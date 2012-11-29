
<p> <a href="<?php echo base_url() . 'master/barangay/section/addbarangay';?>" >Add Barangay</a></p>

<div>
	<h3>Barangay</h3>
	<table>
		<thead>
			<tr>
		      <th>Name</th>
		      <th>Status</th>
		      <th>Action</th>
		    </tr>
		 </thead>
		 
		<?php foreach ($barangay as $name):?>
		<tbody>
			<tr>
				<td><?php echo $name->name;?></td>
				<td>
				<?php if ($name->status == 1):?>
				<?php echo 'Active';?>
				<?php else :?>
				<?php echo 'Inactive'; ?>
				</td>
				<?php endif;?>
				<td><a href="<?php echo base_url() . 'master/barangay/section/editbarangay/' . strencode($name->b_id);?>">Edit</a>|<a href="<?php echo base_url() . 'master/barangay/section/deletebarangay/' . strencode($name->b_id);?>">Delete</a></td>
			</tr>
		</tbody>
		<?php endforeach;?>
	</table>
	
</div>