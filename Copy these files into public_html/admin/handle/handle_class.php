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
	 
	 
	

$editclass=$_GET['editclass'];
if(isset($editclass)){$data=mysql_query("select * from class where ID='$editclass' order by title ASC");
while($info=mysql_fetch_array($data))
	{
	$title=stripslashes($info['title']);
	$paragraphs=str_replace("<br>",'',$info['text']);
	$oldtext = stripslashes($paragraphs);
	$classID=stripslashes($info['classID']);
	echo'<a href="?page='.$classID.'">Go Back to Collection</a><P>';
	echo'<table><tr><td valign="top"><img src="../img/class/'.$info['photo'].'" width="300px"><P>';
	echo'</td> <td width="20px"></td><td valign="top">';
	echo'<form method="post" ENCTYPE="multipart/form-data" >';
	echo'<P><INPUT NAME="userfile" TYPE="file"><P>';
	echo'Class Title:<P><input type="text" name="title" value="'.$title.'"><P>';
	echo'<input type="hidden" name="thisID" value="'.$editclass.'"><P>';
	echo'About This Class : <br><textarea name="text" rows="15" cols="30">'.$oldtext.'</textarea>
	<P>';
	$data2=mysql_query("select * from pages where ID!='$classID' AND page_type='3' order by title ASC");
	$num=mysql_num_rows($data2);
	if($num!='0')
		{
		echo'Move class to an other collection:<br><select name="classID">';
		echo'<option value="'.$classID.'">Choose page</option>';
		while($info2=mysql_fetch_array($data2)){
		echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</option>';}
		echo'</select><P>';
		}
	else
		{ 
		echo'<input type="hidden" name="classID" value="'.$classID.'">';
		}
	echo'<input type="submit" name="editclassnow" value="Make Changes to class">';
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
