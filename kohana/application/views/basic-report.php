
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
    font-style: italic;
    position: relative;
    top: 20px;
}

.page-break { page-break-after: always; }
.clear { clear: both; }
.header { color: rgb(117, 41, 43); }
.row-header { text-align:  center; rgb(253, 0, 17); }
.blue { rgb (45, 130, 253); }

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
    <tr><th>POLICY HOLDER</th></tr>
    <tr><td class="border"><?php echo $inspection_data['insured'];?></td></tr>
    <tr><td class="border"><?php echo $inspection_data['street_address'];?></td></tr>
    <tr><td class="border"><?php echo $inspection_data['second_address'];?></td></tr>
    <tr><th>CLAIM NUMBER</th><td class="border">&nbsp;<?php echo $inspection_data['policy_number'];?></td></tr>
</table>
<table border="1" class="top position-right">
    <tr><th>ADJUSTER</th><td class="border">&nbsp;<?php echo $inspection_data['adjuster'];?></td></tr>
    <tr><th>COMPANY NAME</th><td class="border">...</td></tr>
    <tr><th>DATE</th><td class="border">&nbsp;<?php echo $inspection_data['date_of_inspection'];?></td></tr>
</table>
<br /><br />
<h4 class="row-header">GROUND INSPECTION</h4>
<p>During our ground level walk around inspection of loss to the following building materials that may be more susceptible to wind or hail:</p>
<h4 class="row-header">ROOF INSPECTION</h4>
<?php foreach ($report_data['damages'] as $damage) {
    if (preg_match('/header/', $damage)) {
        echo "<h5 class=\"damage-header\">" . $damage . "</h5>";
    }
    
} ?>
<h4 class="row-header">INSPECTION SUMMARY</h4>
</div>


</body>
</html>  
