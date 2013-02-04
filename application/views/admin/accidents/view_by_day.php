<div>
	<h3>Monday</h3>
	<table class="table table-striped" data-provides="rowlink">
		<thead>
			<tr>
		      <th>Accident type</th>
		      <th>Barangay</th>
		      <th>Details</th>
		      <th>Caller</th>
		      <th>Accident date</th>
		      <th>Report date</th>
		    </tr>
		 </thead>
		 <tbody>
		 
		 <?php foreach ($accident_monday as $detailsm):?>
			<tr class="rowlink">
				<td><?php echo $detailsm->acdnttype;?></td>
				<td><?php echo $detailsm->brgy;?></td>
				<td><?php echo $detailsm->details;?></td>
				<td><?php echo $detailsm->caller;?></td>
				<td><?php echo $detailsm->acdntdate;?></td>
				<td><?php echo $detailsm->rptdate;?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
</div>

<div>
	<h3>Tuesday</h3>
	<table class="table table-striped" data-provides="rowlink">
		<thead>
			<tr>
		      <th>Accident type</th>
		      <th>Barangay</th>
		      <th>Details</th>
		      <th>Caller</th>
		      <th>Accident date</th>
		      <th>Report date</th>
		    </tr>
		 </thead>
		 <tbody>
		 
		 <?php foreach ($accident_tuesday as $detailst):?>
			<tr class="rowlink">
				<td><?php echo $detailst->acdnttype;?></td>
				<td><?php echo $detailst->brgy;?></td>
				<td><?php echo $detailst->details;?></td>
				<td><?php echo $detailst->caller;?></td>
				<td><?php echo $detailst->acdntdate;?></td>
				<td><?php echo $detailst->rptdate;?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
</div>

<div>
	<h3>Wednesday</h3>
	<table class="table table-striped" data-provides="rowlink">
		<thead>
			<tr>
		      <th>Accident type</th>
		      <th>Barangay</th>
		      <th>Details</th>
		      <th>Caller</th>
		      <th>Accident date</th>
		      <th>Report date</th>
		    </tr>
		 </thead>
		 <tbody>
		 
		 <?php foreach ($accident_wednesday as $detailsw):?>
			<tr class="rowlink">
				<td><?php echo $detailsw->acdnttype;?></td>
				<td><?php echo $detailsw->brgy;?></td>
				<td><?php echo $detailsw->details;?></td>
				<td><?php echo $detailsw->caller;?></td>
				<td><?php echo $detailsw->acdntdate;?></td>
				<td><?php echo $detailsw->rptdate;?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
</div>

<div>
	<h3>Thursday</h3>
	<table class="table table-striped" data-provides="rowlink">
		<thead>
			<tr>
		      <th>Accident type</th>
		      <th>Barangay</th>
		      <th>Details</th>
		      <th>Caller</th>
		      <th>Accident date</th>
		      <th>Report date</th>
		    </tr>
		 </thead>
		 <tbody>
		 
		 <?php foreach ($accident_thursday as $detailsth):?>
			<tr class="rowlink">
				<td><?php echo $detailsth->acdnttype;?></td>
				<td><?php echo $detailsth->brgy;?></td>
				<td><?php echo $detailsth->details;?></td>
				<td><?php echo $detailsth->caller;?></td>
				<td><?php echo $detailsth->acdntdate;?></td>
				<td><?php echo $detailsth->rptdate;?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
</div>

<div>
	<h3>Friday</h3>
	<table class="table table-striped" data-provides="rowlink">
		<thead>
			<tr>
		      <th>Accident type</th>
		      <th>Barangay</th>
		      <th>Details</th>
		      <th>Caller</th>
		      <th>Accident date</th>
		      <th>Report date</th>
		    </tr>
		 </thead>
		 <tbody>
		 
		 <?php foreach ($accident_friday as $detailsf):?>
			<tr class="rowlink">
				<td><?php echo $detailsf->acdnttype;?></td>
				<td><?php echo $detailsf->brgy;?></td>
				<td><?php echo $detailsf->details;?></td>
				<td><?php echo $detailsf->caller;?></td>
				<td><?php echo $detailsf->acdntdate;?></td>
				<td><?php echo $detailsf->rptdate;?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
</div>

<div>
	<h3>Saturday</h3>
	<table class="table table-striped" data-provides="rowlink">
		<thead>
			<tr>
		      <th>Accident type</th>
		      <th>Barangay</th>
		      <th>Details</th>
		      <th>Caller</th>
		      <th>Accident date</th>
		      <th>Report date</th>
		    </tr>
		 </thead>
		 <tbody>
		 
		 <?php foreach ($accident_saturday as $detailss):?>
			<tr class="rowlink">
				<td><?php echo $detailss->acdnttype;?></td>
				<td><?php echo $detailss->brgy;?></td>
				<td><?php echo $detailss->details;?></td>
				<td><?php echo $detailss->caller;?></td>
				<td><?php echo $detailss->acdntdate;?></td>
				<td><?php echo $detailss->rptdate;?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
</div>

<div>
	<h3>Sunday</h3>
	<table class="table table-striped" data-provides="rowlink">
		<thead>
			<tr>
		      <th>Accident type</th>
		      <th>Barangay</th>
		      <th>Details</th>
		      <th>Caller</th>
		      <th>Accident date</th>
		      <th>Report date</th>
		    </tr>
		 </thead>
		 <tbody>
		 
		 <?php foreach ($accident_sunday as $detailssn):?>
			<tr class="rowlink">
				<td><?php echo $detailssn->acdnttype;?></td>
				<td><?php echo $detailssn->brgy;?></td>
				<td><?php echo $detailssn->details;?></td>
				<td><?php echo $detailssn->caller;?></td>
				<td><?php echo $detailssn->acdntdate;?></td>
				<td><?php echo $detailssn->rptdate;?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
</div>

