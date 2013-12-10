<div>
	<div>
		&nbsp;
	</div>
	
	<table class="table table-striped">
	
		<tr>
			<td><strong>ID</strong></td>
			<td><strong>Username</strong></td>
			<td><strong>E-mail</strong></td>
			<td><strong>Created On</strong></td>
			<td><strong>Action</strong></td>
		</tr>
		
		<?php for ( $i=0, $mi=count($users); $i < $mi; $i++ )
			{
		?>
		<tr>
			<td>
				<?php echo $users[$i]['id']; ?>
			</td>
			<td>
				<?php echo $users[$i]['username']; ?>
			</td>	
			<td>
				<?php echo $users[$i]['email']; ?>
			</td>	
			<td>
				<?php echo $users[$i]['created_on_utc']; ?>
			</td>
			<td>
				<a href="<?php echo Route::url('sys', array('controller' => 'users', 'action' => 'edit', 'id' => $users[$i]['id'])); ?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp; 
				<a href="<?php echo Route::url('sys', array('controller' => 'users', 'action' => 'delete', 'id' => $users[$i]['id'])); ?>"><?php if ($users[$i]['deleted'] == 0 ){  echo 'Delete'; } else {echo 'SetActive';} ?></a>&nbsp;&nbsp;|&nbsp;&nbsp; 
				<a href="<?php echo Route::url('sys', array('controller' => 'users', 'action' => 'resetpw', 'id' => $users[$i]['id'])); ?>">Reset Password</a>&nbsp;&nbsp;|&nbsp;&nbsp; 
				<a href="<?php echo Route::url('sys', array('controller' => 'roles', 'action' => 'users', 'id' => $users[$i]['id'])); ?>">Manage Roles</a>
			</td>				
		</tr>
		<?php
			}
		?>
	</table>
	
	<div class="form-actions">
        <a class="btn btn-primary" href="<?php echo Route::url('sys', array('controller' => 'users', 'action' => 'add')); ?>">Add new</a>
     </div>	
</div>