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


$editalbum=$_GET['editalbum'];

if(isset($editalbum))
	{
	$data=mysql_query("select * from album where ID='$editalbum' order by title ASC");
	while($info=mysql_fetch_array($data))
		{
		$thisalbum=$info['ID'];
		$title=stripslashes($info['title']);
		$paragraphs=str_replace("<br>",'',$info['text']);
			$oldtext = stripslashes($paragraphs);
			
		$albumID=stripslashes($info['albumID']);
		echo'<a href="?page='.$albumID.'">Go Back to page</a><P>';
		echo'<table><tr><td valign="top"><img src="../img/album/'.$userID.'/'.$info['photo'].'" width="200px"><P>';
		echo'</td> <td width="20px"></td><td valign="top">';
		echo'<form method="post" ENCTYPE="multipart/form-data" >';
		echo'<P><INPUT NAME="userfile" TYPE="file"><P>';
		echo'Album Name:<P><input type="text" name="title" value="'.$title.'"><P>';
		echo'<input type="hidden" name="thisID" value="'.$editalbum.'"><P>';
		
		echo'<a href="admin_new_song.php?albumID='.$editalbum.'">Add Song</a><P><ul>';
		$data2=mysql_query("select * from song where songID='$editalbum' order by songorder ASC");
		
		echo'<div id="songcontentRight">Drag and drop to change order</div>';
		
		echo'<div id="songcontentLeft"><ul style="width:400px">';
		while($info2=mysql_fetch_array($data2)){
		$thissong=$info2['ID'];
		$path='../mp3/'.stripslashes($info2['filename']);
		$title=stripslashes($info2['title']);
		$text=stripslashes($info2['text']);
		$songID=stripslashes($info2['songID']);
		echo'<li id="songArray_'.$info2['ID'].'">';
		echo$title.' ';
		//echo'<embed type="application/x-shockwave-flash" flashvars="audioUrl='.$path.'" src="http://www.google.com/reader/ui/3523697345-audio-player.swf" width="400" height="27" quality="best"></embed>';
		echo' | <a href="?editsong='.$thissong.'">edit</a> |';
		echo' <a href="?deletesong='.$thissong.'">delete</a>';
		echo'<P></li>';
		}
		
		echo'</ul></div>';
		
		echo'<P>about: <br><textarea name="text" rows="15" cols="80">'.$oldtext.'</textarea><P>';
		
		
		$data2=mysql_query("select * from pages where ID!='$albumID' AND page_type='10' and adminID='$userID' order by title ASC");
		$num=mysql_num_rows($data2);
		if($num!='0'){
		echo'Move album to an other page:<br><select name="albumID">';
		echo'<option value="'.$albumID.'">Choose page</option>';
		while($info2=mysql_fetch_array($data2)){
		echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</option>';}
		echo'</select><P>';}
		else{ 
		echo'<input type="hidden" name="albumID" value="'.$albumID.'">';}
		echo'<input type="submit" name="editalbumnow" value="Make Changes to album">';
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
