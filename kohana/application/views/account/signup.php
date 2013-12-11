<div id="leftside" class="lft-no-margin">
	<?php 

							if(isset($errors)){
								
								echo '<div class="message error"><span>Something went wrong. Please check the fields again.</span></div>';
							}
						?>		
				<div class="plain">		
					<div class="section">	
						<div class="box">
							<div class="title">Create New account</div>
							<?php
								echo Form::open('');
							?>
							<div class="content" style="width:auto;">
								<form action="/account/signup" method="post" accept-charset="utf-8" id="workorder-submit-form">
									<div class="row">
										<label for="first_name">First Name</label>
										<div class="right">
											<input type="text" name="first_name" placeholder="First Name" value="<?php echo isset($post['first_name']) ? $post['first_name'] : null; ?>" />
										</div>	
										<?php
											if(isset($errors['first_name'])){
												echo '<div class="right error">You must provide a First Name</div>';
											}
											?>
									</div>
									<div class="row">
										<label for="last_name">Last Name</label>
										<div class="right">
											<input type="text" name="last_name" placeholder="Last Name" value="<?php echo isset($post['last_name']) ? $post['last_name'] : null; ?>" />
										</div>	
										<?php
											if(isset($errors['last_name'])){
												echo '<div class="right error">You must provide a Last Name</div>';
											}
											?>
									</div>
									<div class="row">
										<label for="phone">Phone Number</label>
										<div class="right">
											<input type="text" name="phone" placeholder="Ex. 01233456789" value="<?php echo isset($post['phone']) ? $post['phone'] : null; ?>" />	
										</div>	
										<?php
											if(isset($errors['phone'])){
												echo '<div class="right error">'.ucfirst($errors['phone']).'</div>';
											}
											?>
									</div>
									<div class="row">
										<label for="geographic_region">Geaographical Region</label>
										<div class="right">
											<input type="text" name="geographic_region" placeholder="Ex.: Greensboro, Fayetteville, Charlotte, Hickory" value="<?php echo isset($post['geographic_region']) ? $post['geographic_region'] : null; ?>" />	
										</div>	
										<?php
											if(isset($errors['geographic_region'])){
												echo '<div class="right error">Geographic Region cannot be left blank</div>';
											}
											?>
									</div>
									<div class="row">
										<label for="username">Username</label>
										<div class="right">
											<input type="text" name="username"  placeholder="Username" value="<?php echo isset($post['username']) ? $post['username'] : null; ?>" />	
										</div>
										<?php
											if(isset($errors['username'])){
												echo '<div class="right error">'.ucfirst($errors['username']).'</div>';
											}
											?>
									</div>
									<div class="row">
										<label for="email">E-mail</label>
										
										<div class="right">
											<input type="text" name="email"  placeholder="Ex.: email@server.com" value="<?php echo isset($post['email']) ? $post['email'] : null; ?>" />	
										</div>	
										<?php
											if(isset($errors['email'])){
												//echo strpos($errors['email'], 'unique_email');
												echo '<div class="right error">'.ucfirst($errors['email']).'</div>';
											}
											?>
									</div>
									<div class="row">
										<label for="insurance_company">Insurance Company</label>
										<div class="right">
												<input type="text" name="insurance_company"  placeholder="Insurance Company" value="<?php echo isset($post['insurance_company']) ? $post['insurance_company'] : null; ?>" />	
										</div>	
										<?php

											if(isset($errors['insurance_company'])){
												echo '<div class="right error">Insurance Company cannot be left blank</div>';
											}
											?>	
									</div>									
									<div class="row">
										<label for="password">Password</label>
										
										<div class="right">
											<input type="password" name="password"  placeholder="Password" value="<?php echo isset($post['password']) ? $post['password'] : null; ?>" />	
										</div>	
										<?php
											if(isset($errors['password'])){
												echo '<div class="right error">'.ucfirst($errors['password']).'</div>';
											}
											?>
									</div>		
									<div class="row">
										<label for="confirm-password">Confirm Password</label>
										
										<div class="right">
												<input type="password" name="confirm-password"  placeholder="Password" value="<?php echo isset($post['confirm-password']) ? $post['confirm-password'] : null; ?>" />	
										</div>
											<?php
											if(isset($errors['confirm-password'])){
												echo '<div class="right error">'.ucfirst($errors['confirm-password']).'</div>';
											}
											?>
									</div>
									<div class="row">	
										<div class="right">
											<input type="hidden" name="csrf_token" value="eqylUOtprRvM8A13A7do8f4RqGv9">
											<button type="submit"><span>Submit</span></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>				
				</div>				
			</div>