<div class="section">
	<div>&nbsp;</div>
	<div class="content">
		<a href="{{add_url}}">Submit New</a>
	</div>	
	<div class="box">
		<div class="title">
			Workorders
			<span class="hide"></span>
		</div>
		
		<div class="content">
			<table cellspacing="0" cellpadding="0" border="0" class="all"> 
				<thead> 
					<tr>
						<th>ID Num.</th>
						<th>Status</th>
						<th>Insured</th>
						<th>Adjuster Name</th>
						<th>Policy Number</th>
						<th>Inspector Name</th>
						<th>Date of inspection</th>
						<th>Progress State</th>
						<th>Date Created</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($orders as $_order) { 
						
					    echo "<tr><td>" . $_order->id . "</td>" .
						         "<td>" . $_order->status_name . "</td>" . 
						         "<td>" . $_order->first_name . " " . $_order->last_name . "</td>" . 
						         "<td>" . $_order->adjuster_name . "</td>" . 
						         "<td>" . $_order->policy_number . "</td>" .
						         "<td>" . $_order->inspector_name . "</td>" .
						         "<td>" . $_order->date_of_inspection . "</td>" .
						         "<td>" . $_order->inspection_status . "</td>" .
						         "<td>" . $_order->created_on_utc . "</td>"; ?>
						    <td>
							
							<select name="wo-actions" class="wo-actions wo-links">
								<option value="workorders/view/<?php echo $_order->id; ?>">View</option>
								<option value="workorders/edit/<?php echo $_order->id; ?>">Edit</option>
								<option value="{{inspection_form_url}}/{{id}}">Inspection Form</option>
								<option value="{{estimates_url}}/{{id}}">Estimates</option>
								<option value="{{photos_url}}/{{id}}">Photos</option>
								<option value="{{invoice_url}}/{{id}}">Edit Invoice</option>
								<option value="{{generate_url}}/{{id}}">Generate Invoice</option>
								<option value="{{report_url}}/{{id}}">Report</option>
							</select>
						
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
			