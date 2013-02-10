<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Select a Week</h2>
    </div>
</div>
 <?php $attrib = array('id' => 'add_report', 'class' => 'form-vertical well'); echo form_open( base_url() . 'accident/accident/validateaddreport', $attrib);?>
<div class="conrol-group formSep"><label>Week: </label>
        	<div class="controls">
                <select class="select span7" name="week">
                <?php for ($i=1;$i>60;$i++){?>
                <option value="<?php echo $i;?>"><?php echo '$i';?></option>
                <?php }?>
                </select>
            </div>
        </div>
        <div class="controls">
            <input class="btn btn-gebo span3" type="submit" id="submitr" value="Next"/>
        </div>
        <?php echo form_close();?>