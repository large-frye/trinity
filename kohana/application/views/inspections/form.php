<form enctype="multipart/form-data" action="" method="post" accept-charset="utf-8" id="inspection-form">
<?php echo Form::hidden('csrf', Security::token()); ?>
<?php print_r($errors); ?>
	
<div class="section">
    <?php if (isset($success)) { 
	    echo "<div class=\"message info\">
	              <p>" . $success . "</p>
	          </div>";
    } ?>

	<?php if (isset($errors)) { 
	    echo "<div class=\"message error\">" ;
	    echo is_array($errors) ? "<p>There were some errors on your form submission. Please fix them before submitting again.</p>" : $errors; 
	    echo "</div>";
    } ?>
    
    <div class="box">
    	<div class="title">Auto Upgrade to Expert Inspection Available</div>
    	<div class="content">
    		<div class="row">
				<label for="auto_upgrade">Upgrade to Expert Inspection? </label>

				<div class="right">
					<?php echo Form::radio('type', 1, isset($data['type']) && $data['type'] == 1 ? true : false, 
						                   array('id' => 'type0', 'class' => 'auto-upgrade')) .
					           Form::label('type0', 'Yes') .
					           Form::radio('type', 0, isset($data['type']) && $data['type'] == 1 ? false : true, 
					           	           array('id' => 'type1', 'class' => 'auto-upgrade')) .
					           Form::label('type1', 'No'); ?>

					<?php echo $data['type'] == 1 ? "<span class=\"margin-left italic\">This inspection has been auto-upgraded to expert.</span>" : null; ?>
				</div>

			</div>
	    </div>
	</div>

	<div class="box">
		<div class="title">Workorder Information</div>
		
		<div class="content">
						
			<div class="row">
				<label for="date_of_inspection">Date of Inspection: </label>

				<div class="right">
					<?php echo date("m-d-Y", strtotime($workorder_details->date_of_inspection)) . 
					               " / " . $workorder_details->time_of_inspection; ?>&nbsp;
				</div>
			</div>
			
			<div class="row">
				<label>Policy Number: </label>

				<div class="right">	
					<?php echo $workorder_details->policy_number; ?>&nbsp;
				</div>
			</div>
			
			<div class="row">
				<label for="first_name">First Name</label>

				<div class="right">
					<?php echo $workorder_details->first_name; ?>&nbsp;
				</div>
			</div>
			
			<div class="row">
				<label for="last_name">Last Name</label>

				<div class="right">
					<?php echo $workorder_details->last_name; ?>&nbsp;
				</div>
			</div>
			
			<div class="row">
				<label for="street_address">Street Address: </label>

				<div class="right">	
					<?php echo $workorder_details->street_address; ?>&nbsp;
				</div>
			</div>

			<div class="row">
				<label for="city">City: </label>

				<div class="right">	
					<?php echo $workorder_details->city; ?>&nbsp;
				</div>
			</div>
			
			<div class="row">
				<label for="state">State: </label>

				<div class="right">	
					<?php echo $workorder_details->state; ?>&nbsp;
				</div>
			</div>

			<div class="row">
				<label for="zip">Zip Code: </label>

				<div class="right">
					<?php echo $workorder_details->zip; ?>&nbsp;
				</div>
			</div>

			<div class="row">
				<label for="phone">Phone Number</label>

				<div class="right">
					<?php echo $workorder_details->phone; ?>&nbsp;
				</div>
			</div>
			
			<div class="row">
				<label for="phone2">Alternate Phone Number</label>

				<div class="right">
					<?php echo $workorder_details->phone2; ?>&nbsp;
				</div>
			</div>
		</div>
	</div>

	<?php echo $form; ?>

<div class="section">
	<div class="box">
		<div class="title">General</div>
		
		<div class="content">
			
			<div class="row">

				<label for="general_comments">Comments</label>

				<div class="right">
					<textarea name="general_comments"></textarea>
				</div>
			</div>
			
			<div class="row">
				<button class="blue" type="submit"><span>Save</span></button>
			</div>
			
		</div>
	</div>
</div>


</form>

