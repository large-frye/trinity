$(function() {
	
	inspectionPhotosView.init();	
});

var inspectionPhotosView = {
	
	init : function()
	{
		this.selectItems();
		this.initTooltip();
		this.initFancybox();
	},
	
	selectItems : function()
	{
		var that = this;
		
		$('.gallery .thumb').bind('click', function(){
		
			var t = $(this);
			
			$('.gallery .thumb').removeClass('thumb-highlight')			
			t.addClass('thumb-highlight');
			
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
		
		$('.gallery .view_photo').tipsy({ 
		
			live : true, 
			gravity : 'n',
			fade : false
		});
	},
		
	setDescription : function()
	{		
		$('#description_area').html($('.gallery .thumb-highlight .hdn_description').val());		
	},
	
	setCategory : function()
	{
		var catID = $('.gallery .thumb-highlight .hdn_cat_id').val();
				
		inspectionPhotosCategories.showWidget();
		inspectionPhotosCategories.showChildByID(catID);
		
		$('.cat-widget').find('*').andSelf().unbind();
		$('.cat-widget a').bind('click', function(e){
			e.preventDefault();
		});
		
		$('.cat-widget li.back').hide();
	},
	
	initFancybox : function()
	{
		$('.gallery .thumb-item .view a').fancybox();
	}
	
}