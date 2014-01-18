<div class="section">
	    <?php
if (isset($errors)) {
    echo '<div class="message error"><p>' . $errors . '</p></div>';
}

if (isset($success)) {
    echo '<div class="message info"><p>' . $success . '</p></div>';
} ?>
	<div class="box">
		<div class="title">
			Users
			<span class="hide"></span>
		</div>
		<div class="content">
			<table cellspacing="0" cellpadding="0" border="0" class="all"> 
				<thead> 
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>E-mail</th>
						<th>Created On</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $user) { ?> 
					<tr>
						<td><?php echo $user->id; ?></td>
						<td><?php echo $user->username; ?></td>
						<td><?php echo $user->email ?></td>
						<td><?php echo $user->created_on_utc ?></td>
						<td>
						    <?php
						        echo HTML::anchor('/users/edit/' . $user->id, 'Edit') . "&nbsp|&nbsp" .
						             HTML::anchor('/users/delete/' . $user->id, 'Delete', 
						                   array('onclick' => "return confirm('Are you sure you want to delete " . $user->username . "?');"));
						    ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="section">
	<div class="box">
		<div class="title">
			Deleted Users
			<span class="hide"></span>
		</div>
		<div class="content">
			<table cellspacing="0" cellpadding="0" border="0" class="all"> 
				<thead> 
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>E-mail</th>
						<th>Created On</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach($deleted_users as $user) { ?> 
					<tr>
						<td><?php echo $user->id; ?></td>
						<td><?php echo $user->username; ?></td>
						<td><?php echo $user->email ?></td>
						<td><?php echo $user->created_on_utc ?></td>
						<td>
								<?php
						        echo HTML::anchor('/users/edit/' . $user->id, 'Edit') . "&nbsp|&nbsp" .
						             HTML::anchor('/users/activate/' . $user->id, 'Activate', 
						                   array('onclick' => "return confirm('Are you sure you want to activate " . $user->username . "?');"));
						    ?>								
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>	