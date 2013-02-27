<div class="row-fluid">
	<div class="span10">
    	<?php if(count($accidents) > 0): ?>
    	<table class="table table-striped" data-provides="rowlink">
        	<thead>
            	<tr>
                	<th>Accident Occured</th><th>Barangay</th><th>Type</th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach($accidents as $ac): ?>
                		<tr class="rowlink">
                        	<td><?php echo longDate($ac->acdntdate); ?></td><td><?php echo $ac->barangay; ?></td><td><?php echo $ac->accident; ?></td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        	<h3 class="heading">No record found</h3>
        <?php endif; ?>
    </div>
</div>