<html>
<head>
	<title>Red.Yellow.Blue</title>
	
<!--IPHONE-->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="380" content="width=device-width, user-scalable=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimal-ui" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="http://underscorejs.org/underscore-min.js" type="text/javascript"></script>
<script src="navigation/jquery.ba-hashchange.js" type="text/javascript"></script>
<script src="navigation/touchpunch.js"></script>
  <script src="navigation/spectrum.js"></script>




<script type="text/javascript" src="admin/admin.js"></script>
<script type="text/javascript" src="helper/helper.js"></script>


    
    



<div ID="maincontent">
	
	<?php //required for admin

	include('connect.php'); 
	
	include('./admin/usercheck.php');
	if($admin=='true'){?>
	
	<script type="text/javascript" type="text/javascript" src="navigation/editor.js"></script>
	
	<?}
	else{
		?>
	<script type="text/javascript" type="text/javascript" src="navigation/viewer.js"></script>

	<?	}	?>
	
	
	<div ID="admincontent"></div>
	<div ID="header">
	</div>
	<div id="page"></div>
	

	<?
	//include('./login/usercheck.php');
	//echo'<div id="logincontent"></div>';
	if($loggedin=='true'){
			//echo'<div id="list"></div>';				
	}?>	
	
	<div id="footer"></div>
	<? include('./helper/helper.php');	?>
</div>

<style>
	
 
</style>
<div class="boxdimmer"><div ID="boxitem"></div></div>


<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/spectrum.css">
<link rel="stylesheet" href="admin/style.css">

<div id="userCss"></div>

<script>
$(function(){
	window.logo();
	
	window.showPages();
		window.loadCss();
	});
</script>
	
<script>
$(function(){

  // Bind an event to window.onhashchange that, when the hash changes, gets the
  // hash and adds the class "selected" to any matching nav link.
  $(window).hashchange( function(){
    var hash = location.hash;
    
    // Set the page title based on the hash.
  if(hash==''){
	var url="navigation/data.php";
	var x='1';	
	$.getJSON(url,function(json){
		$.each(json.navinfo,function(i,ldat){
			if( x=='1'){ 
				x='2'; 
				mydefaultpage = ''+ldat.ID+'';
				
				loadPage(''+ mydefaultpage +'');
			
			}	

		});	
	});
}
	     
  if(hash!='' ){ document.title = '' + ( hash.replace( /^#/, '' ) || 'welcome' ) + '';
	 
 
 
    
	var url="navigation/data.php?pageurl="+document.title;
		
		$.getJSON(url,function(json){
			$.each(json.navinfo,function(i,dat){
				  window.loadPage(''+dat.ID+'');
				 
  			});
  		});
  }
    // Iterate over all nav links, setting the "selected" class as-appropriate.
     
});
  
  // Since the event is only triggered when the hash changes, we need to trigger
  // the event now, to handle the hash the page may have loaded with.
  $(window).hashchange();

  
});

</script>
<link rel="stylesheet" href="navigation/style.css">
</body>
</html>
