<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Report Accident</h2>
    </div>
</div>

<div class="row-fluid">
	<div class="span6">
    <?php $attrib = array('id' => 'add_report', 'class' => 'form-vertical well'); echo form_open( base_url() . 'accident/accident/validateaddreport', $attrib);?>
    	  <input class="indexid" type="hidden" name="indexid" value="0" />
        <div class="conrol-group formSep"><label>Accident Type</label>
        	<div class="controls">
                <select class="select span7" name="accidenttype">
                <?php foreach ($types as $type):?>
                <option value="<?php echo $type->at_id;?>"><?php echo $type->name;?></option>
                <?php endforeach;?>
                </select> <a class="ext_disabled btn btn-warning" href="<?php echo base_url() . 'master/accident_type/section/addaccident_type'?>">Add accident type</a>
            </div>
        </div>
        
        <div class="conrol-group formSep"><label>Barangay: </label>
        	<div class="controls">
                <select class="select span7" name="barangay">
                <?php foreach ($barangaytypes as $barangays):?>
                <option value="<?php echo $barangays->b_id;?>"><?php echo $barangays->name;?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>
        
        <div class="conrol-group formSep"><label>Details: </label>
        	<div class="controls">
            <textarea class="span7" rows="4" cols="20" name="details"></textarea> <span class="detailsInfo"><?php echo form_error('details'); ?></span>
            </div>
        </div>
        
        <div class="conrol-group formSep"><label>Caller: </label>
        	<div class="controls">
            <input class="input-xlarge" type="text" name="caller" /><span class="callersInfo"><?php echo form_error('caller'); ?></span>
            </div>
        </div>
        
        
        <div class="conrol-group formSep"><label>Accident Date: </label>
        	<div class="controls">
            <input class="input-xlarge" type="text" name="acdntdate" /><span class="accdatesInfo"><?php echo form_error('acdntdate'); ?></span>
            </div>
        </div>
        
        <div class="conrol-group formSep"><label>Report Date: </label>
        	<div class="controls">
            <input class="input-xlarge" type="text" name="rptdate" /><span class="rptdatesInfo"><?php echo form_error('rptdate'); ?></span>
            </div>
        </div>

        <div class="controls">
            <input class="btn btn-gebo span3" type="submit" id="submitr" value="Create Report"/>
        </div>

    		<?php echo form_close();?>
    
    </div>
    
    <div class="span3">
    
    	
        <span class="checkboxinfo"><?php echo form_error('broadcastto'); ?></span>
    	<?php $attrib2 = array('id' => 'submitsms', 'class' => 'form-vertical well'); echo form_open( base_url() . 'accident/accident/validatesendsms', $attrib2); ?>
        
        <div class="control-group formSep">
        	<div class="controls">
            <h3 class="heading">Broadcast to</h3>
            <label for="rta" class="checkbox"> <input id="rta" type="checkbox" name="broadcastto[]" value="rta" class="checkboxsms"/> RTA</label>
            <label for="police" class="checkbox"><input id="police" type="checkbox" name="broadcastto[]" value="police" class="checkboxsms" /> Police</label>
            <label for="hospital" class="checkbox"><input id="hospital" type="checkbox" name="broadcastto[]" value="hospitals" class="checkboxsms"/>Hospitals</label>
            </div>
        </div>
        
        <div class="control-group formSep"><label>Message</label>
        	<div class="controls">
            	<textarea rows="4" cols="20" name="message"  class="textarea"></textarea><span class="messagesInfo"><?php echo form_error('message'); ?></span>
            </div>
        </div>
        
        <div class="control-group formSep">
        	<div class="controls">
            <h4 class="heading">Choose which service</h4>
            <label for="isms" class="radio">
            <input type="radio" name="smstype" value="1" class="radiobtn"/>Multi Modem iSMS</label>
            <label for="bulksms" class="radio">
            	<input type="radio" name="smstype" value="2" class="radiobtn">Bulk SMS
            </label>
            <input class="btn btn-danger span12"  type="submit" value="Send Sms"/>
            </div>
        </div>
   <?php echo form_close();?>
    </div>
</div>
