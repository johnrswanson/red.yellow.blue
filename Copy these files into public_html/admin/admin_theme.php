<?include('connect.php');
if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	$usertitle=$info['title'];
	if ($pass != $info['password'])
	 	{ echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
	 	} 
	 else
	 {
	 //////////ADMIN IS LOGGED IN
	 
//include('admin_links.php');
if(isset($_POST['updatecss']))
	{
	$newcss=addslashes($_POST['user_css']);
	$update=mysql_query("update stylesheet set user_css='$newcss' limit 1 ");
	echo'Style Sheet Updated! <a href="../index.php">View Site</a>';
	}


if(!isset($_POST['updatecss']))
{
	
	$data = mysql_query("SELECT * FROM stylesheet order by ID asc limit 1")or die(mysql_error());
	while($info = mysql_fetch_array( $data )) 
	{
		echo'Enter CSS rules here override stylesheet site-wide. 
		<form method="post">';
		echo'<input style="float: right;" type="submit" name="updatecss" value="Save">';
		echo'<textarea name="user_css"  style="width:300px; min-height: 400px">';
		echo stripslashes($info['user_css']);
		echo'</textarea>';
	
		echo'</form>';
	}
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
