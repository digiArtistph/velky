<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Select a Year</h2>
    </div>
</div>
 <?php $attrib = array('id' => 'add_report', 'class' => 'form-vertical well'); echo form_open( base_url() . 'accident/accident/validateaddreport', $attrib);?>
<div class="conrol-group formSep"><label>Year: </label>
        	<div class="controls">
                <select class="select span7" name="year">
					<?php $upper = 1900; $lower = 2050;  ?>
					<?php for($i = $upper; $i <= $lower; $i++): ?>
				<option value="<?php echo $i;?>" >Year <?php echo $i; ?></option>
					<?php endfor; ?>
		</select>
            </div>
        </div>
        <div class="controls">
            <input class="btn btn-gebo span3" type="submit" id="submitr" value="Next"/>
        </div>
        <?php echo form_close();?>