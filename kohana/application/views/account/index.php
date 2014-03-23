<div class="section">
	<div>&nbsp;</div>
	<div class="content">
		<?php echo ($admin || $client) ? "<a href=\"/workorders/submit\" class=\"button-three-d\">Submit New</a>" : null; ?>
	</div>
	<div class="box">
		<div class="title">
			Workorders
			<span class="hide"></span>
		</div>
		
		<div class="content">
			<table cellspacing="0" cellpadding="0" border="0" class="all"> 
				<thead class="static-header"> 
					<tr>
						<th class="sorting" rowspan="1" colspan="1">ID Num.</th>
						<th class="sorting" rowspan="1" colspan="1">Status</th>
						<th class="sorting" rowspan="1" colspan="1">Insured</th>
						<?php echo !$inspector ? '<th class="sorting" rowspan="1" colspan="1">Adjuster Name</th>' : null; ?> 
						<!-- <th class="sorting" rowspan="1" colspan="1">Policy Number</th> -->
						<th class="sorting" rowspan="1" colspan="1">Inspector Name</th>
						<th class="sorting" rowspan="1" colspan="1">Date of inspection</th>
						<th class="sorting" rowspan="1" colspan="1">Progress State</th>
						<th class="sorting" rowspan="1" colspan="1">Date Created</th>
						<th class="sorting" rowspan="1" colspan="1">Inspection Type</th>
						<th class="sorting" rowspan="1" colspan="1">Actions</th>
					</tr>
				</thead>
				<tbody >
					<?php foreach($orders as $_order) { 
						
					    echo "<tr><td>" . $_order->id . "</td>" .
						         "<td class=\"" . $statuses[$_order->status_name] . "\">" . $_order->status_name . "</td>" . 
						         "<td>" . $_order->first_name . " " . $_order->last_name . "</td>";
						echo !$inspector ? "<td>" . $_order->adjuster_name . "</td>"  : null;
						         
						         echo # "<td>" . $_order->policy_number . "</td>" .
						         "<td>" . $_order->inspector_name . "</td>" .
						         "<td>" . $_order->date_of_inspection . "</td>" .
						         "<td>" . $_order->inspection_status . "</td>" .
						         "<td>" . $_order->created_on_utc . "</td>" .
						         "<td>" . $_order->inspection_type . "</td>"; ?>
						    <td>
							<?php echo Form::select('wo-actions', $options[$_order->id], '', array('class' => 'wo-actions wo-links')); ?>
						    </td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
			