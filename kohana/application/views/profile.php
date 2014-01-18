<form action="{{form_action}}" method="post">
    <input type="hidden" name="csrf_token" value="{{csrf_token}}">
    <div class="section">
        <div class="box">
            <div class="title">Username: <?php echo $username; ?></div>
            
            <div class="content">
            
                <div class="row">
                    <label for="first_name">First Name *:</label>
                    
                    <div class="right">
                        <input type="text" name="first_name" id="first_name" value="{{first_name}}">
                    </div>    
                </div>
                
                {{#first_name_error}}
                    <div class="row">
                        <div class="right error">
                            {{first_name_error}}
                        </div>
                    </div>
                {{/first_name_error}}
                
                <div class="row">
                    <label for="last_name">Last Name *:</label>
                    
                    <div class="right">
                        <input type="text" name="last_name" id="last_name" value="{{last_name}}">
                    </div>    
                </div>
                
                {{#last_name_error}}
                    <div class="row">
                        <div class="right error">
                            {{last_name_error}}
                        </div>
                    </div>
                {{/last_name_error}}
                
                <div class="row">
                    <label for="phone">Phone Number *:</label>
                    
                    <div class="right">
                        <input type="text" name="phone" id="phone" value="{{phone}}">
                    </div>    
                </div>
                
                {{#phone_error}}
                    <div class="row">
                        <div class="right error">
                            {{phone_error}}
                        </div>
                    </div>
                {{/phone_error}}
                
                <div class="row">
                    <label for="geographic_region">Geaographical Region *:</label>
                    
                    <div class="right">
                        <input type="text" name="geographic_region" id="geographic_region" value="{{geographic_region}}">
                    </div>    
                </div>
                
                {{#geographic_region_error}}
                    <div class="row">
                        <div class="right error">
                            {{geographic_region_error}}
                        </div>
                    </div>
                {{/geographic_region_error}}
        
                <div class="row">
                    <label for="email">Email *:</label>
                    
                    <div class="right">
                        <input type="text" name="email" value="{{email}}">
                    </div>
                </div>
                
                {{#email_error}}
                    <div class="row">
                        <div class="right error">
                            {{email_error}}
                        </div>
                    </div>
                {{/email_error}}

                {{#client_fields}}
                <div class="row">
                    <label for="insurance_company">Insurance Company</label>
                    
                    <div class="right">
                        <input type="text" name="insurance_company" id="insurance_company" value="{{insurance_company}}">
                    </div>    
                </div>                
                {{/client_fields}}
                
                <div class="row">
                    <label for="password">Password:</label>
                    
                    <div class="right">
                        <input type="password" name="password" value="">
                    </div>
                </div>
                
                {{#password_error}}
                    <div class="row">
                        <div class="right error">
                            {{password_error}}
                        </div>
                    </div>
                {{/password_error}}
                
                <div class="row">
                    <label for="confirm-password">Confirm Password:</label>
                    
                    <div class="right">
                        <input type="password" name="confirm-password" value="">
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
    {{/data}}
</form>