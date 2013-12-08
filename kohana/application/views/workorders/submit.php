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
		<div class="title">Work Order</div>
			<div class="content">
				<div class="row">
					<label for="username">Select Client</label>
						<div class="right">
							<?php echo Form::select('user_id', $clients); ?>
						</div>
				</div>
				<div class="row">	
					<label for="type">Work Order Type</label>
						<div class="right">
							<?php echo Form::select('type', $inspection_types); ?>
						</div>
				</div>
			</div>
	</div>
</div>



<!-- Price of Work Order Section -->
<div class="section">
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
</div>

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
				
				<div class="row">
					<label for="damage_type">Type of Damage:</label>
	
					<div class="right">
						<input type="text" name="damage_type" id="damage_type" value="">	
					</div>
				</div>

				<div class="row">
					<label for="date_of_loss">Date of Loss</label>

					<div class="right">
						<input readonly="readonly" class="datepicker" type="text" name="date_of_loss" id="date_of_loss" value=""  placeholder="mm-dd-yyyy">	
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
						<input type="text" name="special_instructions" id="special_instructions" value="">
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