<?include('connect.php');
if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	if ($pass != $info['password'])
	 	{ //echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
	 	} 
	 else
	 {
	 //////////ADMIN IS LOGGED IN
	 





$thistype=$_GET['type'];
$thispage=$_GET['page'];
echo'</script>';
	echo'<p><br></p><form method="POST">';
	echo'<p><div class="alert" ><b></b>';

if($thistype=='1'){echo'Your Navigation Links will be in this Box.'; }
	else{echo'<input type="text" name="title" value="" placeholder="Enter a Box Title">';}
	
	echo'<input type="hidden" name="pageID" value="'.$thispage.'">';
	echo'<input type="hidden" name="type" value="'.$thistype.'">';
echo'</div></P>';

	echo'<p><input type="submit" name="newpagebox" value="Create Box"></p>';
	echo'</form>';
	
 
	 	 }
	}
}

else // go to login
{

}

	 ?>
