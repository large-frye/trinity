<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            Expert Inspection
        </title>
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
        padding: 30px 10px;
        margin-top: 20px;
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
        .imgDiv{
        width:450px;
        margin-left:auto;
        margin-right:auto;

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


        </style>
    </head>
    <body>
        <!-- </div> -->
        <div id="page-wrap">
            <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] . '/assets/gfx/logo-icon.png'; ?>" width="100" height="100" alt="test" style="text-align:center">
            <h3>Wind Damage</h3>
            <p>During the course of inspection of said roof, we found the presence of wind damage to the roofing system. Wind damage is defined as creased or missing shingles,
               or shingles that have been torn from their fasteners. The negative and positive pressures that are applied to a roof slope due to wind gusts is the reason 
               shingles will fail and crease or become dislodged. Shingles will usually fail first in the weakest spots, specifically at the un-bonded tabs where a sealant 
               strip has failed. The un-bonded sealant strips alone are not considered wind damage, as other elements can contribute to the un-bonding of a sealant strip. 
               Sealant strips tend to break down and release over time due to expansion and contraction of the roofing materials, inadequate sealant applied, and age. Most 
               shingle manufacturers only warranty the shingle sealant strips for 5-10 years. Years ago shingles relied on their own weight to resist the wind and did not 
               have sealant strips. New wind damage can be differentiated from old wind damage by comparing the color of the creasing. Creasing which has recently occurred 
               will appear to be dark black, showing the freshness of the asphalt exposure. Old wind damage will start to weather and become the same shade of gray as the 
               rest of the exposed asphalt on the shingle, thus dating the wind damage.</p>
            <h3 style="margin-top:20px">Hail Damage</h3>
            <p>During the course of inspection of said roof we found there to be hail damage to the shingles on the roof. The industry standards for hail damage are 
                specified as a loss in water shedding capability, or the reduction of the long term service life of the shingle. The damaging effects of hail 
                are based on many factors involved, e.g. the size and density of the hailstone, the steepness or pitch of the roofs involved, the quality 
                and age of the asphalt shingles, and direction and speed of the wind. Functional hail damage, when found on an asphalt shingle, appears to have a 
                localized granular loss usually in a circular pattern. Upon further inspection of the localized granular loss there is usually a soft tenderness to the 
                shingle surface, commonly referred to as bruising. The bruising is a result of the hail severing the fiberglass mat that is between the layers of asphalt. 
                This damage can be detected immediately after a hailstorm has occurred, and does not appear later. New hail damage can be differentiated from old hail 
                damage by looking at the color of the asphalt exposure in the hail hit. A hail hit which has recently occurred will appear to be dark black, showing the 
                freshness of the asphalt exposure. Old hail damage will start to weather and become the same shade of gray as the rest of the exposed asphalt on the 
                shingle, thus dating the hail damage. Granule loss that is often found in gutters and downspout run off does not indicate that hail has damaged the 
                asphalt roofing system. Widespread granule loss is common and is a result of normal weathering, and the aging process. Granules may become dislodged 
                due to wind, heavy rainfall, small hailstorms, and normal foot traffic. </p>
            <?php 
            $count = 0;
            foreach($damages as $key => $damage) {
                $count++;
                if ($count == 2 || $count % 8 == 0) {
                    echo "<div class=\"page-break\"></div>";
                }

                echo "<h3 style=\"margin-top:20px\">" . ucfirst($key) . "</h3>";
                echo "<p>" . $damage . "</p>";
            }
            ?>
        </div>
    </body>
</html>