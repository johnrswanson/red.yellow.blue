<?php 
include("./admin/connect.php");

$action = mysql_real_escape_string($_POST['action']); 
$updateArray= $_POST['divArray'];


$thisID=$_POST['stackID'];
if ($thisID !=''){
	$onlyID = str_replace('divArray_', '', $thisID);
	echo'onlyID'.$onlyID;
	//$updatenow=mysql_query("UPDATE page_element SET posx = '0' WHERE ID = '$onlyID'")or die(mysql_error('you suck at this'));

	}

if ($action == "updateElementListings"){
	
	$listingCounter = 1;
	foreach ($updateArray as $value) {
		
	$updatenow=mysql_query("UPDATE page_element SET elementlist = '$listingCounter' WHERE ID = '$value'")or die(mysql_error('you suck at this'));
	
	
		$listingCounter = $listingCounter + 1;	
	}
	
	//echo '<pre>';
	//print_r($updateElementArray);
	//echo '</pre>';
	//echo 'Saved';

}

?>
