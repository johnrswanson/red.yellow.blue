<?
include('../connect.php');
$load=addslashes($_GET['l']);
$thiselement=addslashes($_GET['e']);
$box=addslashes($_GET['box']);


if($load!=''){
	$query = mysql_query("SELECT * FROM page_element where pageID='$load' order by elementlist asc ")or die(mysql_error());
	}
	
if($thiselement!=''){
	$query = mysql_query("SELECT * FROM page_element where ID='$thiselement' order by elementlist asc ")or die(mysql_error());
	}
if($load!=''){
	$query = mysql_query("SELECT * FROM page_element where pageID='$load' order by elementlist asc ")or die(mysql_error());
	}
	
if($box!=''){
	$query = mysql_query("SELECT * FROM page_element where boxID='$box' order by elementlist asc ")or die(mysql_error());
	}
		
$arr = array();
while($info = mysql_fetch_object( $query )) 
	{	
	$arr[] = $info;			
	}
echo '{"elementinfo":'.json_encode($arr).'}';
?>