<?php echo Form::open(''); ?>
    <input type="hidden" name="csrf_token" value="{{csrf_token}}">
    <input type="hidden" name="username" value="<?php echo $user->username; ?>">
    <div class="section">
         <?php
if (isset($errors)) {
    echo '<div class="message error"><p>' . print_r($errors) . '</p></div>';
}

if (isset($success)) {
    echo '<div class="message info"><p>' . $success . '</p></div>';
} ?>
        <div class="box">
            <div class="title">Username: <?php echo $user->username; ?></div>
            
            <div class="content">
            
                <div class="row">
                    <label for="first_name">First Name *:</label>
                    
                    <div class="right">
                        <input type="text" name="first_name" id="first_name" value="<?php echo $user->first_name; ?>">
                    </div>    
                </div>
                
                <?php if (isset($errors['first_name'])) { ?>
                    <div class="row">
                        <div class="right error">
                            <?php echo $errors['first_name']; ?>
                        </div>
                    </div>
                <?php } ?>
                
                <div class="row">
                    <label for="last_name">Last Name *:</label>
                    
                    <div class="right">
                        <input type="text" name="last_name" id="last_name" value="<?php echo $user->last_name; ?>">
                    </div>    
                </div>
                
                <?php if (isset($errors['last_name'])) { ?>
                    <div class="row">
                        <div class="right error">
                            <?php echo $errors['last_name']; ?>
                        </div>
                    </div>
                <?php } ?>
                
                <div class="row">
                    <label for="phone">Phone Number *:</label>
                    
                    <div class="right">
                        <input type="text" name="phone" id="phone" value="<?php echo $user->phone; ?>">
                    </div>    
                </div>
                
                <?php if (isset($errors['phone'])) { ?>
                    <div class="row">
                        <div class="right error">
                            <?php echo $errors['phone']; ?>
                        </div>
                    </div>
                <?php } ?>
                
                <div class="row">
                    <label for="geographic_region">Geographical Region *:</label>
                    
                    <div class="right">
                        <input type="text" name="geographic_region" id="geographic_region" value="<?php echo $user->geographic_region; ?>">
                    </div>    
                </div>
                
                <?php if (isset($errors['geographic_region'])) { ?>
                    <div class="row">
                        <div class="right error">
                            <?php echo $errors['geographic_region']; ?>
                        </div>
                    </div>
                <?php } ?>
        
                <div class="row">
                    <label for="email">Email *:</label>
                    
                    <div class="right">
                        <input type="text" name="email" value="<?php echo $user->email; ?>">
                    </div>
                </div>
                
                <?php if (isset($errors['email'])) { ?>
                    <div class="row">
                        <div class="right error">
                            <?php echo $errors['email']; ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($user_type === 4) { ?>
                <div class="row">
                    <label for="insurance_company">Insurance Company</label>
                    
                    <div class="right">
                        <input type="text" name="insurance_company" id="insurance_company" value="<?php echo $user->insurance_company; ?>">
                    </div>    
                </div>                
                <?php } ?>
                
                <div class="row">
                    <label for="password">Password:</label>
                    
                    <div class="right">
                        <input type="password" name="password" value="">
                    </div>
                </div>
                
                <?php if (isset($errors['password'])) { ?>
                    <div class="row">
                        <div class="right error">
                            <?php echo $errors['password']; ?>
                        </div>
                    </div>
                <?php } ?>
                
                <div class="row">
                    <label for="confirm-password">Confirm Password:</label>
                    
                    <div class="right">
                        <input type="password" name="password_confirm" value="">
                    </div>
                </div>
                
                <div class="row">
                    <div class="right">
                        <button type="submit"><span>Submit</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>