<?php if ($user_type === Model_Account::ADMIN) { ?>

<div id="menu">
	<ul> 
		<li>
		    <a href="/account">Work Orders</a>
				<ul> 
					<li><a href="/workorders/submit">Submit New</a></li>
                </ul> 
		</li> 
		<li >
			<a href="/settings">Settings</a>
				<ul> 
					<li>
	      				<a href="/settings/email">Email Templates</a>
					</li>
				    <li>
						<a href="/settings/prices">Work Order Prices</a>
					</li>
					<li>
						<a href="/settings/categories">Categories</a>
					</li>
				</ul> 
		</li> 
		<li>
			<a href="/users">Users</a>
				<ul> 
					<li >
						<a href="/users/new">Create New</a>
					</li>
			    </ul> 
		</li> 
		<li>
			<a href="/maps">Maps</a>
		</li> 
	</ul>
</div>

<?php } else if (in_array($user_type, array(Model_Account::INSPECTOR, Model_Account::CLIENT))) { ?>
<div id="menu">
    <ul>
    	<li>
    		<a href="/account">Dashboard</a>
    	</li>
    </ul>
</div>

<?php } ?>