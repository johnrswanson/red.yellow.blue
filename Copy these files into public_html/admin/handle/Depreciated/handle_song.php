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
	 


$editsong=$_GET['editsong'];

if(isset($editsong))
	{
	$data=mysql_query("select * from song where ID='$editsong' order by title ASC");
	while($info=mysql_fetch_array($data))
		{
		$title=stripslashes($info['title']);
		$paragraphs=str_replace("<br>",'',$info['text']);
			$oldtext = stripslashes($paragraphs);
			
		$filename=stripslashes($info['filename']);
		$songID=stripslashes($info['songID']);
		echo'<a href="index?editalbum='.$songID.'">Go Back to Album</a><P>';
		echo'<table><tr><td valign="top"><audio src="../mp3/'.$info['mp3'].'" ></audio><P>';
		echo'</td> <td width="20px"></td><td valign="top" width="400px">';
		echo'<form method="post" ENCTYPE="multipart/form-data" >';
		echo'<P><INPUT NAME="userfile" TYPE="file"><P>';
		echo'Song Name:<P><input type="text" name="title" value="'.$title.'"><P>';
		
		echo'<input type="hidden" name="thisID" value="'.$editsong.'"><P>';
		echo'text : <br><textarea name="text" rows="15" cols="30">'.$oldtext.'</textarea>
		<P>';
		
		/*$data2=mysql_query("select * from album where ID!='$songID'  order by title ASC");$num=mysql_num_rows($data2);
		if($num!='0')
			{
			echo'Move song to an other album:<br><select name="songID">';
			echo'<option value="'.$songID.'">Choose page</option>';
			while($info2=mysql_fetch_array($data2)){
			echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</option>';}
			echo'</select><P>';
			}
		else
			{ 
			echo'<input type="hidden" name="songID" value="'.$songID.'">';
			}
			
			*/
		echo'<input type="submit" name="editsongnow" value="Make Changes to song">';
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
