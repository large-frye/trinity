<?php

class __Mustache_d376044f1599ed261c1e89eb3538b06e extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '', $escape = false)
    {
        $buffer = '';

        $buffer .= $indent . '<div class="plain">';
        $buffer .= "\n";
        $buffer .= "\n";
        $buffer .= $indent . '	<h1>About</h1>';
        $buffer .= "\n";
        $buffer .= $indent . '	<p>Our objective is to provide an Accurate and Honest inspection… every time, with the quickest turnaround in the industry. Here at Trinity we make it our priority to simplify the claims process for all parties involved. We are an Expert third party, non-biased, high and steep, wind and hail damage Inspection Company. We are not a roofing company or are we affiliated with any roofing company. Our services range from a basic ladder assist all the way up to a full engineers report.  We do all of this while providing it at a fair competitive price.</p>';
        $buffer .= "\n";
        $buffer .= $indent . '	';
        $buffer .= "\n";
        $buffer .= $indent . '	<p>Our inspections are based on forensic evidence found at the dwelling at the time of inspection.  But what really sets us apart from other inspection companies is we take the time to explain to the policy holder in full detail the damages that are or are not present to their roofing system. And why the building materials are or are not damaged. It is our belief that an educated Policy Holder is a happy Policy Holder, which in turn mitigates re-inspections.</p>';
        $buffer .= "\n";
        $buffer .= $indent . '</div>';

        if ($escape) {
            return call_user_func($this->mustache->getEscape(), $buffer);
        } else {
            return $buffer;
        }
    }

}