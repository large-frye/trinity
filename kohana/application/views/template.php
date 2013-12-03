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
		<div id="main">
			
			<div id="top">
				<h1 id="logo"><a href="./"></a></h1>
				
				<!-- {{#is_logged_in}} -->
				<div id="labels">
					<ul>
						<!-- {{#top_navigation}} -->
							<li>
								<a href="{{url_profile}}" class="user">
									<span class="bar">Welcome {{username}}</span>
								</a>
							</li>
							<li><a href="{{url_settings}}" class="settings"></a></li>
							<li><a href="{{url_logout}}" class="logout"></a></li>
						<!-- {{/top_navigation}} -->
					</ul>
				</div>
				<!-- {{/is_logged_in}}
				{{^is_logged_in}} -->
				<div id="labels">
					<a href="/login">Login</a>
				</div>
				<!-- {{/is_logged_in}} !-->

				<?php if ($admin) {
					echo '<div id="menu">
					<ul> 
							<li >
								<a href="http://admin.trinity.is/">Work Orders</a>
								
								 <ul> 
									
										<li >
											<a href="http://admin.trinity.is/workorders/submit">Submit New</a>
										</li>
									
								 </ul> 
							</li> 
							<li >
								<a href="http://admin.trinity.is/settings">Settings</a>
								
								 <ul> 
									
										<li >
											<a href="http://admin.trinity.is/settings/email">Email Templates</a>
										</li>
										<li >
											<a href="http://admin.trinity.is/settings/prices">Work Order Prices</a>
										</li>
										<li >
											<a href="http://admin.trinity.is/categories">Categories</a>
										</li>
									
								 </ul> 
							</li> 
							<li >
								<a href="http://admin.trinity.is/users">Users</a>
								
								 <ul> 
									
										<li >
											<a href="http://admin.trinity.is/users/create">Create New</a>
										</li>
									
								 </ul> 
							</li> 
					</ul>
				</div>';
				} else { ?>
				
				<div id="menu">
					<ul> 
						<?php foreach ($nav as $url => $name) {
							echo "<li class=\"current\">" .
							         "<a href=\"" . $name['url'] . "\">" . $name['name'] . "</a>" .
							     "</li>";
						}
						?>
					</ul>
				</div>
				<?php } ?>

			</div>
	
			<!-- <div class="plain">
				{{#is_alert}} <div class="section"> {{/is_alert}} 				
					{{#status_messages}}
						<div class="message {{message_type}}">
							<span>{{message_content}}</span>
						</div>
					{{/status_messages}}
				
				{{#is_alert}} </div> {{/is_alert}}
			</div> !-->
	<div id="leftside" class="lft-no-margin">
        <?php echo $content; ?>
    </div>
    <?php if (isset($hide_right_side) && $hide_right_side) {
        // Show nothing
    } else { ?>
    <div id="rightside">
    <div>
		<a href="/schedule-claim" target="_self">
            <img src="/trinity/assets/gfx/_banner-02.jpg" onmouseover="this.src=' /trinity/assets/gfx/_banner-02-high.jpg '" onmouseout="this.src=' /trinity/assets/gfx/_banner-02.jpg '" width="300" />
		</a>
    </div>
    <div class="box togglemenu">	
		<div class="content">
			<ul>
				<li><h2>Services</h2></li>
				<li class="title">Basic Inspections</li>
				<li class="content">
								
				<p>1. Inspection is performed by a HAAG Certified inspector and is coordinated with Policy Holder and roofer present (when possible)</p>
				<p>2. Ground inspection of siding, screens, downspouts, gutters, aluminum fascia, and a/c units</p>
				<p>3. Hail and wind damage inspection on all types of commercial and residential roofing materials</p>
				<p>4. High Definition photos of damage in report format</p>
				<p>5. Report includes photos of damage, sketch with measurements, and square report</p>								
				</li>
							
				<li class="title">Expert Inspections</li>
				<li class="content">

					<p>1. Inspection is performed by a HAAG Certified inspector and is coordinated with Policy Holder and roofer present (when possible)</p>
					<p>2. Ground inspection of siding, screens, downspouts, gutters, aluminum fascia, and a/c units</p>
					<p>3. Hail and wind damage inspection on all types of commercial and residential roofing materials</p>
					<p>4. High Definition photos of damage in report format</p>
					<p>5. Report includes photos of damage, sketch with measurements, and square report</p>
				    <p>6. Hail size forensically measured from hail spatter and damaged objects to determine size of hailstone</p>
					<p>7. Fraudulent damage investigation</p>
					<p>8. Roof leak location service</p>
					<p>9. Installation defects assessed and documented</p>
					<p>10. Manufacturing defects assessed and documented</p>
								<p>11. Algae damage and Vermin damage assessed and documented</p>
								
								<p>
									$250 – for single story dwelling up to a 7 pitch.
									<br>$300 – for a 2 story dwelling up to a 7 pitch.
									<br>$350 – for a single story dwelling over a 7 pitch.
									<br>$375 – for a 2 story dwelling over a 7 pitch.
								</p>

								<p>
									$50 – Interior inspection and measurements.
									<br>$50 – Any detached structures ( Base price includes dwelling plus one structure.). $100 – Any additional story over 2 stories.
									<br>$100 – Any structure over 70 squares.
									<br>$200 – Any structure over 200 squares.
								</p>
								
							</li>
							<li class="title">Engineer Reports</li>
							<li class="content">
								<p>All below services performed by a professional engineer, and comes backed with a PE seal</p>
								<p>1. Inspection is performed by an Professional Engineer and is coordinated with Policy Holder and roofer present (when possible)</p>
								<p>2. Ground inspection of siding, screens, downspouts, gutters, aluminum fascia, and a/c units</p>
								<p>3. Hail and wind damage inspection on all types of commercial and residential roofing materials</p>
								<p>4. High Definition photos of damage in report format</p>
								<p>5. Report includes photos of damage, sketch with measurements, and square report</p>
								<p>6. Hail size forensically measured from hail spatter and damaged objects to determine size of hailstone</p>
								<p>7. Fraudulent damage investigation</p>
								<p>8. Roof leak location service</p>
								<p>9. Installation defects assessed and documented</p>
								<p>10. Manufacturing defects assessed and documented</p>
								<p>11. Algae damage and Vermin damage assessed and documented</p>
								
							
								<p>For an Engineer report add $500 to pricing below:</p>
								<p>
									$250 – for single story dwelling up to a 7 pitch.
									<br>$300 – for a 2 story dwelling up to a 7 pitch.
									<br>$350 – for a single story dwelling over a 7 pitch.
									<br>$375 – for a 2 story dwelling over a 7 pitch.									
								</p>
								<p>
									$50 – Interior inspection and measurements.
									<br>$50 – Any detached structures ( Base price includes dwelling plus one structure.). $100 – Any additional story over 2 stories.
									<br>$100 – Any structure over 70 squares.
									<br>$200 – Any structure over 200 squares.									
								</p>
							</li>
							
							<li class="title">Fraud investigations</li>
							<li class="content">
								<p>We know all the indications of a roof that has been intentionally damaged and will be able to fully document all of these indicators. Whether it is fabricated wind or hail damage the indicators are always present and it is our expertise to assess and document all aspects.</p>
							</li>
							
							<li class="title">HAAG certified inspectors</li>
							<li class="content">
								<p>All of our inspectors are HAAG certified or better. You will be comforted to know that your inspection will be handled by a knowledgeable inspector with the utmost professionalism and expertise.</p>
							</li>
							<li class="title">State licensed adjusters</li>
							<li class="content">
								<p>We have on our staff licensed Adjusters that can be requested to inspect any claim.</p>
							</li>
							
							<li class="title">Residential and commercial inspections</li>
							<li class="content">
								<p>We inspect wind and hail damage to various types of building materials on residential and commercial buildings.</p>
								<p>To name a few: Asphalt- 3 tab shingles, Laminated shingles, T-lock shingles, Cedar Shakes,  Modified Bitumen (rolled roofing, hot and cold applied), EPDM, TPO, PVC, Asbestos tile, Concrete Tile, Clay Tile, Slate, and Metal roofing.</p>
								
							</li>

							
							<li class="title">Video inspections</li>
							<li class="content">
								<p>For only $100.00 more we will provide you with a video of the inspection on the dwelling in question. This will give you a video overview of the test squares, metal damage, and the entire inspection and it is about 5 minutes in length.</p>
							</li>
							
						</ul>
					</div>
				</div>
</div>
<?php } ?>

	
		</div>
	</div>
	
	<?php echo $js; ?>

	<!-- {{#js_options}}
	<script type="text/javascript">{{& js_options}}</script>
	{{/js_options}} -->
</body>
</html>