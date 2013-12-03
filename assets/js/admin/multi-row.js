$(document).ready(function(){
	$('.add-new-row').live('click', function(){
		$('.multi-row-table tbody').append($('tr', '.new-row-container').clone());
	});
	
	$('.remove-row').live('click', function(){
		if ( $('.multi-row-table tbody tr').length > 1 )
		{
			$(this).parents('tr').remove();
		}
	});
});