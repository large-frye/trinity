<div id="left">
<div class="box submenu">
    <div class="content">
        <ul> 
            <li>
               <a href="/account">Work Orders</a>
             </li>
            <li class="current">
                <a href="<?php  'inspections/viewphotos/'.substr($_SERVER["REQUEST_URI"],-1) ?>">Photos</a>
                    <ul>
                        <li class="<?php echo Request::current()->action() == 'view' ? 'current' : null; ?>">
                            <a href="/inspections/editphotos/<?php echo Request::current()->param('id'); ?>">
                                Edit Current Photos</a>
                        </li> 
                        <li class="<?php echo Request::current()->action() == 'form' ? 'current' : null; ?>">
                            <a href="/inspections/uploadphotos/<?php echo Request::current()->param('id'); ?>">
                                Upload New Photos</a>
                        </li> 
                    </ul>
            </li>
        </ul>
    </div>
</div>
</div>