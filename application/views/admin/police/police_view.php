<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Police Offices</h2>
        <a class="ext_disabled btn" href="<?php echo base_url() . 'master/police/section/addoffice';?>" >Add New Police Office</a>
    </div>
</div>


<div class="row-fluid">
	<div class="span7">
	<table  class="table table-striped" data-provides="rowlink">
		<thead>
			<tr>
		      <th>Station</th>
		      <th>Address</th>
		      <th>Mobile No.</th>
		      <th>Telephone No.</th>
		      <!--<th>Contact Person</th>-->
		      <th>Action</th>
		    </tr>
		 </thead>
		 
		<?php foreach ($offices as $office):?>
		<tbody>
			<tr class="rowlink">
				<td><?php echo $office->station;?></td>
				<td><?php echo $office->address;?></td> 
				<td><?php echo $office->mobile;?></td>
				<td><?php echo $office->phone;?></td>
				<!--<td><?php echo $office->contactperson;?></td>-->
				<td><a class="ext_disabled" href="<?php echo base_url() . 'master/police/section/editoffice/' . strencode($office->p_id);?>">Edit</a> | <a class="ext_disabled"  href="<?php echo base_url() . 'master/police/section/deleteoffice/' . strencode($office->p_id);?>">Delete</a></td>
			</tr>
		</tbody>
		<?php endforeach;?>
	</table>
	</div>
</div>