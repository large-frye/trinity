
<!doctype html>
<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>Generated PDF Template</title>
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
}

table.position-right{
    position: relative;
    top: -100px;
    left: 360px;
}

tr.header {
    background-color: red;
    color: white;
}

td.border{
   border:1px solid #ccc; padding:6px;
}

thead {
   width:100%;position:fixed;
   height:109px;
}

td.center {
    text-align: center;
}

.page-break { page-break-after: always; }
.clear { clear: both; }
.header { color: red; }

</style>
<!-- <script type="text/javascript" src="trinity/images/wz_jsgraphics.js"></script> -->
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
    <tr><th>POLICY HOLDER</th></tr>
    <tr><td class="border"><?php echo $inspection_data['insured'];?></td></tr>
    <tr><td class="border"><?php echo $inspection_data['street_address'];?></td></tr>
    <tr><td class="border"><?php echo $inspection_data['second_address'];?></td></tr>
</table>
<table border="1" class="top position-right">
    <tr><th>CLAIM NUMBER</th><td class="border">&nbsp;<?php echo $inspection_data['policy_number'];?></td></tr>
    <tr><th>DATE</th><td class="border">&nbsp;<?php echo $inspection_data['date_of_inspection'];?></td></tr>
    <tr><th>ADJUSTER</th><td class="border">&nbsp;<?php echo $inspection_data['adjuster'];?></td></tr>
    <tr><th>COMPANY NAME</th><td class="border">...</td></tr>
</table>
<br /><br />
<table border="1">
    <tr class="header"><th style="width:500px">QUANTITY</th><th>PRICE</th></tr>
    <tr><td class="border">&nbsp;</td><td class="border">&nbsp;</td></tr>
    <tr><td class="border">Base price of the workorder</td><td class="border">400</td></tr>
    <tr class="header"><th style="width:500px">Federal EIN: 45-1810535</th><td>400</td></tr>
</table>
<p class="center">Make all checks payable to Trinity Inspections LLC<br />
    THANK YOU FOR YOUR BUSINESS!</p>


</div>
<!--<div style="position:absolute;left:52.92px;top:285.01px" class="cls_002"><span class="cls_002"><?php echo $inspection_data['second_address']; ?></span></div>
    <div style="position:absolute;left:504.96px;top:253.81px" class="cls_002"><span class="cls_002"><?php echo $inspection_data['date_of_inspection'];?></span></div>

<div style="position:absolute;left:72.36px;top:300.61px" class="cls_006"><span class="cls_006">Claim #:</span></div>
<div style="position:absolute;left:123.36px;top:302.65px" class="cls_002"><span class="cls_002"><?php echo $inspection_data['policy_number']; ?></span></div>


<div style="position:absolute;left:261.84px;top:88.70px" class="cls_003"><span class="cls_003">TRINITY</span></div>
<div style="position:absolute;left:207.72px;top:141.48px" class="cls_004"><span class="cls_004">Trinity Inspections, LLC</span></div>
<div style="position:absolute;left:273.00px;top:172.56px" class="cls_005"><span class="cls_005">P.O. Box 938</span></div>
<div style="position:absolute;left:261.72px;top:197.04px" class="cls_005"><span class="cls_005">Locust, NC 28097</span></div>
<div style="position:absolute;left:53.16px;top:235.33px" class="cls_006"><span class="cls_006">Policyholder Information:</span></div>
<div style="position:absolute;left:52.92px;top:253.81px" class="cls_002"><span class="cls_002"></span></div>-->


</body>
</html>
