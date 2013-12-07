
<div class="section">
					<div class="box">
						<div class="title">Categories</div>
						
						<div class="content">
							<ul>

								<?php 
								$innerCategories = $categories;
								
								$count = count($categories);
								for ($i = 0; $i < $count; $i++) {
								 	if($categories[$i]->parent_id==='0'){
								 		$cur =  $categories[$i]->id;
								 		echo '<li>'.$categories[$i]->name.'</li>';
								 		echo '<ul>';
								 			 foreach($innerCategories as $inner) {
								 			 	if($cur==$inner->parent_id){
								 			 		echo '<li>&nbsp;--'.$inner->name.'</li>';
								 			 	}
								 			 }
								 			 echo '<ul>';
								 	}
									 else {
								 		break;
								 	}
								 	
								 }
								 	?>
							</ul>
						</div>	
					</div>
				</div>
			