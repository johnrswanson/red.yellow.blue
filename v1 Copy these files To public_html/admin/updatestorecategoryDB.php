<?php 
require("connect.php");

$action = mysql_real_escape_string($_POST['action']); 
$updateStorecategoryArray= $_POST['storecategoryArray'];

if ($action == "updateStorecategoryListings"){
	
	$storecategoryCounter = 1;
	foreach ($updateStorecategoryArray as $storecategoryIDValue) {
		
		$query = "UPDATE storecategory SET storecategoryorder = " . $storecategoryCounter . " WHERE ID = " . $storecategoryIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$storecategoryCounter = $storecategoryCounter + 1;	
	}
	
	echo '<pre>';
	print_r($updateStorecategoryArray);
	echo '</pre>';
	echo 'Product Category Order Saved ';
}
?>
