<div id="left">
<div class="box submenu">
    <div class="content">
        <ul>
            <li class="current" >
                <a href="/account">Inspection Orders</a>
                    <ul>
                        <li class="<?php echo Request::current()->action() == 'view' ? 'current' : null; ?>">
                            <a href="/workorders/view/<?php echo Request::current()->param('id'); ?>">
                                View Work Order</a>
                        </li> 
                        <li class="<?php echo Request::current()->action() == 'form' ? 'current' : null; ?>">
                            <a href="/inspections/form/<?php echo Request::current()->param('id'); ?>">
                                Inspection Form</a>
                        </li> 
                        <li class="<?php echo Request::current()->action() == 'estimate' ? 'current' : null; ?>">
                            <a href="/inspections/estimates/<?php echo Request::current()->param('id'); ?>">
                                Estimates</a>
                        </li> 
                    </ul>
            </li>
            <li  class="btn-print">
										<a href="javascript:window.print()">Print</a>
								</li>
        </ul>
    </div>
</div>
</div>