<div class="section">
	<div class="box">
		<div class="title">Work Order Prices</div>
			<div class="content">

<div class="row">
	<?php foreach($prices as $price) {
		echo Form::label('work_order_price_' . $price->id, $price->nice_name) . 
		     Form:: 
	}?>
	<label for="workorder_type_price_0">Work order type price - Basic Inspections</label>
									<div class="right">
										<input type="text" class=" spin-dec" name="workorder_type_price_0" id="workorder_type_price_0" value="199.75">
									</div>
								</div>
								<div class="row">	
									<label for="workorder_type_price_1">Work order type price - Expert Inspections</label>
									<div class="right">
										<input type="text" class=" spin-dec" name="workorder_type_price_1" id="workorder_type_price_1" value="350.00">
									</div>
								</div>
								<div class="row">	
									<label for="workorder_type_price_2">Work order type price - Engineer Reports</label>
									<div class="right">
										<input type="text" class=" spin-dec" name="workorder_type_price_2" id="workorder_type_price_2" value="750.25">
									</div>
								</div>
								
								<div class="row">
									<div class="right">
										<button type="submit" name="submit"><span>Save changes</span></button>
									</div>
								</div>
							</div>
						</div>
					</div>