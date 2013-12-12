	<?php 
							if(isset($errors)){

								echo '<div class="section"><div class="message error"><span>No user with such email</span></div></div>';
							}
						?>	
<div id="leftside" class="lft-no-margin">
				<div class="plain">				
					<div class="section">
						<div class="box">
							<div class="title">Recover Password</div>
							
							<div class="content" style="width:auto;">
								<form action="/account/forgotpassword" method="post" accept-charset="utf-8" id="login-form">
									
									<div class="row">
										<label for="email">E-mail Address</label>
										
										<div class="right">
											<input type="text" name="email" id="email">
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