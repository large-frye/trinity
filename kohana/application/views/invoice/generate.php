


<div class="section">
    <?php
if (isset($errors)) {
    echo '<div class="message error"><p>' . $errors . '</p></div>';
}

if (isset($success)) {
    echo '<div class="message info"><p>' . $success . '</p></div>';
} ?>
    <div class="box">
        <div class="title">Workorder Data</div>
        
        <div class="content">
                <div class="row">
                    Policy holder: 
                    <div class="right">
                        <?php echo $workorder_details->first_name . " " . $workorder_details->last_name; ?>
                        <br><?php echo $workorder_details->street_address; ?>
                        <br><?php echo $workorder_details->city . ', ' . $workorder_details->state . ' ' . $workorder_details->zip; ?>
                    </div>
                </div>
                
                <div class="row">
                    Inspection Date:
                    <div class="right">
                        <?php echo $workorder_details->date_of_inspection; ?>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="box">
        <div class="title">Extra invoice data</div>
        
        <div class="content">
            <table cellspacing="0" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <th>Description</th><th>Amount</th>
                    </tr>
                </thead>
                
                <tbody>
                <tr>
                    <td>Base price of the workorder</td>
                    <td><?php echo $workorder_details->price; ?></td>
                </tr>
                <?php 
                if ($invoice_meta->count() > 0) {
                    foreach ($invoice_meta as $meta) { 
                        echo "<tr><td>" . $meta->description . "</td><td>" . $meta->amount . "</td></tr>";
                    }
                } ?>
                </tbody>
            </table>
            
            <div class="row">
                <?php echo Form::open(''); ?>
                    <input type="hidden" name="csrf_token" value="{{csrf_token}}">
                    <button type="submit" name="generate_pdf" id="generate_pdf"><span>Generate PDF Invoice</span></button>
                    <?php echo $invoice_exists ? "<button type=\"submit\" name=\"view_pdf\" id=\"view_pdf\"><span>View PDF Invoice</span></button>" : null; ?>
                    <button type="submit" name="send_invoice" id="send_invoice"><span>Send to client</span></button>
                    <br />
                    <div class="margin-top"></div>
                </form>
            </div>
        </div>
    </div>
</div>