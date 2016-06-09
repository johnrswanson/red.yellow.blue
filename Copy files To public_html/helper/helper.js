(function (window) {
	
window.helperadd = function(top, left) {
		$('#content').html('');
		$('.secretmenu').slideUp(500);	
		$('#lightbox').removeAttr('style');
        
        if (top==''){
	        top=100;
        }
     mytop=top+100;
        document.getElementById("lightbox").style.top=''+mytop+'';  
        document.getElementById("lightbox").style.left=''+left+''; 
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

  	
	

