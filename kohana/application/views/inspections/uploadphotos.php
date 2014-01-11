            <div class="section">
					<div class="box">
						<div class="title">
							Gallery
							<span class="hide"></span>
						</div>
					

            <div id="photoContainer">
              
                <div id="dropzone">
                <form id="demo-upload" >
           
                <ul id="sort1"  class="dropzone dz-clickable" action="http://www.torrentplease.com/dropzone.php">
                </ul>
             
                </form>
                </div>
            </div>
            <div>
         
                    <?php 
                                $innerCategories = $categories;
                                $count = count($categories);
                                for ($i = 0; $i < $count; $i++) {
                                    if($categories[$i]->parent_id==='0'){
                                        $cur =  $categories[$i]->id;
                                   //echo '<h2 class="imgUPH">'.$categories[$i]->name.'</h2>';
                                       //echo '<li class="imgUP" id="'.$categories[$i]->id.'">';
                                            $p = $categories[$i]->id;
                                             foreach($innerCategories as $inner) {
                                                if($cur==$inner->parent_id){
                                                  //  echo '<li parentid="'.$p.'" id="'.$inner->id.'" class="catClick">&nbsp;--'.$inner->name.'</li>';
                                                }
                                             }
                                         
                                    }
                                     else {
                                        break;
                                    }
                                 //  echo '</li>';
                                    
                                 }
                                    ?>  
                    
               </div>   

               <div>
                <ol id="selectable">
                  <li class="ui-widget-content"> Selectable section 1</li>
                  <li class="ui-widget-content"> Selectable section 2</li>
                  <li class="ui-widget-content"> Selectable section 3</li>
                  <li class="ui-widget-content"> Selectable section 4</li>
                  <li class="ui-widget-content"> Selectable section 5</li>
                  <li class="ui-widget-content"> Selectable section 6</li>
                  <li class="ui-widget-content"> Selectable section 7</li>
                </ol>


               </div>
                  
		</div>
					
				