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
            <p><label>First Name</label> <input type="text" name="fname" value="<?php echo $user->fname; ?>" /><?php echo form_error('fname'); ?></p>
            <p><label>Last Name</label> <input type="text"  value="<?php echo $user->lname; ?>" name="lname" /><?php echo form_error('lname'); ?></p>
            <p><label>Middle Name</label> <input type="text" value="<?php echo $user->mname; ?>" name="mname" /><?php echo form_error('mname'); ?></p>
            <p><label>Email</label> <input type="text" value="<?php echo $user->email; ?>" name="email" /><?php echo form_error('email'); ?></p>
            <p><label>Address #1</label> <input type="text" value="<?php echo $user->addr1; ?>" name="addr1" /><?php echo form_error('addr1'); ?></p>
            <p><label>Address #2</label> <input type="text" value="<?php echo $user->addr2; ?>" name="addr2" /><?php echo form_error('addr2'); ?></p>
            <p><label>Access Level</label>
            <?php if ($user->utype == 2):?>
			<input type="radio" name="utype" value="0"/><label>Admin</label>
			<input type="radio" name="utype" value="1"/><label>Call Center Agent</label>
            <input type="radio" name="utype" value="2" checked="checked"/><label>Reserved</label>
            <?php elseif ($user->utype == 1):?>
            <input type="radio" name="utype" value="0"/><label>Admin</label>
			<input type="radio" name="utype" value="1" checked="checked"/><label>Call Center Agent</label>
            <input type="radio" name="utype" value="2"/><label>Reserved</label>
            <?php elseif ($user->utype == 0):?>
            <input type="radio" name="utype" value="0" checked="checked"/><label>Admin</label>
			<input type="radio" name="utype" value="1"/><label>Call Center Agent</label>
            <input type="radio" name="utype" value="2"/><label>Reserved</label>
            <?php endif;?>
			<span><?php echo form_error('utype'); ?></span>
		</p>
            <p><label>Status </label>
			<?php if ($user->status == 1):?>
			<input type="radio" name="status" value="1" checked="checked"/><label>Active</label>
			<input type="radio" name="status" value="0" /><label>InActive</label>
			<?php else :?>
			<input type="radio" name="status" value="1"/><label>Active</label>
			<input type="radio" name="status" value="0" checked="checked"/><label>InActive</label>
			<?php endif;?>
			<span><?php echo form_error('status'); ?></span>
		</p>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <!--<fieldset>
        	<legend></legend><label>Active <input type="checkbox" name="active" <?php echo ($user->active == '1') ? 'checked="checked"' : ''; ?> value="1" /></label></fieldset>-->
        <p><input class="submitbtn" type="submit" value="Save" /></p>
    <?php echo form_close(); ?>
</div>