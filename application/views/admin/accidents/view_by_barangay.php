<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Select a Barangay</h2>
    </div>
</div>
 <?php $attrib = array('id' => 'add_report', 'class' => 'form-vertical well'); echo form_open( base_url() . 'accident/accident/validateaddreport', $attrib);?>
<div class="conrol-group formSep"><label>Barangay: </label>
        	<div class="controls">
                <select class="select span7" name="barangay">
                <?php foreach ($barangaytypes as $barangays):?>
                <option value="<?php echo $barangays->b_id;?>"><?php echo $barangays->name;?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="controls">
            <input class="btn btn-gebo span3" type="submit" id="submitr" value="Next"/>
        </div>
        <?php echo form_close();?>