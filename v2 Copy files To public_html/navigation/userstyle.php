<?
include('../connect.php');


$query = mysql_query("SELECT * FROM admin WHERE ID = '1' ")or die(mysql_error());

	
while($userinfo = mysql_fetch_object( $query )) 
	{	$arr = array();
		$arr[] = $userinfo;			
	}
	

echo '{"userstyle":'.json_encode($arr).'}';

	

?>