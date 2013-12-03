$(function() {
	
	inspectionForm.init();
	
});

var inspectionForm = {
	
	init : function()
	{
		this.initSlope();
		this.hideBoxContent();
	},
	
	initSlope : function()
	{
		this.registerEventSlope();
	},
	
	registerEventSlope : function()
	{
		var that = this;
		
		$('.row .has_slope').each(function(i, v) {
		
			var t = $(this);
			
			if ( t.is('input') )
			{
				if ( t.attr('type') == 'text' )
				{
					that.eventSlopeInputText(t);
				}
			}
		});
		
		$('.row .has_slope_select').each(function(i, v) {
				
			var t = $('select', $(this));
						
			if ( t.length > 0 )
			{
				var slopeContainer = $('#' + $(this).attr('rel'));

				that.eventSlopeSelect(t, slopeContainer);
			}
						
		});

		$('.row .has_slope_checkbox').each(function(i, v) {
				
			var t = $('input[type="checkbox"]', $(this));
						
			if ( t.length > 0 )
			{
				var slopeContainer = $('#' + $(this).attr('rel'));
				
				that.eventSlopeCheckbox(t, slopeContainer);
			}
						
		});

	},
	
	eventSlopeCheckbox : function( element, slopeContainer )
	{
		if ( element.prop('checked') == true )
		{
			slopeContainer.show();
		}
		else
		{
			slopeContainer.hide();
		}
			
		element.bind('change', function() {
		
			if ( $(this).prop('checked') == true )
			{
				slopeContainer.show();
			}
			else
			{
				// Verify if there's at least on other checkbox is checked in the group
				var p = $(this).parents('.has_slope_checkbox');
				
				if ( $('input[type="checkbox"]', p).filter(':checked').length == 0 )
				{
					slopeContainer.hide();
				}
			}
		});	
	},
	
	eventSlopeSelect : function( element, slopeContainer )
	{
		if ( element.val() == 'blank' )
		{
			slopeContainer.hide();
		}
		else
		{
			slopeContainer.show();
		}
		
		
		element.bind('change', function() {
		
			if ( $(this).val() == 'blank' )
			{
				if ( slopeContainer.is(':visible') )
				{
					slopeContainer.hide();
				}
			}
			else
			{
				if ( slopeContainer.is(':hidden') )
				{
					slopeContainer.show();
				}				
			}
				
		});
	},
	
	eventSlopeInputText : function( element )
	{
		var slopeContainer = $('#' + element.attr('rel'));
		
		if ( element.val().length > 0 ) 
		{ 
			slopeContainer.show(); 
		}
		else
		{
			slopeContainer.hide();
		}
		
		
		element.bind('keyup', function() {
		
			if ( $(this).val().length > 0 )
			{
				if ( slopeContainer.is(':hidden') )
				{
					slopeContainer.show();
				}
			}
			else
			{
				if ( slopeContainer.is(':visible') )
				{
					slopeContainer.hide();
				}
			}
			
		});
	},
	
	hideBoxContent : function()
	{
		$('.title .show').each(function() {
		
			var content = $('.content', $(this).parents('.box'));
			

			if (! $('.check_if_apply', content).is(':checked') )
			{
				content.slideUp(1);
			}
			else
			{
				$(this).css('background-position', 'right top');
			}
			
		});
			
	}
}