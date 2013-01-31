<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Edit User</h2>
        <a class="ext_disabled btn" href="<?php echo base_url("master/users"); ?>">Cancel Edit User</a>
    </div>
    
</div>

<div class="row-fluid">
	<div class="span12">
    	<?php echo form_open("master/users/validateedituser"); ?>
        
        <?php if($users) : ?>
        	<?php foreach($users as $user): ?>
            <div class="formSep">
            	<div class="row-fluid">
                	<div class="span6">
                	<input type="hidden" name="u_id" value="<?php echo $u_id; ?>" />
                    <label>First Name</label> <input type="text" name="fname" value="<?php echo $user->fname; ?>" class="span12"/><span class="help-inline"><?php echo form_error('fname'); ?></span>
                    </div>
                </div>
              	
                <div class="row-fluid">
                	<div class="span6">
                    	<label>Last Name</label> <input type="text"  value="<?php echo $user->lname; ?>" name="lname" class="span12"/><span class="help-inline"><?php echo form_error('lname'); ?></span>                    </div>
                </div>
                
                <div class="row-fluid">
                	<div class="span6">
                <label>Middle Name</label> <input type="text" value="<?php echo $user->mname; ?>" name="mname" class="span12"/><span class="help-inline"><?php echo form_error('mname'); ?></span>
                </div>
                </div>
                
                <div class="row-fluid">
                	<div class="span6">
                <label>Email</label> <input type="text" value="<?php echo $user->email; ?>" name="email" class="span12"/><span class="help-inline"><?php echo form_error('email'); ?></span>
                	</div>
                </div>
                
                <div class="row-fluid">
                	<div class="span6">
                <label>Address 1</label> <input type="text" value="<?php echo $user->addr1; ?>" name="addr1" class="span12"/><span class="help-inline"><?php echo form_error('addr1'); ?></span>
                	</div>
                </div>
                
                <div class="row-fluid">
                	<div class="span6">
                <label>Address 2</label> <input type="text" value="<?php echo $user->addr2; ?>" name="addr2" class="span12"/><span class="help-inline"><?php echo form_error('addr2'); ?></span>
                	</div>
                </div>
                
			</div>
    		
	<?php endforeach; ?>
<?php endif; ?>

<div class="row-fluid" >
        <div class="span6"><input class="span3 btn" type="submit" value="Save" /></div>
</div>
    <?php echo form_close(); ?>
    </div>
</div>

                	  

    
    	
</div>