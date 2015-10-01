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
	 

$editvideo=$_GET['editvideo'];
if(isset($editvideo))
{$data=mysql_query("select * from videos where ID='$editvideo' order by title ASC");
while($info=mysql_fetch_array($data))
{$title=stripslashes($info['title']);
$text=stripslashes($info['text']);
$playlist=stripslashes($info['playlist']);
//echo'<a href="admin_new_video.php?videoID='.$playlist.'">Go Back to Collection</a><P>';
echo'Video Thumbnail:<br><img src="../img/video/'.$info['photo'].'" width="100px"><br>';
echo $text;

echo'<FORM ENCTYPE="multipart/form-data"  METHOD="POST" >';
echo'Video title:<P><input type="text" name="title" value="'.$title.'"><P>';
echo'<P>Upload a new Thumb<br><INPUT NAME="userfile" TYPE="file"><P>';
echo'<input type="hidden" name="thisID" value="'.$editvideo.'"><P>';
echo' Video Embed Code : <br><textarea name="text" rows="10" style="width: 100%;" >'.$text.'</textarea><P>';
$data2=mysql_query("select * from pages where ID!='$playlist' AND page_type='4' order by title ASC");
$num=mysql_num_rows($data2);
if($num!='0')
{
echo'Move video to an other collection:<br><select name="playlist">';
echo'<option value="'.$playlist.'">Choose page</option>';
while($info2=mysql_fetch_array($data2))
{
echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</option>';
}
echo'</select><P>';
}
else{ 
echo'<input type="hidden" name="playlist" value="'.$playlist.'">';
}
echo'<input type="submit" name="editvideonow" value="Make Changes to Video">';
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
