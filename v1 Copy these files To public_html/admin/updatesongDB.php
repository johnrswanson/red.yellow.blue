<?php 
require("connect.php");

$action = mysql_real_escape_string($_POST['action']); 
$updateSongArray= $_POST['songArray'];

if ($action == "updateSongListings"){
	
	$songCounter = 1;
	foreach ($updateSongArray as $songIDValue) {
		
		$query = "UPDATE song SET songorder = " . $songCounter . " WHERE ID = " . $songIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$songCounter = $songCounter + 1;	
	}
	
	echo '<pre>';
	print_r($updateSongArray);
	echo '</pre>';
	echo 'Song Order Saved ';
}
?>
