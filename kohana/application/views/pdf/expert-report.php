
<!doctype html>
<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>Expert Inspection</title>
<style type="text/css">
* {
  margin:0; padding:0;
}
body{
  font:14px Georgia, serif;
}

#page-wrap{
  width:700px;
  margin: 0 auto;
  padding: 10px;
}

table{
   border-collapse: collapse; width: 100%;
   margin-top: 20px;
   margin-bottom: 20px;
}

table.top {
    width: 49.5%;
    position: relative;
    top: 30px;
}

table.position-right{
    position: relative;
    top: -70px;
    left: 360px;
}

tr.header {
    background-color: rgb(117, 41, 43);
    color: white;
}

td.border{
   border:1px solid #ccc; padding:6px;
}

thead {
   width:100%;position:fixed;
   height:109px;
}

td.center, p.center, h4.center, h3.center {
    text-align: center;
}

p, li {
    line-height: 20px;
}
.redTxt{
  color: red ;
}

.imgContainer{
width:450px;
 display: block;
  margin-left: auto;
  margin-right: auto;

}
.parentCatHead{
   margin-bottom:20px;
}
.imgCl{
   margin-bottom:20px;
  
}

p.lower { position: relative; top: 60px; }

ul { padding-left: 15px; }
li { padding: 10px; position: relative; left: 2em;}

.page-break { page-break-after: always; position: absolute; top: 20px; }
.clear { clear: both; }
.header { color: rgb(117, 41, 43); font-weight: 600; }
.row-header { text-align:  center; color: rgb(253, 0, 17); border: 1px solid black; padding: 5px; }
.blue { color: rgb(45, 130, 253); font-weight: 600; }
.red { color: rgb(253, 0, 17); text-decoration: underline; }
.bigger-header { font-size: 16px; }
.left { text-align: left; }
.small { font-size: 10px; }
.resize-signature { width: 300px; height: 100px; padding-top: 100px; color: black; }
.relative { position: relative; }
.padding-top: { padding-top: 25; }
.damage-block : { position: relative; top: 20px; padding-bottom: 40px;}
.sketch-helper { position: relative !important; left: -300px !important; }


</style>
</head>
<body>

<!-- </div> -->

<div id="page-wrap">
<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/assets/gfx/logo-icon.png'; ?>" width="100" height="100" alt="test" style="text-align:center">
<table>
    <tr><th class="header">Trinity Inspections, LLC</th></tr>
    <tr><td class="center">P.O. Box 938</td></tr>
    <tr><td class="center">Locust, NC 28097</td></tr>
</table>


<table class="top">
    <tr><th class="left">Policyholder Information:</th></tr>
    <tr><td><?php echo $inspection_data['insured'];?></td></tr>
    <tr><td><?php echo $inspection_data['street_address'];?></td></tr>
    <tr><td><?php echo $inspection_data['second_address'];?></td></tr>
    <tr><th class="left">Claim #:&nbsp;<?php echo $inspection_data['policy_number'];?></th></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><th class="left">Policy Holder Present: <?php echo $report_data['was_insured_present']; ?></th></tr>
    <tr><th class="left">Contractor Present: <?php echo $report_data['was_roofer_present']; ?></th></tr>
</table>
<table border="1" class="top position-right">
    <tr><th>Adjsuter Name:</th><td class="border">&nbsp;<?php echo $inspection_data['adjuster'];?></td></tr>
    <tr><th>Insurance Company:</th><td class="border"><?php echo $inspection_data['company_name']; ?></td></tr>
    <tr><th>Date:</th><td class="border">&nbsp;<?php echo $inspection_data['date_of_inspection'];?></td></tr>
</table>
<h4 class="center">Inspection Overview:</h4>
<p>On <?php echo date('n/j/Y', strtotime($inspection_data['date_of_inspection'])); ?>, at 
    <?php echo date('h:m A', strtotime($inspection_data['time_of_inspection'])); ?> 
    an inspection was made of this <?php echo str_replace('<br>', '', $report_data['roof_height']); ?>, 
    <?php echo str_replace('<br>', ', ', $report_data['siding_type']); ?> 
    sided dwelling with <?php echo str_replace('<br>', ', ', $report_data['type_of_roofing']); ?> shingle roofing material. 
    The <?php echo $report_data['was_insured_present_str']; ?> to explain the extent of the damages present on the property.
    <?php echo $report_data['was_roofer_present_str']; 
          echo $report_data['was_roof_climbed'];
          echo $report_data['roofing_agree_str']; ?></p>
<p class="small lower">All opinions expressed in this report are based on factual evidence found at the dwelling listed above, at the date and time of inspection. 
   It is understood by all parties involved that this inspection and report is provided on a “Limited Liability” basis, and the maximum liability 
   by the inspector and/or Trinity Inspections LLC for errors and omissions, negligence, or from damage of surrounding roofing products that 
   may cause any problems, shall be limited to the amount of the fee paid for this inspection.</p>
   <img class="resize-signature" src="<?php echo $_SERVER['DOCUMENT_ROOT'];?>/assets/gfx/anthony_signature.png" alt="signature" />
   <p class="relative">Anthony Giordano<br>
Owner, Senior Certified Inspector<br>
HAAG Certification # 201006130<br> 
NC Adjusters License # 12760239<br> 
SC Adjusters License # 625784</p>

<div class="page-break"></div>
<div class="padding-top"></div>
<br><br><br>
<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/assets/gfx/logo-icon.png'; ?>" width="100" height="100" alt="test" style="text-align:center">
<br>
<?php foreach ($report_data['damages'] as $damage => $damages) { 
          if (preg_match('/header/', $damage)) { ?>
              <div class="damage-block"><h3 class="red"><?php echo strtoupper(str_replace('_', ' ' , str_replace('_header', '', $damage))); ?></h3>
              <p><?php echo isset($static_damage_text[$damage]) ? $static_damage_text[$damage] : ""; ?></p>
              <ul>
              <?php 
                  $directions = array("North", "South", "East", "West", "(Front)", "(Rear)", "(Left)", "(Right)", "NorthEast", "NorthWest", "SouthEast", "SouthWest");
                  foreach ($damages as $type) {
                      if (!is_array($type) && $type != "" && !is_numeric($type) && $type != "blank") { ?>
                      <li>
                      <?php 
                          $finalStr='';
                          foreach(explode(' ',$type) as $st) {
                              if(is_numeric($st)){
                                  $finalStr=$finalStr.' <span class="red">'.$st.'</span>';
                              } else {
                                  $finalStr=$finalStr.' '.$st;
                              }
                          }
                          $type = $finalStr;

                          foreach ($directions as $value) {
                              $type = str_replace($value, '<span class="red">'.$value.'</span>', $type);
                          } echo $type; ?></li>
              <?php } else if (is_array($type)) {
                  foreach ($type as $t => $val) {
                    foreach ($directions as $value) {
                      $val = str_replace($value, '<span class="red">'.$value.'</span>', $val);
                    }

                    echo "value - " . $val;

                    /* $_str = "";
                    
                    foreach ($val as $char) {
                        $_str .= is_numeric($char) ? "<span class=\"red\">" . $char . "</span>" : $char;
                    }
                     echo "<li>" . $_str . "</li>"; */
                  }
              } ?>
              </ul>
    <?php } echo "</div>"; }} ?>
<div class="page-break"></div>
<div class="padding-top"></div>
<br><br><br>
<h3 class="red">SUMMARY OF FINDINGS</h3>
<?php 
if (isset($report_data['condition'])) {
    echo "<p>The roof was in the following condition when inspected: " . $report_data['condition'] . "</p>";
}

// Previous Repairs Made 
if (isset($report_data['previous_repairs_made'])) {
    echo "<p>The roof had the following previous repairs made when inspected: <b>" . str_replace("<br>", "", $report_data['previous_repairs_made']) . "</b></p>";
}

// Roof Conditions
if (isset($report_data['roof_conditions'])) {
    echo "<p>The roof had the following roof issues made when inspected: <b>" . str_replace("<br>", ", ", $report_data['roof_conditions']) . "</b></p>";
}

if (isset($report_data['collateral_damages_to_property'])) {
    echo "<p>There was collateral damages found on the property at the: <b>" . str_replace("<br>", "", $report_data['collateral_damages_to_property']) 
         . "</b>(<em>" . $report_data['collateral_damage_detail_description'] . "</em>)</p>";
}

if (isset($report_data['damages']['collateral_damamges_comments']) && $report_data['damages']['collateral_damamges_comments'] != "") {
    echo "<p>Collateral Damage Comments: <b>" . str_replace("<br>", "", $report_data['damages']['collateral_damamges_comments']) 
         . "</b>(<em>" . $report_data['damages']['collateral_damamges_comments'] . "</em>)</p>";
}

if (isset($report_data['damages']['general_comments']) && $report_data['damages']['general_comments'] != "") {
    echo "<p>General Comments: " . $report_data['damages']['general_comments'] . "</p>";
}

?>
<div class="page-break"></div>
<div class="padding-top"></div>
<br><br><br>
<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/assets/gfx/logo-icon.png'; ?>" width="100" height="100" alt="test" style="text-align:center">
<h3 class="center">Symbol Breakdown</h3>
<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/assets/gfx/symbol_breakdown.jpg'; ?>" alt="symbol_breakdown" />
<div class="page-break"></div>

<?php echo isset($sketch) ? "<img src=\"" . $sketch->fileLocation . "\" alt=\"sketch\" width=\"850\" class=\"sketch-helper\" style=\"margin-left: -75px;\" />" : null;  ?>

</div>
</div>
</body>
</html>  
