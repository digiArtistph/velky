<div class="toolbar">
                	<div class="titlebar">
                	  <h1>Add New User</h1>
                      </div>
                      <div class="actionbutton"><a href="<?php echo base_url("master/users"); ?>">Cancel New User</a></div>
                      <div class="clearthis"></div>
    <?php echo form_open("master/users/validatenewuser"); ?>
            <p><label class="label">First Name</label> <input type="text" name="fname" value="<?php echo set_value('fname'); ?>" class="textbox"/><?php echo form_error('fname'); ?></p>
            <p><label class="label">Last Name</label> <input type="text"  value="<?php echo set_value('lname'); ?>" name="lname" class="textbox"/><?php echo form_error('lname'); ?></p>
            <p><label class="label">Middle Name</label> <input type="text" value="<?php echo set_value('mname'); ?>" name="mname" class="textbox"/><?php echo form_error('mname'); ?></p>
            <p><label class="label">Password</label> <input type="password" value="<?php echo set_value('pword'); ?>" name="pword" class="textbox"/><?php echo form_error('pword'); ?></p>
            <p><label class="label">Confirm Password</label> <input type="password" value="<?php echo set_value('pword2'); ?>" name="pword2" class="textbox"/><?php echo form_error('pword2'); ?></p>
            <p>
              <label class="label">Email</label> <input type="text" value="<?php echo set_value('email'); ?>" name="email" class="textbox"/><?php echo form_error('email'); ?></p>
              <p><label class="label">Address #1</label> <input type="text" value="<?php echo set_value('addr1'); ?>" name="addr1" class="textbox"/><?php echo form_error('addr1'); ?></p>
              <p><label class="label">Address #2</label> <input type="text" value="<?php echo set_value('addr2'); ?>" name="addr2" class="textbox"/><?php echo form_error('addr2'); ?></p>
            <p><label class="label">Access Level</label>
			<input type="radio" name="utype" value="0" class="radiobutton"/><label class="label">Admin</label>
			<input type="radio" name="utype" value="1" class="radiobutton"/><label class="label">Call Center Agent</label>
            <input type="radio" name="utype" value="2" class="radiobutton"/><label class="label">Reserved</label>
			<span><?php echo form_error('utype'); ?></span>
		</p>
           
        <!--<fieldset>
        	<legend></legend><label>Active <input type="checkbox" name="active" <?php echo set_checkbox('active', '1'); ?> value="1" /></label></fieldset>-->
        <p><input class="button" type="submit" value="Save" /></p>
    <?php echo form_close(); ?>
</div>