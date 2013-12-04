
<?php 
    echo Form::open('', array('id' => 'workorder-submit-form')); 
?>
<div class="message error"><span>AndreW</span></div>
	<div class="section">
		<div class="box">
			<div class="title">User</div>
			
			<div class="content">
			
				<div class="row">
					<label for="role">Usertype</label>

					<div class="right">
						<select name="role_id">
						<?php foreach($user_types as $user_type) { 
							      echo "<option value=\"" . $user_type->id ."\">" . ucfirst($user_type->name) . "</option>";
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
				    <?php echo Form::label('confirm_password', 'Confirm Password') .
					           "<div class=\"right\">" .
					           Form::input('confirm_password', '', array('id' => 'confirm_password')) .
					           "</div>"; ?>
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