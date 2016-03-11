<?php
include('../connect.php');
include('../login/usercheck.php');
?>
		<script>
		$(document).ready(function (){
		  $("#editlist").submit(function (xyz) {
  	xyz.preventDefault();
    	var data= $( "#editlist" ).serialize();
  		var myresult = $.post("./listconfirm.php" , data);
  		$(".add").html("Success. <a href='#list' onclick ='return false'>View List</a>");
  		
      });	
   });
		</script>
		
	<?	$itemID=$_GET['item'];
		
$query = mysql_query("SELECT * FROM list where ID = '$itemID' ")
or die(mysql_error());
		
		
		while($listinfo = mysql_fetch_object( $query )) 
		{
		?>
		<div class="add" style="font-size: 25px; text-align: center; ">
		<form  ID="editlist" method="POST">
		
		<input type="hidden" name="update" value="<? echo $itemID; ?>">
		
		<input type="text" name="title" 
		value="<? echo $title; ?>" placeholder="Enter A Title"><br>
		
		<input type="text" name="link"
		value="<? echo $link; ?>" placeholder="Enter Link (Include the http://)">
		
		<p style="padding: 20px; ">
		<input type="submit" name="submit" value="Add">
		</p>
	</form>
		<?php } ?>
</div>
