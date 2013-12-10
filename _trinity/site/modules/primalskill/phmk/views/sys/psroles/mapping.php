<h2><?php echo $title; ?></h2>

<form class="form-horizontal" action="<?php echo $form_action; ?>" method="post">
	<fieldset>
		<legend>Manage mapping for <?php echo $item_name; ?></legend>
		<?php if ( isset($error['exception']) ): ?>
			<p class="help-block error"><?php echo $error['exception']; ?></p>
		<?php endif; ?>
		
		<div class="control-group">
			<?php for ( $i = 0, $max = count($all_data); $i < $max; $i++ ): ?>
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox" name="ids[]" value="<?php echo $all_data[$i]['id']; ?>" <?php if ( in_array($all_data[$i]['id'], $self_data) ) echo 'checked="checked"'; ?>> <?php echo $all_data[$i][$display_column]; ?>
				</label>
			</div>
			<?php endfor; ?>
		</div>
		
		<div class="form-actions">
			<button class="btn btn-primary" type="submit">Submit</button>
        </div>
	</fieldset>
</form>