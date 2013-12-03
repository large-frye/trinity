$(function() {
	
	inspectionPhotosCategories.init();	
});

var inspectionPhotosCategories = {
	
	init : function()
	{
		this.eventParentCat();
		this.eventBack();
		this.eventSelectChild();
	},
	
	eventParentCat : function()
	{
		var that = this;
		
		$('.cat-widget li.p a').bind('click', function(e) {
		
			e.preventDefault();
		
			var t = $(this);
			var catID = t.attr('href').substr(2);
			
			that.hideParents();
			that.showChildren(catID);
			
		});
	},
	
	eventBack : function()
	{
		var that = this;
		
		$('.cat-widget li.back').bind('click', function(e) {
		
			e.preventDefault();
			
			that.hideChildren();
			that.showParents();
			
		});
		
	},
	
	eventSelectChild : function()
	{
		var that = this;
		
		$('.cat-widget li.c').bind('click', function(e) {
		
			e.preventDefault();
			
			$('.cat-widget li.c').removeClass('selected');
			$(this).addClass('selected');
			
		});
	},
	
	hideWidget : function()
	{
		this.hideChildren();
		this.showParents();
		
		$('.cat-widget').hide();
	},
	
	showWidget : function()
	{
		this.hideChildren();
		this.showParents();
		
		$('.cat-widget').show();
	},
	
	resetWidget : function()
	{
		this.hideWidget();
		this.showWidget();
	},
	
	hideParents : function()
	{
		$('.cat-widget li.p').hide();
	},
	
	showParents : function()
	{
		$('.cat-widget li.p').show();
	},
	
	showChildren : function(parentID)
	{
		$('.cat-widget li.back').show();
		$('.cat-widget li.pid' + parentID).show();
	},
	
	hideChildren : function()
	{
		$('.cat-widget li.back').hide();
	
		$('.cat-widget li.c').removeClass('selected');
		$('.cat-widget li.c').hide();
	},
	
	showChildByID : function(catID)
	{
		var child = $('.cat-widget li.c a[href="#i' + catID + '"]').parents('li.c');
		
		if (child.length == 0)
		{
			this.resetWidget();
			return false;
		}
		
		var pid = child.attr('rel');
		
		this.hideParents();
		this.hideChildren();
		this.showChildren(pid);
		
		child.addClass('selected');
	}
}