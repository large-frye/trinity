$(document).on('dblclick', '.dz-preview', function() {
    renameFile(this);
	
});

 $(function() {
      $('#sort1').sortable({
          connectWith: "ul.dropzone"
      }).disableSelection();
  });
  
function renameFile(div){
	var re = /(?:\.([^.]+))?$/;
    var name=prompt("Please enter filename","name");
	var customName  = $(div).find(".customName");
	var orig = customName.clone().children().remove().end().text();
	var ftype = re.exec(orig)[1];
	var cache = $(customName).children();
	$(customName).text(name+"."+ftype).append(cache);
}


	$( ".catClick" ).click(function() {
		var copy = this;
		console.log($(copy).attr('selected'));
		if($(copy).attr('selected')===undefined){
		$(copy).attr('selected', 'true');
		$('#rightcol').append(copy);
		} else{
		var parentUL = $('ul#'+$(copy).attr('parentid'));
		console.log(parentUL);
		$(copy).removeAttr('selected');
		$(parentUL).append(this);
		}
	});
	
	
$( ".catClick" ).hover(
function() {
$( this ).css("background-color","#B6BDD2");
}, function() {
$( this ).css("background-color","transparent");
}
);
