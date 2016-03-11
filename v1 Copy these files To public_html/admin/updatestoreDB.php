<?php 
require("connect.php");

$action = mysql_real_escape_string($_POST['action']); 
$updateStoreArray= $_POST['storeArray'];

if ($action == "updateStoreListings"){
	
	$storeCounter = 1;
	foreach ($updateStoreArray as $storeIDValue) {
		
		$query = "UPDATE store SET storeorder = " . $storeCounter . " WHERE ID = " . $storeIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$storeCounter = $storeCounter + 1;	
	}
	
	echo '<pre>';
	print_r($updateStorearray);
	echo '</pre>';
	echo 'Product Order Saved ';
}
?>
