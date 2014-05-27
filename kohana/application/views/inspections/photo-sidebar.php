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

                                <li class="current">
                                                <a href="/workorders/view/<?php echo Request::current()->param('id'); ?>">View Work Order</a>
                                        </li>
                                        <li class="current">
                                                <a href="/workorders/edit/<?php echo Request::current()->param('id'); ?>">Edit Work Order</a>
                                        </li>
                                        <li class="current">
                                                <a href="/inspections/form/<?php echo Request::current()->param('id'); ?>">Inspection Form</a>
                                        </li>
                                        <li class="current">
                                                <a href="/inspections/viewphotos/<?php echo Request::current()->param('id'); ?>">Add/View Photos</a>
                                        </li>
                                        <li class="current">
                                                <a href="/invoice/index/<?php echo Request::current()->param('id'); ?>">View Invoice</a>
                                        </li>
                                        <li class="current">
                                                <a href="/workorders/report/<?php echo Request::current()->param('id'); ?>">View/Generate Report</a>
                                        </li>

                                        <li class="current">
                                            <a href="/workorders/submit">Submit New Inspection</a>
                                        </li>
                    </ul>
            </li>
        </ul>
    </div>
</div>
</div>