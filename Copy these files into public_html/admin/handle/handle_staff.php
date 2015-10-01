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
	 


$editstaff=$_GET['editstaff'];
if(isset($editstaff))
{$data=mysql_query("select * from staff where ID='$editstaff' order by title ASC");
while($info=mysql_fetch_array($data))
	{
	$title=stripslashes($info['title']);
	$paragraphs=str_replace("<br>",'',$info['text']);
				$oldtext = stripslashes($paragraphs);
				
	$email=stripslashes($info['email']);
	$phone=stripslashes($info['phone']);
	$password=stripslashes($info['password']);
	$staffID=stripslashes($info['staffID']);
	echo'<a href="?page='.$staffID.'">Go Back to Collection</a><P>';
	echo'<table><tr><td valign="top"><img src="../img/staff/'.$info['photo'].'" width="200px"><P>';
	echo'</td> <td width="20px"></td><td valign="top">';
	echo'<form method="post" ENCTYPE="multipart/form-data" >';
	echo'<P><INPUT NAME="userfile" TYPE="file"><P>';
	echo'Name:<P><input type="text" name="title" value="'.$title.'"><P>';
	
	echo'Email:<P><input type="text" name="email" value="'.$email.'"><P>';
	echo'Phone:<P><input type="text" name="phone" value="'.$phone.'"><P>';
	echo'Password:<P><input type="text" name="password" value="'.$password.'"><P>';
	echo'<input type="hidden" name="thisID" value="'.$editstaff.'"><P>';
	echo'Bio : <br><textarea name="text" rows="20" cols="80">'.$oldtext.'</textarea><P>';
	
	$data2=mysql_query("select * from pages where ID!='$staffID' AND page_type='3' order by title ASC");
	$num=mysql_num_rows($data2);
	if($num!='0')
		{
		echo'Move staff to an other collection:<br><select name="staffID">';
		echo'<option value="'.$staffID.'">Choose page</option>';
		while($info2=mysql_fetch_array($data2)){
		echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</option>';}
		echo'</select><P>';
		}
	else
		{ 
		echo'<input type="hidden" name="staffID" value="'.$staffID.'">';
		}
	echo'<input type="submit" name="editstnow" value="Make Changes to staff">';
	echo'</form></td></tr></table>';
	}
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
