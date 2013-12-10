$(function() {
	
	inspectionPhotosUpload.init();	
});

var inspectionPhotosUpload = {
	
	init : function()
	{
		this.selectItems();
		this.selectUnselectAll();
		
		this.initTooltip();
		
		this.removePhoto();
		
		this.eventDescription();
		this.eventCategory();
		
		inspectionPhotosCategories.hideWidget();
		$('.main_description').hide();
	},
	
	selectItems : function()
	{
		var that = this;
		
		$('.gallery .thumb').not('.no_select').bind('click', function(){
		
			var t = $(this);
			
			if ( t.hasClass('thumb-highlight') )
			{
				t.removeClass('thumb-highlight');
			}
			else
			{
				var id = parseInt(t.attr('id').substr(1));
				var isRemove = $('input[name="meta[' + id + '][action]"]').val();				
				
				if ( isRemove != 'remove' )
				{
					t.addClass('thumb-highlight');
				}
			}
			
			that.setDescription();
			that.setCategory();
			
		});
	},
	
	selectUnselectAll : function()
	{
		var that = this;
		
		$('.select_all').click(function(e) {
		
			e.preventDefault();
			
			$('.gallery .thumb').not('.no_select').addClass('thumb-highlight');	
			that.setDescription();
			that.setCategory();
		});

		$('.unselect_all').click(function(e) {
		
			e.preventDefault();
			
			$('.gallery .thumb').not('.no_select').removeClass('thumb-highlight');
			that.setDescription();
			that.setCategory();
		});

	},
	
	initTooltip : function()
	{
		$('.gallery .thumb-item').tipsy({ 
		
			live : true, 
			gravity : 'n',
			fade : false
			
		});
		
		$('.gallery .remove_photo').tipsy({
			live : true,
			gravity : 'n',
			fade : false
		});
		
		$('.gallery .view_photo').tipsy({
			live : true,
			gravity : 'n',
			fade : false
		});
	},
	
	removePhoto : function()
	{
		$('.remove_photo').bind('click', function(e) {
		
			e.stopPropagation();
			
			var t = $(this);
			var p = t.parents('.thumb');
			var id = parseInt(p.attr('id').substr(1));
		
			var inpAction = $('input[name="meta[' + id + '][action]"]');
		
			if ( p.hasClass('thumb_to_remove') )
			{
				inpAction.val('');
				p.removeClass('thumb_to_remove');
				
				t.attr('title', 'Remove Photo');
			}
			else
			{
				inpAction.val('remove');
				p.addClass('thumb_to_remove');
				p.removeClass('thumb-highlight');
				
				t.attr('title', 'Undo remove');
			}
		});	
	},
	
	setDescription : function()
	{
		var lastDescription = null;
		
		$('.main_description').val('');
		$('.main_description').hide();
		
		$('.gallery .thumb-highlight').each(function(i) {
				
			var t = $(this);
			var desc = $('.hdn_description', t).val();
		
			if (lastDescription === null) { lastDescription = desc; }

			if ( lastDescription != desc )
			{

				$('.main_description').val('');
				lastDescription = '';
				
				return false;
			}	
		});
		
		if ( $('.gallery .thumb-highlight').length > 0 )
		{
			$('.main_description').show();
			$('.main_description').val(lastDescription);
		}
		
		
		
	},
	
	setCategory : function()
	{
		var lastCatID = null;
		
		inspectionPhotosCategories.hideWidget();
		
		$('.gallery .thumb-highlight').each(function(i) {
				
			var t = $(this);
			var catID = $('.hdn_cat_id', t).val();
		
			if (lastCatID === null) { lastCatID = catID; }

			if ( lastCatID != catID )
			{
				inspectionPhotosCategories.resetWidget();				
				lastCatID = -1;
				
				return false;
			}	
		});
		
		if ( $('.gallery .thumb-highlight').length > 0 )
		{
			inspectionPhotosCategories.showWidget();
			inspectionPhotosCategories.showChildByID(lastCatID);
		}
				
				
	},
	
	eventDescription : function()
	{
		$('.main_description').bind('keyup', function() {
		
			var highlighted = $('.hdn_description', $('.gallery .thumb-highlight'));
			if (highlighted.length == 0) { return false; }
				
			highlighted.val($(this).val());
			
		});
	},
	
	eventCategory : function()
	{
		$('.cat-widget li.c').bind('click', function(e) {
			
			e.preventDefault();
			
			var t = $(this);
			var catID = $('a', t).attr('href').substr(2);
			
			var highlighted = $('.hdn_cat_id', $('.gallery .thumb-highlight'));

			if (highlighted.length == 0) { return false; }
				
			highlighted.val(catID);
						
		});
	}
	
}