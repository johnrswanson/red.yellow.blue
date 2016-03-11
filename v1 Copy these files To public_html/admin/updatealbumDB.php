<?php 
require("connect.php");

$action = mysql_real_escape_string($_POST['action']); 
$updateAlbumArray= $_POST['albumArray'];

if ($action == "updateAlbumListings"){
	
	$albumCounter = 1;
	foreach ($updateAlbumArray as $albumIDValue) {
		
		$query = "UPDATE album SET albumorder = " . $albumCounter . " WHERE ID = " . $albumIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$albumCounter = $albumCounter + 1;	
	}
	
	echo '<pre>';
	print_r($updateAlbumArray);
	echo '</pre>';
	echo 'Album Order Saved ';
}
?>
