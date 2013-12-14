<form enctype="multipart/form-data" action="{{post_url}}/{{workorder_data.id}}" method="post" accept-charset="utf-8" id="inspection-form">
	
<div class="section">
	<div class="box">
		<div class="title">Inspection Report</div>
		
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

			<div class="row">
				<label for="was_insured_present">Was insured present?</label>

				<div class="right">
					<?php echo Form::radio('was_insured_present', 1, false, array('id' => 'was_insured_present0')) .
					           Form::label('was_insured_present0', 'Yes') .
					           Form::radio('was_insured_present', 0, true, array('id' => 'was_insured_present1')) .
					           Form::label('was_insured_present1', 'No'); ?>
				</div>
			</div>

			<div class="row">
				<label for="roof_square_feet">Roof Square Feet</label>

				<div class="right">
					<input type="text" name="roof_square_feet" id="roof_square_feet" value="">
				</div>
			</div>

			<div class="row">
				<label for="estimated_age_of_roof">Estimated age of roof: </label>

				<div class="right">
					<?php echo Form::select('estimated_age_of_roof', $roof_ages); ?>
				</div>
			</div>
							
			<div class="row">
			
				<label for="roof_height">Roof height: </label>
			
				<div class="right">
					<?php echo Form::select('roof_height', $roof_heights); ?>
				</div>
			</div>		

			<div class="row">
				<label for="type_of_framing">Type of framing: </label>

				<div class="right">
					<?php echo Form::select('type_of_framing', $framing_types); ?>
				</div>
			</div>		

			<div class="row">
				<label for="pitch_1">Pitch 1: </label>

				<div class="right">
					<?php echo Form::select('pitch_1', $pitches); ?>
				</div>
			</div>			

			<div class="row">
				<label for="pitch_2">Pitch 2: </label>

				<div class="right">
					<?php echo Form::select('pitch_2', $pitches); ?>
				</div>
			</div>	

			<div class="row">
				<label for="pitch_3">Pitch 3: </label>

				<div class="right">
					<?php echo Form::select('pitch_3', $pitches); ?>
				</div>
			</div>		

			<div class="row">
				<label for="layers">Layers: </label>

				<div class="right">
					<?php echo Form::select('layers', $layers); ?>
				</div>
			</div>	

			<div class="row">
				<label for="type_of_roofing">Type of roofing: </label>

				<div class="right chk_type_of_roofing">
					<?php 
                    $count = 0;
					foreach($roofing_types as $key => $roofing_type) {
                        echo Form::checkbox('type_of_roofing[]', $key, false, array('id' => 'type_of_roofing' . $count)) . "\n" .
                             Form::label('type_of_roofing' . $count, $roofing_type) . "\n";

                        $count++;
					} ?>
					
					<div class="cl"></div>
				</div>
			</div>	

			<div class="row">
				<label for="if_rolled">If rolled: </label>

				<div class="right">
					<?php 
                    $count = 0;
					foreach($if_rolled as $key => $rolled) {
                        echo Form::checkbox('if_rolled[]', $key, false, array('id' => 'if_rolled' . $count)) . "\n" .
                             Form::label('if_rolled' . $count, $rolled) . "\n";

                        $count++;
					} ?>
				</div>
			</div>		

			<div class="row">
				<label for="condition">Condition: </label>

				<div class="right">
					<?php echo Form::select('condition', $conditions); ?>
				</div>
			</div>	

			<div class="row">
				<label for="remove_reset_tarp">Remove &amp; Reset Tarp: </label>

				<div class="right">
					<?php echo Form::select('remove_reset_tarp', $remove_reset_tarp); ?>
				</div>
			</div>		

			<div class="row">

				<label for="lift_up_minor_reset_tarp">Lift up &amp; Minor Reset Tarp: </label>

				<div class="right">
					<?php echo Form::select('lift_up_minor_reset_tarp', $lift_up_minor_reset_tarp); ?>
				</div>
			</div>	

			<div class="row">
				<label for="previous_repairs_made">Previous repairs made: </label>

				<div class="right chk_prev_repairs">
					<?php
					foreach($previous_repairs as $key => $repairs) {
                        echo Form::checkbox('previous_repairs_made[]', $key, false, array('id' => 'previous_repairs_made' . $count)) . "\n" .
                             Form::label('previous_repairs_made' . $count, $repairs) . "\n";

                        $count++;
					} ?>
					
					<div class="cl"></div>
				</div>
			</div>		

			<div class="row">
				<label for="collateral_damages_to_property">Collateral Damages to property: </label>

				<div class="right">
					<?php echo Form::select('collateral_damages_to_property', $collateral_damamges); ?>
				</div>
			</div>	

			<div class="row">
				<label for="collateral_damage_detail_description">Collateral Damage Detail Description: </label>

				<div class="right">
											
					<textarea name="collateral_damage_detail_description" class="grow" style="height:100px;"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="plain">
	<h1>Cause of Loss</h1>

	<p>
		At least one "Cause of Loss" must be selected. In addition, whenever a corresponding "Slope" is available next to a selection you have made, at least one Slope also becomes required.
	</p>

</div>


<div class="section">
	<div class="box">
			<div class="title">
				Wind
				<span class="show"></span>
			</div>
			
			<div class="content">
				<div class="row">
					
					<div>
						<?php echo Form::checkbox('wind_damage', 1, false, array('id' => 'wind')) .
						           Form::label('wind', 'Check if apply'); ?>
					</div>
				</div>	
				
				<!-- <div class="row">
					<label for="wind_shingles_damaged">Shingles damaged</label>

					<div class="right">
						<input type="text" name="wind_shingles_damaged" id="wind_shingles_damaged" value="" class="has_slope" rel="slope_shingles" />
					</div>
				</div> -->	

				<div class="row slope" id="slope_shingles" style="display: block !important;">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Shingles Damaged)</div>
							<div class="content" style="display: block !important">
								<?php
								    $count = 0;
								    foreach($slopes as $key => $slope) {
								    	echo Form::checkbox('wind_shingles_damaged_slope[]', $key, false, 
								    		     array('id' => 'wind_shingles_damaged_slope' . $count)) . "\n" .
								    	Form::label('wind_shingles_damaged_slope' . $count, $slope) . "\n";

								    	$count++;
								    } ?>
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>	

				<div class="row">
					<label for="wind_roof_peeled_back">Roof Peeled Back</label>

					<div class="right has_slope_select" rel="slope_wind_roof_peeled_back">
						<?php echo Form::select('wind_roof_peeled_back', $wind_roof_peeled_back); ?>
					</div>
				</div>		

				<div class="row slope" id="slope_wind_roof_peeled_back">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Roof Peeled Back)</div>
							<div class="content">
								<?php
								    $count = 0;
								    foreach($slopes as $key => $slope) {
								    	echo Form::checkbox('slope_wind_roof_peeled_back[]', $key, false, 
								    		     array('id' => 'slope_wind_roof_peeled_back' . $count)) . "\n" .
								    	Form::label('slope_wind_roof_peeled_back' . $count, $slope) . "\n";

								    	$count++;
								    } ?>
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>					
			</div>
		</div>
</div>


<div class="section">
	<div class="box">
			<div class="title">
				Hail
				<span class="show"></span>
			</div>
			<div class="content">
				
				<div class="row">
					<input type="checkbox" name="hail" id="hail" value="1" class="check_if_apply" />
					<label for="hail"><strong>Check if apply</strong></label>

				</div>		
				
				<div class="row">
					<label for="hail_amount_damaged">Amount damaged:</label>

					<div class="right">
						<input type="text" name="hail_amount_damaged" id="hail_amount_damaged" value="" 
						       class="has_slope" rel="slope_hail_amound_damaged" />
					</div>
				</div>

				<div class="row slope" id="slope_hail_amound_damaged" style="display: block !important">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Amount Damaged)</div>
							<div class="content" style="display: block !important">
								<?php
								    $count = 0;
								    foreach($slopes as $key => $slope) {
								    	echo Form::checkbox('slope_hail_amount_damaged[]', $key, false, 
								    		     array('id' => 'slope_hail_amount_damaged' . $count)) . "\n" .
								    	Form::label('slope_hail_amount_damaged' . $count, $slope) . "\n";

								    	$count++;
								    } ?>
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
				
			</div>
		</div>

</div>


<div class="section">
	<div class="box">
			<div class="title">
				Lightning
				<span class="show"></span>
			</div>
			<div class="content">
				
				<div class="row">
					<input type="checkbox" name="lightning" id="lightning" value="1" class="check_if_apply" />

					<label for="lightning" id="lightning"><strong>Check if apply</strong></label>
				</div>

				<div class="row">
					<label for="lightning_amount_damaged">Amount Damaged</label>

					<div class="right has_slope_select" rel="slope_lightning_amount_damaged">
						<?php echo Form::select('lightning_amount_damaged', $lighting_amount_damaged); ?>
					</div>
				</div>		


				<div class="row slope" id="slope_lightning_amount_damaged">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Amount Damaged)</div>
							<div class="content">
								<?php
								    $count = 0;
								    foreach($slopes as $key => $slope) {
								    	echo Form::checkbox('slope_lightning_amount_damaged[]', $key, false, 
								    		     array('id' => 'slope_lightning_amount_damaged' . $count)) . "\n" .
								    	Form::label('slope_lightning_amount_damaged' . $count, $slope) . "\n";

								    	$count++;
								    } ?>
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
				
				<div class="row">

					<label for="lightning_damages">Damages</label>

					<div class="right">
						<?php
								    $count = 0;
								    foreach($lighting_damages as $key => $damage) {
								    	echo Form::checkbox('lightning_damages[]', $key, false, 
								    		     array('id' => 'lightning_damages' . $count)) . "\n" .
								    	Form::label('lightning_damages' . $count, $damage) . "\n";

								    	$count++;
								    } ?>
					</div>
				</div>
				
			</div>
		</div>
</div>

<div class="section">
	<div class="box">
			<div class="title">
				Vermin
				<span class="show"></span>
			</div>
			<div class="content">
			
				<div class="row">
					<input type="checkbox" name="vermin" id="vermin" value="1" class="check_if_apply" />

					<label for="vermin"><strong>Check if apply</strong></label>
				</div>		

				<div class="row">
					<label for="vermin_roofing_damage">Roofing Damaged</label>

					<div class="right has_slope_select" rel="slope_vermin_roofing_damage">
						<?php echo Form::select('vermin_roofing_damage', array('blank' => 'Please Select One') + $get_vermin_choices['roofing']); ?>
					</div>
				</div>		

				<div class="row slope" id="slope_vermin_roofing_damage">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Roofing Damaged)</div>
							<div class="content">
								<?php
								    $count = 0;
								    foreach($slopes as $key => $slope) {
								    	echo Form::checkbox('slope_vermin_roofing_damage[]', $key, false, 
								    		     array('id' => 'slope_vermin_roofing_damage' . $count)) . "\n" .
								    	Form::label('slope_vermin_roofing_damage' . $count, $slope) . "\n";

								    	$count++;
								    } ?>
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>

				<div class="row">
					<label for="vermin_fascia_damage">Fascia Damaged</label>

					<div class="right has_slope_select" rel="slope_vermin_fascia_damage">
						<?php echo Form::select('vermin_fascia_damage', array('blank' => 'Please Select One') + $get_vermin_choices['fascia']); ?>
					</div>
				</div>		

				<div class="row slope" id="slope_vermin_fascia_damage">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Fascia Damaged)</div>
							<div class="content">
								<?php
								    $count = 0;
								    foreach($slopes as $key => $slope) {
								    	echo Form::checkbox('slope_vermin_fascia_damage[]', $key, false, 
								    		     array('id' => 'slope_vermin_fascia_damage' . $count)) . "\n" .
								    	Form::label('slope_vermin_fascia_damage' . $count, $slope) . "\n";

								    	$count++;
								    } ?>
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>


				<div class="row">
					<label for="vermin_vent_damage">Vent Damaged</label>

					<div class="right has_slope_select" rel="slope_vermin_vent_damage">
						<?php echo Form::select('vermin_vent_damage', array('blank' => 'Please Select One') + $get_vermin_choices['vent']); ?>
					</div>
				</div>		

				<div class="row slope" id="slope_vermin_vent_damage">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Vent Damaged)</div>
							<div class="content">
								<?php
								    $count = 0;
								    foreach($slopes as $key => $slope) {
								    	echo Form::checkbox('slope_vermin_vent_damage[]', $key, false, 
								    		     array('id' => 'slope_vermin_vent_damage' . $count)) . "\n" .
								    	Form::label('slope_vermin_vent_damage' . $count, $slope) . "\n";

								    	$count++;
								    } ?>
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
			</div>
	</div>
</div>

<div class="section">
	<div class="box">
			<div class="title">
				Vandalism
				<span class="show"></span>
			</div>
			<div class="content">
			
				<div class="row">
					<input type="checkbox" name="vandalism" id="vandalism" value="1"  class="check_if_apply" />
					<label for="vandalism"><strong>Check if apply</strong></label>			
				</div>	

				<div class="row">
					<label for="vandalism_skylights">Skylights</label>

					<div class="right has_slope_select" rel="slope_vandalism_skylights">
						<?php echo Form::select('vandalism_skylights', array('blank' => 'Please Select One') + $vandalism_choices['skylights']); ?>
					</div>
				</div>		

				<div class="row slope" id="slope_vandalism_skylights">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Skylights)</div>
							<div class="content">
								<?php
								    $count = 0;
								    foreach($slopes as $key => $slope) {
								    	echo Form::checkbox('slope_vandalism_skylights[]', $key, false, 
								    		     array('id' => 'slope_vandalism_skylights' . $count)) . "\n" .
								    	Form::label('slope_vandalism_skylights' . $count, $slope) . "\n";

								    	$count++;
								    } ?>
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
				
				<div class="row">
					<label for="vandalism_roof_decking_cut">Roof / decking cut</label>

					<div class="right has_slope_select" rel="slope_vandalis_roof_decking">
						<?php echo Form::select('vandalism_roof_decking_cut', array('blank' => 'Please Select One') + $vandalism_choices['roof_decking_cut']); ?>
					</div>
				</div>		

				<div class="row slope" id="slope_vandalis_roof_decking">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Roof / Decking Cut)</div>
							<div class="content">
								<?php
								    $count = 0;
								    foreach($slopes as $key => $slope) {
								    	echo Form::checkbox('slope_vandalis_roof_decking[]', $key, false, 
								    		     array('id' => 'slope_vandalis_roof_decking' . $count)) . "\n" .
								    	Form::label('slope_vandalis_roof_decking' . $count, $slope) . "\n";

								    	$count++;
								    } ?>
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>				
			</div>
		</div>
</div>

<div class="section">
	<div class="box">
			<div class="title">
				Ice
				<span class="show"></span>
			</div>
			<div class="content">
			
				<div class="row">
					<input type="checkbox" name="ice" id="ice" value="1" class="check_if_apply" />
					<label for="ice"><strong>Check if apply</strong></label>
				</div>		
				
				<div class="row">
					
					<label>Ice Damming</label>
					
					<div class="right has_slope_checkbox" rel="slope_ice_damming">
						<input type="hidden" name="ice_damming" value="blank">

						<input type="checkbox" name="ice_damming" id="ice_damming" value="1" />
						<label for="ice_damming">Yes</label>
					</div>
				</div>		

				<div class="row slope" id="slope_ice_damming">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Ice Damming)</div>
							<div class="content">
								<?php
								    $count = 0;
								    foreach($slopes as $key => $slope) {
								    	echo Form::checkbox('slope_ice_damming[]', $key, false, 
								    		     array('id' => 'slope_ice_damming' . $count)) . "\n" .
								    	Form::label('slope_ice_damming' . $count, $slope) . "\n";

								    	$count++;
								    } ?>
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>				


				<div class="row">
					
					<label>Fallen Ice</label>
					
					<div class="right has_slope_checkbox" rel="slope_fallen_ice">						
						<input type="hidden" name="ice_fallen_ice" value="blank">

						<input type="checkbox" name="ice_fallen_ice" id="ice_fallen_ice" value="1" />
						<label for="ice_fallen_ice">Yes</label>
					</div>
				</div>	

				<div class="row slope" id="slope_fallen_ice">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Fallen Ice)</div>
							<div class="content">
								<?php
								    $count = 0;
								    foreach($slopes as $key => $slope) {
								    	echo Form::checkbox('slope_fallen_ice[]', $key, false, 
								    		     array('id' => 'slope_fallen_ice' . $count)) . "\n" .
								    	Form::label('slope_fallen_ice' . $count, $slope) . "\n";

								    	$count++;
								    } ?>
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>				

			</div>
		</div>

</div>

<div class="section">
	<div class="box">
			<div class="title">
				Appliances
				<span class="show"></span>
			</div>
			<div class="content">
			
				<div class="row">
					<input type="checkbox" {{#checked_appliances}}checked="checked"{{/checked_appliances}} name="appliances" id="appliances" value="1" class="check_if_apply" />
						
					<label for="appliances"><strong>Check if apply</strong></label>
				</div>	
				
				{{#errors.appliances}}
					<div class="row">
						<div class="right">
							<label class="error">{{errors.appliances}}</label>
						</div>
					</div>
				{{/errors.appliances}}		

				<div class="row">
					<label for="appliances_skylights">Skylights</label>

					<div class="right has_slope_checkbox" rel="slope_appliances_skylights">
						{{{e_appliances_skylights}}}
					</div>
				</div>	

				<div class="row slope" id="slope_appliances_skylights">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Skylights)</div>
							<div class="content">
								{{{e_appliances_skylights_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>				


				<div class="row">
					<label for="appliances_antenna_sattelite_dish">Antenna/satellite dish</label>

					<div class="right has_slope_checkbox" rel="slope_appliances_antenna">
						{{{e_appliances_antenna_sattelite_dish}}}
					</div>
				</div>	

				<div class="row slope" id="slope_appliances_antenna">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Antenna / Satellite Dish)</div>
							<div class="content">
								{{{e_appliances_antenna_sattelite_dish_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>				

				<div class="row">
					<label for="appliances_ac_units">A/C Units</label>

					<div class="right has_slope_checkbox" rel="slope_appliances_ac_units">
						{{{e_appliances_ac_units}}}
					</div>
				</div>	

				<div class="row slope" id="slope_appliances_ac_units">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (A/C Units)</div>
							<div class="content">
								{{{e_appliances_ac_units_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>				
			</div>
		</div>
</div>

<div class="section">
	<div class="box">
			<div class="title">
				Fallen Tree
				<span class="show"></span>
			</div>
			<div class="content">
			
				<div class="row">
					<input type="checkbox" {{#checked_fallen_tree}}checked="checked"{{/checked_fallen_tree}} name="fallen_tree" id="fallen_tree" value="1" class="check_if_apply" />
						
					<label for="fallen_tree"><strong>Check if apply</strong></label>						
				</div>		
				
				{{#errors.fallen_tree}}
					<div class="row">
						<div class="right">
							<label class="error">{{errors.fallen_tree}}</label>
						</div>
					</div>
				{{/errors.fallen_tree}}		

				<div class="row">
					<label for="fallen_tree_amount_of_damage">Amount of Damage</label>
					<div class="right has_slope_select" rel="slope_fallen_tree_amount_damage">
						{{{e_fallen_tree_amount_of_damage}}}
					</div>
				</div>	

				<div class="row slope" id="slope_fallen_tree_amount_damage">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Amount of Damage)</div>
							<div class="content">
								{{{e_fallen_tree_amount_of_damage_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>				

				<div class="row">
					<label for="fallen_tree_damages">Damages</label>

					<div class="right chk_fallen_tree_damages">
						{{{e_fallen_tree_damages}}}
						
						<div class="cl"></div>
					</div>
				</div>				
			</div>
		</div>
</div>


<div class="section">
	<div class="box">
			<div class="title">
				Excess Debris
				<span class="show"></span>
			</div>
			<div class="content">
			
				<div class="row">						
					<input type="checkbox" {{#checked_excess_debris}}checked="checked"{{/checked_excess_debris}} name="excess_debris" id="excess_debris" value="1" class="check_if_apply" />
						
					<label for="excess_debris"><strong>Check if apply</strong></label>
				</div>	
				
				{{#errors.excess_debris}}
					<div class="row">
						<div class="right">
							<label class="error">{{errors.excess_debris}}</label>
						</div>
					</div>
				{{/errors.excess_debris}}			

				<div class="row">
					<label for="excess_debris_location">Location</label>

					<div class="right has_slope_checkbox chk_excess_debris_location" rel="slope_excess_debris_location">
						{{{e_excess_debris_location}}}
						
						<div class="cl"></div>
					</div>
				</div>	

				<div class="row slope" id="slope_excess_debris_location">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Location)</div>
							<div class="content">
								{{{e_excess_debris_location_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
</div>
<div class="section">
	<div class="box">
			<div class="title">
				Standing Water
				<span class="show"></span>
			</div>
			<div class="content">
			
				<div class="row">
					<input type="checkbox" {{#checked_standing_water}}checked="checked"{{/checked_standing_water}} name="standing_water" id="standing_water" value="1" class="check_if_apply" />
					
				 	<label for="standing_water"><strong>Check if apply</strong></label>
				</div>	
				
				{{#errors.standing_water}}
					<div class="row">
						<div class="right">
							<label class="error">{{errors.standing_water}}</label>
						</div>
					</div>
				{{/errors.standing_water}}			

				<div class="row">
					<label for="standing_water_select">Select</label>

					<div class="right has_slope_checkbox chk_standing_water_select" rel="slope_standing_water">
						{{{e_standing_water_select}}}
						
						<div class="cl"></div>
					</div>
				</div>	

				<div class="row slope" id="slope_standing_water">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope</div>
							<div class="content">
								{{{e_standing_water_select_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>				
			</div>
		</div>
</div>


<div class="section">
	<div class="box">
			<div class="title">
				Product Defects
				<span class="show"></span>
			</div>
			<div class="content">
			
				<div class="row">
					<input type="checkbox" {{#checked_product_defects}}checked="checked"{{/checked_product_defects}} name="product_defects" id="product_defects" value="1" class="check_if_apply" />

						<label for="product_defects"><strong>Check if apply</strong></label>
				</div>	
				
				{{#errors.product_defects}}
					<div class="row">
						<div class="right">
							<label class="error">{{errors.product_defects}}</label>
						</div>
					</div>
				{{/errors.product_defects}}		

				<div class="row">
					<label for="product_defects_asphalt_coating_defect">Asphalt Coating Defect</label>

					<div class="right has_slope_select" rel="slope_product_defects_asphalt">
						{{{e_product_defects_asphalt_coating_defect}}}
					</div>
				</div>	

				<div class="row slope" id="slope_product_defects_asphalt">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Asphalt Coating Defect)</div>
							<div class="content">
								{{{e_product_defects_asphalt_coating_defect_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
					

				<div class="row">
					<label for="product_defects_blistering">Blistering</label>

					<div class="right has_slope_select" rel="slope_product_defects_blistering">
						{{{e_product_defects_blistering}}}
					</div>
				</div>	

				<div class="row slope" id="slope_product_defects_blistering">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Blistering)</div>
							<div class="content">
								{{{e_product_defects_blistering_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>

				<div class="row">
					<label for="product_defects_flaking">Flaking</label>

					<div class="right has_slope_select" rel="slope_product_defects_flaking">
						{{{e_product_defects_flaking}}}
					</div>
				</div>	

				<div class="row slope" id="slope_product_defects_flaking">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Flaking)</div>
							<div class="content">
								{{{e_product_defects_flaking_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>	
			</div>
		</div>
</div>

<div class="section">
	<div class="box">
			<div class="title">
				Workmanship / Improper Installation
				<span class="show"></span>
			</div>
			<div class="content">
			
				<div class="row">						
					<input type="checkbox" {{#checked_improper_installation}}checked="checked"{{/checked_improper_installation}} name="workmanship" id="workmanship" value="1" class="check_if_apply" />
						
					<label for="workmanship"><strong>Check if apply</strong></label>
	
				</div>		
				
				{{#errors.workmanship}}
					<div class="row">
						<div class="right">
							<label class="error">{{errors.workmanship}}</label>
						</div>
					</div>
				{{/errors.workmanship}}		

				<div class="row">
					<label for="workmanship_improper_nailing">Improper Nailing</label>

					<div class="right has_slope_checkbox" rel="slope_workmanship_improper_nailing">
						{{{e_improper_installation_nailing}}}
					</div>
				</div>	

				<div class="row slope" id="slope_workmanship_improper_nailing">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Improper Nailing)</div>
							<div class="content">
								{{{e_improper_installation_nailing_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
		

				<div class="row">
					
					<label>Improper Overlap</label>
					
					<div class="right has_slope_checkbox" rel="slope_workmanship_improper_overlap">
					
						<input type="hidden" name="workmanship_improper_overlap" value="blank" />
						
						<input type="checkbox" {{#checked_workmanship_improper_overlap}}checked="checked"{{/checked_workmanship_improper_overlap}} name="workmanship_improper_overlap" id="workmanship_improper_overlap" value="1" />
						
						<label for="workmanship_improper_overlap">Yes</label>

					</div>
				</div>	

				<div class="row slope" id="slope_workmanship_improper_overlap">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Improper Overlap)</div>
							<div class="content">
								{{{e_improper_overlap_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
					

				<div class="row">
					<label for="workmanship_flashing">Flashing</label>

					<div class="right has_slope_checkbox chk_workmanship_flashing" rel="slope_workmanship_flashing">
						{{{e_improper_installation_flashing}}}
						
						<div class="cl"></div>
					</div>
				</div>	

				<div class="row slope" id="slope_workmanship_flashing">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Flashing)</div>
							<div class="content">
								{{{e_improper_installation_flashing_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
				
				<div class="row">
					<label for="workmanship_flashing_missing">Flashing Missing</label>

					<div class="right has_slope_checkbox" rel="slope_workmanship_flashing_missing">
						{{{e_improper_installation_flashing_missing}}}
					</div>
				</div>	

				<div class="row slope" id="slope_workmanship_flashing_missing">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Flashing Missing)</div>
							<div class="content">
								{{{e_improper_installation_flashing_missing_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
				
			
				<div class="row">
					<label for="workmanship_venting">Venting</label>
	
					<div class="right has_slope_checkbox" rel="slope_workmanship_venting">
						{{{e_improper_installation_venting}}}
					</div>
				</div>	

				<div class="row slope" id="slope_workmanship_venting">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Venting)</div>
							<div class="content">
								{{{e_improper_installation_venting_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
			

				<div class="row">
					
					<label>Incorrect Materials</label>
					
					<div class="right has_slope_checkbox" rel="slope_workmanship_incorrect_materials">
					
						<input type="hidden" name="workmanship_incorrect_materials" value="blank" />					

						<input type="checkbox" {{#checked_workmanship_incorrect_materials}}checked="checked"{{/checked_workmanship_incorrect_materials}} name="workmanship_incorrect_materials" id="workmanship_incorrect_materials" value="1" />
						
						<label for="workmanship_incorrect_materials">Yes</label>
						
					</div>
				</div>	

				<div class="row slope" id="slope_workmanship_incorrect_materials">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Incorrect Materials)</div>
							<div class="content">
								{{{e_workmanship_incorrect_materials_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
				

				<div class="row">
					
					<label>Excessive Layers</label>
					
					<div class="right has_slope_checkbox" rel="slope_workmanship_excessive_layers">
					
						<input type="hidden" name="workmanship_excessive_layers" value="blank" />					
						
						<input type="checkbox" {{#checked_workmanship_excessive_layers}}checked="checked"{{/checked_workmanship_excessive_layers}} name="workmanship_excessive_layers" id="workmanship_excessive_layers" value="1" />
						
						<label for="workmanship_excessive_layers">Yes</label>
						
					</div>
				</div>	

				<div class="row slope" id="slope_workmanship_excessive_layers">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Excessive Layers)</div>
							<div class="content">
								{{{e_workmanship_excessive_layers_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
				
			
				<div class="row">
					<label for="workmanship_sub_par_deck">Sub Par Deck</label>

					<div class="right has_slope_checkbox" rel="slope_workmanship_suppardeck">
						{{{e_workmanship_sub_par_deck}}}
					</div>
				</div>	

				<div class="row slope" id="slope_workmanship_suppardeck">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope (Sub Par Deck)</div>
							<div class="content">
								{{{e_workmanship_sub_par_deck_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
				

				<div class="row">
						<label>Other</label>

						<div class="right">

							<input type="checkbox" {{#checked_workmanship_other}}checked="checked"{{/checked_workmanship_other}} name="workmanship_other" value="1" id="workmanship_other" />
							
							<label for="workmanship_other">Yes</label>
							
						</div>
				</div>		

				<div class="row">
					<label for="workmanship_comments">Comments</label>

					<div class="right">
						<textarea name="workmanship_comments">{{data.workmanship_comments}}</textarea>
					</div>
				</div>
			</div>
		</div>
</div>

<div class="section">
	<div class="box">
			<div class="title">
				Aged / Worn
				<span class="show"></span>
			</div>
			<div class="content">
			
				<div class="row">
					<input type="checkbox" {{#checked_aged_worn}}checked="checked"{{/checked_aged_worn}} name="aged_worn" id="aged_worn" value="1"  class="check_if_apply" />
						
					<label for="aged_worn"><strong>Check if apply</strong></label>
						
				</div>		
				
				{{#errors.aged_worn}}
					<div class="row">
						<div class="right">
							<label class="error">{{errors.aged_worn}}</label>
						</div>
					</div>
				{{/errors.aged_worn}}	

				<div class="row">
					<label for="aged_worn_check_that_apply">Check All that Apply</label>

					<div class="right has_slope_checkbox chk_aged_worn" rel="slope_aged_worn">
						{{{e_aged_worn}}}
						
						<div class="cl"></div>
					</div>
				</div>	

				<div class="row slope" id="slope_aged_worn">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope</div>
							<div class="content">
								{{{e_aged_worn_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
</div>

<div class="section">
		<div class="box">
			<div class="title">
				Fire Damages
				<span class="show"></span>
			</div>
			<div class="content">
			
				<div class="row">
					<input type="checkbox" {{#checked_fire_damages}}checked="checked"{{/checked_fire_damages}} name="fire_damages" id="fire_damages" value="1" class="check_if_apply" />
						
					<label for="fire_damages"><strong>Check if apply</strong></label>
					
				</div>		
				
				{{#errors.fire_damages}}
					<div class="row">
						<div class="right">
							<label class="error">{{errors.fire_damages}}</label>
						</div>
					</div>
				{{/errors.fire_damages}}		

				<div class="row">
					<label for="fire_damages_check_that_apply">Check All that Apply</label>

					<div class="right has_slope_checkbox chk_fire_damages" rel="slope_fire_damages">
						{{{e_fire_damages}}}
						
						<div class="cl"></div>
					</div>
				</div>	

				<div class="row slope" id="slope_fire_damages">
					<div class="section">
						<div class="box">
							<div class="title">Select Slope</div>
							<div class="content">
								{{{e_fire_damages_slope}}}
								
								<div class="cl"></div>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
</div>

<div class="section">
	<div class="box">
		<div class="title">General</div>
		
		<div class="content">
			
			<div class="row">

				<label for="general_comments">Comments</label>

				<div class="right">
					<textarea name="general_comments">{{data.general_comments}}</textarea>
				</div>
			</div>
			
			{{#show_expert}}
				<div class="row">
				
					<div class="left">
						<input type="checkbox" {{#checked_is_expert}}checked="checked"{{/checked_is_expert}} name="is_expert_inspector" id="is_expert_inspector" value="1" />

						<label for="is_expert_inspector">Auto upgrade to fully documented expert inspection when there is no damage found on a basic report</label>
					</div>
				</div>
			{{/show_expert}}
			
			<div class="row">

				<input type="hidden" name="csrf_token" value="{{csrf_token}}">
				<button class="blue" type="submit"><span>Save</span></button>

			</div>
			
		</div>
	</div>
</div>


</form>

