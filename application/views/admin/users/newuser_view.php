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
              <p><label>Address #1</label> <input type="text" value="<?php echo set_value('addr1'); ?>" name="addr1" /><?php echo form_error('addr1'); ?></p>
              <p><label>Address #2</label> <input type="text" value="<?php echo set_value('addr2'); ?>" name="addr2" /><?php echo form_error('addr2'); ?></p>
            <p><label>Access Level</label>
			<input type="radio" name="utype" value="0"/><label>Admin</label>
			<input type="radio" name="utype" value="1"/><label>Call Center Agent</label>
            <input type="radio" name="utype" value="2"/><label>Reserved</label>
			<span><?php echo form_error('utype'); ?></span>
		</p>
            <p><label>Status </label>
			<input type="radio" name="status" value="1"/><label>Active</label>
			<input type="radio" name="status" value="0"/><label>InActive</label>
			<span><?php echo form_error('status'); ?></span>
		</p>
           
        <!--<fieldset>
        	<legend></legend><label>Active <input type="checkbox" name="active" <?php echo set_checkbox('active', '1'); ?> value="1" /></label></fieldset>-->
        <p><input class="submitbtn" type="submit" value="Save" /></p>
    <?php echo form_close(); ?>
</div>