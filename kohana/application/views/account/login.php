
<div class="section">
	<?php if(isset($login_failed) && $login_failed) { ?>
   	        <div class="message error">
                <p>Login failed. Please try again.</p>
            </div>
<?php } else if (isset($user_doesnt_exist) && $user_doesnt_exist) { ?>
  
   	        <div class="message error">
                <p>This user has been deleted. Please contact adminstrator to activate account.</p>
            </div>

<?php } ?>
	<div class="box">
		<div class="title">Sign In</div>
		
		<div class="content" style="width:auto;">
			<?php echo Form::open(''); ?>
				
				<div class="row">
					<label for="username">Username</label>
					
					<div class="right">
						<input type="text" name="username" id="username">
					</div>
					
				</div>
				
				<div class="row">
					<label for="password">Password</label>	
					<div class="right">
						<input type="password" name="password" id="password">
					</div>
				</div>
				<div class="row">	
					<div class="right">
						<input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
						<button type="submit"><span>Sign In</span></button>
						&nbsp;&nbsp;
						<a href="/account/forgotpassword" class="forgot-password"><em>Forgot your password?</em></a>
						&nbsp;|&nbsp;
						<!-- <a href="/account/signup" class="forgot-password"><em>Don`t have account? Sign up here</em></a> -->
					</div>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>
</div>