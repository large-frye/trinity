<div class="section">
					<div class="box">
						<div class="title">
							Gallery
							<span class="hide"></span>
						</div>
						<div class="content nopadding">
							<div class="gallery">
							<div class="photoCatContainer">
				 <?php echo Form::open('', array( 'id' => 'deletephotos' ) ); ?> </form>
				    <button style="float:left" type="submit"  class="photoBut" id="deletebutton" name="deletebutton" value="Submit " /> Submit</button>
				    <?php echo Form::open('', array( 'id' => 'deleteAllPhotos' ) ); ?> </form>
				    <button style="float:left" type="submit"  class="photoBut" id="deleteAllButton" name="deleteAllButton" value="Submit " /> Delete All</button>
<?php
				
				echo '<table>';
						$count = count($photos);

							$rwCnt=0;
                                for ($i = 0; $i < $count; $i++) {
                                	if($rwCnt==0){
                                		echo "<tr>";
                                	}

                                	if($rwCnt<6){
                                			echo "<td><div id='".$photos[$i]->id."' class=delPhoto><img class='delPhotoImg' src=\"" . str_replace('..', '', $photos[$i]->fileLocation) . "\" style='width: 80px; height: 80px;' /></p></div></td>";
                                	$rwCnt++;
                                	}else {
                                		echo "<td><div id='".$photos[$i]->id."' class=delPhoto><img class='delPhotoImg' src='".str_replace('..', '', $photos[$i]->fileLocation)."' style='width: 80px; height: 80px;' /></p></div></td></tr>";
                                	$rwCnt=0;
                                	}
                                	
                                }

                 echo '</table>';
?>
</div>



							</div>
						</div>
					</div>
				</div>