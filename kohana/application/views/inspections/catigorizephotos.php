            <div class="section">
					<div class="box">
						<div class="title">
							Catigorize Photos
							<span class="hide"></span>
						</div>
					
<div class='hiddenForm'>
	    <?php echo Form::open('', array('enctype' => 'multipart/form-data', 'id' => 'catigorizephotos')); ?>
	    
	</form>
	 <button type="submit" id="catButton" name="catButton" value="Submit " /> Submit</button>
</div>
<div class="photoCatContainer">
<?php

				echo '<table id="categoryTbl">';
						$count = count($photos);
							$rwCnt=0;
							  $innerCategories = $categories;
							   $cat_count = count($categories);
                                for ($i = 0; $i < $count; $i++) {
                                	$categoryTmpText = "";
                                	if(!is_null($photos[$i]->category_id)){
		                                for ($j = 0; $j < $cat_count; $j++) {
		                                	if($categories[$j]->id ==$photos[$i]->category_id){
		                                		$categoryTmpText = $categories[$j]->id.': '.$categories[$j]->name;
		                                		break;
		                                	}
		                                }
		                               			
                                	}

                                	if($rwCnt==0){
                                		echo "<tr>";
                                	}
                                	if($rwCnt<6){
                                	
                                		echo "<td class='catTD'><div id='photoT' class=photoThum'><img id='".$photos[$i]->id."' class='photoImg' src='data:".$photos[$i]->mime.";base64,"  
                                	. base64_encode($photos[$i]->photoBlob). "'  /><p class='photoTxt'>".$categoryTmpText."</p></div></td>";
                                	$rwCnt++;
                                	}else {
                                		echo "<td class='catTD'><div  id='photoT class=photoThum'><img id='".$photos[$i]->id."' class='photoImg' src='data:".$photos[$i]->mime.";base64,"  
                                	. base64_encode($photos[$i]->photoBlob). "' /><p class='photoTxt'>".$categoryTmpText."</p></div></tr>";
                                	$rwCnt=0;
                                	}
                                	
                                }

                 echo '</table>';
?>
</div>

 <?php 
                        echo '<div class="catSelections" style="display:none"><ol class="selectable">';
                                $innerCategories = $categories;
                                $count = count($categories);
                                for ($i = 0; $i < $count; $i++) {
                                    if($categories[$i]->parent_id==='0'){
                                        $cur =  $categories[$i]->id;
                                   echo '<h3>'.$categories[$i]->name.'</h3>';
                                      // echo '<li class="ui-widget-content" id="'.$categories[$i]->id.'">';
                                            $p = $categories[$i]->id;
                                             foreach($innerCategories as $inner) {
                                                if($cur==$inner->parent_id){
                                                   echo '<li parentid="'.$p.'" id="'.$inner->id.'"  class="ui-widget-content" >'.$inner->name.'</li>';
                                                }
                                             }
                                         
                                    }
                                     else {
                                        break;
                                    }
                                  //echo '</div>';
                              
                                 }
                                 echo '</ol></div>';
                                    ?>  

    </div> 
</div>
				

