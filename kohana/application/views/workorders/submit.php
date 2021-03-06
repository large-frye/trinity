<?php 

if (isset($errors)) {
    echo '<div class="message warning"> 
              <span>Something went wrong when submitting this Work Order. Please check the fields again.</span>
          </div>';
}

echo Form::open('', array('class' => 'workorders-submit-form')); ?>

<!-- Work Order Section -->
<div class="section">
	<div class="box">
		<div class="title">Inspection Request</div>
			<div class="content">
				<?php if (!$client) { ?>
				<div class="row">
					<label for="username">Select Client</label>
						<div class="right">
                            <div id="the-basics">
                            	<input name="client" class="typeahead wider-textbox" type="text" placeholder="Clients" 
                            	       value="<?php echo isset($post) ? $post['client'] : null;?>">
                            	<a href="#reset" class="resetTypeahead">Reset Client</a>
                            </div>
						</div>
				</div>
				<?php } else { echo Form::hidden('user_id', $user_id); } ?>
				<div class="row">	
					<label for="type">Inspection Type</label>
						<div class="right">
							<?php echo Form::select('type', $inspection_types, $type_selected); ?>
						</div>
				</div>
			</div>
	</div>
</div>



<!-- Price of Work Order Section -->
<?php if (!$client) { ?>
<!-- <div class="section">
			<div class="box">
				<div class="title">Price of Work Order</div>
				
				<div class="content">
					<div class="row">
						<label for="price">Price</label>
						<div class="right">
							<?php echo Form::input('price', $price->value, array('class' => 'spin-dec')); ?>
							
						</div>
					</div>
				</div>
			</div>
</div> Commenting out for Anthony's updates -->
<?php } ?>

<!-- Insured's Information -->
<div class="section">
		<div class="box">
			<div class="title">Insured's Information</div>
			
			<div class="content">
				
				<div class="row">
					<label for="policy_number">Policy Number</label>

					<div class="right">
						<input type="text" name="policy_number" id="policy_number" 
						    value="<?php echo isset($post) ? $post['policy_number'] : null; ?>">
					</div>
				</div>

				<?php echo isset($errors['policy_number']) ? "<div class=\"row\"><div class=\"right error\">" . 
				                                                  ucfirst($errors['policy_number']) . "</div></div>" : null; ?>
				
				<div class="row">
					<label for="first_name">First Name</label>

					<div class="right">
						<input type="text" name="first_name" id="first_name" 
						    value="<?php echo isset($post) ? $post['first_name'] : null; ?>">
					</div>
				</div>

				<?php echo isset($errors['first_name']) ? "<div class=\"row\"><div class=\"right error\">" . 
				                                                  ucfirst($errors['first_name']) . "</div></div>" : null; ?>
			
				<div class="row">
				
					<label for="last_name">Last Name</label>
				
					<div class="right">
						<input type="text" name="last_name" id="last_name" 
						    value="<?php echo isset($post) ? $post['last_name'] : null; ?>">
					</div>
				</div>

				<?php echo isset($errors['last_name']) ? "<div class=\"row\"><div class=\"right error\">" . 
				                                                  ucfirst($errors['last_name']) . "</div></div>" : null; ?>
			
				<div class="row">
				
					<label for="street_address">Street Address</label>
				
					<div class="right">	
						<input type="text" name="street_address" id="street_address" 
						    value="<?php echo isset($post) ? $post['street_address'] : null; ?>">
					</div>
				</div>

				<?php echo isset($errors['street_address']) ? "<div class=\"row\"><div class=\"right error\">" . 
				                                                  ucfirst($errors['street_address']) . "</div></div>" : null; ?>
			
				<div class="row">

					<label for="city">City</label>

					<div class="right">
						<input type="text" name="city" id="city" 
						    value="<?php echo isset($post) ? $post['city'] : null; ?>">	
					</div>
				</div>

				<?php echo isset($errors['city']) ? "<div class=\"row\"><div class=\"right error\">" . 
				                                                  ucfirst($errors['city']) . "</div></div>" : null; ?>

				<div class="row">

					<label for="state">State</label>

					<div class="right">
						<input type="text" name="state" id="state" 
						    value="<?php echo isset($post) ? $post['state'] : null; ?>">	
					</div>
				</div>

				<?php echo isset($errors['state']) ? "<div class=\"row\"><div class=\"right error\">" . 
				                                                  ucfirst($errors['state']) . "</div></div>" : null; ?>
			
				<div class="row">
					<label for="zip">Zip Code</label>

					<div class="right">
						<input type="text" name="zip" id="zip" 
						    value="<?php echo isset($post) ? $post['zip'] : null; ?>">	
					</div>
				</div>

				<?php echo isset($errors['zip']) ? "<div class=\"row\"><div class=\"right error\">" . 
				                                                  ucfirst($errors['zip']) . "</div></div>" : null; ?>
			
				<div class="row">
					<label for="phone">Phone Number</label>

					<div class="right">
						<input type="text" name="phone" id="phone" 
						    value="<?php echo isset($post) ? $post['phone'] : null; ?>">
					</div>
				</div>

				<?php echo isset($errors['phone']) ? "<div class=\"row\"><div class=\"right error\">" . 
				                                                  ucfirst($errors['phone']) . "</div></div>" : null; ?>	
				
				<div class="row">
					<label for="phone2">Alternate Phone Number</label>

					<div class="right">
						<input type="text" name="phone2" id="phone2" 
						    value="<?php echo isset($post) ? $post['phone2'] : null; ?>">
					</div>
				</div>

				<?php echo isset($errors['phone2']) ? "<div class=\"row\"><div class=\"right error\">" . 
				                                                  ucfirst($errors['phone2']) . "</div></div>" : null; ?>
				
				<div class="row">
					<label for="is_expert">Auto upgrade to fully documented expert inspection when there is no damage found on a basic report</label>

					<div class="right">
						<input type="checkbox" name="is_expert" id="is_expert" value="0"
						     <?php echo isset($post['is_expert']) ? "checked" : null; ?> />
					</div>
				</div>				
			
			</div>	
		</div>
	</div>

	<div class="section">
		<div class="box">
			<div class="title">Inspection Information</div>
			
			<div class="content">
				
				<!-- <div class="row">
					<label for="damage_type">Type of Damage:</label>
	
					<div class="right">
						<input type="text" name="damage_type" id="damage_type" value="">	
					</div>
				</div> -->

				<div class="row">
					<label for="date_of_loss">Requested Date of Inspection</label>

					<div class="right">
						<input readonly="readonly" class="datepicker" type="text" name="requested_date_of_inspection" id="date_of_loss" value=""  placeholder="mm-dd-yyyy">	
					</div>
				</div>
				<div class="row">						
						<label for="id">Requested Time of Inspection: </label>
						<div class="right">
							<?php echo Form::select('hour_of_inspection', $hours, isset($post['hour_of_inspection']) ? $post['hour_of_inspection'] : null, array('class' => 'small')); ?>
						&nbsp;<span style="display:inline-block;margin-top:4px;vertical-align:top;">:</span>&nbsp;	
						    <?php echo Form::select('min_of_inspection', $minutes, isset($post['min_of_inspection']) ? $post['min_of_inspection'] : null, array('class' => 'small')); ?>
						    <?php echo Form::select('am_or_pm', array('am' => 'AM', 'pm' => 'PM'), isset($post['am_or_pm']) ? $post['am_or_pm'] : null, array('class' => 'small')); ?>
						</div>					
					</div>


            <div class="row">
                <label class="interior-inspection" for="interior_inspection">Perform interior inspection if water damage present? </label>

                <div class="right">
                    <?php echo Form::radio('interior_inspection', 1, isset($post['interior_inspection']) && $post['interior_inspection'] == 1 ? true : false, array('id' => 'interior_inspection0')) .
                               Form::label('interior_inspection0', 'Yes') .
                               Form::radio('interior_inspection', 0, isset($post['interior_inspection']) && $post['interior_inspection'] == 1 ? false : true, array('id' => 'interior_inspection1')) .
                               Form::label('interior_inspection1', 'No'); ?>
                </div>
            </div> 

            <div class="row">
                <label for="adjuster_present">Will the adjuster be present? </label>

                <div class="right">
                    <?php echo Form::radio('adjuster_present', 1, isset($post['adjuster_present']) && $post['adjuster_present'] == 1 ? true : false, array('id' => 'adjuster_present0')) .
                               Form::label('adjuster_present0', 'Yes') .
                               Form::radio('adjuster_present', 0, isset($post['adjuster_present']) && $post['adjuster_present'] == 1 ? false : true, array('id' => 'adjuster_present1')) .
                               Form::label('adjuster_present1', 'No'); ?>
                </div>
            </div> 

				<div class="row">	
					<label for="tarped">Tarped</label>

					<div class="right">
						<select name="tarped">
							<option value="0" selected="selected" >No</option>
							<option value="1">Yes</option>
						</select>
					</div>
				</div>		

				<div class="row">
					<label for="estimate_scope_requirement">Estimate/Scope Requirment</label>

					<div class="right">
						<input type="text" name="estimate_scope_requirement" id="estimate_scope_requirement" value="">	
					</div>
				</div>	

				<div class="row">
					<label for="special_instructions">Special Instructions</label>

					<div class="right">
						<textarea name="special_instructions" id="special_instructions"></textarea>
					</div>
				</div>
				
			</div>
		</div>
	</div>

	<div class="section">
		<div class="box">
			
			<div class="content">
				<div class="row">
					<input type="hidden" name="csrf_token" value="{{csrf_token}}">
					<div class="right">
						<button type="submit"><span>Submit</span></button>
					</div>
				</div>
				
			</div>
		</div>
	</div>
<?php echo Form::close(); ?>