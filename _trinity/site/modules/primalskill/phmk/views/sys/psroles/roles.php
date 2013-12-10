<form class="form-horizontal" action="<?php echo $form_action; ?>" method="post">
	<fieldset>
		<legend><?php echo ($is_edit)? 'Edit' : 'Add'; ?> Role</legend>
		<?php if ( isset($error['exception']) ): ?>
			<p class="help-block error"><?php echo $error['exception']; ?></p>
		<?php endif; ?>
		<div class="control-group">
			<label class="control-label" for="code">Role Code <span style="color:red;">*<span></label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="code" name="code" value="<?php echo (isset($data['code']))? $data['code'] : ''; ?>">
			</div>
			<?php if ( isset($error['code']) ): ?>
				<p class="help-block error"><?php echo $error['code']; ?></p>
			<?php endif; ?>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="name">Role Name</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="name" name="name" value="<?php echo (isset($data['name']))? $data['name'] : ''; ?>">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="type">Role Type </label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="type" name="type" value="<?php echo (isset($data['type']))? $data['type'] : ''; ?>">
			</div>
		</div>
		
		<div class="form-actions">
			<button class="btn btn-primary" type="submit"><?php echo ($is_edit)? 'Edit' : 'Add'; ?></button>
        </div>
	</fieldset>
</form>