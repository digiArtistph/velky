<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Hospitals</h2>
        <a class="ext_disabled btn" href="<?php echo base_url() . 'master/hospitals/section/addhospital';?>" >Add New Hospital</a>
    </div>
</div>
<p> </p>

<div class="row-fluid">
	<div class="span8">
	<table class="table table-striped" data-provides="rowlink">
		<thead>
			<tr>
		      <th>Name</th>
		      <th>Address</th>
		      <th>Phone</th>
		      <!--<th>Status</th>-->
		      <th>Action</th>
		    </tr>
		 </thead>
		 
		<?php foreach ($hospitals as $name):?>
		<tbody>
			<tr class="rowlink">
				<td><?php echo $name->name;?></td>
				<td><?php echo $name->address;?></td>
				<td><?php echo $name->phone;?></td>
				<!--<td>
				<?php if ($name->status == 1):?>
				<?php echo 'Active';?>
				<?php else :?>
				<?php echo 'Inactive'; ?>
				</td>
				<?php endif;?>-->
				<td><a class="ext_disabled" href="<?php echo base_url() . 'master/hospitals/section/edithospital/' . strencode($name->h_id);?>">Edit</a> | <a class="ext_disabled" href="<?php echo base_url() . 'master/hospitals/section/deletehospital/' . strencode($name->h_id);?>">Delete</a></td>
			</tr>
		</tbody>
		<?php endforeach;?>
	</table>
	</div>
</div>