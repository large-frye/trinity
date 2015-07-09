
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
	<div class="box login-margin">
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
				<div class="row" style="border-bottom:none">
					<div class="right">
						<input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
						<button type="submit"><span>Sign In</span></button>
						&nbsp;&nbsp;
						<a href="/account/forgotpassword" class="forgot-password"><em>Forgot your password?</em></a>
						<!-- <a href="/account/signup" class="forgot-password"><em>Don`t have account? Sign up here</em></a> -->
					</div>
				</div>
			<?php echo Form::close(); ?>
		</div>
	</div>

	<div class="box login-margin">
		<h3 class="title">Schedule your claim now</h3>
		<div class="content" style="width:auto">
			<h4 class="form-header"><i class="fa fa-envelope"></i>&nbsp;Email Us</h4>
			<p>Bacon ipsum dolor amet tri-tip chuck boudin, turkey leberkas pork belly ribeye cupim pig sausage cow
				jerky porchetta tenderloin.
			</p>
			<div id="line-header"><span><div>OR</div></span></div>
			<h4 class="form-header"><i class="fa fa-list"></i>&nbsp;Please fill out form</h4>
			<form name="insureeForm" id="insuree-form" method="POST" accept-charset="UTF-8">
				<div class="row">
					<label for="username">Claim Number</label>

					<div class="right">
						<input type="text" name="claimNumber" id="username" placeholder="Enter your claim number">
					</div>

				</div>

				<div class="row">
					<label for="password">Insured Name</label>
					<div class="right">
						<input type="text" name="insuredName" id="password" placeholder="Enter your insuree name">
					</div>
				</div>

				<div class="row">
					<label for="password">Insured Phone Number</label>
					<div class="right">
						<input type="text" name="insuredPhoneNumber" placeholder="123-345-6789">
					</div>
				</div>

				<div class="row">
					<label for="password">Street Address</label>
					<div class="right">
						<input type="text" name="streetAddress" placeholder="123 Anywhere Ln.">
					</div>
				</div>

				<div class="row">
					<label for="password">City</label>
					<div class="right">
						<input type="text" name="city" placeholder="Boulder">
					</div>
				</div>

				<div class="row">
					<label for="password">State</label>
					<div class="right">
						<input type="text" name="state" placeholder="Colorado">
					</div>
				</div>

				<div class="row">
					<label for="password">Zip</label>
					<div class="right">
						<input type="text" name="zip" placeholder="12345">
					</div>
				</div>

				<div class="row">
					<label for="password">Adjuster Name</label>
					<div class="right">
						<input type="text" name="adjusterName" placeholder="Enter your adjuster name">
					</div>
				</div>

				<div class="row">
					<label for="password">Adjuster Phone</label>
					<div class="right">
						<input type="text" name="adjusterPhone" placeholder="Enter your adjuster phone #">
					</div>
				</div>

				<div class="row">
					<label for="password">Special Instructions</label>
					<div class="right">
						<textarea name="specialInstructions" placeholder="Please add any special instructions."></textarea>
					</div>
				</div>

				<div class="row">
					<label for="password">Do you desire a specific date and time?</label>
					<div class="right">
						<input type="radio" name="specific-radio-toggle" id="specific-radio-toggle0" onclick="document.getElementById('specific-date').style.display='block';">
						<label for="specific-radio-toggle0">Yes</label>
						<input type="radio" name="specific-radio-toggle" id="specific-radio-toggle1" onclick="document.getElementById('specific-date').style.display='none';">
						<label for="specific-radio-toggle1">No</label>
					</div>
				</div>

				<div id="specific-date" style="display:none">
					<div class="row">
						<label for="password">Requested date of inspection?</label>
						<div class="right">
							<input type="text" name="dateInspection" placeholder="Click to add date">
						</div>
					</div>
					<div class="row">
						<label for="password">Requested time of inspection?</label>
						<div class="right">
							<input type="text" name="timeInspection" placeholder="Add time">
						</div>
					</div>
				</div>

				<button type="submit" style="margin-top:1em"><span>Submit inspection</span></button>
			</form>
		</div>
	</div>
</div>