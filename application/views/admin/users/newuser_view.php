<div class="toolbar">
                	<div class="titlebar">
                	  <h1>Add New User</h1>
                      </div>
                      <div class="actionbutton"><a href="<?php echo base_url("master/users/section/users"); ?>">Cancel New User</a></div>
                      <div class="clearthis"></div>
    <?php echo form_open("master/users/validatenewuser"); ?>
            <p><label>First Name</label> <input type="text" name="fname" value="<?php echo set_value('fname'); ?>" /><?php echo form_error('fname'); ?></p>
            <p><label>Last Name</label> <input type="text"  value="<?php echo set_value('lname'); ?>" name="lname" /><?php echo form_error('lname'); ?></p>
            <p><label>Middle Name</label> <input type="text" value="<?php echo set_value('mname'); ?>" name="mname" /><?php echo form_error('mname'); ?></p>
            <p><label>Password</label> <input type="password" value="<?php echo set_value('pword'); ?>" name="pword" /><?php echo form_error('pword'); ?></p>
            <p><label>Confirm Password</label> <input type="password" value="<?php echo set_value('pword2'); ?>" name="pword2" /><?php echo form_error('pword2'); ?></p>
            <p>
              <label>Email</label> <input type="text" value="<?php echo set_value('email'); ?>" name="email" /><?php echo form_error('email'); ?></p>
            <p><label>Access Level</label> <input type="text" value="<?php echo set_value('utype'); ?>" name="utype" /><?php echo form_error('utype'); ?></p>
           
        <!--<fieldset>
        	<legend></legend><label>Active <input type="checkbox" name="active" <?php echo set_checkbox('active', '1'); ?> value="1" /></label></fieldset>-->
        <p><input class="submitbtn" type="submit" value="Save" /></p>
    <?php echo form_close(); ?>
</div>