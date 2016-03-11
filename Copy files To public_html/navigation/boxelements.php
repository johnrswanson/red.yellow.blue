<?
include('../connect.php');
$box=addslashes($_GET['box']);
$thiselement=addslashes($_GET['be']);

if($box!=''){
	$query = mysql_query("SELECT * FROM box_element where boxID='$box' order by boxelementorder asc ")or die(mysql_error());
	}
	

if($thiselement!=''){
	$query = mysql_query("SELECT * FROM box_element where ID='$thiselement' ")or die(mysql_error());
	}
		
	
$arr = array();
while($info = mysql_fetch_object( $query )) 
	{	
	$arr[] = $info;			
	}
echo '{"boxiteminfo":'.json_encode($arr).'}';
?>