<div class="section">
					<div class="box">
						<div class="title">General Settings</div>	
						<div class="content">

							<?php 
								echo Form::open('');

								 foreach($emailTemplate as $email) { 	
								 	echo "<div class=\"row\">";
								 	echo "<label for=".$email->name.">".$email->nice_name."</label>";
		         					echo "<div class=\"right\">";
		         					
		         					echo "<textarea name=".$email->id." id=".$email->name." class=\"grow\" style=\"height: 162px; overflow: hidden;\">";
		         					echo $email->value;
		         					echo "</textarea>";
		         					echo "<p><em><strong>".$email->description."</strong></em></p>";
		         					echo "</div></div>";
								}
							?>
						<div class="row">
									<div class="right">
										<button type="submit" name="submit"><span>Save changes</span></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>