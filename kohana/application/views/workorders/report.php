<div class="section">
    <div class="box">
        <div class="title">Details</div>
        <div class="content">
            <div class="row">
                <label for="id">Inspection #: </label>
                <div class="right">
                    <strong><?php echo $inspection_details->id; ?></strong>
                </div>
            </div>

            <div class="row">
                <label for="inspection_date">Inspection Date/ Time: </label>
                <div class="right">
                    <strong><?php echo $inspection_details->date_of_inspection . " / " . $inspection_details->time_of_inspection; ?></strong>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="section">
    <div class="box">
        <div class="title">Policy Holder</div>
        <div class="content">
            <div>
                    Policy#: <?php echo $policy_holder_info->policy_number; ?>
            </div>

            <div>
                <?php echo $policy_holder_info->insured; ?>
            </div>

            <div>
                <?php echo $policy_holder_info->street_address; ?> <br>
                <?php echo $policy_holder_info->full_address; ?> <br>
                <strong><?php echo $policy_holder_info->phone; ?></strong><br>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="box">
        <div class="title">Adjuster Information</div>
        <div class="content">
            <div>
                <?php echo $adjuster->adjuster; ?>
            </div>
            <div>
                <?php echo $adjuster->phone; ?>
            </div>
            <div>
                <?php echo $adjuster->insurance_company; ?>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="box">
        <div class="title">Roof Information</div>
        <div class="content">

            <?php foreach ( $inspection_report['roofing_info'] as $key => $value ) {
    $field = ucfirst( str_replace( '_', ' ', $key ) ); ?>
                <div class="row">
                <label for="<?php echo $field; ?>"><?php echo $field; ?>: </label>
                    <div class="right">
                        <strong><?php echo $value === "" ? "&nbsp;" : $value; ?></strong>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="section">
    <div class="box">
        <div class="title">Reason for inspection</div>
    </div>
</div>

<?php

foreach ( $inspection_report['damages'] as $damage_header => $damage_header_type ) {
    if ( preg_match( '/header/', $damage_header ) ) {
        echo "<div class=\"section\">
                  <div class=\"box\">
                      <div class=\"title\">" . str_replace('_', ' ', str_replace('_header', '', $damage_header)) . "</div>
                      <div class=\"content\">";
        foreach ( $damage_header_type as $header_type => $damage_stmt ) {
            echo "<div class=\"row\">
                      <label for=\"" . $header_type . "\">" . ucfirst( str_replace( '_', ' ', $header_type ) ) . "</label>
                          <div class=\"right\">";
            if ( is_array( $damage_stmt ) ) {
                foreach ( $damage_stmt as $value ) {
                    echo "<strong>" . $value . "&nbsp;</strong>";
                }
            } else {
                echo "<strong>" . $damage_stmt . "&nbsp;</strong>";
            }

            echo "</div></div>";
        }

        echo "</div></div></div>";
    }
}

echo "<div class=\"section\">
          <div class=\"box\">
              <div class=\"title\">General Comments</div>
              <div class=\"content\">
                  <div class=\"row\">
                      <label for=\"roof_square_feet\">Comments: </label>
                          <div class=\"right\">
                              <strong>" . $inspection_report['damages']['general_comments'] . "&nbsp;</strong>
                          </div>
                  </div>
              </div>
          </div>
      </div>";
?>

<div class="section">
    <div class="box">
        <div class="title">
            Gallery
            <span class="hide"></span>
        </div>
        <div class="content nopadding">
            <?php echo '<table id="categoryTbl">';
$count = count( $photos );
$rwCnt=0;
$innerCategories = $categories;
$cat_count = count( $categories );
for ( $i = 0; $i < $count; $i++ ) {
    $categoryTmpText = "";
    if ( !is_null( $photos[$i]->category_id ) ) {
        for ( $j = 0; $j < $cat_count; $j++ ) {
            if ( $categories[$j]->id ==$photos[$i]->category_id ) {
                $categoryTmpText = $categories[$j]->id.': '.$categories[$j]->name;
                break;
            }
        }

    }

    if ( $rwCnt==0 ) {
        echo "<tr>";
    }
    if ( $rwCnt<6 ) {

        echo "<td class='catTD'><div id='photoT' class=photoThum'><img id='".$photos[$i]->id."' class='photoImg' src='".
            str_replace( '..', "", $photos[$i]->fileLocation )."'  /><p class='photoTxt'>".$categoryTmpText."</p></div></td>";
        $rwCnt++;
    }else {
        echo "<td class='catTD'><div  id='photoT class=photoThum'><img id='".$photos[$i]->id."' class='photoImg' src='".
            str_replace( '..', "", $photos[$i]->fileLocation )."' /><p class='photoTxt'>".$categoryTmpText."</p></div></tr>";
        $rwCnt=0;
    }

}

echo '</table>'; ?>
        </div>
    </div>
</div>


<div class="section">
    <div class="box">
    <div class="title">Xactimate Report</div>
    <div class="content">
         <?php echo $xactimate ? "File found and will be included in PDF creation." : "Please go <a href=\"/workorders/edit/" . $workorder_id . "\">here</a> to upload file"; ?>
         <?php echo Form::hidden('xact_report', $xactimate ? "1" : "0", array('class' => 'xact-report')); ?>
    </div>
    </div>
</div>





<div class="section">
    <div class="box">
        <div class="title">REPAIR ESTIMATE</div>
        <div class="content">
            <div class="row">
                <table>
                    <col width="550"></col>
                    <col width="150"></col>

                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="section">
<div class="row">
    <button type="redirect" name="save_report" id="save-report"><span>Create Report PDF</span></button>
</div>
</div>
