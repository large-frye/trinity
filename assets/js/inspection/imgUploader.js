$(document).on('dblclick', '.dz-preview', function() {
    renameFile(this);
});

 $(function() {
      $('#sort1').sortable({
          connectWith: "ul.dropzone"
      }).disableSelection();
  });
  
function renameFile(div){

	$(".catSelections").dialog({
		title: 'Categories',
		width: 500,
        height: 400,
        modal: true,
        show: 'fade',
        hide: 'fade',
        open: function() { 
        	console.log('opened');
       		$(this).focus();
   			 },
          	 close: function() {
            $( this ).dialog( "close" );
            //this is where we will set the customName value
            console.log(div);
            var customName  = $(div).find(".customName");
            var textVal = $( ".selectable .ui-selected" ).text();
            var catID = $( ".selectable .ui-selected" ).attr('id');
            $(customName).text(catID+' :'+textVal);
            $('.selectable .ui-selected').removeClass('ui-selected');
         			 },
   				}
   			);
		$(".catSelections").focus();
//	var re = /(?:\.([^.]+))?$/;
//    var name=prompt("Please enter filename","name");
//	var customName  = $(div).find(".customName");
//	var orig = customName.clone().children().remove().end().text();
//	var ftype = re.exec(orig)[1];
//	var cache = $(customName).children();
//	$(customName).text(name+"."+ftype).append(cache);
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



 $(function() {
  $( ".selectable" ).selectable();
  });


 $(".selectable").selectable({
    selected: function(event, ui) { 
        $(ui.selected).addClass("ui-selected").siblings().removeClass("ui-selected");           
    }                   
});




///////////////////

$("#dzButton").click(function(){
    var imgPreviews = $('.dz-preview ');
    $(imgPreviews).each(function( i) {

      console.log(imgPreviews[i]);
      
      });

});

 $(document).ready(function() {

    
   Dropzone.options.dropzoneForm = {
            // The camelized version of the ID of the form element

            paramName: "files",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            previewsContainer: ".dropzone-previews",
            clickable: true,
            dictDefaultMessage: 'Add files to upload by clicking or droppng them here.',
            addRemoveLinks: true,
            acceptedFiles: '.jpg,.pdf,.png,.bmp',
            dictInvalidFileType: 'This file type is not supported.',

            // The setting up of the dropzone
            init: function () {
                var myDropzone = this;

                $("button[type=submit]").bind("click", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    // If the user has selected at least one file, AJAX them over.

                    if (myDropzone.files.length !== 0) {
                    //  for(i=0; i < myDropzone.files.length; i++) { console.log(myDropzone.files[i]); }
                       myDropzone.processQueue();
                    // Else just submit the form and move on.
                    } else {
                        $('#dropzone-form').submit();
                    }
                });

                this.on("successmultiple", function (files, response) {
                  console.log("suces");
                    // After successfully sending the files, submit the form and move on.
                   $('#dropzone-form').submit();
                });
            }
        }
   });

  
/*
var data = new FormData();
jQuery.each($('#file')[0].files, function(i, file) {
    data.append('file-'+i, file);
});

$.ajax({
    url: './uploadphotos.php',
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    type: 'POST',
    success: function(data){
        alert(data);
    }
});*/
