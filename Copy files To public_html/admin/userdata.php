<?
include('../connect.php');

//include('requireuser.php');

$trick=$_GET['cssonly'];


if (isset($_COOKIE['ID_myapp']))
	{ 
	$email = $_COOKIE['ID_myapp']; 
	$pass = $_COOKIE['Key_myapp'];

$query = mysql_query("SELECT * FROM admin WHERE email = '$email' ") or die(mysql_error());
}

else
{
	
	if ($trick=='true'){
	$query = mysql_query("SELECT * FROM admin ") or die(mysql_error());
	}
	
}
	
	
while($userinfo = mysql_fetch_object( $query )) 
	{	
	$arr = array();
	$arr[] = $userinfo;			
	}
	

echo '{"userinfo":'.json_encode($arr).'}';

	

?>
