<?php 
include("/admin/connect.php");

$action = mysql_real_escape_string($_POST['action']); 
$updatePhotoArray= $_POST['photoArray'];

if ($action == "updatePhotoListings"){
	
	$photoCounter = 1;
	foreach ($updatePhotoArray as $photoIDValue) {
		
		$query = "UPDATE photos SET photoorder = " . $photoCounter . " WHERE ID = " . $photoIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$photoCounter = $photoCounter + 1;	
	}
	
	echo '<pre>';
	print_r($updatePhotoArray);
	echo '</pre>';
	echo 'Photo Order Saved ';
}
?>
