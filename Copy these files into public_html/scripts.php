
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
 
	<script> 
	$(function() {
	$( "#lightbox" ).draggable({cancel:".ui-sortable",cancel:"form",
	stop: function( z, ui ) {
		$( "#lightbox" ).attr('style', $(this).attr("style") + " width:auto;");
		
		}
	});
  });
  	</script>
  
  <script> 
  $(function() {
	$( "#lightbox2" ).draggable({cancel:".ui-sortable",cancel:"form", cancel:"input",
	stop: function( z, ui ) {
		$( "#lightbox2" ).attr('style', $(this).attr("style") + " width:auto;");
		
		}
	});
  });

  	  
  </script>
  
  
  
  
  <script type="text/javascript">
    $(document).ready(function () {    
 $('#linksbar ul li').hover(function(){
	 
$('.sublinksbar a', this).slideDown(100);
   
}, 
function(){
	 
$('.sublinksbar a', this).fadeOut(200);
   
}

); 
}); 
 </script>


  <script type="text/javascript">
    $(document).ready(function () {    
 $('#linksbar_simple ul li').hover(function(){
	 
	 	 
$('.sublinksbar', this).css("height", "auto");
$('.sublinksbar a', this).slideDown(100);
   
}, 
function(){
$('.sublinksbar', this).css("height", "0px");
$('.sublinksbar a', this).fadeOut(200);
   
}

); 
}); 
 </script>
 
 
 
   
  <script type="text/javascript">   
    function positionf(e)
    {
      x = e.clientX+window.scrollX;
      y = e.clientY+window.scrollY;        
        document.getElementById("lightbox").style.left=x+"px";
        document.getElementById("lightbox").style.top=y+"px";
    }   
    </script>


<script type="text/javascript">
$(document).ready(function(){
		
	$('.signup').click(function() {
	$('#lightbox').animate({top: "100px"}, 10, "swing" );
	});


	 $('.dropedit_trigger').click(function(e) {
		e.preventDefault();
			$('.dropedit').toggle();
	});
	
	
	
	 $('.secretmenu_trigger').click(function(e) {
		e.preventDefault();
		$('.secretmenu_trigger').removeClass('active');
		$('.secretmenu').toggle();		
	});

  
	$('.box_trigger').click(function(e) {
		e.preventDefault();
		var link_href = $(this).attr("href");
		$('#content2').html('loading...');
		$('#content2').load(link_href);
			$('#lightbox2').show();
	});
	
	
	
	$('.boxclose a').click(function() {
		$('#content2').html('');
		$('#lightbox2').hide(0);
	});
	
	
	
	
	
	$('.lightbox2_trigger').click(function(e) {
		e.preventDefault();
		$('.secretmenu').slideUp(500);
		var link_href = $(this).attr("href");
		var myoffset = $( this ).offset();
		$('#content2').html('loading...');		
		$('#content2').load(link_href);
		$('#lightbox2').removeAttr('style');
		$('#lightbox2').show();
		 $('#lightbox2').offset( myoffset);
		 $('#lightbox2').animate({left: "15%"}, 300, "swing" );
	
	});
	
	
	
	$('.lightbox_trigger').click(function(e) {
		e.preventDefault();
		$('.secretmenu').slideUp(500);
		var link_href = $(this).attr("href");
		var myoffset = $( this ).offset();
		$('#content').html('loading...');		
		$('#content').load(link_href);
		$('#lightbox').removeAttr('style');
		$('#lightbox').show();
		 $('#lightbox').offset( myoffset);
		 $('#lightbox').animate({left: "15%"}, 300, "swing" );
	
	});

	
		
	$('.rightbox').click(function(e) {
		e.preventDefault();
		$('.secretmenu').slideUp(500);
		var link_href = $(this).attr("href");
		var myoffset = $( this ).offset();
		$('#content').html('loading...');		
		$('#content').load(link_href);
		$('#lightbox').removeAttr('style');
		$('#lightbox').show();
		 $('#lightbox').offset( myoffset);
		 $('#lightbox').animate({left: "65%"}, 300, "swing" );
	
	});
	
	
	
	$('.gointeractive').click(function(e) {
		e.preventDefault();
		var link_href = $(this).attr("href");
		$('#interactive .layer').html('loading...');	
	
		$('#interactive .layer').load(link_href);
			$('#interactive').fadeIn(1000);	
		
	
	});
	

		$('.xinteractive').click(function() {
			$('#interactive .layer').html('');
			$('#interactive2 .layer').html('');
		$('#interactive').fadeOut(200);
		$('#interactive2').fadeOut(200);
	});

	
	
		$('.close a').click(function() {
			$('#content').html('');
		$('#lightbox').hide(0);
		
	});
	
	
	$('.close2 a').click(function() {
		$('#content2').html('');
	$('#lightbox2').fadeOut(200);
	});


	
	$('.plus').click(function(){
		$('#linksbar').css('height', 'auto');
		$('.plus').fadeOut(0);
		$('.minus').slideDown(30);
	});



	$('.minus').click(function(){
			$('.minus').fadeOut(0);
			$('.plus').slideDown(0);
			$('#linksbar').css('height', '0px');	
	});


	
	
});
</script>







