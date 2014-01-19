            <div class="section">
					<div class="box">
						<div class="title">
							Order Photos
							<span class="hide"></span>
						</div>
							<div class='hiddenForm'>
								    <?php echo Form::open('', array('enctype' => 'multipart/form-data', 'id' => 'catigorizephotos')); ?>
								    
								</form>
								 <button type="submit" id="catButton" name="catButton" value="Submit " /> Submit</button>
							</div>

							<div class="photoCatContainer">
								<div id="accordion">
								<?php

				
						$count = count($photos);
						$parentCount = count($parentCategories);
					
						 for ($i = 0; $i < $parentCount; $i++) {
							echo '<h3>'.$parentCategories[$i]->name.'</h3><div class="gridster"  ><ul  class="sortable grid">';
						 	$rwCnt=0;
						 	$rowPointer=1;
						 		
						 		for ($j = 0; $j < $count; $j++) {
						 			if($photos[$j]->categoryParent_id == $parentCategories[$i]->id){
						 				if($rwCnt<6){
                                			echo "<li class='liBloc' ><div class=photoThumView'><img class='photoImgView' src='/trinity".$photos[$j]->fileLocation."' style='width: 80px; height: 80px;' /></p></div></li>";
                                		
                                	$rwCnt++;
                                	}else {
                                		echo "<li class='liBloc' ><div  class=photoThumView'><img class='photoImgView' src='/trinity".$photos[$j]->fileLocation."' style='width: 80px; height: 80px;' /></p></div></li>";
                                	
                                	$rwCnt=0;
                                	$rowPointer++;
                                	}
						 			}
						 			
						 		}
						 		echo '</ul></div>';
						 }
						
                
?>
								</div>	
								</div>								
							</div>
					</div>