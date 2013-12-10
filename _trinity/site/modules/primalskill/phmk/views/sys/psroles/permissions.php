<form class="form-horizontal" action="<?php echo $form_action; ?>" method="post">
	<fieldset>
		<legend><?php echo ($is_edit)? 'Edit' : 'Add'; ?> Permission</legend>
		<?php if ( isset($error['exception']) ): ?>
			<p class="help-block error"><?php echo $error['exception']; ?></p>
		<?php endif; ?>
		<div class="control-group">
			<label class="control-label" for="code">Permission Variable <span style="color:red;">*<span></label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="variable" name="variable" value="<?php echo (isset($data['variable']))? $data['variable'] : ''; ?>">
			</div>
			<?php if ( isset($error['variable']) ): ?>
				<p class="help-block error"><?php echo $error['variable']; ?></p>
			<?php endif; ?>
		</div>
		
		<div class="control-group">
            <label for="description" class="control-label">Permission Description (keep it short) </label>
            <div class="controls">
              <textarea rows="3" cols="12" id="description" class="input-xlarge" name="description"><?php echo (isset($data['description']))? $data['description'] : ''; ?></textarea>
            </div>
          </div>
		
		<div class="form-actions">
			<button class="btn btn-primary" type="submit"><?php echo ($is_edit)? 'Edit' : 'Add'; ?></button>
        </div>
	</fieldset>
</form>