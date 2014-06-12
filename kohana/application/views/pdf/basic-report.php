<!doctype html>
<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>Basic Inspection</title>
<style type="text/css">
* {
  margin:0px; padding:0; margin-top: 10px;
}
body{
  font:14px Georgia, serif;
  line-height: 24px;
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
    top: -110px;
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
    font:14px;
}
.hailDmg{
    font:14px;
}
.damageLi{
  
  font:15px;
}
.damageUL{
  position:relative;
  left:2em;
}
.redTxt{
  color: red ;
}

.imgContainer{
  width:450px;
  padding-top:2.1cm;
  display: block;
  position:relative;
  left:50px;
  margin-bottom: 52px;
}
.imgDiv{
  display: block;
  padding: 10px;
  margin-top: 50px; 

}
.parentCatHead{
   margin-bottom:20px;

}

.imgCl{
   margin-bottom:20px;
}

.page-break { page-break-after: always; }
.clear { clear: both; }
.header { color: rgb(117, 41, 43); font-weight: 600; }
.row-header { text-align:  center; color: rgb(253, 0, 17); border: 1px solid black; padding: 5px; }
.blue { color: rgb(45, 130, 253); font-weight: 600; }
.red { color: rgb(253, 0, 17); text-decoration: underline; }
.sketch-helper { position: relative !important; left: -300px !important; }

</style>
</head>
<body>

<!-- </div> -->

<div id="page-wrap">
<img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/assets/gfx/logo-icon.png'; ?>" width="100" height="100" alt="test" style="text-align:center">
<table style="position:absolute; top: 40px; left: 45px">
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
    <tr><th>Adjuster Name:</th><td class="border">&nbsp;<?php echo $inspection_data['adjuster'];?></td></tr>
    <tr><th>Insurance Company:</th><td class="border"><?php echo $inspection_data['company_name'];?></td></tr>
    <tr><th>Date:</th><td class="border">&nbsp;<?php echo $inspection_data['date_of_inspection'];?></td></tr>
</table>
<?php 

$collateral_damage_header = isset($report_data['damages']['collateral_damage_header']) ? $report_data['damages']['collateral_damage_header'] : null;
$collateral_damages = isset($report_data['damages']['collateral_damage_header']['collateral_damages']) ? $report_data['damages']['collateral_damage_header']['collateral_damages'] : null;

?>
<div style="position:absolute; top: 315px"> <!-- Don't really like using position:absolute -->
<h4 class="row-header">GROUND INSPECTION</h4>
<!-- <p>During our ground level walk around inspection of loss to the following building materials that may be more susceptible to wind or hail:</p>-->
<p>During our ground level walk around inspection of the loss <span class="blue">
  <?php echo isset($collateral_damage_header) && !empty($collateral_damage_header) ? "we did find collateral damage" : "we did not find collateral damage"; ?></span> 
   to the following building materials that may be more susceptible to wind or hail.</p>
<p class="blue"><?php echo isset($collateral_damages) && !empty($collateral_damages) ? implode(', ', $collateral_damages) : null; ?></p>
<?php if(isset($report_data['damages']['collateral_damamges_comments']) && trim($report_data['damages']['collateral_damamges_comments']) != "") {
    echo "<h4>Collateral Damages Comments: </h4><p>" . $report_data['damages']['collateral_damamges_comments'] . "</p>";
}
?>
<br>
<h4 class="row-header">ROOF INSPECTION</h4>
<?php
$windTotal=0; 
$hailTotal=0;
 foreach ($report_data['damages'] as $damage => $damages) { 
          if (preg_match('/header/', $damage) && !preg_match('/collateral/', $damage)) { ?>
              <h5 class="red"><?php echo strtoupper(str_replace('_header', '', $damage.' damage:')); 
               if(preg_match('/wind/', $damage)){
                echo '<p class="sectionDescrip">Our wind damage inspection consists of inspecting every roof slope to verify any and all wind damaged components to all types of
roofing systems.</p>';
              } elseif(preg_match('/hail/', $damage)){
              echo '<p class="sectionDescrip">Our hail damage inspection consists of looking on all directional slopes for granular displacement on the shingles that are about the
                  size in diameter of a dime supported by mat fracture. These areas of granular displacement must be across the entire directional
                  slope that we are assessing (which is a characteristic of hail damage). We use a 10’ X 10’ test square on all 4 directional slopes to test
                  the statistical average of hail.</p>';
                     }

              ?></h5>
              <div class="damageUL">
              <ul>
              <?php 
              
             
                $directions =array("North", "South", "East", "West", "(Front)", "(Rear)", "(Left)", "(Right)", "NorthEast", "SouthEast", "SouthWest", "NorthWest");
                foreach ($damages as $tmp) {
                    $finalStr='';
                    if (is_array($tmp)) {
                        foreach ($tmp as $key => $value) {
                            foreach (explode(' ', $value) as $opt) {
                                if (preg_match('/[0-9]+/', $opt)) {
                                    if (preg_match('/wind/', $damage)) {
                                        $windTotal = $windTotal + $opt;
                                    } else if (preg_match('/hail/', $damage)) {
                                        $hailTotal = $hailTotal + $opt;
                                    }

                                    $finalStr .= " <span style=\"color:red\">" . $opt . "</span>";
                                } else {
                                    $finalStr .= " " . $opt;
                                }
                           }
                           $finalStr .= "<br />";
                        }
                    } else {
                    foreach(explode(' ',$tmp) as $st) {
                        if(is_numeric($st)){
                            if (preg_match('/wind/', $damage)) {
                               $windTotal = $windTotal + $st;
                            }
                            else if (preg_match('/hail/', $damage)) {
                              $hailTotal = $hailTotal + $st;
                            }

                            $finalStr = $finalStr . ' <span class="redTxt">' . $st . '</span>';
                        } else {
                            $finalStr=$finalStr.' '.$st;
                        }
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
    <?php }

  } ?>

<h4 class="row-header" style="margin-top: 50px; position: relative;">INSPECTION SUMMARY</h4>
<p>
<?php 

if (isset($report_data['damages']['general_comments'])) {
    if (trim($report_data['damages']['general_comments']) == null || trim($report_data['damages']['general_comments']) == "") {
        echo "There were no comments left about this report.";
    } else {
        echo "&nbsp;" . $report_data['damages']['general_comments'];
    }
} else {
    echo "No comments.";
}

?>
</p>
</div>

</div>


<div class="page-break"></div>
<div class="padding-top"></div>
<br><br><br>

<?php //echo isset($sketch) ? "<img src=\"" . $sketch->fileLocation . "\" alt=\"sketch\" width=\"850\" class=\"sketch-helper\" style=\"margin-right: auto; margin-left: auto;\" />" : null;  ?>
</body>
</html>  
