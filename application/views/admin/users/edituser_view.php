<div class="toolbar">
                	<div class="titlebar">
                	  <h1>Edit User</h1>
                      </div>
                      <div class="actionbutton"><a href="<?php echo base_url("master/users"); ?>">Cancel Edit User</a></div>
                      <div class="clearthis"></div>
    <?php echo form_open("master/users/validateedituser"); ?>
    	<?php if($users) : ?>
        	<?php foreach($users as $user): ?>
    		<input type="hidden" name="u_id" value="<?php echo $u_id; ?>" />
            <p><label class="label">First Name</label> <input type="text" name="fname" value="<?php echo $user->fname; ?>" class="textbox"/><?php echo form_error('fname'); ?></p>
            <p><label class="label">Last Name</label> <input type="text"  value="<?php echo $user->lname; ?>" name="lname" class="textbox"/><?php echo form_error('lname'); ?></p>
            <p><label class="label">Middle Name</label> <input type="text" value="<?php echo $user->mname; ?>" name="mname" class="textbox"/><?php echo form_error('mname'); ?></p>
            <p><label class="label">Email</label> <input type="text" value="<?php echo $user->email; ?>" name="email" class="textbox"/><?php echo form_error('email'); ?></p>
            <p><label class="label">Address #1</label> <input type="text" value="<?php echo $user->addr1; ?>" name="addr1" class="textbox"/><?php echo form_error('addr1'); ?></p>
            <p><label class="label">Address #2</label> <input type="text" value="<?php echo $user->addr2; ?>" name="addr2" class="textbox"/><?php echo form_error('addr2'); ?></p>
            <p><label class="label">Access Level</label>
            <?php if ($user->utype == 2):?>
			<input type="radio" name="utype" value="0" class="radiobutton"/><label class="label">Admin</label>
			<input type="radio" name="utype" value="1" class="radiobutton"/><label class="label">Call Center Agent</label>
            <input type="radio" name="utype" value="2" class="radiobutton" checked="checked"/><label class="label">Reserved</label>
            <?php elseif ($user->utype == 1):?>
            <input type="radio" name="utype" value="0" class="radiobutton"/><label class="label">Admin</label>
			<input type="radio" name="utype" value="1" class="radiobutton" checked="checked"/><label class="label">Call Center Agent</label>
            <input type="radio" name="utype" value="2" class="radiobutton"/><label class="label">Reserved</label>
            <?php elseif ($user->utype == 0):?>
            <input type="radio" name="utype" value="0" class="radiobutton" checked="checked"/><label class="label">Admin</label>
			<input type="radio" name="utype" value="1" class="radiobutton"/><label class="label">Call Center Agent</label>
            <input type="radio" name="utype" value="2" class="radiobutton"/><label class="label">Reserved</label>
            <?php endif;?>
			<span><?php echo form_error('utype'); ?></span>
		</p>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <!--<fieldset>
        	<legend></legend><label>Active <input type="checkbox" name="active" <?php echo ($user->active == '1') ? 'checked="checked"' : ''; ?> value="1" /></label></fieldset>-->
        <p><input class="button" type="submit" value="Save" /></p>
    <?php echo form_close(); ?>
</div>