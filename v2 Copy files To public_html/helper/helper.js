(function (window) {
	
window.helperadd = function() {
		$('#content').html('');
		//var myoffset = $( this ).offset();
		$('.secretmenu').slideUp(500);	
		$('#lightbox').removeAttr('style');
        var y=100;
        document.getElementById("lightbox").style.top=y+"px";
		//$('#lightbox').offset( myoffset);        
        $('#lightbox').show();
		$('#lightbox').animate({left: "15%"}, 300, "swing" );
		
		return false;
	
	}
	
	window.helperdelete = function() {
	
		var myoffset = $( this ).offset();
		$('#content').html('Press X to delete any item');		
		$('#lightbox').removeAttr('style');
		$('#lightbox').show();
		$('#lightbox').offset( myoffset);
		$('#lightbox').animate({left: "15%"}, 300, "swing" );
	
	}

window.closehelper= function() {
		$('#content').html('');
		$('#lightbox').hide(0);
		
	}

$(function() {
	$( "#lightbox" ).draggable({
		handle:".boxtitle",
		stop: function() {
			$( "#lightbox" ).attr('style', $(this).attr("style") + " width:auto;");
			}
	});
});

  
   
  
  }(this));

  	
	

