<div id="leftside" class="lft-no-margin">
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
											<input type="text" name="first_name" id="first_name" value="" placeholder="First Name">
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
											<input type="text" name="last_name" id="last_name" value="" placeholder="Last Name">
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
											<input type="text" name="phone" id="phone" value="" placeholder="Ex. 01233456789">
										</div>	
										<?php

											
											if(isset($errors['phone'])){
												echo strstr($errors['phone'],'Default');

												echo '<div class="right error">'.ucfirst($errors['phone']).'</div>';

											}

											?>
									</div>
									
									
									<div class="row">
										<label for="geographic_region">Geaographical Region</label>
										
										<div class="right">
											<input type="text" name="geographic_region" id="geographic_region" value="" placeholder="Ex.: Greensboro, Fayetteville, Charlotte, Hickory">
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
											<input type="text" name="username" id="username" value="" placeholder="Username">
										</div>
										<?php

											if(isset($errors['username'])){
												echo '<div class="right error">Username cannot be empty</div>';

											}

											?>	
									</div>
									
									
									<div class="row">
										<label for="email">E-mail</label>
										
										<div class="right">
											<input type="text" name="email" id="email" value="" placeholder="Ex.: email@server.com">
										</div>	
											<?php

											if(isset($errors['email'])){
												echo '<div class="right error">Please enter a valid email</div>';

											}

											?>	
									</div>
									
									
									<div class="row">
										<label for="insurance_company">Insurance Company</label>
										
										<div class="right">
											<input type="text" name="insurance_company" id="insurance_company" value="" placeholder="Insurance Company">
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
											<input type="password" name="password" id="password">
										</div>	
										<?php

											if(isset($errors['password'])){
												echo '<div class="right error">Password must not be empty</div>';

											}

											?>	

									</div>
									
									
									<div class="row">
										<label for="confirm-password">Confirm Password</label>
										
										<div class="right">
											<input type="password" name="confirm-password" id="confirm-password">
										</div>	
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
					</div>				</div>				
			</div>