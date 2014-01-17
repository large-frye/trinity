<div class="section">
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
                    <td><?php echo $price; ?></td>
                </tr>
                </tbody>
            </table>
            
            <div class="row">
                <?php echo Form::open(''); ?>
                    <input type="hidden" name="csrf_token" value="{{csrf_token}}">
                    <button type="submit" name="view_pdf" id="view_pdf"><span>View PDF Invoice</span></button>
                    <button type="submit" name="send_invoice" id="send_invoice"><span>Send to client</span></button>
                </form>
            </div>
        </div>
    </div>
</div>