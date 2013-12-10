<h3><?php echo $title; ?></h3>

<?php if ( !isset($data) || empty($data) ): ?>
	<p>There is no data to display</p>
<?php else: ?>
<table class="table">
	<tr>
	<?php 
		$header = array_keys($data[0]);
		for( $i = 0, $max = count($header); $i < $max; $i++ ):
	?>
		<th><?php echo ucfirst($header[$i]); ?></th>
		<?php endfor; ?>
		<th>Actions</th>
	</tr>
	
	<?php for ( $i = 0, $max = count($data); $i < $max; $i++ ): ?>
		<tr>
			<?php for( $j = 0, $m = count($header); $j < $m; $j++ ): ?>
				<td><?php echo $data[$i][$header[$j]]; ?></td>
			<?php endfor; ?>
			<td>
				<a href="<?php echo $edit_url.'/'.$data[$i]['id']; ?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo $delete_url.'/'.$data[$i]['id']; ?>">Delete</a>
				<?php if ( $extra_action ): ?>
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo $custom_action_url.'/'.$data[$i]['id']; ?>"><?php echo $custom_action_label; ?></a>
				<?php endif; ?>
			</td>
		</tr>
	<?php endfor; ?>
</table>
<?php endif; ?>

<p>
	<a href="<?php echo $add_url; ?>" class="btn btn-primary">Add New</a>
</p>