<div>
	<div>
		&nbsp;
	</div>
	<form class="form-horizontal" action="<?php echo Route::url('sys', array('controller' => 'users', 'action' => 'resetpw', 'id' => $user['id'])); ?>" method="post">
	
		<fieldset>
			<legend>Reset password for <?php echo $user['username'] ?></legend>
			<?php if ( isset($error) ): ?>
				<p class="help-block error"><?php echo $error; ?></p>
			<?php endif; ?>
			
			<div class="control-group <?php if ( isset ($errors['password'] )) echo 'error' ; ?> ">
				<label class="control-label" for="password">Type Password</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="password" name="password" value="<?php if ( isset($data['password'])) echo $data['password'];   ?>">
					<input class="btn btn-primary" name="generate" type="submit" value="Generate">
					<?php if ( isset ($errors['password']) ) echo '<span class="help-inline">'.$errors['password'].'</span>' ?>
				</div>
			</div>	
			
			  <div class="form-actions">
				<input class="btn btn-primary" type="submit" name="reset" value="Reset">
			  </div>
		</fieldset>	
	
	</form>
	

</div>