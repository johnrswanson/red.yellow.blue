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
	 


$editphoto=$_GET['editphoto'];
if(isset($editphoto))
	{$data=mysql_query("select * from photos where ID='$editphoto' order by title ASC");
	while($info=mysql_fetch_array($data))
		{$title=stripslashes($info['title']);
		$paragraphs=str_replace("<br>",'',$info['text']);
		$oldtext = stripslashes($paragraphs);
		$gallery=stripslashes($info['gallery']);
		echo'<a href="admin_new_photo.php?photoID='.$gallery.'">Go Back to Collection</a><P>';
		echo'<table><tr><td valign="top">';
	
		echo'<form method="post" ENCTYPE="multipart/form-data">';
	echo'<P><INPUT NAME="userfile" TYPE="file"><P>
	<img src="../img/full/'.$userID.'/'.$info['photo'].'" width="300px"><P>';
	
		echo'</td> <td width="20px"></td><td valign="top">';
			echo'Photo title:<P><input type="text" name="title" value="'.$title.'"><P>';
		echo'<input type="hidden" name="thisID" value="'.$editphoto.'"><P>';
		echo'Long Text : <br><textarea name="text" rows="20" cols="60">'.$oldtext.'</textarea><P>';
		
		
		echo'<a href="admin_new_photo_subimage.php?imagephotoID='.$editphoto.'">+Add Photo</a><P>';
	
	echo'<table><tr>';
	$row='0';
	
	$data2=mysql_query("select * from sub_photos where photoID='$editphoto' order by photoorder ASC");
	while($info2=mysql_fetch_array($data2))
		{echo'<td> ';
		echo' <a href="index.php?deleteimagephoto='.$info2['ID'].'">[X]</a> <br><a href="index.php?editimagephoto='.$info2['ID'].'">';
		echo ''.stripslashes($info2['title']).'<br><img src="../img/imagephoto/thumbs/'.$userID.'/'.stripslashes($info2['photo']).'" width="100px">';
		echo'</a></td>';
		$row++;
		if($row=='4')
			{echo'</tr><tr>';$row='0';}
		
		}
	
	echo'</tr></table>';

		
		
		$data2=mysql_query("select * from pages where ID!='$gallery' AND page_type='2' and adminID='$userID' order by title ASC");
		$num=mysql_num_rows($data2);
		if($num!='0')
			{
			echo'Move photo to an other collection:<br><select name="gallery">';
			echo'<option value="'.$gallery.'">Choose collection</a>';
			while($info2=mysql_fetch_array($data2))
				{
				echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</a>';
				}
			echo'</select><P>';
			}
		else
		{ echo'<input type="hidden" name="gallery" value="'.$gallery.'">';}
		echo'<input type="submit" name="editphotonow" value="Make Changes to Photo">';
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
