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
            <p><label>Name</label> <input type="text" name="name" value="<?php echo $atype->name; ?>" /><?php echo form_error('name'); ?></p>
            <p><label>Status </label>
			<?php if ($atype->status == 1):?>
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