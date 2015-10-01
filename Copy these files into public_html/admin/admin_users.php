<?include('connect.php');
if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	if ($pass != $info['password'])
	 	{ echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
	 	} 
	 else
		{
				 //////////ADMIN IS LOGGED IN
				 
				 
if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	if ($pass != $info['password'])
	 	{ echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
	 	} 
	 else
	 {
	 //////////ADMIN IS LOGGED IN
	 
	 
	 
	 
date_default_timezone_set('America/New_York');
$today=date(Y).'-'.date(m).'-'.date(d);	
$numdate=strtotime($today);
echo'Customer LIST<P>';

$nextmonth=$numdate+84600*30;
$n=$_GET['n'];
if(isset($n)){mysql_query("update users set member = '$nextmonth' where ID='$n' limit 1") or die(mysql_error());
echo'<h2>Success Membership Status Updated</h2><P>';}


echo'<table border="1">';
echo'<tr><td>Name</td><td>email</td><td>Address</td><td>Phone</td><td>Membership</td></tr>';

$data=mysql_query("select * from users order by ID Desc limit 1") or die(mysql_error());
while($info=mysql_fetch_array($data))
{
$firstname=stripslashes($info['first_name']);
$lastname=stripslashes($info['last_name']);
$email=stripslashes($info['email']);
$member=stripslashes($info['member']);
$address=stripslashes($info['address']);
$city=stripslashes($info['city']);
$state=stripslashes($info['state']);
$zip=stripslashes($info['zip']);
$phone=stripslashes($info['phone']);

echo'<tr><td>'.$firstname.' '.$lastname.'</td><td>'.$email.' </td><td>'.$address.'<br>'.$city.' '.$state.' <br>'.$zip.'</td><td>'.$phone.'</td>';

if($info['ID']!='')
{
	if($member>$numdate){
		echo'<td>Current Member <a href="admin_users.php?n='.$info['ID'].'">Renew Now</a></td>';
			   }
	else {echo'<td><a href="admin_users.php?n='.$info['ID'].'">Add Membership</a></td>';}
}
else echo'error';
echo'</tr>';
}

echo'</table>';

	 	 }
	}
}

else // go to login
{
echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
exit;
}

	
	 	 }
	}
}

else // go to login
{
echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
exit;
}

	 ?>
