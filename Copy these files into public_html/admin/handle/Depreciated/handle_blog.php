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
	 
	 
$editblog=$_GET['editblog'];
if(isset($editblog))
	{
	$data=mysql_query("select * from blog where ID='$editblog' order by title ASC");
	while($info=mysql_fetch_array($data))	
	{$title=stripslashes($info['title']);
	$paragraphs=str_replace("<br>",'',$info['text']);
			$oldtext = stripslashes($paragraphs);
			
			$shortparagraphs=str_replace("<br>",'',$info['short_text']);
			$oldshorttext = stripslashes($shortparagraphs);
			
	$blogID=stripslashes($info['blogID']);
	echo'<a href="?page='.$blogID.'">Go Back to Collection</a><P>';
	echo'<table><tr><td valign="top">';
	
	echo'<form method="post" ENCTYPE="multipart/form-data" >';
	echo'<P><INPUT NAME="userfile" TYPE="file"><P><img src="../img/blog/'.$userID.'/'.$info['photo'].'" width="200px"><P>';
	
	echo'</td> <td width="20px"></td><td valign="top"  width="100%">';
	
	echo'blog title:<P><input type="text" name="title" value="'.$title.'"><P>';
	echo'<input type="hidden" name="thisID" value="'.$editblog.'"><P>';
	echo'Your Text : <br><textarea name="text" rows="20" cols="60">'.$oldtext.'</textarea><P>';
	//echo'Short Text : <br><textarea name="short_text" rows="12" cols="60">'.$oldshorttext.'</textarea><P>';
	
	echo'<a href="admin_new_blogphoto.php?blogphotoID='.$editblog.'">+Add Photo</a><P>';
	
	echo'<table><tr>';
	$row='0';
	
	$data2=mysql_query("select * from blog_photos where blogID='$editblog' order by photoorder ASC");
	while($info2=mysql_fetch_array($data2))
		{echo'<td> ';
		echo' <a href="index.php?deleteblogphoto='.$info2['ID'].'">[X]</a> <br><a href="index.php?editblogphoto='.$info2['ID'].'">';
		echo ''.stripslashes($info2['title']).'<br><img src="../img/blog/thumbs/'.$userID.'/'.stripslashes($info2['photo']).'" width="100px">';
		echo'</a></td>';
		$row++;
		if($row=='4')
			{echo'</tr><tr>';$row='0';}
		
		}
	
	echo'</tr></table>';
	
	$data2=mysql_query("select * from pages where ID!='$blogID' AND page_type='3' and adminID='$userID'  order by title ASC");
	$num=mysql_num_rows($data2);
	if($num!='0')
		{
		echo'Move blog to an other collection:<br><select name="blogID">';
		echo'<option value="'.$blogID.'">Choose page</option>';
		while($info2=mysql_fetch_array($data2))
			{
			echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</option>';
			}
		echo'</select><P>';
		}
	else
		{
		echo'<input type="hidden" name="blogID" value="'.$blogID.'">';
		
		}
		echo'<input type="submit" name="editblognow" value="Make Changes to blog">';
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
