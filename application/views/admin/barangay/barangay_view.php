<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Barangay</h2>
        <a class="ext_disabled btn" href="<?php echo base_url() . 'master/barangay/section/addbarangay';?>" >Add New Barangay</a>
    </div>
</div>

<div class="row-fluid">
	<div class="span8">
    <table class="table table-striped" data-provides="rowlink">
		<thead>
			<tr>
		      <th>Name</th>
		      <th>Status</th>
		      <th>Action</th>
		    </tr>
		 </thead>
		 
		<?php foreach ($barangay as $name):?>
		<tbody>
			<tr class="rowlink">
				<td><?php echo $name->name;?></td>
				<td>
				<?php if ($name->status == 1):?>
				<?php echo 'Active';?>
				<?php else :?>
				<?php echo 'Inactive'; ?>
				</td>
				<?php endif;?>
				<td><a class="ext_disabled" href="<?php echo base_url() . 'master/barangay/section/editbarangay/' . strencode($name->b_id);?>">Edit</a> | <a class="ext_disabled" href="<?php echo base_url() . 'master/barangay/section/deletebarangay/' . strencode($name->b_id);?>">Delete</a></td>
			</tr>
		</tbody>
		<?php endforeach;?>
	</table>
    <?php echo $paginate; ?>
    </div>
</div>
