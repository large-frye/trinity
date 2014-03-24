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

.damageLi{
  
  font:15px;
}
.imgContainer{
width:450px;
 display: block;
  margin-left: auto;
  margin-right: auto;

}
.parentCatHead { margin-top: 30px; margin-bottom:20px; border-bottom: 1px solid black; }
.imgCl{
   margin-bottom:20px;
  
}

p.lower { position: relative; top: 60px; }

ul { padding-left: 15px; }
li { padding: 10px; position: relative; left: 2em;}

.page-break { page-break-after: always; }
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
.imgCl { position: relative !important; left: 60px !important; margin-top: 20px !important;}
.imgCl span { 
    margin-bottom: 20px !important;
}


</style>
</head>
<body>
    <div id="page-wrap">

        <!-- Photos -->
        <?php

        $parentCount = count($parentCategories);
        $count = count($photos);
        $currentParentId = 0;

        for ($i = 0; $i < $parentCount; $i++) {
            if($parentCategories[$i]->name!=='Sketches') {
                $tmp = '<div class="imgDiv"><h3 class="parentCatHead">'.$parentCategories[$i]->name.'</h3>'; 
                for ($j = 0; $j < $count; $j++) {
                    if ($currentParentId === 0 || $currentParentId != $parentCategories[$i]->id) {
                        $break_count = 0;
                    }

                    if ($photos[$j]->categoryParent_id == $parentCategories[$i]->id) {
                        $break = '';
                        $cTmp ="";

                        if($photos[$j]->name !='null') {
                            $cTmp = $photos[$j]->name;
                        }

                        if ($break_count != 0 && $break_count % 2 === 0) { 
                            $break = "<div class=\"page-break\"></div>";
                        }

                        $currentParentId = $parentCategories[$i]->id;

                        $tmp .= $break . "<div class='imgCl'><span>".$cTmp."</span>
                                          <img id='".$photos[$j]->id."' class='photoImgView' src='".$photos[$j]->fileLocation.
                                         "' style='width: 600px; height: 400px; position: relative; left: -100px; top: 20px; margin-top: 20px;' /></div>";
                        $tmp .= "<br>";
                        $break_count++;
                    }
                }
            
                if(preg_match('/<img/i', $tmp)) {
                    // echo '<div class="page-break"></div>';
                    echo $tmp;
                    echo "</div>";
                }
            }
        }

        ?>
        <!-- Photos -->
    </div>
</body>
</html>
