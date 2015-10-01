<?php 
require("connect.php");

$action = mysql_real_escape_string($_POST['action']); 
$updateClassArray= $_POST['classArray'];

if ($action == "updateClassListings"){
	
	$classCounter = 1;
	foreach ($updateClassArray as $classIDValue) {
		
		$query = "UPDATE class SET classorder = " . $classCounter . " WHERE ID = " . $classIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$classCounter = $classCounter + 1;	
	}
	
	echo '<pre>';
	print_r($updateClassArray);
	echo '</pre>';
	echo 'class Order Saved ';
}
?>
