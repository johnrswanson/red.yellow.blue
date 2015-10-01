
	  <?include('connect.php');

$page=$_GET['thisID'];

?>


<script type="text/javascript" src="/js/jquery.js"></script>

	 <script>
	 

$(document).ready(function() {

$( "input" ).keyup(function() {
    var value = $( this ).val();
   var link_href = ('/admin/loadremotephoto.php?page=<?echo$page;?>&keyword=' + value);
		$('#result').html('loading...');
		$('#result').load(link_href);
		
  })
  

  }); 
	 </script>
	 
	 
	 <?

echo'

<input ID="search" type="text" placeholder="Enter Any Word"  name="keyword">
<input ID="thisID" value="'.$page.'" type="hidden">


<br>';

//echo'<a href="http://red.yellow.blue/admin/findphoto.php">Reset</a><br>';


echo'<div ID="result">Find a Photo you can use.</div>';



	 ?>
	 <script type="text/javascript" src="/js/jquery.js"></script>

	
