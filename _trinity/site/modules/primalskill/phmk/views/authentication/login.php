<html>
	<head>
		<title>Kohana Project Helper Module</title>
		<style>
			<?php include_once(dirname(__FILE__).'/../_common/bootstrap.css'); ?>
			<?php include_once(dirname(__FILE__).'/../_common/style.css'); ?>
		</style>
		<script>
			<?php include_once(dirname(__FILE__).'/../_common//jquery-1.7.1.min.js'); ?>
		</script>
	</head>
	<body>
	
	
		<div>
			<div>
				&nbsp;
			</div>
			<form class="form-horizontal" action="<?php echo Route::url('sys/authentication', array('controller' =>'authentication', 'action' => 'login')); ?>" method="post">
			
				<fieldset>
					<legend>PHMK Login</legend>
					<?php if ( isset($error) ): ?>
						<p class="help-block error"><?php echo $error; ?></p>
					<?php endif; ?>
					
					<div class="control-group">
						<label class="control-label" for="username">Username</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="username" name="username">
						</div>
					</div>	
					
					<div class="control-group">
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input type="password" class="input-xlarge" id="password" name="password">
						</div>
					</div>						
						
				  <div class="form-actions">
					<input class="btn btn-primary" type="submit" name="reset" value="Login">
				  </div>
				</fieldset>	
			</form>
		</div>	
		
		
	</body>
</html>