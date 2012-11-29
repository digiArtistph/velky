<div class="toolbar">
                	<div class="titlebar">
                	  <h1>Edit Accident Type</h1>
                      </div>
                      <div class="actionbutton"><a href="<?php echo base_url("master/accident_type"); ?>">Cancel Edit Accident Type</a></div>
                      <div class="clearthis"></div>
    <?php echo form_open("master/accident_type/validateeditaccidenttype"); ?>
    	<?php if($accidenttype) : ?>
        	<?php foreach($accidenttype as $atype): ?>
    		<input type="hidden" name="at_id" value="<?php echo $at_id; ?>" />
            <p><label class="label">Name</label> <input type="text" name="name" value="<?php echo $atype->name; ?>" class="textbox"/><?php echo form_error('name'); ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <!--<fieldset>
        	<legend></legend><label>Active <input type="checkbox" name="active" <?php echo ($user->active == '1') ? 'checked="checked"' : ''; ?> value="1" /></label></fieldset>-->
        <p><input class="button" type="submit" value="Save" /></p>
    <?php echo form_close(); ?>
</div>