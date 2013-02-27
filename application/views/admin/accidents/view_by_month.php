<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Select a Month</h2>
    </div>
</div>
 <?php $attrib = array('id' => 'add_report', 'class' => 'form-vertical well'); echo form_open( base_url() . 'accident/accident/validateaddreport', $attrib);?>
<div class="conrol-group formSep"><label>Month: </label>
        	<div class="controls">
                <select class="select span7" name="month">
               
			<?php $upper = 12; $lower = 1;  ?>
			<?php for($i = $lower; $i <= $upper; $i++): ?>
			<option value="<?php echo $i;?>" ><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>
            </div>
        </div>
        <div class="controls">
            <input class="btn btn-gebo span3" type="submit" id="submitr" value="Next"/>
        </div>
        <?php echo form_close();?>
		
        