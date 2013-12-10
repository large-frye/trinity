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