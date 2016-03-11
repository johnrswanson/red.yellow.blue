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
	 
	 
$editmagazine=$_GET['editmagazine'];
if(isset($editmagazine))
	{
	$data=mysql_query("select * from magazine where ID='$editmagazine' order by title ASC");
	while($info=mysql_fetch_array($data))	
	{$title=stripslashes($info['title']);
	$paragraphs=str_replace("<br>",'',$info['text']);
			$oldtext = stripslashes($paragraphs);
			
			$shortparagraphs=str_replace("<br>",'',$info['short_text']);
			$oldshorttext = stripslashes($shortparagraphs);
			
	$magazineID=stripslashes($info['magazineID']);
	echo'<a href="?page='.$magazineID.'">Go Back to Collection</a><P>';
	echo'<div style="float:left; width:500px">';
	
	echo'<form method="post" ENCTYPE="multipart/form-data" >';
	//echo'<P><INPUT NAME="userfile" TYPE="file"><P><img src="../img/magazine/'.$info['photo'].'" width="200px"><P>';
	
	echo'Title:<input type="text" name="title" value="'.$title.'"><P>';
	echo'<input type="hidden" name="thisID" value="'.$editmagazine.'"><P>';
	echo'Short Text : <br><textarea name="short_text" rows="12" cols="60">'.$oldshorttext.'</textarea><P>';
	
	echo'Long Text : <br><textarea name="text" rows="20" cols="60">'.$oldtext.'</textarea><P>';
	
	echo'</div> <div style="float:left; ">';
	
	echo'<a  style="padding:10px; background:#00cccc; color:#fff; text-decoration:none; font-size: 20px;  " href="admin_new_magazinephoto.php?magazinephotoID='.$editmagazine.'">+ Add Photos</a><P>';
	
	
	$row='0';
	echo'<div id="magazinephotocontentRight">Drag and drop to change order</div>';
	echo'<div id="magazinephotocontentLeft"><ul>';
	$data2=mysql_query("select * from magazine_photos where magazineID='$editmagazine' order by photoorder ASC");
	while($info2=mysql_fetch_array($data2))
		{echo'<li id="magazinephotoArray_'.$info['ID'].'">';
				echo' <a style="margin-top:0px; z-index:1; background:#f00; padding-left:5px; text-decoration:none;  padding-right:5px;  padding-top:3px; float:left;  border-radius:3px;  color:#fff;" href="index.php?deletemagazinephoto='.$info2['ID'].'">X</a>
		<a href="index.php?editmagazinephoto='.$info2['ID'].'">';
		echo ''.stripslashes($info2['title']).'<br><img style="z-index:10; width:120px; height:100px;  margin-top:0px;" src="../img/magazine/thumbs/'.stripslashes($info2['photo']).'" width="150px">';
		echo'</a></li>';
		
		}
	echo'</ul></div>';
	echo'</div><div style="float:right; width:200px; ">';
	
	$data2=mysql_query("select * from pages where ID!='$magazineID' AND page_type='3' order by title ASC");
	$num=mysql_num_rows($data2);
	if($num!='0')
		{
		echo'Move magazine to an other collection:<br><select name="magazineID">';
		echo'<option value="'.$magazineID.'">Choose page</option>';
		while($info2=mysql_fetch_array($data2))
			{
			echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</option>';
			}
		echo'</select><P>';
		}
	else
		{
		echo'<input type="hidden" name="magazineID" value="'.$magazineID.'">';
		}
		echo'<input type="submit" name="editmagazinenow" value="Make Changes to magazine">';
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
