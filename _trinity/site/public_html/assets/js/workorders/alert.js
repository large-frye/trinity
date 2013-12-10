$(function() { 
	
	$('select[name="status"]').live('change', function(){
	
		if ( $(this).val() == 3 )
		{
			$('.general-alert').show();
		}
		else
		{
			$('.general-alert').hide();
		}
	});
	
	$('select[name="inspection_status"]').live('change', function(){
	
		if ( $(this).val() == 3 )
		{
			$('.inspection-alert').show();
		}
		else
		{
			$('.inspection-alert').hide();
		}
	});
});