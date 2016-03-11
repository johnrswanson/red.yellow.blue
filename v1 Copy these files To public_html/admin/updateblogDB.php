<?php 
require("connect.php");

$action = mysql_real_escape_string($_POST['action']); 
$updateBlogArray= $_POST['blogArray'];

if ($action == "updateBlogListings"){
	
	$blogCounter = 1;
	foreach ($updateBlogArray as $blogIDValue) {
		
		$query = "UPDATE blog SET blogorder = " . $blogCounter . " WHERE ID = " . $blogIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$blogCounter = $blogCounter + 1;	
	}
	
	echo '<pre>';
	print_r($updateBlogArray);
	echo '</pre>';
	echo 'Blog Order Saved ';
}
?>
