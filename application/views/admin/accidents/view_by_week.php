<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Select a Week</h2>
    </div>
</div>
 <?php echo form_open( base_url() . 'reports/accidents/section/getweekaccidentslist');?>
<div class="conrol-group formSep"><label>Week: </label>
        	<div class="controls">
            <?php echo getDateArr("2013-02-11 08:00:00"); ?> 
                <select class="select span7" name="week">
					<?php $upper = 1; $lower = 53;  ?>
					<?php for($i = $upper; $i <= $lower; $i++): ?>
				<option value="<?php echo $i;?>" >Week <?php echo $i; ?></option>
					<?php endfor; ?>
		</select>
            </div>
        </div>
        <div class="controls">
            <input class="btn btn-gebo span3" type="submit" id="submitr" value="Next"/>
        </div>
        <?php echo form_close();?>