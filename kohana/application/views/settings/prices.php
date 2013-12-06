<div class="section">
<?php if (isset($post)) {
	echo "<div class=\"message info\">
		      <span>Prices saved successfully</span>
		  </div>";
}
?>
	<div class="box">
		<div class="title">Work Order Prices</div>
			<div class="content">


<?php 

echo Form::open('');

foreach($prices as $price) {
		echo "<div class=\"row\">" . "\n\t" .
		          Form::label($price->id, $price->nice_name) . "\n\t" .
		      "<div class=\"right\">" . "\n\t\t" .
		          Form::input($price->id, $price->value, array('class' => 'spin-dec')) . "\n\t" .
		       "</div></div>";
}
?>
	            <div class="row">
		            <div class="right">
			            <button type="submit" name="submit"><span>Save changes</span></button>
	                </div>
                </div>
            </form>
            </div>
    </div>
</div>
