<div class="section">
	<div>&nbsp;</div>
	<div class="content">
		<?php echo $admin ? "<a href=\"/workorders/submit\" class=\"button-three-d\">Submit New</a>" : null; ?>
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
						<th class="sorting" rowspan="1" colspan="1">ID Num.</th>
						<th class="sorting" rowspan="1" colspan="1">Status</th>
						<th class="sorting" rowspan="1" colspan="1">Insured</th>
						<th class="sorting" rowspan="1" colspan="1">Adjuster Name</th>
						<th class="sorting" rowspan="1" colspan="1">Policy Number</th>
						<th class="sorting" rowspan="1" colspan="1">Inspector Name</th>
						<th class="sorting" rowspan="1" colspan="1">Date of inspection</th>
						<th class="sorting" rowspan="1" colspan="1">Progress State</th>
						<th class="sorting" rowspan="1" colspan="1">Date Created</th>
						<th class="sorting" rowspan="1" colspan="1">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($orders as $_order) { 
						
					    echo "<tr><td>" . $_order->id . "</td>" .
						         "<td class=\"" . $statuses[$_order->status_name] . "\">" . $_order->status_name . "</td>" . 
						         "<td>" . $_order->first_name . " " . $_order->last_name . "</td>" . 
						         "<td>" . $_order->adjuster_name . "</td>" . 
						         "<td>" . $_order->policy_number . "</td>" .
						         "<td>" . $_order->inspector_name . "</td>" .
						         "<td>" . $_order->date_of_inspection . "</td>" .
						         "<td>" . $_order->inspection_status . "</td>" .
						         "<td>" . $_order->created_on_utc . "</td>"; ?>
						    <td>
							<?php echo Form::select('wo-actions', $options[$_order->id], '', array('class' => 'wo-actions wo-links')); ?>
						    </td>
							<!-- <select name="wo-actions" class="wo-actions wo-links">

								<option value="workorders/view/<?php echo $_order->id; ?>">View</option>
								<option value="workorders/edit/<?php echo $_order->id; ?>">Edit</option>
								<option value="{{inspection_form_url}}/{{id}}">Inspection Form</option>
								<option value="{{estimates_url}}/{{id}}">Estimates</option>
								<option value="{{photos_url}}/{{id}}">Photos</option>
								<option value="{{invoice_url}}/{{id}}">Edit Invoice</option>
								<option value="{{generate_url}}/{{id}}">Generate Invoice</option>
								<option value="{{report_url}}/{{id}}">Report</option>
							</select> -->
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
			