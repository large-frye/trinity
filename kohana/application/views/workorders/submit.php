<?php echo Form::open('', array('class' => 'workorders-submit-form')); ?>
<div class="section">
						<div class="box">
							<div class="title">Work Order</div>
							<div class="content">
									<div class="row">
										<label for="username">Select Client</label>

										<div class="right">
											<?php 
												echo Form::select('user_id', $clients); 
											?>
										</div>
									</div>		
						
						
								<div class="row">	

									<label for="type">Work Order Type</label>

									<div class="right">
										<select name="type">
											<option value="0"  selected="selected" >Basic Inspections</option>
											<option value="1" >Expert Inspections</option>
											<option value="2" >Engineer Reports</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>