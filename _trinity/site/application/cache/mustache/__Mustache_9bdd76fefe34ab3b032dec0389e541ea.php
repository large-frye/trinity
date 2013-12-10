<?php

class __Mustache_9bdd76fefe34ab3b032dec0389e541ea extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '', $escape = false)
    {
        $buffer = '';

        $buffer .= $indent . '<div id="leftside" class="lft-no-margin">';
        $buffer .= "\n";
        $buffer .= $indent . '	<div id="heroLeft">';
        $buffer .= "\n";
        $buffer .= $indent . '		<a href="#" target="_self">';
        $buffer .= "\n";
        $buffer .= $indent . '			<img src="/assets/gfx/_banner-01.jpg" width="680" />';
        $buffer .= "\n";
        $buffer .= $indent . '		</a>';
        $buffer .= "\n";
        $buffer .= $indent . '	</div>';
        $buffer .= "\n";
        $buffer .= $indent . '	<div id="breadcrumbs">';
        $buffer .= "\n";
        $buffer .= $indent . '		<ul>';
        $buffer .= "\n";
        $buffer .= $indent . '			<li></li>';
        $buffer .= "\n";
        $buffer .= $indent . '			<li><a href="/">Home</a></li>';
        $buffer .= "\n";
        // 'is_logged_in' inverted section
        $value = $context->find('is_logged_in');
        if (empty($value)) {
            
            $buffer .= $indent . '			<li><a href="/login">Login</a></li>';
            $buffer .= "\n";
        }
        $buffer .= $indent . '		</ul>';
        $buffer .= "\n";
        $buffer .= $indent . '	</div>';
        $buffer .= "\n";
        $buffer .= $indent . '		';
        $buffer .= "\n";
        $buffer .= $indent . '			';
        $buffer .= "\n";
        $buffer .= $indent . '	<div class="plain">			';
        $buffer .= "\n";
        $buffer .= $indent . '		<p>Welcome to Trinity Inspections LLC. We are the trusted source for expert, accurate, and honest inspections at a fair price in the Southeast. We have built our reputation one quality inspection at a time. We have inspected thousands of residential and commercial buildings for storm related damage. Our experts have the knowledge and experience to explain in detail any and all damage that was present to the policyholder in an easy to understand format with pictures and diagrams. "When quality counts, you can count on us."</p>';
        $buffer .= "\n";
        $buffer .= "\n";
        $buffer .= $indent . '		<p>Our mission is to deliver an “Honest” and “Accurate” inspection at a fair price, with the quickest turn around in the industry.</p>';
        $buffer .= "\n";
        $buffer .= $indent . '		';
        $buffer .= "\n";
        $buffer .= $indent . '		<p><br><br></p>';
        $buffer .= "\n";
        $buffer .= $indent . '		<p>';
        $buffer .= "\n";
        $buffer .= $indent . '			<img src="/assets/gfx/client-logos.jpg" width="680" height="72" alt="Client Logos">';
        $buffer .= "\n";
        $buffer .= $indent . '		</p>';
        $buffer .= "\n";
        $buffer .= "\n";
        $buffer .= $indent . '	</div>	';
        $buffer .= "\n";
        $buffer .= $indent . '</div>';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";

        if ($escape) {
            return call_user_func($this->mustache->getEscape(), $buffer);
        } else {
            return $buffer;
        }
    }

}