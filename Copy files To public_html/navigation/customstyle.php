<?
include('../connect.php');
$query = mysql_query("SELECT * FROM stylesheet where ID='1' ")or die(mysql_error());	
$arr = array();
while($info = mysql_fetch_object( $query )) 
	{	
	$arr[] = $info;			
	}
echo '{"cssinfo":'.json_encode($arr).'}';
?>