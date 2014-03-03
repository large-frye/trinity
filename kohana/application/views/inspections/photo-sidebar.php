<div id="left">
<div class="box submenu">
    <div class="content">
        <ul> 
           <li class="current">
                    <ul>
                         <li class="<?php echo Request::current()->action() == 'view' ? 'current' : null; ?>">
                            <a href="/inspections/viewphotos/<?php echo Request::current()->param('id'); ?>">
                               View Photos</a>
                        </li> 
                          <li class="<?php echo Request::current()->action() == 'form' ? 'current' : null; ?>">
                            <a href="/inspections/uploadphotos/<?php echo Request::current()->param('id'); ?>">
                                Upload New Photos</a>
                        </li> 
                          <li class="<?php echo Request::current()->action() == 'form' ? 'current' : null; ?>">
                            <a href="/inspections/catigorizephotos/<?php echo Request::current()->param('id'); ?>">
                                Categorize Current Photos</a>
                        </li> 
                       <li class="<?php echo Request::current()->action() == 'view' ? 'current' : null; ?>">
                            <a href="/inspections/editphotos/<?php echo Request::current()->param('id'); ?>">
                                Order Current Photos</a></li>
                      <li class="<?php echo Request::current()->action() == 'view' ? 'current' : null; ?>">
                            <a href="/inspections/deletephotos/<?php echo Request::current()->param('id'); ?>">
                                Delete Photos</a></li>
                    </ul>
            </li>
        </ul>
    </div>
</div>
</div>