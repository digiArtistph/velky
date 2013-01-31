<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Accident Types</h2>
        <a class="ext_disabled btn" href="<?php echo base_url("master/accident_type/section/addaccident_type"); ?>">Add New Accident Type</a>
    </div>
</div>

<div class="row-fluid">
	<div class="span8">
    	<table class="table table-striped" data-provides="rowlink">
                    	<thead>
                        	<tr> 
                                <th>Accident Type</th>     
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
					<?php if(isset($accidenttype)): ?>
                        	<?php foreach($accidenttype as $atype): ?>
                        	<tr class="rowlink">
                            	<td><?php echo $atype->name; ?></td>
                            	<td><a class="ext_disabled" href="<?php echo base_url("master/accident_type/section/editaccident_type/$atype->at_id"); ?>">Edit</a> | <a class="ext_disabled" href="<?php echo base_url("master/accident_type/section/deleteaccident_type/$atype->at_id"); ?>">Delete</a></td>
                            </tr>                            
							<?php endforeach; ?>
					<?php endif; ?>

                        </tbody>
                    </table>
    </div>
</div>
