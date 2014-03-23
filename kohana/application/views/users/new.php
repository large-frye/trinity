	<div class="section">
		<?php 
    if (isset($errors)) {
    	echo '<div class="message error">';

    	foreach($errors as $error) {
    		echo '<span>' . $error . '</span>';
    	}

    	echo '</div>';
    }

    if (isset($success)) { echo '<div class="message info"><p>' . $success . '</p></div>'; }
    echo Form::open('', array('id' => 'workorder-submit-form')); 
?>
		<div class="box">
			<div class="title">User</div>
			
			<div class="content">
			
				<div class="row">
					<label for="role">Usertype</label>

					<div class="right">
						<select name="role_id">
						<?php 
						foreach($user_types as $user_type) { 
							$selected = "";

							if (!isset($new_user) && $user_type->id == $user->role_id) {
								$selected = "selected=\"selected\"";
							}
							echo "<option value=\"" . $user_type->id ."\" " . $selected . ">" . ucfirst($user_type->name) . "</option>";
						 } ?>
						</select>
					</div>
				</div>				
				
				<div class="row">
					<?php echo Form::label('first_name', 'First Name') .
					           "<div class=\"right\">" .
					           Form::input('first_name', isset($user) ? $user->first_name : '', array('id' => 'first_name')) .
					           "</div>"; ?>
				</div>
				
				
				<!--	<div class="row">
						<div class="right error">
							{{errors.first_name}}
						</div>
					</div> -->
				
				<div class="row">
					<?php echo Form::label('last_name', 'Last Name') .
					           "<div class=\"right\">" .
					           Form::input('last_name', isset($user) ? $user->last_name : '', array('id' => 'last_name')) .
					           "</div>"; ?>
				</div>
				
				<div class="row">
					<?php echo Form::label('phone', 'Phone Number') .
					           "<div class=\"right\">" .
					           Form::input('phone', isset($user) ? $user->phone : '', array('id' => 'phone')) .
					           "</div>"; ?>
				</div>
				
				<div class="row">
					<?php echo Form::label('geographic_region', 'Geographical Region') .
					           "<div class=\"right\">" .
					           Form::input('geographic_region', isset($user) ? $user->geographic_region : '', array('id' => 'geographic_region')) .
					           "</div>"; ?>
				</div>
				
				<div class="row">
					<?php echo Form::label('username', 'Username') .
					           "<div class=\"right\">" .
					           Form::input('username', isset($user) ? $user->username : '', array('id' => 'username')) .
					           "</div>"; ?>
				</div>
			
				<div class="row">
				    <?php echo Form::label('email', 'Email') .
					           "<div class=\"right\">" .
					           Form::input('email', isset($user) ? $user->email : '', array('id' => 'email')) .
					           "</div>"; ?>
				</div>	

				<div id="insurance_company_field" class="row">
					<?php echo Form::label('insurance_company', 'Insurance Company') .
					           "<div class=\"right\">" .
					           Form::input('insurance_company', isset($user) ? $user->insurance_company : '', array('id' => 'insurance_company')) .
					           "</div>"; ?>
				</div>			
				
				<div class="row">
					<?php echo Form::label('password', 'Password') .
					           "<div class=\"right\">" .
					           Form::input('password', '', array('id' => 'password')) .
					           "</div>"; ?>
				</div>
				
				<div class="row">
				    <?php echo Form::label('password_confirm', 'Confirm Password') .
					           "<div class=\"right\">" .
					           Form::input('password_confirm', '', array('id' => 'password_confirm')) .
					           "</div>"; ?>
				</div>
				<div class="row">
				    <?php echo Form::label('user_color', 'User Color') .
					           "<div class=\"right\">" ?>
					          <select name="user_color">
					          	<?php
					          	$colors = array("Green", "Purple", "Yellow", "Red", "Orange", "Pink", "Blue");
            					
            					 foreach ($colors as $val) {
            					 	if(isset($user) && (strcmp($user->user_color, $val)==0)){
            					 		echo  '<option value="'.$val.'" selected="selected" >'.$val.'</option>';
            					 	}else {
            					 		echo  '<option value="'.$val.'" >'.$val.'</option>';
            					 	}
            					 }



					          	?>
								  <option value="green" style="background-color: Green">Green</option>
								  <option value="purple" style="background-color: Purple">Purple</option>
								  <option value="yellow" style="background-color: Yellow">Yellow</option>
								  <option value="red" style="background-color: Red">Red</option>
								  <option value="orange" style="background-color: Orange">Orange</option>
								  <option value="pink" style="background-color: Pink">Pink</option>
								  <option value="blue" style="background-color: Blue">Blue</option>
								</select>
					           </div>
				</div>


				<div class="row">
					<input type="hidden" name="csrf_token" value="{{csrf_token}}">
					<div class="right">
						<button type="submit"><span>Submit</span></button>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</form>	