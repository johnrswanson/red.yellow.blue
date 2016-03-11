<?
include('../connect.php');
$page=$_GET['page'];


if($page==''){
$query = mysql_query("SELECT * FROM pages where published!='y' order by pageorder asc ")or die(mysql_error());	
}

else{
$query = mysql_query("SELECT * FROM pages where ID='$page' ")or die(mysql_error());	
}
$arr = array();
while($info = mysql_fetch_object( $query )) 
	{	
	$arr[] = $info;			
	}
echo '{"info":'.json_encode($arr).'}';
?>