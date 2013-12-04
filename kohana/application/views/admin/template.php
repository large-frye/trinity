<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
	<title>Trinity Roof Inspections</title>
	
	<meta name="apple-mobile-web-app-capable" content="no" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="viewport" content="width=device-width,initial-scale=0.69,user-scalable=yes,maximum-scale=1.00" />
	
	<?php echo $css; ?>
	<!-- {{#asset_css}}
		<link type="text/css" rel="stylesheet" media="all" href="{{path}}" />
	{{/asset_css}} -->
	
	<!--[if lte IE 8]>
		<script type="text/javascript" src="js/excanvas.min.js"></script>
	<![endif]-->
	
</head>

<body>

<div id="wrapper">
	<div id="container" class="<?php echo $homepage ? 'no-bg' : ''; ?>">
		<div id="top">
			<h1 id="logo"><a href="/"></a></h1>
			<div id="labels">
				<ul>
					<li>
						<a href="/" class="user">
							<span class="bar">Welcome andrew</span>
						</a>
					</li>
					<li><a href="http://admin.trinity.is/my/profile" class="settings"></a></li>
					<li><a href="http://admin.trinity.is/logout" class="logout"></a></li>
				</ul>
			</div>
			
			<div id="menu">
				<ul> 
					<li>
						<a href="/account">Work Orders</a>
							<ul> 
								<li>
									<a href="http://admin.trinity.is/workorders/submit">Submit New</a>
								</li>
							</ul> 
					</li> 
					<li >
						<a href="/settings">Settings</a>
							<ul> 
								<li>
									<a href="http://admin.trinity.is/settings/email">Email Templates</a>
								</li>
								<li>
									<a href="http://admin.trinity.is/settings/prices">Work Order Prices</a>
								</li>
								<li>
									<a href="http://admin.trinity.is/categories">Categories</a>
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
				</ul>
			</div>
		</div> 
		<div class="plain">&nbsp;</div>
		<?php if (!$homepage) {  ?>

		<div id="left">
					<div class="box submenu">
						<div class="content">
							<ul>
								<li class="current" >
									<a href="http://admin.trinity.is/users/index">Users</a>
									<ul>
											<li >
												<a href="http://admin.trinity.is/users/create">Add new User</a>
											</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>				
		</div>
		<?php } ?>
		<div id="right" class="<?php echo $homepage ? ' margin-small ' : null; ?>">
			<?php echo $content; ?>
		</div>
	</div>
</div>

<?php echo $js; ?>

</body>
</html>