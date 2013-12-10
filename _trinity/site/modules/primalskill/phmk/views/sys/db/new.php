<form class="form-horizontal" action="<?php echo Route::url('sys', array('controller' => 'db', 'action' => 'new')); ?>" method="post">
	<fieldset>
		<legend>Add a new update</legend>
		<?php if ( isset($error) ): ?>
			<p class="help-block error"><?php echo $error; ?></p>
		<?php endif; ?>
		<div class="control-group">
			<label class="control-label" for="name">Name of update <span style="color:red;">*<span></label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="name" name="name">
			</div>
		</div>
		
		<div class="control-group">
            <label for="description" class="control-label">Description</label>
            <div class="controls">
				<textarea rows="3" id="description" class="input-xlarge" name="description"></textarea>
            </div>
        </div>
		<h3>SQL</h3>
		<div class="control-group">
            <label for="sql-up" class="control-label">UPGRADE <span style="color:red;">*<span></label>
            <div class="controls">
              <textarea rows="3" id="sql-up" class="input-xlarge" name="sql-up"></textarea>
            </div>
          </div>
		  
		<div class="control-group">
            <label for="sql-down" class="control-label">DOWNGRADE <span style="color:red;">*<span></label>
            <div class="controls">
              <textarea rows="3" id="sql-down" class="input-xlarge" name="sql-down"></textarea>
            </div>
        </div>
		
		<div class="control-group">
            <label for="is-data" class="control-label">Is data in the update?</label>
            <div class="controls">
				<label class="checkbox">
					<input type="checkbox" value="" id="is-data" name="is-data">
					If there is data in the changes, please check.
				</label>
			</div>
        </div>
		
		  <div class="form-actions">
            <button class="btn btn-primary" type="submit">Add new</button>
          </div>
	</fieldset>
</form>