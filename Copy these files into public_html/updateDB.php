<?php 
include("./admin/connect.php");

$action = mysql_real_escape_string($_POST['action']); 
$updatepage = $_POST['pageArray'];

if ($action == "updatePageOrder"){
	
	$pageCounter = 1;
	foreach ($updatepage as $value) {
		$updatenow=mysql_query("UPDATE pages SET pageorder = '$pageCounter' WHERE ID = '$value'")or die(mysql_error('you suck at this'));
		$pageCounter = $pageCounter + 1;	
	}
	
	//echo '<pre>';
	//print_r($updateRecordsArray);
	//echo '</pre>';
	//echo 'Page Order Saved';
}
?>
