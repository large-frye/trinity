<?php

class __Mustache_91cf308e2de9f95afcb081e52a566a84 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '', $escape = false)
    {
        $buffer = '';

        $buffer .= $indent . '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
        $buffer .= "\n";
        $buffer .= $indent . '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">';
        $buffer .= "\n";
        $buffer .= "\n";
        $buffer .= $indent . '<head>';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";
        $buffer .= $indent . '	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> ';
        $buffer .= "\n";
        $buffer .= $indent . '	<title>';
        $value = $context->find('title');
        if (!is_string($value) && is_callable($value)) {
            $value = $this->mustache
                ->loadLambda((string) call_user_func($value))
                ->renderInternal($context, $indent);
        }
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= ' Trinity Roof Inspections</title>';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";
        $buffer .= $indent . '	<meta name="apple-mobile-web-app-capable" content="no" />';
        $buffer .= "\n";
        $buffer .= $indent . '	<meta name="apple-mobile-web-app-status-bar-style" content="black" />';
        $buffer .= "\n";
        $buffer .= $indent . '	<meta name="viewport" content="width=device-width,initial-scale=0.69,user-scalable=yes,maximum-scale=1.00" />';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";
        // 'asset_css' section
        $buffer .= $this->sectionEde43a8489d27c5271dbf751db8c74e2($context, $indent, $context->find('asset_css'));
        $buffer .= $indent . '	';
        $buffer .= "\n";
        $buffer .= $indent . '	<!--[if lte IE 8]>';
        $buffer .= "\n";
        $buffer .= $indent . '		<script type="text/javascript" src="js/excanvas.min.js"></script>';
        $buffer .= "\n";
        $buffer .= $indent . '	<![endif]-->';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";
        $buffer .= $indent . '</head>';
        $buffer .= "\n";
        $buffer .= "\n";
        $buffer .= $indent . '<body>';
        $buffer .= "\n";
        $buffer .= $indent . '	<div id="wrapper">';
        $buffer .= "\n";
        $buffer .= $indent . '		<div id="main">';
        $buffer .= "\n";
        $buffer .= $indent . '			';
        $buffer .= "\n";
        $buffer .= $indent . '			<div id="top">';
        $buffer .= "\n";
        $buffer .= $indent . '				<h1 id="logo"><a href="./"></a></h1>';
        $buffer .= "\n";
        $buffer .= $indent . '				';
        $buffer .= "\n";
        // 'is_logged_in' section
        $buffer .= $this->section3b8c40e845eb80900938714ed8f0be3a($context, $indent, $context->find('is_logged_in'));
        // 'is_logged_in' inverted section
        $value = $context->find('is_logged_in');
        if (empty($value)) {
            
            $buffer .= $indent . '				<div id="labels">';
            $buffer .= "\n";
            $buffer .= $indent . '					<a href="/login">Login</a>';
            $buffer .= "\n";
            $buffer .= $indent . '				</div>';
            $buffer .= "\n";
        }
        $buffer .= $indent . '				';
        $buffer .= "\n";
        $buffer .= $indent . '				<div id="menu">';
        $buffer .= "\n";
        $buffer .= $indent . '					<ul> ';
        $buffer .= "\n";
        // 'main_navigation' section
        $buffer .= $this->section780ac43cffa503d1928977d1983876bc($context, $indent, $context->find('main_navigation'));
        $buffer .= $indent . '					</ul>';
        $buffer .= "\n";
        $buffer .= $indent . '				</div>';
        $buffer .= "\n";
        $buffer .= "\n";
        $buffer .= $indent . '			</div> ';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";
        $buffer .= $indent . '			<div class="plain">';
        $buffer .= "\n";
        $buffer .= $indent . '				';
        // 'is_alert' section
        $buffer .= $this->section725afd86e085312c354339adfa5960e4($context, $indent, $context->find('is_alert'));
        $buffer .= ' 				';
        $buffer .= "\n";
        // 'status_messages' section
        $buffer .= $this->section8279088eb7c1e674b4bcfa0a9b449680($context, $indent, $context->find('status_messages'));
        $buffer .= $indent . '				';
        $buffer .= "\n";
        $buffer .= $indent . '				';
        // 'is_alert' section
        $buffer .= $this->sectionB30d35fe533aeba3416652c89b2e0667($context, $indent, $context->find('is_alert'));
        $buffer .= "\n";
        $buffer .= $indent . '			</div>';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";
        $buffer .= "\n";
        // 'is_homepage' section
        $buffer .= $this->section4072509dc568c2f9195bb4458a688812($context, $indent, $context->find('is_homepage'));
        $buffer .= $indent . '	';
        $buffer .= "\n";
        // 'is_homepage' inverted section
        $value = $context->find('is_homepage');
        if (empty($value)) {
            
            $buffer .= $indent . '	';
            $buffer .= "\n";
            $buffer .= $indent . '			<div id="leftside" class="lft-no-margin">';
            $buffer .= "\n";
            $buffer .= $indent . '				<div class="plain">				';
            $buffer .= "\n";
            if ($partial = $this->mustache->loadPartial('content')) {
                $buffer .= $partial->renderInternal($context, '					');
            }
            $buffer .= $indent . '				</div>				';
            $buffer .= "\n";
            $buffer .= $indent . '			</div>';
            $buffer .= "\n";
            $buffer .= $indent . '			';
            $buffer .= "\n";
        }
        $buffer .= $indent . '			';
        $buffer .= "\n";
        // 'is_schedule_claim_page' inverted section
        $value = $context->find('is_schedule_claim_page');
        if (empty($value)) {
            
            $buffer .= $indent . '			<div id="rightside">';
            $buffer .= "\n";
            $buffer .= $indent . '				';
            $buffer .= "\n";
            $buffer .= $indent . '				<div>';
            $buffer .= "\n";
            $buffer .= $indent . '					<a href="/schedule-claim" target="_self">';
            $buffer .= "\n";
            $buffer .= $indent . '						<img src="/assets/gfx/_banner-02.jpg" onmouseover="this.src=\' /assets/gfx/_banner-02-high.jpg \'" onmouseout="this.src=\' /assets/gfx/_banner-02.jpg \'" width="300" />';
            $buffer .= "\n";
            $buffer .= $indent . '					</a>';
            $buffer .= "\n";
            $buffer .= $indent . '				</div>';
            $buffer .= "\n";
            $buffer .= $indent . '				';
            $buffer .= "\n";
            $buffer .= $indent . '				<div class="box togglemenu">	';
            $buffer .= "\n";
            $buffer .= $indent . '					<div class="content">';
            $buffer .= "\n";
            $buffer .= $indent . '						<ul>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li><h2>Services</h2></li>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="title">Basic Inspections</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="content">';
            $buffer .= "\n";
            $buffer .= $indent . '								';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>1. Inspection is performed by a HAAG Certified inspector and is coordinated with Policy Holder and roofer present (when possible)</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>2. Ground inspection of siding, screens, downspouts, gutters, aluminum fascia, and a/c units</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>3. Hail and wind damage inspection on all types of commercial and residential roofing materials</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>4. High Definition photos of damage in report format</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>5. Report includes photos of damage, sketch with measurements, and square report</p>								';
            $buffer .= "\n";
            $buffer .= $indent . '							</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="title">Expert Inspections</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="content">';
            $buffer .= "\n";
            $buffer .= "\n";
            $buffer .= $indent . '								<p>1. Inspection is performed by a HAAG Certified inspector and is coordinated with Policy Holder and roofer present (when possible)</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>2. Ground inspection of siding, screens, downspouts, gutters, aluminum fascia, and a/c units</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>3. Hail and wind damage inspection on all types of commercial and residential roofing materials</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>4. High Definition photos of damage in report format</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>5. Report includes photos of damage, sketch with measurements, and square report</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>6. Hail size forensically measured from hail spatter and damaged objects to determine size of hailstone</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>7. Fraudulent damage investigation</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>8. Roof leak location service</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>9. Installation defects assessed and documented</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>10. Manufacturing defects assessed and documented</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>11. Algae damage and Vermin damage assessed and documented</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>';
            $buffer .= "\n";
            $buffer .= $indent . '									$250 – for single story dwelling up to a 7 pitch.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$300 – for a 2 story dwelling up to a 7 pitch.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$350 – for a single story dwelling over a 7 pitch.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$375 – for a 2 story dwelling over a 7 pitch.';
            $buffer .= "\n";
            $buffer .= $indent . '								</p>';
            $buffer .= "\n";
            $buffer .= "\n";
            $buffer .= $indent . '								<p>';
            $buffer .= "\n";
            $buffer .= $indent . '									$50 – Interior inspection and measurements.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$50 – Any detached structures ( Base price includes dwelling plus one structure.). $100 – Any additional story over 2 stories.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$100 – Any structure over 70 squares.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$200 – Any structure over 200 squares.';
            $buffer .= "\n";
            $buffer .= $indent . '								</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								';
            $buffer .= "\n";
            $buffer .= $indent . '							</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="title">Engineer Reports</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="content">';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>All below services performed by a professional engineer, and comes backed with a PE seal</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>1. Inspection is performed by an Professional Engineer and is coordinated with Policy Holder and roofer present (when possible)</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>2. Ground inspection of siding, screens, downspouts, gutters, aluminum fascia, and a/c units</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>3. Hail and wind damage inspection on all types of commercial and residential roofing materials</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>4. High Definition photos of damage in report format</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>5. Report includes photos of damage, sketch with measurements, and square report</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>6. Hail size forensically measured from hail spatter and damaged objects to determine size of hailstone</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>7. Fraudulent damage investigation</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>8. Roof leak location service</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>9. Installation defects assessed and documented</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>10. Manufacturing defects assessed and documented</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>11. Algae damage and Vermin damage assessed and documented</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								';
            $buffer .= "\n";
            $buffer .= $indent . '							';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>For an Engineer report add $500 to pricing below:</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>';
            $buffer .= "\n";
            $buffer .= $indent . '									$250 – for single story dwelling up to a 7 pitch.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$300 – for a 2 story dwelling up to a 7 pitch.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$350 – for a single story dwelling over a 7 pitch.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$375 – for a 2 story dwelling over a 7 pitch.									';
            $buffer .= "\n";
            $buffer .= $indent . '								</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>';
            $buffer .= "\n";
            $buffer .= $indent . '									$50 – Interior inspection and measurements.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$50 – Any detached structures ( Base price includes dwelling plus one structure.). $100 – Any additional story over 2 stories.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$100 – Any structure over 70 squares.';
            $buffer .= "\n";
            $buffer .= $indent . '									<br>$200 – Any structure over 200 squares.									';
            $buffer .= "\n";
            $buffer .= $indent . '								</p>';
            $buffer .= "\n";
            $buffer .= $indent . '							</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="title">Fraud investigations</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="content">';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>We know all the indications of a roof that has been intentionally damaged and will be able to fully document all of these indicators. Whether it is fabricated wind or hail damage the indicators are always present and it is our expertise to assess and document all aspects.</p>';
            $buffer .= "\n";
            $buffer .= $indent . '							</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="title">HAAG certified inspectors</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="content">';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>All of our inspectors are HAAG certified or better. You will be comforted to know that your inspection will be handled by a knowledgeable inspector with the utmost professionalism and expertise.</p>';
            $buffer .= "\n";
            $buffer .= $indent . '							</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="title">State licensed adjusters</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="content">';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>We have on our staff licensed Adjusters that can be requested to inspect any claim.</p>';
            $buffer .= "\n";
            $buffer .= $indent . '							</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="title">Residential and commercial inspections</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="content">';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>We inspect wind and hail damage to various types of building materials on residential and commercial buildings.</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>To name a few: Asphalt- 3 tab shingles, Laminated shingles, T-lock shingles, Cedar Shakes,  Modified Bitumen (rolled roofing, hot and cold applied), EPDM, TPO, PVC, Asbestos tile, Concrete Tile, Clay Tile, Slate, and Metal roofing.</p>';
            $buffer .= "\n";
            $buffer .= $indent . '								';
            $buffer .= "\n";
            $buffer .= $indent . '							</li>';
            $buffer .= "\n";
            $buffer .= "\n";
            $buffer .= $indent . '							';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="title">Video inspections</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							<li class="content">';
            $buffer .= "\n";
            $buffer .= $indent . '								<p>For only $100.00 more we will provide you with a video of the inspection on the dwelling in question. This will give you a video overview of the test squares, metal damage, and the entire inspection and it is about 5 minutes in length.</p>';
            $buffer .= "\n";
            $buffer .= $indent . '							</li>';
            $buffer .= "\n";
            $buffer .= $indent . '							';
            $buffer .= "\n";
            $buffer .= $indent . '						</ul>';
            $buffer .= "\n";
            $buffer .= $indent . '					</div>';
            $buffer .= "\n";
            $buffer .= $indent . '				</div>';
            $buffer .= "\n";
            $buffer .= $indent . '			</div>';
            $buffer .= "\n";
            $buffer .= $indent . '	';
            $buffer .= "\n";
        }
        $buffer .= $indent . '	';
        $buffer .= "\n";
        $buffer .= $indent . '		</div> ';
        $buffer .= "\n";
        $buffer .= $indent . '	</div>';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";
        // 'asset_js' section
        $buffer .= $this->section5ee0744a8606616f20f8a00e55b505c0($context, $indent, $context->find('asset_js'));
        $buffer .= "\n";
        // 'js_options' section
        $buffer .= $this->section5aac2a5017a19df9dadf130e0d01ebd7($context, $indent, $context->find('js_options'));
        $buffer .= $indent . '</body>';
        $buffer .= "\n";
        $buffer .= $indent . '</html>';

        if ($escape) {
            return call_user_func($this->mustache->getEscape(), $buffer);
        } else {
            return $buffer;
        }
    }

    private function sectionEde43a8489d27c5271dbf751db8c74e2(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
		<link type="text/css" rel="stylesheet" media="all" href="{{path}}" />
	';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '		<link type="text/css" rel="stylesheet" media="all" href="';
                $value = $context->find('path');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" />';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFc2006dea0d6b07dd721b61f07aed911(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
							<li>
								<a href="{{url_profile}}" class="user">
									<span class="bar">Welcome {{username}}</span>
								</a>
							</li>
							<li><a href="{{url_settings}}" class="settings"></a></li>
							<li><a href="{{url_logout}}" class="logout"></a></li>
						';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '							<li>';
                $buffer .= "\n";
                $buffer .= $indent . '								<a href="';
                $value = $context->find('url_profile');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" class="user">';
                $buffer .= "\n";
                $buffer .= $indent . '									<span class="bar">Welcome ';
                $value = $context->find('username');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</span>';
                $buffer .= "\n";
                $buffer .= $indent . '								</a>';
                $buffer .= "\n";
                $buffer .= $indent . '							</li>';
                $buffer .= "\n";
                $buffer .= $indent . '							<li><a href="';
                $value = $context->find('url_settings');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" class="settings"></a></li>';
                $buffer .= "\n";
                $buffer .= $indent . '							<li><a href="';
                $value = $context->find('url_logout');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" class="logout"></a></li>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3b8c40e845eb80900938714ed8f0be3a(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				<div id="labels">
					<ul>
						{{#top_navigation}}
							<li>
								<a href="{{url_profile}}" class="user">
									<span class="bar">Welcome {{username}}</span>
								</a>
							</li>
							<li><a href="{{url_settings}}" class="settings"></a></li>
							<li><a href="{{url_logout}}" class="logout"></a></li>
						{{/top_navigation}}
					</ul>
				</div>
				';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '				<div id="labels">';
                $buffer .= "\n";
                $buffer .= $indent . '					<ul>';
                $buffer .= "\n";
                // 'top_navigation' section
                $buffer .= $this->sectionFc2006dea0d6b07dd721b61f07aed911($context, $indent, $context->find('top_navigation'));
                $buffer .= $indent . '					</ul>';
                $buffer .= "\n";
                $buffer .= $indent . '				</div>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB18ef95dcad11894d23f763e54269b41(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' class="current" ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' class="current" ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD4f6cef50dd115b36503ad6984a89df7(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' <ul> ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' <ul> ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBb8fc5bf5d6af93ca12abccb67176154(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
										<li {{#selected}} class="current" {{/selected}}>
											<a href="{{url}}">{{name}}</a>
										</li>
									';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '										<li ';
                // 'selected' section
                $buffer .= $this->sectionB18ef95dcad11894d23f763e54269b41($context, $indent, $context->find('selected'));
                $buffer .= '>';
                $buffer .= "\n";
                $buffer .= $indent . '											<a href="';
                $value = $context->find('url');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $value = $context->find('name');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</a>';
                $buffer .= "\n";
                $buffer .= $indent . '										</li>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section445e26333942408a5975e2ad01b96923(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' </ul> ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' </ul> ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section780ac43cffa503d1928977d1983876bc(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
							<li {{#selected}} class="current" {{/selected}}>
								<a href="{{url}}">{{name}}</a>
								
								{{#is_sub_navigation}} <ul> {{/is_sub_navigation}}
									
									{{#sub_navigation}}
										<li {{#selected}} class="current" {{/selected}}>
											<a href="{{url}}">{{name}}</a>
										</li>
									{{/sub_navigation}}
									
								{{#is_sub_navigation}} </ul> {{/is_sub_navigation}}
							</li> 
						';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '							<li ';
                // 'selected' section
                $buffer .= $this->sectionB18ef95dcad11894d23f763e54269b41($context, $indent, $context->find('selected'));
                $buffer .= '>';
                $buffer .= "\n";
                $buffer .= $indent . '								<a href="';
                $value = $context->find('url');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $value = $context->find('name');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</a>';
                $buffer .= "\n";
                $buffer .= $indent . '								';
                $buffer .= "\n";
                $buffer .= $indent . '								';
                // 'is_sub_navigation' section
                $buffer .= $this->sectionD4f6cef50dd115b36503ad6984a89df7($context, $indent, $context->find('is_sub_navigation'));
                $buffer .= "\n";
                $buffer .= $indent . '									';
                $buffer .= "\n";
                // 'sub_navigation' section
                $buffer .= $this->sectionBb8fc5bf5d6af93ca12abccb67176154($context, $indent, $context->find('sub_navigation'));
                $buffer .= $indent . '									';
                $buffer .= "\n";
                $buffer .= $indent . '								';
                // 'is_sub_navigation' section
                $buffer .= $this->section445e26333942408a5975e2ad01b96923($context, $indent, $context->find('is_sub_navigation'));
                $buffer .= "\n";
                $buffer .= $indent . '							</li> ';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section725afd86e085312c354339adfa5960e4(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' <div class="section"> ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' <div class="section"> ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8279088eb7c1e674b4bcfa0a9b449680(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
						<div class="message {{message_type}}">
							<span>{{message_content}}</span>
						</div>
					';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '						<div class="message ';
                $value = $context->find('message_type');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $buffer .= "\n";
                $buffer .= $indent . '							<span>';
                $value = $context->find('message_content');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</span>';
                $buffer .= "\n";
                $buffer .= $indent . '						</div>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB30d35fe533aeba3416652c89b2e0667(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = ' </div> ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= ' </div> ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4072509dc568c2f9195bb4458a688812(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
			
				{{>content}}
				
			';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '			';
                $buffer .= "\n";
                if ($partial = $this->mustache->loadPartial('content')) {
                    $buffer .= $partial->renderInternal($context, '				');
                }
                $buffer .= $indent . '				';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5ee0744a8606616f20f8a00e55b505c0(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
		<script type="text/javascript" src="{{path}}"></script>
	';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '		<script type="text/javascript" src="';
                $value = $context->find('path');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '"></script>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5aac2a5017a19df9dadf130e0d01ebd7(Mustache_Context $context, $indent, $value) {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
	<script type="text/javascript">{{& js_options}}</script>
	';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '	<script type="text/javascript">';
                $value = $context->find('js_options');
                if (!is_string($value) && is_callable($value)) {
                    $value = $this->mustache
                        ->loadLambda((string) call_user_func($value))
                        ->renderInternal($context, $indent);
                }
                $buffer .= $value;
                $buffer .= '</script>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}