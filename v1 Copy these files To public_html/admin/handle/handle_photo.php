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
	 {$thisguy=$userID;
	 //////////ADMIN IS LOGGED IN
	 


$editphoto=$_GET['editphoto'];
if(isset($editphoto))
	{$data=mysql_query("select * from photos where ID='$editphoto' order by title ASC");
	while($info=mysql_fetch_array($data))
		{$title=stripslashes($info['title']);
		$paragraphs=str_replace("<br>",'',$info['text']);
		$oldtext = stripslashes($paragraphs);
		$gallery=stripslashes($info['gallery']);
		//echo'<a href="admin_new_photo.php?photoID='.$gallery.'">Go Back to Collection</a><P>';
			
		echo'<form method="post" ENCTYPE="multipart/form-data">';
		echo'<input style="float: right; min-width: 100px; " type="submit" name="editphotonow" value="Save">';
		echo'<p>Title:<input type="text" name="title" value="'.$title.'"></p>';
		//echo'<P>Replace photo...<br><INPUT NAME="userfile" TYPE="file"><br>';
		echo'<img src="/img/full/'.$info['photo'].'" width="200px"><br>';
		echo'<input type="hidden" name="thisID" value="'.$editphoto.'">';
		echo'<input type="hidden" name="gallery" value="'.$gallery.'">';
		echo'Text:<br><textarea name="text" rows="5" style="width: 100%">'.$oldtext.'</textarea><P>';
		//echo'<a href="admin_new_photo_subimage.php?imagephotoID='.$editphoto.'">+Add Photo</a><P>';
	
	
	/*
	///SUB PHOTOS
	$row='0';
	
	$data2=mysql_query("select * from sub_photos where photoID='$editphoto' order by photoorder ASC");
	while($info2=mysql_fetch_array($data2))
		{
		echo' <a href="index.php?deleteimagephoto='.$info2['ID'].'">[X]</a> <br><a href="index.php?editimagephoto='.$info2['ID'].'">';
		echo ''.stripslashes($info2['title']).'<br><img src="../img/imagephoto/thumbs/'.stripslashes($info2['photo']).'" width="100px">';
		echo'</a>';
		$row++;
		if($row=='4')
			{echo'<br>';$row='0';}
		
		}
		*/
	
	

		
		
		$data2=mysql_query("select * from pages where ID!='$gallery' AND page_type='2' order by title ASC");
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
		
		echo'</form>';
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
