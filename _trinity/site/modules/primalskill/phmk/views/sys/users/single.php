<div>
	<div>
		&nbsp;
	</div>
	<form class="form-horizontal" action="<?php echo $post_url ?>" method="post">
	
		<fieldset>
			<legend>Add/Edit User</legend>
			<?php if ( isset($error) ): ?>
				<p class="help-block error"><?php echo $error; ?></p>
			<?php endif; ?>
			
			<div class="control-group <?php if ( isset ($errors['username'] )) echo 'error' ; ?> ">
				<label class="control-label" for="name">Username</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="username" name="username" value="<?php echo ( isset( $user['username'] )? $user['username'] : '' ); ?>">
					<?php if ( isset ($errors['username']) ) echo '<span class="help-inline">'.$errors['username'].'</span>' ?>
				</div>
			</div>

			<div class="control-group <?php if ( isset ($errors['email'] )) echo 'error' ; ?>">
				<label class="control-label" for="name">E-mail</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="email" name="email" value="<?php echo ( isset( $user['email'] )? $user['email'] : '' ); ?>">
					<?php if ( isset ($errors['email']) ) echo '<span class="help-inline">'.$errors['email'].'</span>' ?>
				</div>
			</div>	

			<div class="control-group <?php if ( isset ($errors['password'] )) echo 'error' ; ?>">
				<label class="control-label" for="name">Password</label>
				<div class="controls">
					<input type="password" class="input-xlarge" id="password" name="password">
					<?php if ( isset ($errors['password']) ) echo '<span class="help-inline">'.$errors['password'].'</span>' ?>				
				</div>
			</div>	

			<div class="control-group <?php if ( isset ($errors['confirm-password'] )) echo 'error' ; ?>">
				<label class="control-label" for="name">Confirm Password</label>
				<div class="controls">
					<input type="password" class="input-xlarge" id="confirm-password" name="confirm-password">
					<?php if ( isset ($errors['confirm-password']) ) echo '<span class="help-inline">'.$errors['confirm-password'].'</span>' ?>								
				</div>
			</div>		
			
			  <div class="form-actions">
				<button class="btn btn-primary" type="submit">Submit</button>
			  </div>
		</fieldset>	
	
	</form>
	

</div>