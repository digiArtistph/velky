<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Add New User</h2>
        <a class="ext_disabled btn" href="<?php echo base_url("master/users"); ?>">Cancel New User</a>
    </div>
</div>
             
		<div class="row-fluid">
	<div class="span12">
		<?php echo form_open("master/users/validatenewuser"); ?>
			<div class="formSep">            
                <div class="row-fluid">
                
                    <div class="span6">
                    <label>First Name<span class="f_req">*</span></label> <input  type="text" name="fname" value="<?php echo set_value('fname'); ?>" class="span12"/><span class="help-inline error"><?php echo form_error('fname'); ?></span></div>
                    
                </div>                
                                                
                <div class="row-fluid">
                    <div class="span6">
                     <label>Middle Name<span class="f_req">*</span></label> <input type="text" value="<?php echo set_value('mname'); ?>" name="mname" class="span12"/><span class="help-inline"><?php echo form_error('mname'); ?></span>    
                    </div>
                    
                </div><div class="row-fluid">
                    <div class="span6"><label>Last Name<span class="f_req">*</span></label> <input type="text"  value="<?php echo set_value('lname'); ?>" name="lname" class="span12"/><span class="help-inline"><?php echo form_error('lname'); ?></span></div>
                </div>                
                <div class="row-fluid">
                    <div class="span6">
                <label>Password<span class="f_req">*</span></label> <input type="password" value="<?php echo set_value('pword'); ?>" name="pword" class="span12"/><span class="help-inline"><?php echo form_error('pword'); ?></span>
                </div>
                </div>                
                <div class="row-fluid">
                    <div class="span6">
                <label>Confirm Password<span class="f_req">*</span></label> <input type="password" value="<?php echo set_value('pword2'); ?>" name="pword2" class="span12"/><span class="help-inline"><?php echo form_error('pword2'); ?></span>
                    </div>
                </div>                
                <div class="row-fluid">
                    <div class="span6">
                <label>Email<span class="f_req">*</span></label> <input type="text" value="<?php echo set_value('email'); ?>" name="email" class="span12"/><span class="help-inline"><?php echo form_error('email'); ?></span>
                    </div>
                </div>                
                <div class="row-fluid">
                <div class="span6">
                <label>Address 1</label> <input type="text" value="<?php echo set_value('addr1'); ?>" name="addr1" class="span12"/><span class="help-inline"><?php echo form_error('addr1'); ?></span>
                </div>
                </div>                
                <div class="row-fluid">
                <div class="span6">
                    <label>Address 2</label> <input type="text" value="<?php echo set_value('addr2'); ?>" name="addr2" class="span12"/><span class="help-inline"><?php echo form_error('addr2'); ?></span>
                </div>
                </div>                
                <div class="row-fluid">
                    <div class="span6">
                        <select name="utype" class="span12">
                            <option value="0">Admin</option>
                            <option selected="selected" value="1">Call Center Agent</option>
                        </select>
                    </div>
                </div>
			</div>
        		
			<div class="row-fluid">
	<div class="span6">
		<input class="btn btn-gebo span3" type="submit" value="Save" />	
	</div>
</div>
		<?php echo form_close(); ?>
	</div>
              
           
</div> 
	</div>
</div>
   