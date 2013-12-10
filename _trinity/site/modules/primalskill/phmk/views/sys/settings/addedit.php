<form class="form-horizontal" action="<?php echo $form_action; ?>" method="post">
	<fieldset>
		<legend><?php echo ($is_edit)? 'Edit' : 'Add'; ?> Setting</legend>
		
		<?php if ( isset($top_error) ): ?>
			<p class="help-block error"><?php echo $top_error; ?></p>
		<?php endif; ?>
		
		<div class="control-group <?php if ( isset ($errors['name'] )) echo 'error' ; ?> ">
			<label class="control-label" for="name">Name *</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="name" name="name" value="<?php echo ( isset( $data->name )? $data->name : '' ); ?>">
				<?php if ( isset ($errors['name']) ) echo '<span class="help-inline">'.$errors['name'].'</span>' ?>
			</div>
		</div>
		
		<div class="control-group <?php if ( isset ($errors['value'] )) echo 'error' ; ?> ">
			<label class="control-label" for="value">Value *</label>
			<div class="controls">
				<textarea class="input-xlarge" id="value" name="value"><?php echo ( isset( $data->value )? $data->value : '' ); ?></textarea>
				<?php if ( isset ($errors['value']) ) echo '<span class="help-inline">'.$errors['value'].'</span>' ?>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="nice_name">Nice Name</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="nice_name" name="nice_name" value="<?php echo ( isset( $data->nice_name )? $data->nice_name : '' ); ?>">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="description">Description</label>
			<div class="controls">
				<textarea class="input-xlarge" id="description" name="description"><?php echo ( isset( $data->description )? $data->description : '' ); ?></textarea>
			</div>
		</div>
		
		<div class="form-actions">
			<button class="btn btn-primary" type="submit"><?php echo ($is_edit)? 'Edit' : 'Add'; ?></button>
        </div>
	</fieldset>
</form>