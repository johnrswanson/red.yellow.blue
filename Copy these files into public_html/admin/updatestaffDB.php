<?php 
require("connect.php");

$action = mysql_real_escape_string($_POST['action']); 
$updateStaffArray= $_POST['staffArray'];

if ($action == "updateStaffListings"){
	
	$staffCounter = 1;
	foreach ($updateStaffArray as $staffIDValue) {
		
		$query = "UPDATE staff SET stafforder = " . $staffCounter . " WHERE ID = " . $staffIDValue;
		mysql_query($query) or die('Error, insert query failed');
		$staffCounter = $staffCounter + 1;	
	}
	
	echo '<pre>';
	print_r($updateStaffArray);
	echo '</pre>';
	echo 'Staff Order Saved ';
}
?>
