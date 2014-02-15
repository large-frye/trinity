<div class="box">
        <div class="title"><?php echo $inspection_type; ?> Report</div>

        <div class="content">

            <!-- <div class="row">
                <label for="roof_square_feet">Roof Square Feet</label>

                <div class="right">
                    <input type="text" name="roof_square_feet" id="roof_square_feet" value="">
                </div>
            </div> -->

            <div class="row">
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
            </div>    -->    

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
            </div>        -->

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
                    <?php echo Form::radio('was_roofer_present', 1, isset($data['was_roofer_present']) && $data['was_roofer_present'] == 1 ? true : false, array('id' => 'was_roofer_present0', 'class' => 'roofer-present')) .
                               Form::label('was_roofer_present0', 'Yes') .
                               Form::radio('was_roofer_present', 0, isset($data['was_roofer_present']) && $data['was_roofer_present'] == 1 ? false : true, array('id' => 'was_roofer_present1', 'class' => 'roofer-present')) .
                               Form::label('was_roofer_present1', 'No'); ?>
                </div>
            </div>    

            <div class="row roofer <?php echo $data['was_insured_present'] == 1 ? "show" : null; ?>">
                <label for="roofer">Roofer: </label>

                <div class="right">
                    <?php echo Form::input('roofer', isset($data['roofer']) ? $data['roofer'] : null); ?>
                </div>
            </div>    

            <div class="row roofer <?php echo $data['was_insured_present'] == 1 ? "show" : null; ?>">
                <label for="roofer_company_name">Roofer Company Name: </label>

                <div class="right">
                    <?php echo Form::input('roofer_company_name', isset($data['roofer_company_name']) ? $data['roofer_company_name'] : null); ?>
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
                <label for="agreed_hail ">Did the roofer agree with hail assessment? </label>

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
            </div>    -->

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

            <!-- <div class="row">
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
            </div> -->
        </div>
    </div>
</div>

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
    <div class="row">
                <label for="house_face">What direction does the house face?</label>

                <div class="right">
                    <?php echo Form::select('house_face', array('blank' => 'Please select') + $house_faces['direction'], 
                                            isset($data['house_face']) ? $data['house_face'] : null, 
                                            array('class' => 'house-face')); ?>
                </div>
            </div>
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

<!-- End Hail -->
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
            <div class="title slope-title-helper">
                Lightning
                <span class="show"></span>
            </div>
            <div class="content">
                <div class="row">
                    <?php echo Form::checkbox('lightning_header', "1", isset($data['lightning_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'lightning_header')); ?>
                    <label for="lightning_header"><strong>Check if apply</strong></label>
                </div> 
                <div class="row">
                    <label for="lightning_amount_damaged">Was there damage to the roofing?</label>

                    <div class="right has_slope_radio" rel="slope_lightning_amount_damaged">
                        <?php echo Form::radio('lightning_amount_damaged', 1, isset($data['lightning_amount_damaged']) && $data['lightning_amount_damaged'] == 1 ? true : false, array('id' => 'lightning_amount_damaged0')) .
                                   Form::label('lightning_amount_damaged0', 'Yes') .
                                   Form::radio('lightning_amount_damaged', 0, isset($data['lightning_amount_damaged']) && $data['lightning_amount_damaged'] == 1 ? false : true, array('id' => 'lightning_amount_damaged1')) .
                                   Form::label('lightning_amount_damaged1', 'No'); ?>
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
                                        echo Form::checkbox('slope_lightning_amount_damaged[' . $key . ']', $slope_values['slope_lightning_amount_damaged'][$key], 
                                            isset($data['slope_lightning_amount_damaged']) &&  
                                            in_array($key, !is_array($data['slope_lightning_amount_damaged']) 
                                                   ? array_keys(unserialize($data['slope_lightning_amount_damaged'])) : array_keys($data['slope_lightning_amount_damaged']))
                                                   ? true : false,
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
                                        echo Form::checkbox('lightning_damages[' . $key . ']', $data_values['lightning_damages'][$key], 
                                            isset($data['lightning_damages']) &&  
                                            in_array($key, !is_array($data['lightning_damages']) 
                                                   ? array_keys(unserialize($data['lightning_damages'])) : array_keys($data['lightning_damages']))
                                                   ? true : false,
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
            <div class="title slope-title-helper">
                Vermin
                <span class="show"></span>
            </div>
            <div class="content">
            
                <div class="row">
                    <?php echo Form::checkbox('vermin_header', "1", isset($data['vermin_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'vermin_header')); ?>
                    <label for="vermin_header"><strong>Check if apply</strong></label>
                </div> 

                <div class="row">
                    <label for="vermin_roofing_damage">Was the roof damaged?</label>

                    <div class="right has_slope_radio" rel="slope_vermin_roofing_damaged">
                        <?php echo Form::radio('slope_vermin_roofing_damaged', 1, isset($data['slope_vermin_roofing_damaged']) && $data['slope_vermin_roofing_damaged'] == 1 ? true : false, array('id' => 'slope_vermin_roofing_damaged0')) .
                                   Form::label('slope_vermin_roofing_damaged0', 'Yes') .
                                   Form::radio('slope_vermin_roofing_damaged', 0, isset($data['slope_vermin_roofing_damaged']) && $data['slope_vermin_roofing_damaged'] == 1 ? false : true, array('id' => 'slope_vermin_roofing_damaged1')) .
                                   Form::label('slope_vermin_roofing_damaged1', 'No'); ?>
                    </div>
                </div>        

                <div class="row slope" id="slope_vermin_roofing_damaged">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Roofing Damaged)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    foreach($slopes as $key => $slope) {
                                        echo Form::checkbox('slope_vermin_roofing_damage[' . $key . ']', $slope_values['slope_vermin_roofing_damage'][$key], 
                                            isset($data['slope_vermin_roofing_damage']) && 
                                            in_array($key, !is_array($data['slope_vermin_roofing_damage']) 
                                                   ? array_keys(unserialize($data['slope_vermin_roofing_damage'])) : array_keys($data['slope_vermin_roofing_damage']))
                                                   ? true : false,
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
                    <label for="vermin_fascia_damage">Was there fascia damage?</label>

                    <div class="right has_slope_radio" rel="slope_vermin_fascia_damage">
                        <?php echo Form::radio('slope_vermin_fascia_damaged', 1, isset($data['slope_vermin_fascia_damaged']) && $data['slope_vermin_fascia_damaged'] == 1 ? true : false, array('id' => 'slope_vermin_fascia_damaged0')) .
                                   Form::label('slope_vermin_fascia_damaged0', 'Yes') .
                                   Form::radio('slope_vermin_fascia_damaged', 0, isset($data['slope_vermin_fascia_damaged']) && $data['slope_vermin_fascia_damaged'] == 1 ? false : true, array('id' => 'slope_vermin_fascia_damaged1')) .
                                   Form::label('slope_vermin_fascia_damaged1', 'No'); ?>
                    </div>
                </div>         

                <div class="row slope" id="slope_vermin_fascia_damage">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Fascia Damaged)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                        echo Form::checkbox('slope_vermin_fascia_damage[' . $key . ']', $slope_values['slope_vermin_fascia_damage'][$key], 
                                            isset($data['slope_vermin_fascia_damage']) &&  
                                            in_array($key, !is_array($data['slope_vermin_fascia_damage']) 
                                                   ? array_keys(unserialize($data['slope_vermin_fascia_damage'])) : array_keys($data['slope_vermin_fascia_damage']))
                                                   ? true : false,
                                                 array('id' => 'slope_vermin_fascia_damage' . $count, 'class' => 'comment-box')) . "\n" .
                                        Form::label('slope_vermin_fascia_damage' . $count, $slope) . "\n";

                                        $count++;
                                    } ?>
                                
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>                
                </div>

                
                <div class="row">
                    <label for="vermin_vent_damage">Was there vent damage?</label>

                    <div class="right has_slope_radio" rel="slope_vermin_vent_damage">
                        <?php echo Form::radio('vermin_vent_damage', 1, isset($data['vermin_vent_damage']) && $data['vermin_vent_damage'] == 1 ? true : false, array('id' => 'vermin_vent_damage0')) .
                                   Form::label('vermin_vent_damage0', 'Yes') .
                                   Form::radio('vermin_vent_damage', 0, isset($data['vermin_vent_damage']) && $data['vermin_vent_damage'] == 1 ? false : true, array('id' => 'vermin_vent_damage1')) .
                                   Form::label('vermin_vent_damage1', 'No'); ?>
                    </div>
                </div>       

               <div class="row slope" id="slope_vermin_vent_damage">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Vent Damaged)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                        echo Form::checkbox('slope_vermin_vent_damage[' . $key . ']', $slope_values['slope_vermin_vent_damage'][$key], 
                                            isset($data['slope_vermin_vent_damage']) && 
                                            in_array($key, !is_array($data['slope_vermin_vent_damage']) 
                                                   ? array_keys(unserialize($data['slope_vermin_vent_damage'])) : array_keys($data['slope_vermin_vent_damage']))
                                                   ? true : false,
                                                 array('id' => 'slope_vermin_vent_damage' . $count, 'class' => 'comment-box')) . "\n" .
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
            <div class="title slope-title-helper">
                Ice
                <span class="show"></span>
            </div>
            <div class="content">
                <div class="row">
                    <?php echo Form::checkbox('ice_header', "1", isset($data['ice_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'ice_header')); ?>
                    <label for="ice_header"><strong>Check if apply</strong></label>
                </div> 
                
                <div class="row">
                    
                    <label>Ice Damming</label>
                    
                    <div class="right has_slope_checkbox" rel="slope_ice_damming">
                        <input type="hidden" name="ice_damming" value="blank">

                        <input type="checkbox" name="ice_damming" id="ice_damming" value="1"
                            <?php echo isset($data['ice_damming']) && $data['ice_damming'] ? "checked=checked" : null; ?> />
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
                                        echo Form::checkbox('slope_ice_damming[' . $key . ']', $slope_values['slope_ice_damming'][$key],
                                            isset($data['slope_ice_damming']) && 
                                                 in_array($key, !is_array($data['slope_ice_damming']) 
                                                   ? array_keys(unserialize($data['slope_ice_damming'])) : array_keys($data['slope_ice_damming']))
                                                   ? true : false,  
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

                        <input type="checkbox" name="ice_fallen_ice" id="ice_fallen_ice" value="1" 
                               <?php echo isset($data['ice_fallen_ice']) && $data['ice_fallen_ice'] == 1 ? "checked=checked" : null; ?> />
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
                                        echo Form::checkbox('slope_fallen_ice[' . $key . ']', $slope_values['slope_fallen_ice'][$key], 
                                            isset($data['slope_fallen_ice']) && 
                                                 in_array($key, !is_array($data['slope_fallen_ice']) 
                                                   ? array_keys(unserialize($data['slope_fallen_ice'])) : array_keys($data['slope_fallen_ice']))
                                                   ? true : false,
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
            <div class="title slope-title-helper">
                Fallen Tree
                <span class="show"></span>
            </div>
            <div class="content">

                <div class="row">
                    <?php echo Form::checkbox('fallen_tree_header', "1", isset($data['fallen_tree_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'fallen_tree_header')); ?>
                    <label for="fallen_tree_header"><strong>Check if apply</strong></label>
                </div> 

                <div class="row">
                    <label for="fallen_tree_damages">Damages</label>

                    <div class="right chk_type_of_roofing">
                        <?php
                        $count = 0;
                        foreach($tree_information['damages'] as $key => $option) {
                            echo Form::checkbox('fallen_tree_damages[' . $key . ']', $data_values['fallen_tree_damages'][$key],
                                 isset($data['fallen_tree_damages']) && 
                                                   in_array($key, !is_array($data['fallen_tree_damages']) 
                                                   ? array_keys(unserialize($data['fallen_tree_damages'])) : array_keys($data['fallen_tree_damages']))
                                                   ? true : false,
                                 array('id' => 'fallen_tree_damages' . $count, 'class' => 'fallen-tree')) . 
                                 Form::label('fallen_tree_damages' . $count, $option);
                            $count++;
                        } ?>
                        
                        <div class="cl"></div>
                    </div>
                    <p class="italic fallen-tree-p">Note: When saving a comment for a type, "c" appears next to the type letting you know that comment has been saved.</p>
                </div>                
            </div>
        </div>
</div>


<div class="section">
    <div class="box">
            <div class="title slope-title-helper">
                Excess Debris
                <span class="show"></span>
            </div>
            <div class="content">
            
                <div class="row">
                    <?php echo Form::checkbox('excess_debris_header', "1", isset($data['excess_debris_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'excess_debris_header')); ?>
                    <label for="excess_debris_header"><strong>Check if apply</strong></label>
                </div>

                <div class="row">
                    <label for="excess_debris_location">Location</label>

                    <div class="right has_slope_checkbox chk_excess_debris_location" rel="slope_excess_debris_location">
                        <?php
                        $count = 0;
                        foreach($debris as $key => $option) {
                            echo Form::checkbox('excess_debris_location[' . $key .']', $data_values['excess_debris_location'][$key], 
                                 isset($data['excess_debris_location']) && 
                                 in_array($key, !is_array($data['excess_debris_location']) ? array_keys(unserialize($data['excess_debris_location'])) 
                                                                                           : array_keys($data['excess_debris_location']))
                                 ? true : false, 
                                 array('id' => 'excess_debris_location' . $count)) . 
                                 Form::label('excess_debris_location' . $count, $option);
                            $count++;
                        } ?>
                        
                        <div class="cl"></div>
                    </div>
                </div>    

                <div class="row slope" id="slope_excess_debris_location">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Location)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    foreach($slopes as $key => $option) {
                                         echo Form::checkbox('slope_excess_debris_location[' . $key . ']', $slope_values['slope_excess_debris_location'][$key],
                                              isset($data['slope_excess_debris_location']) && 
                                                   in_array($key, !is_array($data['slope_excess_debris_location']) 
                                                   ? array_keys(unserialize($data['slope_excess_debris_location'])) : array_keys($data['slope_excess_debris_location']))
                                                   ? true : false,
                                 array('id' => 'slope_excess_debris_location' . $count, 'class' => 'comment-box')) . 
                                 Form::label('slope_excess_debris_location' . $count, $option);
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
            <div class="title slope-title-helper">
                Standing Water
                <span class="show"></span>
            </div>
            <div class="content">
            
                <div class="row">
                <?php echo Form::checkbox('standing_water_header', "1", isset($data['standing_water_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'standing_water_header')); ?>
                    <label for="standing_water_header"><strong>Check if apply</strong></label>
                </div>

                <div class="row">
                    <label for="standing_water_select">Select</label>

                    <div class="right has_slope_checkbox chk_standing_water_select" rel="slope_standing_water">
                        <?php
                        $count = 0;
                        foreach($water_damages as $key => $option) {
                            echo Form::checkbox('standing_water_select[' . $key . ']', $data_values['standing_water_select'][$key], 
                                 isset($data['standing_water_select']) && 
                                                   in_array($key, !is_array($data['standing_water_select']) 
                                                   ? array_keys(unserialize($data['standing_water_select'])) : array_keys($data['standing_water_select']))
                                                   ? true : false, array('id' => 'standing_water_select' . $count)) . 
                                 Form::label('standing_water_select' . $count, $option);
                            $count++;
                        } ?>
                        
                        <div class="cl"></div>
                    </div>
                </div>    

                <div class="row slope" id="slope_standing_water">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_standing_water[' . $key . ']', $slope_values['slope_standing_water'][$key],
                                              isset($data['slope_standing_water']) && 
                                                   in_array($key, !is_array($data['slope_standing_water']) 
                                                   ? array_keys(unserialize($data['slope_standing_water'])) : array_keys($data['slope_standing_water']))
                                                   ? true : false,
                                 array('id' => 'slope_standing_water' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_standing_water' . $count, $slope) . "\n";

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
            <div class="title slope-title-helper">
                Product Defects
                <span class="show"></span>
            </div>
            <div class="content">
            
                <div class="row">
                <?php echo Form::checkbox('product_defects_header', "1", isset($data['product_defects_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'product_defects_header')); ?>
                    <label for="product_defects_header"><strong>Check if apply</strong></label>
                </div>
                
                <!-- {{#errors.product_defects}}
                    <div class="row">
                        <div class="right">
                            <label class="error">{{errors.product_defects}}</label>
                        </div>
                    </div>
                {{/errors.product_defects}}        -->

                <div class="row">
                    <label for="product_defects_asphalt_coating_defect">Asphalt Coating Defect</label>

                    <div class="right has_slope_select" rel="slope_product_defects_asphalt">
                        <?php echo Form::select('product_defects_asphalt_coating_defect', $product_defects, isset($data['product_defects_asphalt_coating_defect']) ?
                                                                                                            $data['product_defects_asphalt_coating_defect'] : 
                                                                                                            'blank') .
                                   Form::label('product_defects_asphalt_coating_defect', 'Asphalt Coating Defect');
                        ?>
                    </div>
                </div>    

                <div class="row slope" id="slope_product_defects_asphalt">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Asphalt Coating Defect)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_product_defects_asphalt[' . $key . ']', $slope_values['slope_product_defects_asphalt'][$key],
                                              isset($data['slope_product_defects_asphalt']) && 
                                                   in_array($key, !is_array($data['slope_product_defects_asphalt']) 
                                                   ? array_keys(unserialize($data['slope_product_defects_asphalt'])) : array_keys($data['slope_product_defects_asphalt']))
                                                   ? true : false,
                                 array('id' => 'slope_product_defects_asphalt' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_product_defects_asphalt' . $count, $slope) . "\n";

                                        $count++;
                                    } ?>
                                
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>                
                </div>
                    

                <div class="row">
                    <label for="product_defects_blistering">Blistering</label>

                    <div class="right has_slope_select" rel="slope_product_defects_blistering">
                        <?php echo Form::select('product_defects_blistering', $product_defects, isset($data['product_defects_blistering']) ?
                                                                                                            $data['product_defects_blistering'] : 
                                                                                                            'blank') .
                                   Form::label('product_defects_blistering', 'Blistering');
                        ?>
                    </div>
                </div>    

                <div class="row slope" id="slope_product_defects_blistering">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Blistering)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_product_defects_blistering[' . $key . ']', $slope_values['slope_product_defects_blistering'][$key],
                                              isset($data['slope_product_defects_blistering']) && 
                                                   in_array($key, !is_array($data['slope_product_defects_blistering']) 
                                                   ? array_keys(unserialize($data['slope_product_defects_blistering'])) : array_keys($data['slope_product_defects_blistering']))
                                                   ? true : false,
                                 array('id' => 'slope_product_defects_blistering' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_product_defects_blistering' . $count, $slope) . "\n";

                                        $count++;
                                    } ?>
                                
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>                
                </div>

                <div class="row">
                    <label for="product_defects_flaking">Flaking</label>

                    <div class="right has_slope_select" rel="slope_product_defects_flaking">
                        <?php echo Form::select('product_defects_flaking', $product_defects, isset($data['product_defects_flaking']) ?
                                                                                                            $data['product_defects_flaking'] : 
                                                                                                            'blank') .
                                   Form::label('product_defects_flaking', 'Flaking');
                        ?>
                    </div>
                </div>    

                <div class="row slope" id="slope_product_defects_flaking">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Flaking)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_product_defects_flaking[' . $key . ']', $slope_values['slope_product_defects_flaking'][$key],
                                              isset($data['slope_product_defects_flaking']) && 
                                                   in_array($key, !is_array($data['slope_product_defects_flaking']) 
                                                   ? array_keys(unserialize($data['slope_product_defects_flaking'])) : array_keys($data['slope_product_defects_flaking']))
                                                   ? true : false,
                                 array('id' => 'slope_product_defects_flaking' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_product_defects_flaking' . $count, $slope) . "\n";

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
            <div class="title slope-title-helper">
                Workmanship / Improper Installation
                <span class="show"></span>
            </div>
            <div class="content">
             
                <div class="row">
                <?php echo Form::checkbox('workmanship_header', "1", isset($data['workmanship_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'workmanship_header')); ?>
                    <label for="workmanship_header"><strong>Check if apply</strong></label>
                </div>
                
                <!-- {{#errors.workmanship}}
                    <div class="row">
                        <div class="right">
                            <label class="error">{{errors.workmanship}}</label>
                        </div>
                    </div>
                {{/errors.workmanship}}    -->    

                <div class="row">
                    <label for="workmanship_improper_nailing">Improper Nailing</label>

                    <div class="right has_slope_checkbox" rel="slope_workmanship_improper_nailing">
                        <?php
                        $count = 0;
                        foreach($workmanship['improper_nailing'] as $key => $option) {
                            echo Form::checkbox('workmanship_improper_nailing[' . $key . ']', $data_values['workmanship_improper_nailing'][$key], 
                                 isset($data['workmanship_improper_nailing']) && 
                                                   in_array($key, !is_array($data['workmanship_improper_nailing']) 
                                                   ? array_keys(unserialize($data['workmanship_improper_nailing'])) : array_keys($data['workmanship_improper_nailing']))
                                                   ? true : false, array('id' => 'workmanship_improper_nailing' . $count)) . 
                                 Form::label('workmanship_improper_nailing' . $count, $option);
                            $count++;
                        } ?>
                    </div>
                </div>    

                <div class="row slope" id="slope_workmanship_improper_nailing">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Improper Nailing)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_workmanship_improper_nailing[' . $key . ']', $slope_values['slope_workmanship_improper_nailing'][$key],
                                              isset($data['slope_workmanship_improper_nailing']) && 
                                                   in_array($key, !is_array($data['slope_workmanship_improper_nailing']) 
                                                   ? array_keys(unserialize($data['slope_workmanship_improper_nailing'])) : array_keys($data['slope_workmanship_improper_nailing']))
                                                   ? true : false,
                                 array('id' => 'slope_workmanship_improper_nailing' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_workmanship_improper_nailing' . $count, $slope) . "\n";

                                        $count++;
                                    } ?>
                                
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>                
                </div>
        

                <div class="row">
                    
                    <label>Improper Overlap</label>
                    
                    <div class="right has_slope_checkbox" rel="slope_workmanship_improper_overlap">
                    
                        <input type="hidden" name="workmanship_improper_overlap" value="blank" />
                        
                        <input type="checkbox" name="workmanship_improper_overlap" id="workmanship_improper_overlap" 
                                value='yes' <?php echo isset($data["workmanship_improper_nailing"]) ? "checked" : null; ?> />
                        
                        <label for="workmanship_improper_overlap">Yes</label>

                    </div>
                </div>    

                <div class="row slope" id="slope_workmanship_improper_overlap">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Improper Overlap)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_workmanship_improper_overlap[' . $key . ']', $slope_values['slope_workmanship_improper_overlap'][$key],
                                              isset($data['slope_workmanship_improper_overlap']) && 
                                                   in_array($key, !is_array($data['slope_workmanship_improper_overlap']) 
                                                   ? array_keys(unserialize($data['slope_workmanship_improper_overlap'])) : array_keys($data['slope_workmanship_improper_overlap']))
                                                   ? true : false,
                                 array('id' => 'slope_workmanship_improper_overlap' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_workmanship_improper_overlap' . $count, $slope) . "\n";

                                        $count++;
                                    } ?>
                                
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>                
                </div>
                    

                <div class="row">
                    <label for="workmanship_flashing">Flashing</label>

                    <div class="right has_slope_checkbox chk_workmanship_flashing" rel="slope_workmanship_flashing">
                        <?php
                                    $count = 0;
                                    foreach($workmanship['flashing'] as $key => $option) {
                                        echo Form::checkbox('workmanship_flashing[' . $key . ']', $data_values['workmanship_flashing'][$key], 
                                             isset($data['workmanship_flashing']) && 
                                                   in_array($key, !is_array($data['workmanship_flashing']) 
                                                   ? array_keys(unserialize($data['workmanship_flashing'])) : array_keys($data['workmanship_flashing']))
                                                   ? true : false, array('id' => 'workmanship_flashing' . $count)) . 
                                        Form::label('workmanship_flashing' . $count, $option);
                                        $count++;
                                } ?>
                        
                        <div class="cl"></div>
                    </div>
                </div>    

                <div class="row slope" id="slope_workmanship_flashing">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Flashing)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_workmanship_flashing[' . $key . ']', $slope_values['slope_workmanship_flashing'][$key],
                                              isset($data['slope_workmanship_flashing']) && 
                                                   in_array($key, !is_array($data['slope_workmanship_flashing']) 
                                                   ? array_keys(unserialize($data['slope_workmanship_flashing'])) : array_keys($data['slope_workmanship_flashing']))
                                                   ? true : false,
                                 array('id' => 'slope_workmanship_flashing' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_workmanship_flashing' . $count, $slope) . "\n";

                                        $count++;
                                    } ?>
                                
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>                
                </div>
                
                <div class="row">
                    <label for="workmanship_flashing_missing">Flashing Missing</label>

                    <div class="right has_slope_checkbox" rel="slope_workmanship_flashing_missing">
                        <?php
                                    $count = 0;
                                    foreach($workmanship['flashing_missing'] as $key => $option) {
                                        echo Form::checkbox('workmanship_flashing_missing[]', $data_values['workmanship_flashing_missing'][$key], 
                                             isset($data['workmanship_flashing_missing']) && 
                                                   in_array($key, !is_array($data['workmanship_flashing_missing']) 
                                                   ? array_keys(unserialize($data['workmanship_flashing_missing'])) : array_keys($data['workmanship_flashing_missing']))
                                                   ? true : false, array('id' => 'workmanship_flashing_missing' . $count)) . 
                                        Form::label('workmanship_flashing_missing' . $count, $option);
                                        $count++;
                                } ?>
                    </div>
                </div>    

                <div class="row slope" id="slope_workmanship_flashing_missing">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Flashing Missing)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_workmanship_flashing_missing[' . $key . ']', $slope_values['slope_workmanship_flashing_missing'][$key],
                                              isset($data['slope_workmanship_flashing_missing']) && 
                                                   in_array($key, !is_array($data['slope_workmanship_flashing_missing']) 
                                                   ? array_keys(unserialize($data['slope_workmanship_flashing_missing'])) : array_keys($data['slope_workmanship_flashing_missing']))
                                                   ? true : false,
                                 array('id' => 'slope_workmanship_flashing_missing' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_workmanship_flashing_missing' . $count, $slope) . "\n";

                                        $count++;
                                    } ?>
                                
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>                
                </div>
                
            
                <div class="row">
                    <label for="workmanship_venting">Venting</label>
    
                    <div class="right has_slope_checkbox" rel="slope_workmanship_venting">
                        <?php
                                    $count = 0;
                                    foreach($workmanship['venting'] as $key => $option) {
                                        echo Form::checkbox('workmanship_venting[]', $data_values['workmanship_venting'][$key], 
                                            isset($data['workmanship_venting']) && 
                                                   in_array($key, !is_array($data['workmanship_venting']) 
                                                   ? array_keys(unserialize($data['workmanship_venting'])) : array_keys($data['workmanship_venting']))
                                                   ? true : false, array('id' => 'workmanship_venting' . $count)) . 
                                        Form::label('workmanship_venting' . $count, $option);
                                        $count++;
                                } ?>
                    </div>
                </div>    

                <div class="row slope" id="slope_workmanship_venting">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Venting)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_workmanship_venting[' . $key . ']', $slope_values['slope_workmanship_venting'][$key],
                                              isset($data['slope_workmanship_venting']) && 
                                                   in_array($key, !is_array($data['slope_workmanship_venting']) 
                                                   ? array_keys(unserialize($data['slope_workmanship_venting'])) : array_keys($data['slope_workmanship_venting']))
                                                   ? true : false,
                                 array('id' => 'slope_workmanship_venting' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_workmanship_venting' . $count, $slope) . "\n";

                                        $count++;
                                    } ?>

                                
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>                
                </div>
            

                <div class="row">
                    
                    <label>Incorrect Materials</label>
                    
                    <div class="right has_slope_checkbox" rel="slope_workmanship_incorrect_materials">
                    
                        <input type="hidden" name="workmanship_incorrect_materials" value="blank" />                    

                        <input type="checkbox" name="workmanship_incorrect_materials" id="workmanship_incorrect_materials" value="yes"
                               <?php echo isset($data["workmanship_incorrect_materials"]) ? "checked" : null; ?>  />
                        
                        <label for="workmanship_incorrect_materials">Yes</label>
                        
                    </div>
                </div>    

                <div class="row slope" id="slope_workmanship_incorrect_materials">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Incorrect Materials)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_workmanship_incorrect_materials[' . $key . ']', $slope_values['slope_workmanship_incorrect_materials'][$key],
                                              isset($data['slope_workmanship_incorrect_materials']) && 
                                                   in_array($key, !is_array($data['slope_workmanship_incorrect_materials']) 
                                                   ? array_keys(unserialize($data['slope_workmanship_incorrect_materials'])) : array_keys($data['slope_workmanship_incorrect_materials']))
                                                   ? true : false,
                                 array('id' => 'slope_workmanship_incorrect_materials' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_workmanship_incorrect_materials' . $count, $slope) . "\n";

                                        $count++;
                                    } ?>
                                
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>                
                </div>
                

                <div class="row">
                    
                    <label>Excessive Layers</label>
                    
                    <div class="right has_slope_checkbox" rel="slope_workmanship_excessive_layers">
                    
                        <input type="hidden" name="workmanship_excessive_layers" value="blank" />                    
                        
                        <input type="checkbox" name="workmanship_excessive_layers" id="workmanship_excessive_layers" value="yes"
                               <?php echo isset($data["workmanship_improper_nailing"]) ? "checked" : null; ?>  />
                        
                        <label for="workmanship_excessive_layers">Yes</label>
                        
                    </div>
                </div>    

                <div class="row slope" id="slope_workmanship_excessive_layers">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope (Excessive Layers)</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_workmanship_excessive_layers[' . $key . ']', $slope_values['slope_workmanship_excessive_layers'][$key],
                                              isset($data['slope_workmanship_excessive_layers']) && 
                                                   in_array($key, !is_array($data['slope_workmanship_excessive_layers']) 
                                                   ? array_keys(unserialize($data['slope_workmanship_excessive_layers'])) : array_keys($data['slope_workmanship_excessive_layers']))
                                                   ? true : false,
                                 array('id' => 'slope_workmanship_excessive_layers' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_workmanship_excessive_layers' . $count, $slope) . "\n";

                                        $count++;
                                    } ?>
                                
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>                
                </div>`

                <div class="row">
                        <label>Other</label>

                        <div class="right">

                            <input type="checkbox" name="workmanship_other" value="<?php echo isset($data['workmanship_other']) ? $data['workmanship_other'] : ''?>" 
                                   id="workmanship_other" />
                            
                            <label for="workmanship_other">Yes</label>
                            
                        </div>
                </div>        

                <div class="row">
                    <label for="workmanship_comments">Comments</label>

                    <div class="right">
                        <textarea name="workmanship_comments"><?php echo isset($data['workmanship_comments']) ? $data['workmanship_comments'] : null; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="section">
    <div class="box">
            <div class="title slope-title-helper">
                Aged / Worn
                <span class="show"></span>
            </div>
            <div class="content">
            
                <div class="row">
                <?php echo Form::checkbox('aged_worn_header', "1", isset($data['aged_worn_header']) ? true : false, array('class' => 'check_if_apply', 'id' => 'aged_worn_header')); ?>
                    <label for="aged_worn_header"><strong>Check if apply</strong></label>     
                </div>
                
                <!-- {{#errors.aged_worn}}
                    <div class="row">
                        <div class="right">
                            <label class="error">{{errors.aged_worn}}</label>
                        </div>
                    </div>
                {{/errors.aged_worn}}    -->

                <div class="row">
                    <label for="aged_worn_check_that_apply">Check All that Apply</label>

                    <div class="right has_slope_checkbox chk_aged_worn" rel="slope_aged_worn">
                        <?php
                                    $count = 0;
                                    foreach($aged_worn as $key => $option) {
                                        echo Form::checkbox('aged_worn_check_that_apply[' . $key . ']', $data_values['aged_worn_check_that_apply'][$key], 
                                             isset($data['aged_worn_check_that_apply']) && 
                                                   in_array($key, !is_array($data['aged_worn_check_that_apply']) 
                                                   ? array_keys(unserialize($data['aged_worn_check_that_apply'])) : array_keys($data['aged_worn_check_that_apply']))
                                                   ? true : false, array('id' => 'aged_worn_check_that_apply' . $count)) . 
                                        Form::label('aged_worn_check_that_apply' . $count, $option);
                                        $count++;
                                } ?>
                        
                        <div class="cl"></div>
                    </div>
                </div>    

                <div class="row slope" id="slope_aged_worn">
                    <div class="section">
                        <div class="box">
                            <div class="title">Select Slope</div>
                            <div class="content">
                                <?php
                                    $count = 0;
                                    $slopes += array('Entire Roof' => 'Entire Roof');
                                    foreach($slopes as $key => $slope) {
                                         echo Form::checkbox('slope_aged_worn[' . $key . ']', $slope_values['slope_aged_worn'][$key],
                                              isset($data['slope_aged_worn']) && 
                                                   in_array($key, !is_array($data['slope_aged_worn']) 
                                                   ? array_keys(unserialize($data['slope_aged_worn'])) : array_keys($data['slope_aged_worn']))
                                                   ? true : false,
                                 array('id' => 'slope_aged_worn' . $count, 'class' => 'comment-box')) .
                                        Form::label('slope_aged_worn' . $count, $slope) . "\n";

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
            <div class="title slope-title-helper">
                Fire Damages
                <span class="show"></span>
            </div>
            <div class="content">
            
                <div class="row">
                <?php echo Form::checkbox('fire_damages_header', "1", isset($data['fire_damages_header']) ? true : null, array('class' => 'check_if_apply', 'id' => 'fire_damages_header')); ?>
                    <label for="fire_damages_header"><strong>Check if apply</strong></label>     
                </div>
                
                <!-- {{#errors.fire_damages}}
                    <div class="row">
                        <div class="right">
                            <label class="error">{{errors.fire_damages}}</label>
                        </div>
                    </div>
                {{/errors.fire_damages}}    -->    

                <div class="row">
                    <label for="fire_damages_comment">Damages</label>

                    <div class="right">
                        <?php echo Form::input('fire_damages_comment', isset($data['fire_damages_comment']) ? $data['fire_damages_comment'] : null); ?>
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