<div class="row-fluid">
    	<div class="span12">
        	<h2 class="heading">Add New Ambulance</h2>
			 <a class="ext_disabled btn" href="<?php echo base_url() . 'master/ambulances/section/addambulance';?>" >Add New Ambulance</a>
        </div>
</div>
<p>&nbsp;</p>

<div class="row-fluid">
	<div class="span8">
	<table class="table table-striped" data-provides="rowlink">
		<thead>
			<tr>
		      <th>Hospital</th>
		      <th>Plate No.</th>
		      <th>Capacity</th>
		      <!--<th>Status</th>-->
		      <th>Action</th>
		    </tr>
		 </thead>
		 
		<?php foreach ($ambulances as $name):?>
		<tbody>
			<tr class="rowlink">
				<td><?php echo $name->name;?></td>
				<td><?php echo $name->plateno;?></td>
				<td><?php echo $name->capacity;?></td>
				
				<td><a class="ext_disabled" href="<?php echo base_url() . 'master/ambulances/section/editambulance/' . strencode($name->amb_id);?>">Edit</a> | <a class="ext_disabled" href="<?php echo base_url() . 'master/ambulances/section/deleteambulance/' . strencode($name->amb_id);?>">Delete</a></td>
			</tr>
		</tbody>
		<?php endforeach;?>
	</table>
	</div>
</div>
