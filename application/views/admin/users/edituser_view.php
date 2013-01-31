<div class="row-fluid">
	<div class="span12">
    	<h2 class="heading">Edit User</h2>
        <!--<a class="ext_disabled btn" href="<?php echo base_url("master/users"); ?>">Cancel Edit User</a>-->
    </div>
    
</div>

<div class="row-fluid">
	<div class="span6">
    	<?php echo form_open("master/users/validateedituser", array('class' => 'form-vertical')); ?>
       		<input type="hidden" name="u_id" value="<?php echo $u_id; ?>" />
        <?php if($users) : ?>
        	<?php foreach($users as $user): ?>
            	<div class="control-group formSep">
                	<label>First Name</label>
                	<div class="controls">                	
                     	<input type="text" name="fname" value="<?php echo $user->fname; ?>" class="input-xlarge"/><span class="help-inline"><?php echo form_error('fname'); ?></span>
                    </div>
                </div>
              	
                <div class="control-group formSep">
                	<label>Last Name</label>
                	<div class="controls">
						<input type="text"  value="<?php echo $user->lname; ?>" name="lname" class="input-xlarge"/><span class="help-inline"><?php echo form_error('lname'); ?></span>                    </div>
                </div>
                
                <div class="control-group formSep">
                	<label>Middle Name</label>
                	<div class="controls">
                 		<input type="text" value="<?php echo $user->mname; ?>" name="mname" class="input-xlarge"/><span class="help-inline"><?php echo form_error('mname'); ?></span>
                </div>
                </div>
                
                <div class="control-group formSep">
                	<label>Email</label>
                	<div class="controls">
                 		<input type="text" value="<?php echo $user->email; ?>" name="email" class="input-xlarge"/><span class="help-inline"><?php echo form_error('email'); ?></span>
                	</div>
                </div>
                
                <div class="control-group formSep">
                	<label>Address 1</label>
                	<div class="controls">
                 		<input type="text" value="<?php echo $user->addr1; ?>" name="addr1" class="input-xlarge"/><span class="help-inline"><?php echo form_error('addr1'); ?></span>
                	</div>
                </div>
                
                <div class="control-group formSep">
                	<label>Address 2</label>
                	<div class="controls">
                 		<input type="text" value="<?php echo $user->addr2; ?>" name="addr2" class="input-xlarge"/><span class="help-inline"><?php echo form_error('addr2'); ?></span>
                	</div>
                </div>
                
	<?php endforeach; ?>
<?php endif; ?>

<div class="control-group" >
	<input class="span3 btn btn-gebo" type="submit" value="Save" /> <a class="ext_disabled btn" href="<?php echo base_url("master/users"); ?>">Cancel</a></div>

    <?php echo form_close(); ?>
    </div>
</div>

                	  

    
    	
</div>