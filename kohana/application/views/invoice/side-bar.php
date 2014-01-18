<div id="left">
<div class="box submenu">
    <div class="content">
        <ul>
            <li class="current" >
                <a href="/account">Inspection Orders</a>
                    <ul>
                        <li class="<?php echo Request::current()->action() == 'view' ? 'current' : null; ?>">
                            <a href="/workorders/view/<?php echo Request::current()->param('id'); ?>">
                                Current Work Order</a>
                        </li> 
                        <li class="<?php echo Request::current()->action() == 'view' ? 'current' : null; ?>">
                            <a href="/workorders/submit">
                                Submit New Inspection</a>
                        </li> 
                    </ul>
            </li>
        </ul>
    </div>
</div>
</div>