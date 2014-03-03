<div class="section">
					<div class="box">
						<div class="title">
							Gallery
							<span class="hide"></span>
						</div>
						<div class="content nopadding">
							<div class="gallery">
							<div class="photoCatContainer">
				 <?php echo Form::open(''); ?> 
				    <button type="submit"  class="photoBut" id="catButton" name="catButton" value="Submit " /> Submit</button>
<?php
				
				echo '<table>';
						$count = count($photos);

							$rwCnt=0;
                                for ($i = 0; $i < $count; $i++) {
                                	if($rwCnt==0){
                                		echo "<tr>";
                                	}

                                	if($rwCnt<6){
                                			echo "<td><div class=photoThumView'><img class='photoImgView' src=\"" . str_replace('..', '', $photos[$i]->fileLocation) . "\" style='width: 80px; height: 80px;' /></p></div></td>";
                                	$rwCnt++;
                                	}else {
                                		echo "<td><div  class=photoThumView'><img class='photoImgView' src='".str_replace('..', '', $photos[$i]->fileLocation)."' style='width: 80px; height: 80px;' /></p></div></td></tr>";
                                	$rwCnt=0;
                                	}
                                	
                                }

                 echo '</table>';
?>
</div>


						</form>
							</div>
						</div>
					</div>
				</div>