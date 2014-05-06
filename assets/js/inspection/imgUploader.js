 $(function() {
$( "#accordion" ).accordion();

$(  "#accordion"  ).accordion({
  activate: function( event, ui ) {
    $(this).css('height', 'auto');
  }
  });
});

$(document).ready(function() {
 
 try{
   var div = $('#fixed-header');
   var start = $(div).offset().top;
 
    $.event.add(window, "scroll", function() {
        var p = $(window).scrollTop();
        $(div).css('position',((p)>start) ? 'fixed' : 'static');
        $(div).css('top',((p)>start) ? '0px' : '');
    });
  }catch(err){
    //dont care about errors

  }
 
});




$(".photoTable").selectable({
  filter: ".tdItem"
});


 $(function() {
      $('#sort1').sortable({
          connectWith: "ul.dropzone"
      }).disableSelection();
  });
  



function addCategoryInfoToMultiple(){

  $(".catSelections").dialog({
        title: 'Categories',
        width: 570,
        height: 400,
        modal: true,
        show: 'fade',
        hide: 'fade',
        position: { my: "left top", at: "left bottom", of: $('.hide') } ,
        open: function() { 
          $(this).focus();
         },
             close: function() {
            $( this ).dialog( "close" );
            //this is where we will set the customName value
            var allSelected = $('#categoryTbl').find('.ui-selected');
            $(allSelected).each(function( i ) {
            var div = $(allSelected[i]).find('div');
            $(allSelected[i]).find('.hiddenCatInfo').remove();
            var customName  = $(div).find("p");
            var textVal = $( ".selectable .ui-selected" ).text();
            var catID = $( ".selectable .ui-selected" ).attr('id');
            var parentID = $( ".selectable .ui-selected" ).attr('parentid');
            var photoID = $(div).find("img").attr("id");

            if(catID!= undefined){
            $(allSelected[i]).append('<div class="hiddenCatInfo" style="display:none;">'+  photoID+':'+parentID+':'+catID+'</div>');
            $(customName).text(catID+' :'+textVal);
              }
            $(allSelected[i]).removeClass('ui-selected');
            });
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

$( ".delPhoto" ).click(function() {
  if($(this).find('img.delIcon').length != 0){
    //del
  $(this).find('img.delIcon').remove();    
  }else{
    //add
     $(this).append('<img class="delIcon" src="/assets/gfx/delete.png" />');
  }
});
$( "#deletebutton" ).click(function() {
  var delIcons = $('.delIcon');
  $(delIcons).each(function(i){
    var id = $(delIcons[i]).parent().attr('id');
    var photoLoc = $(delIcons[i]).parent().find('.delPhotoImg').attr('src');
    $('#deletephotos').append('<input name="'+i+'" style="display:none;" type="text" id="'+i+'" value="'+id+','+photoLoc+'"/>');
  });
  $('#deletephotos').submit();
});


$( "#deleteAllButton" ).click(function() {
   $('#deletephotos').append('<input name="all" style="display:none;" type="text" id="all" value="all"/>');
   $('#deletephotos').submit();
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


/*
 var gridster;

  $(function(){

    gridster = $(".gridster > ul").gridster({
        widget_margins: [6, 10],
        widget_base_dimensions: [80, 80],
    }).data('gridster');
  });*/

$(function() {
$( "#accordion" ).accordion({ collapsible: true,
   heightStyle: "content" });
});


$( document ).ready(function() {
  $('#categoryTbl').selectable({
  filter: ".catTD",
});



$( "#categoryTbl" ).on( "selectablestop", function( event, ui ) {
 addCategoryInfoToMultiple();
} );

  var tmp = $('.catTD');
  tmp.each(function( i ) {
  $(tmp[i]).find('.photoTxt').css("visibility","hidden");
});
});


$('.catTD').mouseover(function() {
   $(this).find('.photoImg').css("opacity","0.2");
   $(this).find('.photoTxt').css("visibility","visible");
});

$('.catTD').mouseout(function() {
   $(this).find('.photoImg').css("opacity","");
  $(this).find('.photoTxt').css("visibility","hidden");
});



$('.sortable').sortable();

$('.sortable').sortable().bind('sortupdate', function(e, ui) {
   $(this).attr("changed", "yes");
});


$( "#editButton" ).click(function() {
  var sections = $('.sortable');
  $(sections).each(function( i ) {
    if($(sections[i]).attr("changed")==='yes'){
     var tmpImgArry = $(sections[i]).find('.photoImgView');
       $(tmpImgArry).each(function( j ) {
          var tmpID = $(tmpImgArry[j]).attr("id");
            $( "#orderPhotos" ).append('<input name="'+tmpID+'" style="display:none;" type="text" id="'+tmpID+'" value="'+tmpID+':'+j+'"/>');
        });
  }
});
     $( "#orderPhotos" ).submit();
});
