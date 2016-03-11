
$(document).ready(function(){
	var login='y';

	$(function() {$("#navcontent ul").sortable({
		opacity: 0.6,  forcePlaceholderSize: true, delay: 0, forceHelperSize: true, cursor: 'move',
		update: function() {
			$("#navactions").html('');
			var pageorder = $(this).sortable("serialize") + '&action=updatePageOrder'; 
			$.post("navigation/confirm.php", pageorder, function(theResponse)
				{	window.helperadd();
					$('#lightbox>#content').html('Page Order Saved');
					$('#lightbox').fadeOut(2000);
				});
		
			}
		});
	
	//$( "#navcontent a" ).disableSelection();
	});
	
	
	//$(".elements").css("box-shadow", "inset 0px 0px 0px 1px #00f");
	

	
	/*
	
	$(function() {$( "#page > ul .elements" ).resizable({  
		
		 handles: " e, s, w, ne, se, sw, nw",
		 containment:"parent",
	
		
		stop: function( event, ui ) {
			
	var width = ui.size.width;
	var height = ui.size.height;
	
	var boxWidth = $('#page').offsetParent().width();
	var mywidth = 100 * width / boxWidth;
	var safewidth=mywidth.toFixed(3);
	var dragposition = ui.position;
		var myleft=dragposition['left'];
		var sideWidth = $(this).offsetParent().width();
		var leftpct = 100 * myleft / sideWidth;
		var safeleft=leftpct.toFixed(3);
		
	      $('#respostop').val(''+dragposition['top']+'');
	      $('#resposleft').val(''+safeleft+'');
	
	$('#absresleft').val(''+width+'');
	
	$('#resleft').val(''+safewidth+'');
	$('#restop').val(''+height+'');
	
	      var thisID=$(ui.element).attr("ID");
	      $('#sizeelementID').val(''+thisID+'');
	
	var data= $( "#sizesaver" ).serialize();
	$.post('/admin/confirm_live.php' , data);
	
			}
		
		});
	});





	 $(function() {$("#page ul").sortable({ cursorAt: { left: 5 }, opacity:0.6, forcePlaceholderSize: true, forceHelperSize: true, cursor: "move", 
	handle: ".mobilemover",
	items:".elements",
	  update: function(event, ui) {
	 	
		
		var thisone= ui.item.attr("id");
		ui.item.css("top", "0");
		var order = $(this).sortable("serialize") + '&stackID='+thisone+'&action=updateElementListings'; 
		
		$.post("/updateelementDB.php", order, function(elementResponse){
			
		});
		
		
	}
	
	});
	
	
	
	});

*/

});




