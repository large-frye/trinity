
<!doctype html>
<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>Basic Inspection</title>
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

td.center, p.center {
    text-align: center;
}

p {
    line-height: 20px;
}

ul
{
    list-style-type: none;
}
.sectionDescrip{
    font:12px;
}
.damageLi{
  
  font:12px;
}
.damageUL{
  position:relative;
  left:2em;
}
.redTxt{
  color: red ;
}
.page-break { page-break-after: always; }
.clear { clear: both; }
.header { color: rgb(117, 41, 43); font-weight: 600; }
.row-header { text-align:  center; color: rgb(253, 0, 17); border: 1px solid black; padding: 5px; }
.blue { color: rgb(45, 130, 253); font-weight: 600; }
.red { color: rgb(253, 0, 17); text-decoration: underline; }

</style>
</head>
<body>

<!-- </div> -->

<div id="page-wrap">
<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . 'trinity/assets/gfx/logo-icon.png'; ?>" width="100" height="100" alt="test" style="text-align:center">
<table>
    <tr><th class="header">Trinity Inspections, LLC</th></tr>
    <tr><td class="center">P.O. Box 938</td></tr>
    <tr><td class="center">Locust, NC 28097</td></tr>
</table>


<table class="top">
    <tr><th>Policy Holder:</th><td class="border"><?php echo $inspection_data['insured'];?></td></tr>
    <tr><th>Street:</th><td class="border"><?php echo $inspection_data['street_address'];?></td></tr>
    <tr><th>City/State/Zip:</th><td class="border"><?php echo $inspection_data['second_address'];?></td></tr>
    <tr><th>Claim #:</th><td class="border">&nbsp;<?php echo $inspection_data['policy_number'];?></td></tr>
</table>
<table border="1" class="top position-right">
    <tr><th>Adjsuter Name:</th><td class="border">&nbsp;<?php echo $inspection_data['adjuster'];?></td></tr>
    <tr><th>Insurance Company:</th><td class="border">...</td></tr>
    <tr><th>Date:</th><td class="border">&nbsp;<?php echo $inspection_data['date_of_inspection'];?></td></tr>
</table>
<br /><br />
<h4 class="row-header">GROUND INSPECTION</h4>
<p>During our ground level walk around inspection of loss to the following building materials that may be more susceptible to wind or hail:</p>
<p>During our ground level walk around inspection of the loss <span class="blue">we did not find collateral damage</span> to the following building 
   materials that may be more susceptible to wind or hail:</p>
<p class="blue">Gutters, Downspouts, Screens, Vinyl Siding, Aluminum Fascia, Wood Decking, Fencing Material</p>
<h4 class="row-header">ROOF INSPECTION</h4>
<?php foreach ($report_data['damages'] as $damage => $damages) { 
          if (preg_match('/header/', $damage)) { ?>
              <h5 class="red"><?php echo strtoupper(str_replace('_header', '', $damage.' damage:')); 
              
               if(strcmp($damage,'wind')){
                echo '<p class="sectionDescrip">Our wind damage inspection consists of inspecting every roof slope to verify any and all wind damaged components to all types of
roofing systems.</p>';
              } elseif(strcmp($damage,'hail')){
              echo '<pclass="sectionDescrip">Our hail damage inspection consists of looking on all directional slopes for granular displacement on the shingles that are about the
                  size in diameter of a dime supported by mat fracture. These areas of granular displacement must be across the entire directional
                  slope that we are assessing (which is a characteristic of hail damage). We use a 10’ X 10’ test square on all 4 directional slopes to test
                  the statistical average of hail.</p>';
                     }

              ?></h5>
              <br>
              <div class="damageUL">
              <ul>
              <?php 
               $directions =array("North", "South", "East", "West", "(Front)", "(Rear)", "(Left)", "(Right)");
                foreach ($damages as $tmp) {
                 $finalStr='';
                 foreach(explode(' ',$tmp) as $st) {
                       if(is_numeric($st)){
                      $finalStr=$finalStr.' <span class="redTxt">'.$st.'</span>';
                     }else{
                       //$finalStr + $char;
                      $finalStr=$finalStr.' '.$st;
                     }
                   }
                  $tmp=$finalStr;
                  foreach ($directions as $value) {
                   $tmp = str_replace($value, '<span class="redTxt">'.$value.'</span>', $tmp);
                 }
                 ?>
                  <li class="damageLi"><?php echo $tmp; ?></li>
              <?php 
            } ?>
            </ul>
          </div>
            <br>
    <?php }} ?>
</div>
<?php 
?>

</body>
</html>  
