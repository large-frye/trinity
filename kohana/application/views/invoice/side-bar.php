<div id="left">
<div class="box submenu">
    <div class="content">
        <ul>
            <li class="current" >
                <a href="/account">Inspection Orders</a>
                    <ul>
                        <li class="<?php echo Request::current()->action() == 'view' ? 'current' : null; ?>">
                            <a href="/invoice/index/<?php echo Request::current()->param('id'); ?>">
                                Add Invoice Information</a>
                        </li> 
                        <li class="<?php echo Request::current()->action() == 'view' ? 'current' : null; ?>">
                            <a href="/invoice/generate/<?php echo Request::current()->param('id'); ?>">
                                Generate Invoice</a>
                        </li> 
                    </ul>
            </li>
        </ul>
    </div>
</div>
</div>