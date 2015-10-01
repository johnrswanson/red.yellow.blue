<?php 
require("connect.php");

$action = mysql_real_escape_string($_POST['action']); 
$updateVideoArray = $_POST['videoArray'];

if ($action == "updateVideoListings"){
	
	$videoCounter = 1;
	foreach ($updateVideoArray as $videoIDValue) {
		
		$query = "UPDATE videos SET videoorder = " . $videoCounter . " WHERE ID = " . $videoIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$videoCounter = $videoCounter + 1;	
	}
	
	echo '<pre>';
	print_r($updateVideoArray);
	echo '</pre>';
	echo 'Page Order Saved';
}
?>
