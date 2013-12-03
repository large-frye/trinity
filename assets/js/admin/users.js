$(function() {
	
	users.init();
	
});

var users = {
	
	init : function()
	{
		this.initUserTypeChange();
		this.setCompanyField();
	},
	
	initUserTypeChange : function()
	{
		var that = this;
		
		$('select[name="role_id"]').change(function() {
			that.setCompanyField();
		});		
	},
	
	setCompanyField : function()
	{
		var id = $('select[name="role_id"]').val();

		if (id == 4 )
		{
			$('#insurance_company_field').show();
		}
		else
		{
			$('#insurance_company_field').hide();			
		}	
	}
	
}