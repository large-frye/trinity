<div id="inspection-form" class="section">
    <?php if (isset($success)) { 
        echo "<div class=\"message info\">
                  <p>" . $success . "</p>
              </div>";
    } ?>

    <?php if (isset($errors)) { 
        echo "<div class=\"message error\">
                  <p>There were some errors on your form submission. Please fix them before submitting again.</p>
              </div>";
    } ?>

<?php echo Form::open(''); ?>

<div class="section">
    <div class="box">
        <div class="title">Invoice: Pre-populated Options</div>
        
        <div class="content">
                <div class="row">

                <div class="invoice-options">
                    <?php 
                    $count = 0;
                    foreach($invoice_options as $key => $option) {

                        $class = '';

                        if ($count > 0) {
                            $class = 'notfirst';
                        }

                        echo Form::checkbox('invoice_options[]', $key, false, array('id' => 'invoice_option' . $count)) . "\n" .
                             Form::label('invoice_option' . $count, $option['name'] . ": &nbsp;&nbsp;&nbsp;<em><b>$" . $option['cost'] . ".00</b></em>", array('class' => $class)) . "\n";

                        $count++;
                    } ?>
                    
                    <div class="cl"></div>
                </div>

                <?php if (isset($errors['type_of_roofing'])) { 
                    echo "<div class=\"error\"><p>" . $errors['type_of_roofing'] . "</p></div>";
                      }
                ?>
            </div>    
                
        
        </div>
    </div>
</div>


<div class="section">
    <div class="box">
        <div class="title">Add a new invoice option</div>
        
        <div class="content">

                <table cellspacing="0" cellpadding="0" border="0" class="multi-row-table">
                    <thead>
                        <tr>
                            <th>Description</th><th>Amount</th><th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 

                    if ($invoice_meta->count() > 0) {
                        foreach ($invoice_meta as $meta) {
                            echo "<tr>" .
                                     "<td>" . Form::input('descriptions[]', $meta->description) . "</td>" .
                                     "<td>" . Form::input('amounts[]', $meta->amount) . "</td>" .
                                     "<td><a href=\"javascript:void(0);\" class=\"remove-row\">Remove</a></td>" .
                                 "</tr>";
                        }
                    } else {
                        echo "<tr>
                                  <td>
                                      <input type=\"text\" name=\"descriptions[]\" value=\"\">
                                      <!-- {{#description_error}}
                                      <br><label class=\"error\">{{description_error}}</label>
                                      {{/description_error}} -->
                                  </td>
                                  <td>
                                       <input type=\"text\" name=\"amounts[]\" value=\"\">
                                       <!-- {{#amount_error}}
                                       <br><label class=\"error\">{{amount_error}}</label>
                                       {{/amount_error}} -->
                                  </td>
                                  <td>
                                      <a href=\"javascript:void(0);\" class=\"remove-row\">Remove</a>
                                  </td>
                              </tr>";
                    } ?>

                    </tbody>
                </table>
                
                <div class="row">
                    <a href="javascript:void(0);" class="add-new-row"><span>Add row</span></a>
                </div>
                
                <div class="row">
                    <button type="submit" name="save"><span>Save</span></button>
                </div>
            
            <table class="new-row-container" style="display:none;">
                <tr>
                    <td>
                        <input type="text" name="descriptions[]" value="">
                    </td>
                    <td>
                        <input type="text" name="amounts[]" value="">
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="remove-row">Remove</a>
                    </td>
                </tr>
            </table>
        
        </div>
    </div>
</div>

</form>