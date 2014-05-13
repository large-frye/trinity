<?php if (isset($success)) {
	echo "<div class=\"message info\"><span>" . $success . "</span></div>";
} else if (isset($error)) {
    echo "<div class=\"message error\"><span>" . $error . "</span></div>";
}?>
	<div class="section hide-print">
		<div class="box">
			<div class="title">Work Order</div>
		</div>
	</div>
	
	<?php if ($admin) { ?>
	<?php echo Form::open(''); ?>
		<div class="section">
			<div class="box hide-print">
				<div class="title">Status</div>
				<div class="content">	
				
					<div class="row">
						<label for="id">Status: </label>
						<div class="right">
							<?php echo Form::select('status', $workorder_statuses, $details->status); ?>
						</div>
					</div>	
					
					<div class="row">						
						<label>Date of Inspection: </label>
						<div class="right">
							    <?php echo Form::input('date_of_inspection', $details->date_of_inspection, array('placeholder' => 'mm-dd-yyyy',
							    	                                                                             'readonly'    => 'readonly',
							    	                                                                             'class'       => 'datepicker')); ?>
						</div>
						<!-- <div class="right error"></div> -->
					</div>					

					<div class="row">						
						<label for="id">Time of Inspection: </label>
						<div class="right">
							<?php echo Form::select('hour_of_inspection', $hours, isset($details->time_of_inspection) ?
							                                                      date('h', strtotime($details->time_of_inspection)) : '01', array('class' => 'small')); ?>
						&nbsp;<span style="display:inline-block;margin-top:4px;vertical-align:top;">:</span>&nbsp;	
						    <?php echo Form::select('min_of_inspection', $minutes, date('i', strtotime($details->time_of_inspection)), array('class' => 'small')); ?>
						    <?php 
                            $ampm = isset($post['am_or_pm']) ? $post['am_or_pm'] : 'am';
                            $ampm = isset($details->time_of_inspection) && date('H', strtotime($details->time_of_inspection)) > 12 ? 'pm' : 'am';

						    echo Form::select('am_or_pm', array('am' => 'AM', 'pm' => 'PM'), $ampm, array('class' => 'small')); ?>
						</div>					
					</div>		


					
					<div class="row">									
						<label for="id">Select Inspector: </label>						
						<div class="right">
							<?php echo Form::select('inspector_id', $inspectors, $details->inspector_id); ?>
						</div>							
						
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
	<?php } if ($admin || $inspector) { ?>

	<?php echo Form::open(''); ?>
		<div class="section hide-print">
			<div class="box">
				<div class="title">Inspection Status</div>
				<div class="content">	
				
					<div class="row">
						<label for="id">Status: </label>
						<div class="right">
							<?php echo Form::select('inspection_status', $inspection_statuses, $details->inspection_status); ?>
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
						<strong>&nbsp;<?php echo $details->id; ?></strong>
					</div>
				</div>		
		
				<div class="row">	
					<label for="created_on_utc">Date Received: </label>
					<div class="right">
						<strong>&nbsp;<?php echo $details->created_on_utc; ?></strong>
					</div>
				</div>
				
				<div class="row">	
					<label for="special_instructions">Special Instructions: </label>
					<div class="right">
						<strong>&nbsp;<?php echo $details->special_instructions; ?></strong>
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
						<strong>&nbsp;<?php echo $details->phone; ?></strong>
					</div>
				</div>			
				
				<div class="row">
					<label for="phone">Alternate Phone #: </label>
					<div class="right">
						<strong>&nbsp;<?php echo $details->phone2; ?></strong>
					</div>
				</div>					
				
				<div class="row">
					<label>Policy Number: </label>
					<div class="right">
						<strong>&nbsp;<?php echo $details->policy_number; ?></strong>
					</div>
				</div>
				
				<div class="row">
					<label for="first_name">First Name: </label>
					<div class="right">
						<strong>&nbsp;<?php echo $details->first_name; ?></strong>
					</div>
				</div>
			
				<div class="row">	
					<label for="last_name">Last Name: </label>		
					<div class="right">
						<strong>&nbsp;<?php echo $details->last_name; ?></strong>
					</div>
				</div>
			
				<div class="row">		
					<label for="street_address">Street Address: </label>			
					<div class="right">	
						<strong>&nbsp;<?php echo $details->street_address; ?></strong>
					</div>
				</div>
			
				<div class="row">
					<label for="city">City</label>
					<div class="right">
						<strong>&nbsp;<?php echo $details->city; ?></strong>
					</div>
				</div>
				
				<div class="row">
					<label>State</label>
					<div class="right">
						<strong>&nbsp;<?php echo $details->state; ?></strong>
					</div>
				</div>

				<div class="row">
					<label for="zip">Zip Code: </label>
					<div class="right">
						<strong>&nbsp;<?php echo $details->zip; ?></strong>
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
					<label for="expert_upgrade">Auto-upgrade to expert: </label>
					<div class="right">
						<strong><?php echo $details->is_expert == 0 ? "No" : "Yes"; ?></strong>
					</div>
				</div>
				
				<div class="row">
					<label for="damage_type">Type of Damage: </label>
					<div class="right">
						<strong><?php echo $details->damage_type; ?></strong>
					</div>
				</div>

				<div class="row">
					<label for="date_of_loss">Requested Date: </label>
					<div class="right">
						<strong><?php echo $details->date_of_loss; ?></strong>
					</div>
				</div>

				<div class="row">
					<label for="time_of_loss">Requested Time: </label>
					<div class="right">
						<strong><?php echo $details->time_of_loss; ?></strong>
					</div>
				</div>

				<div class="row">
					<label for="interior_inspection">Interior Inspection (Water Damage): </label>
					<div class="right">
						<strong><?php echo $details->interior_inspection == 0 ? "No" : "Yes"; ?></strong>
					</div>
				</div>

				<div class="row">
					<label for="adjuster_present">Adjuster Present: </label>
					<div class="right">
						<strong><?php echo $details->adjuster_present == 0 ? "No" : "Yes"; ?></strong>
					</div>
				</div>

				<div class="row">	
					<label for="tarped">Tarped: </label>
					<div class="right">
						<strong><?php echo $details->tarped == 0 ? "No" : "Yes"; ?></strong>
					</div>
				</div>

				<div class="row">
					<label for="estimate_scope_requirement">Estimate/Scope Requirment: </label>
					<div class="right">
						<strong><?php echo $details->estimate_scope_requirement; ?></strong>
					</div>
				</div>	
				
			</div>
		</div>
	</div>	
	
	<form action="" method="post" accept-charset="utf-8" id="comments-form">
	<div class="section hide-print">
		<div class="box">
			<div class="title">Comments</div>
			
			<div class="content">			
					<?php

					if(isset($messages)){
						foreach($messages as $message) { 
						echo "<div class=\"row\"><div><strong>".$message->username."  -  </strong>".date("d-m-Y H:i:s",strtotime($message->date_time_utc))."</div>";
						echo "<div>".$message->message."</div></div>";

						}
					}
					?>
				<div class="row">
					<label for="message">Message: </label>

					<div class="right">
						<textarea name="message"></textarea>
					</div>

				</div>
				<div class="row">
					<input type="hidden" name="csrf_token" value="eqylUOtprRvM8A13A7do8f4RqGv9">
					<div class="right">
						<button type="submit" name="add_comment"><span>Comment</span></button>
					</div>
				</div>		
		</div>
	</div>
</form>

