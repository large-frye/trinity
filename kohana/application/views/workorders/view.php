
	<div class="section hide-print">
		<div class="box">
			<div class="title">Work Order</div>
		</div>
	</div>
	
	<?php if ($admin) { ?>
	<form action="{{post_url}}" method="post" accept-charset="utf-8" id="status-form">
		<div class="section">
			<div class="box hide-print">
				<div class="title">Status</div>
				<div class="content">	
				
					<div class="row">
						<label for="id">Status: </label>
						<div class="right">
							<select name="status">
								{{#statuses}}
									<option value="{{id}}" {{#selected}} selected="selected" {{/selected}}>{{name}}</option>
								{{/statuses}}	
							</select>
						</div>
					</div>	
					
					<div class="row">						
						<label>Date of Inspection: </label>
						<div class="right">
								<input readonly="readonly" class="datepicker" type="text" name="date_of_inspection" id="date_of_inspection" value="{{data.date_of_inspection}}" placeholder="mm-dd-yyyy">
						</div>	

						{{#errors.date_of_inspection}}
							<div class="right error">
								{{errors.date_of_inspection}}
							</div>
						{{/errors.date_of_inspection}}								
					</div>					

					<div class="row">						
						<label for="id">Time of Inspection: </label>
						<div class="right">
							<select name="hour_of_inspection" class="small">
								{{#hours}}
									<option value="{{hour}}" {{#selected}} selected="selected" {{/selected}}>{{hour}}</option>
								{{/hours}}	
							</select>
						&nbsp;<span style="display:inline-block;margin-top:4px;vertical-align:top;">:</span>&nbsp;	
							<select name="min_of_inspection" class="small">
								{{#mins}}
									<option value="{{min}}" {{#selected}} selected="selected" {{/selected}}>{{min}}</option>
								{{/mins}}
							</select>							
						</div>					
					</div>		


					
					<div class="row">									
						<label for="id">Select Inspector: </label>						
						<div class="right">
							<select name="inspector_id">
								<option value="">--Select Inspector--</option>
								{{#inspectors}}
									<option value="{{id}}" {{#selected}} selected="selected" {{/selected}}>{{username}}</option>
								{{/inspectors}}	
							</select>
						</div>	

						{{#errors.inspector_id}}
							<div class="right error">
								{{errors.inspector_id}}
							</div>
						{{/errors.inspector_id}}							
						
					</div>	
					
					<div class="row general-alert" style="display:none;">						
						<label for="id">Alert Comment: </label>
						<div class="right">
								<textarea name="message" id="message"></textarea>
						</div>						
					</div>						
					
					<div class="row">						
						&nbsp;
						<div class="right">
							<input type="hidden" name="csrf_token" value="{{csrf_token}}">
							<button type="submit" name="set_status"><span>Set</span></button>
						</div>
					</div>		
		
				</div>
			</div>
		</div>		
	</form>
		
	
	{{#show_inspection_status}}	
	<form action="{{post_url}}" method="post" accept-charset="utf-8" id="inspection-status-form">
		<div class="section hide-print">
			<div class="box">
				<div class="title">Inspection Status</div>
				<div class="content">	
				
					<div class="row">
						<label for="id">Status: </label>
						<div class="right">
							<select name="inspection_status">
								{{#inspection_statuses}}
									<option value="{{id}}" {{#selected}} selected="selected" {{/selected}}>{{name}}</option>
								{{/inspection_statuses}}	
							</select>
						</div>
					</div>		
					<div class="row inspection-alert" style="display:none;">						
						<label for="id">Alert Comment: </label>
						<div class="right">
								<textarea name="message" id="message"></textarea>
						</div>						
					</div>						
					
					<div class="row">						
						&nbsp;
						<div class="right">
							<input type="hidden" name="csrf_token" value="{{csrf_token}}">
							<button type="submit" name="set_inspection_status"><span>Set</span></button>
						</div>
					</div>		
		
				</div>
			</div>
		</div>	
					
	</form>	
	<?php } ?>

	<div class="section">
		<div class="box">
			<div class="title">Details</div>
			<div class="content">	
				<div class="row">
					<label for="id">Inspection #: </label>
					<div class="right">
						<strong>&nbsp;{{data.id}}</strong>
					</div>
				</div>		
		
				<div class="row">	
					<label for="created_on_utc">Date Received: </label>
					<div class="right">
						<strong>&nbsp;{{data.created_on_utc}}</strong>
					</div>
				</div>
				
				<div class="row">	
					<label for="special_instructions">Special Instructions: </label>
					<div class="right">
						<strong>&nbsp;{{data.special_instructions}}</strong>
					</div>
				</div>				
			</div>
		</div>
	</div>	
	


	<div class="section">
		<div class="box">
			<div class="title">Insured's Information</div>
			
			<div class="content">
			
				<div class="row">
					<label for="phone">Phone #: </label>
					<div class="right">
						<strong>&nbsp;{{data.phone}}</strong>
					</div>
				</div>			
				
				<div class="row">
					<label for="phone">Alternate Phone #: </label>
					<div class="right">
						<strong>&nbsp;{{data.phone2}}</strong>
					</div>
				</div>					
				
				<div class="row">
					<label>Policy Number: </label>
					<div class="right">
						<strong>&nbsp;{{data.policy_number}}</strong>
					</div>
				</div>
				
				<div class="row">
					<label for="first_name">First Name: </label>
					<div class="right">
						<strong>&nbsp;{{data.first_name}}</strong>
					</div>
				</div>
			
				<div class="row">	
					<label for="last_name">Last Name: </label>		
					<div class="right">
						<strong>&nbsp;{{data.last_name}}</strong>
					</div>
				</div>
			
				<div class="row">		
					<label for="street_address">Street Address: </label>			
					<div class="right">	
						<strong>&nbsp;{{data.street_address}}</strong>
					</div>
				</div>
			
				<div class="row">
					<label for="city">City</label>
					<div class="right">
						<strong>&nbsp;{{data.city}}</strong>
					</div>
				</div>
				
				<div class="row">
					<label>State</label>
					<div class="right">
						<strong>&nbsp;{{data.state}}</strong>
					</div>
				</div>

				<div class="row">
					<label for="zip">Zip Code: </label>
					<div class="right">
						<strong>&nbsp;{{data.zip}}</strong>
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
					<label for="damage_type">Type of Damage: </label>
					<div class="right">
						<strong>&nbsp;{{data.damage_type}}</strong>
					</div>
				</div>

				<div class="row">
					<label for="date_of_loss">Date of Loss: </label>
					<div class="right">
						<strong>&nbsp;{{data.date_of_loss}}</strong>
					</div>
				</div>

				<div class="row">	
					<label for="tarped">Tarped: </label>
					<div class="right">
						<strong>&nbsp;{{tarped}}</strong>
					</div>
				</div>

				<div class="row">
					<label for="estimate_scope_requirement">Estimate/Scope Requirment: </label>
					<div class="right">
						<strong>&nbsp;{{data.estimate_scope_requirement}}</strong>
					</div>
				</div>	
				
			</div>
		</div>
	</div>	
	
	{{{v_comments}}}

