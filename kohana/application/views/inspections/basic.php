<!-- <div class="box">
        <div class="title"><?php echo $inspection_type; ?> Report</div>

        <div class="content">

            <!-- <div class="row">
                <label for="roof_square_feet">Roof Square Feet</label>

                <div class="right">
                    <input type="text" name="roof_square_feet" id="roof_square_feet" value="">
                </div>
            </div> -->

          <!--  <div class="row">
                <label for="estimated_age_of_roof">Estimated age of roof: </label>

                <div class="right">
                    <?php echo Form::select('estimated_age_of_roof', $roof_ages, isset($data['estimated_age_of_roof']) ? $data['estimated_age_of_roof'] : null); ?>
                </div>

                <?php if (isset($errors['estimated_age_of_roof'])) { 
                    echo "<div class=\"error\"><p>" . $errors['estimated_age_of_roof'] . "</p></div>";
                      }
                ?>
            </div>
                            
            <div class="row">
            
                <label for="roof_height">Roof height: </label>
            
                <div class="right">
                    <?php echo Form::select('roof_height', $roof_heights, isset($data['roof_height']) ? $data['roof_height'] : null); ?>
                </div>

                <?php if (isset($errors['roof_height'])) { 
                    echo "<div class=\"error\"><p>" . $errors['roof_height'] . "</p></div>";
                      }
                ?>
            </div>        

            <!-- <div class="row">
                <label for="type_of_framing">Type of framing: </label>

                <div class="right">
                    <?php echo Form::select('type_of_framing', $framing_types); ?>
                </div>
            </div>   

            <div class="row">
                <label for="pitch_1">Pitch 1: </label>

                <div class="right">
                    <?php echo Form::select('pitch_1', $pitches, isset($data['pitch_1']) ? $data['pitch_1'] : null); ?>
                </div>

                <?php if (isset($errors['pitch_1'])) { 
                    echo "<div class=\"error\"><p>" . $errors['pitch_1'] . "</p></div>";
                      }
                 ?>
            </div>            

            <div class="row">
                <label for="pitch_2">Pitch 2: </label>

                <div class="right">
                    <?php echo Form::select('pitch_2', $pitches, isset($data['pitch_2']) ? $data['pitch_2'] : null); ?>
                </div>
            </div>    

            <div class="row">
                <label for="pitch_3">Pitch 3: </label>

                <div class="right">
                    <?php echo Form::select('pitch_3', $pitches, isset($data['pitch_3']) ? $data['pitch_3'] : null); ?>
                </div>
            </div>        

            <div class="row">
                <label for="layers">Layers: </label>

                <div class="right">
                    <?php echo Form::select('layers', $layers, isset($data['layers']) ? $data['layers'] : null); ?>
                </div>
            </div>    

            <div class="row">
                <label for="type_of_roofing" class="margin-bottom">Type of roofing: </label>

                <div class="right chk_type_of_roofing">
                    <?php 
                    $count = 0;
                    foreach($roofing_types as $key => $roofing_type) {
                        echo Form::checkbox('type_of_roofing[]', $key, isset($data['type_of_roofing']) && 
                             in_array($key, !is_array($data['type_of_roofing']) ? unserialize($data['type_of_roofing']) : $data['type_of_roofing'])
                              ? true : false, 
                             array('id' => 'type_of_roofing' . $count)) . "\n" .
                             Form::label('type_of_roofing' . $count, $roofing_type) . "\n";

                        $count++;
                    } ?>
                    
                    <div class="cl"></div>
                </div>

                <?php if (isset($errors['type_of_roofing'])) { 
                    echo "<div class=\"error\"><p>" . $errors['type_of_roofing'] . "</p></div>";
                      }
                ?>
            </div>    

            <div class="row">
                <label for="was_insured_present">Was insured present?</label>

                <div class="right">
                    <?php echo Form::radio('was_insured_present', 1, isset($data['was_insured_present']) && $data['was_insured_present'] == 1 ? true : false, array('id' => 'was_insured_present0')) .
                               Form::label('was_insured_present0', 'Yes') .
                               Form::radio('was_insured_present', 0, isset($data['was_insured_present']) && $data['was_insured_present'] == 1 ? false : true, array('id' => 'was_insured_present1')) .
                               Form::label('was_insured_present1', 'No'); ?>
                </div>
            </div>

            <!-- <div class="row">
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
                <label for="siding_type">What was the type of siding? </label>

                <div class="right chk_prev_repairs">
                    <?php
                        $count = 0;
                        foreach($siding_types as $key => $siding_type) {
                            echo Form::checkbox('siding_type[]', $key, isset($data['siding_type']) && 
                                 in_array($key, !is_array($data['siding_type']) ? unserialize($data['siding_type']) : $data['siding_type'])
                                 ? true : false, 
                                array('id' => 'siding_type' . $count)) . "\n" .
                            Form::label('siding_type' . $count, $siding_type) . "\n";

                            $count++;
                        } ?>
                    <div class="cl"></div>
                </div>

                <?php if (isset($errors['siding_type'])) { 
                    echo "<div class=\"error\"><p>" . $errors['siding_type'] . "</p></div>";
                      }
                ?>
            </div>

            <div class="row">
                <label for="roofer_present">Was the roofer present? </label>

                <div class="right">
                    <?php echo Form::radio('was_roofer_present', 1, isset($data['roofer_present']) && $data['roofer_present'] == 1 ? true : false, array('id' => 'was_roofer_present0', 'class' => 'roofer-present')) .
                               Form::label('was_roofer_present0', 'Yes') .
                               Form::radio('was_roofer_present', 0, isset($data['roofer_present']) && $data['roofer_present'] == 1 ? false : true, array('id' => 'was_roofer_present1', 'class' => 'roofer-present')) .
                               Form::label('was_roofer_present1', 'No'); ?>
                </div>
            </div>    

            <div class="row roofer">
                <label for="roofer">Roofer: </label>

                <div class="right">
                    <?php echo Form::input('roofer', ''); ?>
                </div>
            </div>    

            <div class="row roofer">
                <label for="roofer_company_name">Roofer Company Name: </label>

                <div class="right">
                    <?php echo Form::input('roofer_company_name', ''); ?>
                </div>
            </div>    

            <div class="row">
                <label for="roofer_climbed">Was the roof climbed by the roofer? </label>

                <div class="right">
                    <?php echo Form::radio('was_roof_climbed', 1, isset($data['roofer_climbed']) && $data['roofer_climbed'] == 1 ? true : false, array('id' => 'was_roof_climbed0')) .
                               Form::label('was_roof_climbed0', 'Yes') .
                               Form::radio('was_roof_climbed', 0, isset($data['roofer_climbed']) && $data['roofer_climbed'] == 1 ? false : true, array('id' => 'was_roof_climbed1')) .
                               Form::label('was_roof_climbed1', 'No'); ?>
                </div>
            </div>    

            <div class="row">
                <label for="agreed_wind">Did the roofer agree with wind assessment? </label>

                <div class="right">
                    <?php echo Form::radio('agreed_wind', 1, isset($data['agreed_wind']) && $data['agreed_wind'] == 1 ? true : false, array('id' => 'agreed_wind0')) .
                               Form::label('agreed_wind0', 'Yes') .
                               Form::radio('agreed_wind', 0, isset($data['agreed_wind']) && $data['agreed_wind'] == 1 ? false : true, array('id' => 'agreed_wind1')) .
                               Form::label('agreed_wind1', 'No'); ?>
                </div>
            </div>    

            <div class="row">
                <label for="agreed_hailed">Did the roofer agree with hail assessment? </label>

                <div class="right">
                    <?php echo Form::radio('agreed_hail', 1, isset($data['agreed_hail']) && $data['agreed_hail'] == 1 ? true : false, array('id' => 'agreed_hail0')) .
                               Form::label('agreed_hail0', 'Yes') .
                               Form::radio('agreed_hail', 0, isset($data['agreed_hail']) && $data['agreed_hail'] == 1 ? false : true, array('id' => 'agreed_hail1')) .
                               Form::label('agreed_hail1', 'No'); ?>
                </div>
            </div>

            <div class="row">
                <label for="refused_test_squares">Did the roofer refuse test squares? </label>

                <div class="right">
                    <?php echo Form::radio('refused_test_squares', 1, isset($data['refused_test_squares']) && $data['refused_test_squares'] == 1 ? true : false, array('id' => 'refused_test_squares0')) .
                               Form::label('refused_test_squares0', 'Yes') .
                               Form::radio('refused_test_squares', 0, isset($data['refused_test_squares']) && $data['refused_test_squares'] == 1 ? false : true, array('id' => 'refused_test_squares1')) .
                               Form::label('refused_test_squares1', 'No'); ?>
                </div>
            </div>        

            <div class="row">
                <label for="condition">Condition: </label>

                <div class="right">
                    <?php echo Form::select('condition', $conditions); ?>
                </div>
            </div>    

            <!-- <div class="row">
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
                        echo Form::checkbox('previous_repairs_made[]', $key, isset($data['previous_repairs_made']) && 
                             in_array($key, !is_array($data['previous_repairs_made']) ? unserialize($data['previous_repairs_made']) : $data['previous_repairs_made'])
                             ? true : false, 
                             array('id' => 'previous_repairs_made' . $count)) . "\n" .
                             Form::label('previous_repairs_made' . $count, $repairs) . "\n";

                        $count++;
                    } ?>
                    
                    <div class="cl"></div>
                </div>

                <?php if (isset($errors['previous_repairs_made'])) { 
                    echo "<div class=\"error\"><p>" . $errors['previous_repairs_made'] . "</p></div>";
                      }
                ?>
            </div>

            <div class="row">
                <label for="roof_conditions">Roof Conditions: </label>

                <div class="right chk_type_of_roofing">
                    <?php
                        $count = 0;
                        foreach($roof_conditions as $key => $roof_condition) {
                            echo Form::checkbox('roof_conditions[]', $key, isset($data['roof_conditions']) && 
                                     in_array($key, !is_array($data['roof_conditions']) ? unserialize($data['roof_conditions']) : $data['roof_conditions']) 
                                     ? true : false, array('id' => 'roof_conditions' . $count, 'class' => $key == "brittle test failure" ? "brittle" : null)) . "\n" .
                                 Form::label('roof_conditions' . $count, $roof_condition) . "\n";

                                 $count++;
                        } 
                    ?>
                    <div class="cl"></div>
                </div>

                <?php if (isset($errors['roof_conditions'])) { 
                    echo "<div class=\"error\"><p>" . $errors['roof_conditions'] . "</p></div>";
                      }
                ?>
            </div>    

            <div class="row">
                <label for="collateral_damages_to_property">Collateral Damages to property: </label>

                <div class="right">
                    <?php echo Form::select('collateral_damages_to_property', $collateral_damamges, isset($data['collateral_damages_to_property']) ?
                                                                                                    $data['collateral_damages_to_property'] : null); ?>
                </div>
            </div>    

            <div class="row">
                <label for="collateral_damage_detail_description">Collateral Damage Detail Description: </label>

                <div class="right">
                                            
                    <textarea name="collateral_damage_detail_description" class="grow" style="height:100px;">
                        <?php echo isset($data['collateral_damage_detail_description']) ? $data['collateral_damage_detail_description'] : null; ?>
                    </textarea>
                </div>
            </div> 
        </div>
    </div>
</div>-->

<?php echo Form::hidden('report_type', $inspection_type); ?>

<div class="plain">
    <?php echo isset($errors) ? "<div class=\"message error\">
                                     <p>Until the errors are fixed above, all the data below will be removed during a report submission that has errors.</p>
                                 </div>" : null; ?>
    <h1>Cause of Loss</h1>

    <p>
        At least one "Cause of Loss" must be selected. In addition, whenever a corresponding "Slope" is available next to a selection you have made, at least one Slope also becomes required.
    </p>

</div>


<div class="section">
    <div class="row house-direction">
                <label for="house_direction">Which directional face is {{face}}</label>

                <div class="right">
                    <?php echo Form::select('house_direction', array('blank' => 'Please select') + $house_faces['directional'], 
                                            isset($data['house_direction']) ? $data['house_direction'] : null, 
                                            array('class' => 'house-direction-select')); ?>
                </div>
            </div>
    <div class="box">
            <div class="title slope-title-helper">
                Wind
                <span class="show"></span>
            </div>
            
            <div class="content">
                <div class="row">
                    
                    <?php echo Form::checkbox('wind_header', "1", isset($data['wind_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'wind_header')); ?>
                    <label for="wind_header"><strong>Check if apply</strong></label>
                </div>

                <div class="row slope" id="slope_shingles" style="display: block !important;">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Shingles Damaged)</div>
                            <div class="content" style="display: block !important">
                                <?php
                                    $count = 0;
                                    foreach($slopes as $key => $slope) {
                                        echo Form::checkbox('wind_shingles_damaged_slope[' . $key . ']', $slope_values['wind_shingles_damaged_slope'][$key], 
                                                   isset($data['wind_shingles_damaged_slope']) && 
                                                   in_array($key, !is_array($data['wind_shingles_damaged_slope']) 
                                                   ? array_keys(unserialize($data['wind_shingles_damaged_slope'])) : array_keys($data['wind_shingles_damaged_slope']))
                                                   ? true : false, 
                                                   array('id' => 'wind_shingles_damaged_slope' . $count, 'class' => $key)) . "\n" .
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

                <div class="row">
                    <label for="fraud_wind_input">Fraud Wind Input: </label>
                    <div class="right chk_type_of_roofing fraud_wind_input">
                        <?php
                            $count = 0;
                            foreach($fraud_wind_input as $key => $value) {
                                echo Form::checkbox('fraud_wind_input[' . $key . ']', $data_values['fraud_wind_input'][$key], 
                                    isset($data['fraud_wind_input']) && 
                                     in_array($key, !is_array($data['fraud_wind_input']) 
                                                   ? array_keys(unserialize($data['fraud_wind_input'])) : array_keys($data['fraud_wind_input']))
                                                   ? true : false,
                                     array('id' => 'fraud_wind_input' . $count)) . "\n" .
                                     Form::label('fraud_wind_input' . $count, $value) . "\n";

                                    $count++;
                            } 
                        ?>
                        <div class="cl"></div>
                    </div>
                </div>    

                <div class="row">
                    <label for="wind_comments">Comments</label>

                    <div class="right has_slope_select" rel="slope_wind_roof_peeled_back">
                        <?php echo Form::input('wind_comments', isset($data['wind_comments']) ? $data['wind_comments'] : null); ?>
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
                                        echo Form::checkbox('slope_wind_roof_peeled_back[' . $key . ']', $slope_values['slope_wind_roof_peeled_back'][$key], 
                                                   isset($data['slope_wind_roof_peeled_back']) && 
                                                   in_array($key, !is_array($data['slope_wind_roof_peeled_back']) 
                                                   ? array_keys(unserialize($data['slope_wind_roof_peeled_back'])) : array_keys($data['slope_wind_roof_peeled_back']))
                                                   ? true : false, 
                                                   array('id' => 'slope_wind_roof_peeled_back' . $count, 'class' => $key)) . "\n" .
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

<!-- Hail -->
<div class="section">
    <div class="box">
            <div class="title slope-title-helper">
                Hail
                <span class="show"></span>
            </div>
            <div class="content">
                
                <div class="row">
                    <?php echo Form::checkbox('hail_header', "1", isset($data['hail_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'hail_header')); ?>
                    <label for="hail_header"><strong>Check if apply</strong></label>

                </div>

                <div class="row slope" id="slope_hail_amount_damaged" style="display: block !important">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Amount Damaged)</div>
                            <div class="content" style="display: block !important">
                                <?php
                                    $count = 0;
                                    foreach($slopes as $key => $slope) {
                                        echo Form::checkbox('slope_hail_amount_damaged[' . $key . ']', $slope_values['slope_hail_amount_damaged'][$key], 
                                                   isset($data['slope_hail_amount_damaged']) && 
                                                   in_array($key, !is_array($data['slope_hail_amount_damaged']) 
                                                   ? array_keys(unserialize($data['slope_hail_amount_damaged'])) : array_keys($data['slope_hail_amount_damaged']))
                                                   ? true : false, 
                                                   array('id' => 'slope_hail_amount_damaged' . $count, 'class' => $key)) . "\n" .
                                        Form::label('slope_hail_amount_damaged' . $count, $slope) . "\n";

                                        $count++;
                                    } ?>

                                
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>                
                </div>

                <div class="row">
                    <label for="fraud_hail_input">Fraud Hail Input: </label>
                    <div class="right chk_type_of_roofing fraud_wind_input">
                        <?php
                            $count = 0;
                            foreach($fraud_hail_input as $key => $value) {
                                echo Form::checkbox('fraud_hail_input[' . $key . ']', $data_values['fraud_hail_input'][$key], 
                                    isset($data['fraud_hail_input']) &&
                                    in_array($key, !is_array($data['fraud_hail_input']) 
                                                   ? array_keys(unserialize($data['fraud_hail_input'])) : array_keys($data['fraud_hail_input']))
                                                   ? true : false, array('id' => 'fraud_hail_input' . $count)) . "\n" .
                                     Form::label('fraud_hail_input' . $count, $value) . "\n";

                                    $count++;
                            } 
                        ?>
                        <div class="cl"></div>
                    </div>
                </div>    

                <div class="row">
                    <label for="hail_comments">Comments</label>

                    <div class="right">
                        <?php echo Form::input('hail_comments', isset($data['hail_comments']) ? $data['hail_comments'] : null); ?>
                    </div>
                </div>
                
            </div>
        </div>
</div>
<!-- End Hail -->

<!-- Collateral Damage -->
<div class="section">
    <div class="box">
            <div class="title slope-title-helper">
                Collateral Damages
                <span class="show"></span>
            </div>
            <div class="content">
                
                <div class="row">
                    <?php echo Form::checkbox('collateral_damage_header', "1", isset($data['collateral_damage_header']) ? true : null, 
                                              array('class' => 'check_if_apply', 'id' => 'collateral_damage_header')); ?>
                    <label for="collateral_damage_header"><strong>Check if apply</strong></label>

                </div>

                <div class="row">
                    <label for="collateral_damages">Damages: </label>
                    <div class="right chk_type_of_roofing fraud_wind_input">
                        <?php
                            $count = 0;
                            foreach($collateral_damamges as $key => $value) {
                                echo Form::checkbox('collateral_damages[' . $key . ']', $data_values['collateral_damages'][$key], 
                                    isset($data['collateral_damages']) &&
                                    in_array($key, !is_array($data['collateral_damages']) 
                                                   ? array_keys(unserialize($data['collateral_damages'])) : array_keys($data['collateral_damages']))
                                                   ? true : false, array('id' => 'collateral_damages' . $count)) . "\n" .
                                     Form::label('collateral_damages' . $count, $value) . "\n";

                                    $count++;
                            } 
                        ?>
                        <div class="cl"></div>
                    </div>
                </div>    

                <div class="row">
                    <label for="collateral_damamges_comments">Comments</label>

                    <div class="right">
                        <?php echo Form::input('collateral_damamges_comments', isset($data['collateral_damamges_comments']) ? $data['collateral_damamges_comments'] : null); ?>
                    </div>
                </div>
                
            </div>
        </div>
</div>
<!-- End Collateral Damage -->

<div class="section">
    <div class="box">
            <div class="title slope-title-helper">
                Metal Damage
                <span class="show"></span>
            </div>
            <div class="content">

                <div class="row">
                    <?php echo Form::checkbox('metal_header', "1", isset($data['metal_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'metal_header')); ?>
                    <label for="metal_header"><strong>Check if apply</strong></label>
                </div> 

                <div class="row slope">
                    <label for="metal_damages">Damages: </label>
                    <div class="right chk_type_of_roofing fraud_wind_input">
                        <?php
                            $count = 0;
                            foreach($metal_damages as $key => $value) {
                                echo Form::checkbox('metal_damages[' . $key . ']', $data_values['metal_damages'][$key], 
                                    isset($data['metal_damages']) &&
                                     in_array($key, !is_array($data['metal_damages']) 
                                                   ? array_keys(unserialize($data['metal_damages'])) : array_keys($data['metal_damages']))
                                                   ? true : false,
                                     array('id' => 'metal_damages' . $count, 'class' => 'metal-damage comment-box')) . "\n" .
                                     Form::label('metal_damages' . $count, $value) . "\n";

                                    $count++;
                            } 
                        ?>
                        <div class="cl"></div>
                    </div>
                </div>   

                <div class="row">
                    <label for="metal_damage_hail_size">Hail Size</label>
                    <div class="right">
                        <?php echo Form::select('metal_damage_hail_size', array('blank' => 'Please Select') + $hail_sizes, 
                                                 isset($data['metal_damage_hail_size']) ? $data['metal_damage_hail_size'] : null); ?>
                    </div>
                </div>

                <div class="row">
                    <label for="metal_damage_comments">Comments</label>

                    <div class="right">
                        <?php echo Form::input('metal_damage_comments', isset($data['metal_damage_comments']) ? $data['metal_damage_comments'] : ''); ?>
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
                    <textarea name="general_comments"><?php echo isset($data['general_comments']) ? $data['general_comments'] : null; ?></textarea>
                </div>
            </div>
            
            <div class="row">
                <button class="blue" type="submit"><span>Save</span></button>
            </div>
            
        </div>
    </div>
</div>

