<?php
if(strpos($_SERVER['PHP_SELF'], 'edit')){




?>
<div class="section">
					<div class="box">
						<div class="title">Categories</div>
							<div class="content">
						<?php
						echo Form::open('');
						echo '<div class="row"><label for="category">Select category</label><div class="right"><select name="category" style="display: none;"><option value="0">Select a category</option><option>';

							$innerCategories = $categories;
								
								$count = count($categories);
								for ($i = 0; $i < $count; $i++) {
								 	if($categories[$i]->parent_id==='0'){
								 		$cur =  $categories[$i]->id;
								 		echo '<option>'.$categories[$i]->name.'</option>';
								 
								 			 foreach($innerCategories as $inner) {
								 			 	if($cur==$inner->parent_id){
								 			 		echo '<option>&nbsp;--'.$inner->name.'</option>';
								 			 	}
								 			 }
								 	}
									 else {
								 		break;
								 	}
								 	
								 }

						echo '</select>';
						?>

								</div>
								
								
								<div class="row">
									<label for="name">Name: </label>
									<div class="right">
										<input type="text" name="name" id="name">
									</div>
								</div>
								
								<div class="row">
									<div class="right">
										<button type="submit" name="add_category"><span>Add</span></button>
										<button type="submit" name="edit_category"><span>Edit</span></button>
										<button type="submit" name="delete_category"><span>Delete</span></button>
									</div>
								</div>
									<div class="row">
									<label for="parent">Select parent</label>
									<div class="right">
										<select name="parent" style="display: none;">
											<option value="0">Select a parent</option><option>
												</option>
										<?php
											for ($i = 0; $i < $count; $i++) {
								 	if($categories[$i]->parent_id==='0'){
								 		$cur =  $categories[$i]->id;
								 		echo '<option>'.$categories[$i]->name.'</option>';
								 	}
									 else {
								 		break;
								 	}
								 	
								 }	

										?>

										</select>
										</div>
									</div>
								<div class="row">
									<div class="right">
										<button type="submit" name="change_parent"><span>Change Parent</span></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

<?php
}else {
?>
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
				<?php
			}
				?>