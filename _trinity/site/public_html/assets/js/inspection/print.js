$(function() {

	inspectionPrint.init();
	
});

var inspectionPrint = {
	
	init : function()
	{
		this.initPrint();
	},
	
	initPrint : function()
	{
		this.eventDivHide();
	},
	
	eventDivHide : function()
	{
		$('.btn-print').click(function(e) {

			$('#top').hide();
			$('#left').hide();
			$('#right').css('margin', 'auto');
			$('#right').css('width', '100%');
			$('#container').css('background', 'none');
			$('#container').css('box-shadow', 'none');
			$('.hide-print').hide();
			
			window.print();

			$('.title').attr('padding', '8px 10px 0');					
			$('#container').removeAttr('style');
			$('#right').removeAttr('style');
			$('#top').show();
			$('#left').show();
			$('.hide-print').show();
		});
	}

}