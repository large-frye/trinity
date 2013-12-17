            <div class="section">
					<div class="box">
						<div class="title">
							Gallery
							<span class="hide"></span>
						</div>
					

            <div id="photoContainer">
                test
                test
                test    
            </div>
            <div id="photoWrapper">
            <div  id="leftcol" data-collapse="accordion persist">
                        
                    <?php 
                                $innerCategories = $categories;
                                $count = count($categories);
                                for ($i = 0; $i < $count; $i++) {
                                    if($categories[$i]->parent_id==='0'){
                                        $cur =  $categories[$i]->id;
                        
    
                                        echo '<h2 style="background-color:grey; width:250px">'.$categories[$i]->name.'</h2>';
                                        echo '<ul>';
                                       
                                             foreach($innerCategories as $inner) {
                                                if($cur==$inner->parent_id){
                                                    echo '<li>&nbsp;--'.$inner->name.'</li>';
                                                }
                                             }
                                         
                                    }
                                     else {
                                        break;
                                    }
                                    echo '</ul>';
                                    
                                 }
                                    ?>  
                    
                        </div>
                    </div>
                    <div id="rightcol">
                        test
                    </div>
                    </div>
		</div>
					
				