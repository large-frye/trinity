<div class="left-column">
	<?php if ( isset($error) ): ?>
		<p class="help-block error"><?php echo $error; ?></p>
	<?php endif; ?>

	<legend><?php echo ( isset($name) )? $name : ''; ?></legend>
	
	<div class="control-group">
		<label for="description" class="control-label">Description</label>
		<div class="controls">
			<textarea name="description" class="input-xlarge" rows="10" readonly><?php echo ( isset($description) )? $description : ''; ?></textarea>
		</div>
	</div>
	<h3>SQL</h3>
	<div class="control-group">
		<label for="sql-up" class="control-label">Upgrade</label>
		<div class="controls">
			<textarea name="sql-up" class="input-xlarge" rows="10" readonly><?php echo ( isset($sql_up) )? $sql_up : ''; ?></textarea>
		</div>
	</div>
	
	<div class="control-group">
		<label for="sql-down" class="control-label">Downgrade</label>
		<div class="controls">
			<textarea name="sql-down" class="input-xlarge" rows="10" readonly><?php echo ( isset($sql_down) )? $sql_down : ''; ?></textarea>
		</div>
	</div>
	
	<?php if (isset($is_data) && $is_data == true ): ?>
		<h4>This update contains data, be special caucious</h4>
	<?php endif; ?>
	
	<div class="form-actions">
		<a href="<?php echo Route::url('sys', array('controller' => 'db', 'action' => 'new')); ?>" class="btn btn-primary">Add new update</a>
		<a href="<?php echo Route::url('sys', array('controller' => 'db', 'action' => 'runall')); ?>" class="btn btn-primary">Run all updates</a>
	</div>
</div>
<div class="right-column">
	<?php 
		if ( $current == '' )
		{
			$class = 'not-done';
		}
		else
		{
			$class = 'done';
		}
	
		if ( isset($updates) && !empty($updates) ): 
		foreach( $updates as $update ):
	?>
		<div class="update <?php echo ( isset($selected) && $update == $selected )? 'selected' : ''; echo ( isset($selected) && $update == $selected )?  '' : ' '.$class; ?>" id="<?php echo $update; ?>">
			<form action="<?php echo Route::url('sys', array('controller' => 'db')); ?>" method="post">
				<fieldset>
					<legend><?php $var = explode('_',$update); echo date('Y-m-d H:i:s', intval(substr($var[1],0,strpos($var[1],'.')))); ?></legend>
					
					<a href="<?php echo Route::url('sys', array('controller' => 'db', 'action' => 'upgrade', 'id' => str_replace('.','-',$update) )) ?>" class="btn">Run Upgrade</a>
					<a href="<?php echo Route::url('sys', array('controller' => 'db', 'action' => 'downgrade', 'id' => str_replace('.','-',$update) )) ?>" class="btn">Run Downgrade</a>
				
				</fieldset>
			</form>
		</div>
	<?php 
		if ( $current == $update )
		{	
			$class = 'not-done';
		}
		endforeach; endif;
	?>
</div>
<form action="<?php echo Route::url('sys', array('controller' => 'db')); ?>" method="post" id="selected-update">
</form>

<script type="text/javascript">
	$('.update').click(function(){
		var field = '<input type="hidden" name="change-update" value="'+$(this).attr('id')+'" />';
		$('#selected-update').append(field);
		$('#selected-update').submit();
	});
</script>