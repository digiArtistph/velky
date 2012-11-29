<div class="toolbar">
                	<div class="titlebar">
                	  <h1>Add New Accident Type</h1>
                      </div>
                      <div class="actionbutton"><a href="<?php echo base_url("master/accident_type"); ?>">Cancel New Accident Type</a></div>
                      <div class="clearthis"></div>
    <?php echo form_open("master/accident_type/validateaddaccidenttype"); ?>
            <p><label class="label">Name</label> <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="textbox"/><?php echo form_error('name'); ?></p>
			<span><?php echo form_error('status'); ?></span>
		</p>
           
        <!--<fieldset>
        	<legend></legend><label>Active <input type="checkbox" name="active" <?php echo set_checkbox('active', '1'); ?> value="1" /></label></fieldset>-->
        <p><input class="button" type="submit" value="Save" /></p>
    <?php echo form_close(); ?>
</div>