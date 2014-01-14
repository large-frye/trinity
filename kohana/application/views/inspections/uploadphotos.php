            <div class="section">
					<div class="box">
						<div class="title">
							Gallery
							<span class="hide"></span>
						</div>
					

            <div id="photoContainer">

        <form action="/inspections/uploadphotos" method="post" 
        enctype="multipart/form-data" class="dropzone dz-clickable dropzone-previews" id="dropzone-form">

        </form>
           <button type="submit" id="dz" name="dz" value="Submit " /> Submit Photos</button>
            </div>
            </div>
            <div>
         
                    <?php 
                        echo '<div class="catSelections" style="display:none"><ol class="selectable">';
                                $innerCategories = $categories;
                                $count = count($categories);
                                for ($i = 0; $i < $count; $i++) {
                                    if($categories[$i]->parent_id==='0'){
                                        $cur =  $categories[$i]->id;
                                   echo '<div><p>'.$categories[$i]->name.'<p></div>';
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
					
				