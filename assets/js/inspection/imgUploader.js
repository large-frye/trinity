
$(document).on('dblclick', '.photoImg', function() {
    addCategoryInfo(this);
});


$(".photoTable").selectable({
  filter: ".tdItem"
});


 $(function() {
      $('#sort1').sortable({
          connectWith: "ul.dropzone"
      }).disableSelection();
  });
  
function addCategoryInfo(div){

	$(".catSelections").dialog({
		title: 'Categories',
		width: 500,
        height: 400,
        modal: true,
        show: 'fade',
        hide: 'fade',
        open: function() { 
       		$(this).focus();
   			 },
          	 close: function() {
            $( this ).dialog( "close" );
            //this is where we will set the customName value
           
            $(div).parent().find('.hiddenCatInfo').remove();
            var customName  = $(div).siblings("p");
            var textVal = $( ".selectable .ui-selected" ).text();
            var catID = $( ".selectable .ui-selected" ).attr('id');
            var parentID = $( ".selectable .ui-selected" ).attr('parentid');
            var photoID = $(div).attr("id");
           
           $(div).parent().append('<div class="hiddenCatInfo" style="display:none;">'+  photoID+':'+parentID+':'+catID+'</div>');
            $(customName).text(catID+' :'+textVal);
            $('.selectable .ui-selected').removeClass('ui-selected');
         			 },
   				}
   			);
		$(".catSelections").focus();
}



  $( "#catButton" ).click(function() {
  var hiddenInfo = $('.hiddenCatInfo');
  $(hiddenInfo).each(function( i ) {
      var hiddenInfoText= $(hiddenInfo[i]).text();
     $( "#catigorizephotos" ).append('<input name="'+i+'" style="display:none;" type="text" id="'+i+'" value="'+hiddenInfoText+'"/>');
});
     $( "#catigorizephotos" ).submit();
});


	$( ".catClick" ).click(function() {
		var copy = this;
		if($(copy).attr('selected')===undefined){
		$(copy).attr('selected', 'true');
		$('#rightcol').append(copy);
		} else{
		var parentUL = $('ul#'+$(copy).attr('parentid'));
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

 var gridster;

  $(function(){

    gridster = $(".gridster > ul").gridster({
        widget_margins: [10, 10],
        widget_base_dimensions: [80, 80],
    }).data('gridster');

  });

$(function() {
$( "#accordion" ).accordion({ heightStyle: "fill" });
});

$('.photoImg').mouseover(function() {
  $(this).css("opacity","0.2");
   $(this).siblings("p").css("visibility","visible");
});

$('.photoImg').mouseout(function() {
   $(this).css("opacity","");
  $(this).siblings("p").css("visibility","hidden");
});



