<?include('connect.php');
if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	if ($pass != $info['password'])
	 	{ 	 	} 
	 else
		{
				 //////////ADMIN IS LOGGED IN
				 
echo'<table> <tr><td valign="top" style="padding:5px">';
$view=$_GET['page'];
$row='0';
if(isset($view))
	{
	echo'<div id="songcontentRight">Drag and drop to change order</div>';
	echo'<a href="admin_new_song.php">To upload a new song, Click Here<P>';
	$data=mysql_query("select * from song where songID='$view' order by songorder ASC");
	$count=mysql_num_rows($data);
	if($count=='0'){echo'You dont have any song on this page yet. <P>';}
	else {echo'  There are '.$count.' songs on this page.<br>'; }
	echo'<div id="songcontentLeft"><ul>';
	while($info=mysql_fetch_array($data))
		{
		echo'<li id="songArray_'.$info['ID'].'">';
		echo'<a href="?editsong='.$info['ID'].'"><img src="../img/song/thumbs/'.$info['photo'].'" style=" height:100px; float:left;';
		$path='../img/song/thumbs/'.$info['photo'].'';
		list($width_orig, $height_orig) = getimagesize($path);
		if ($width_orig >$height_orig)
		{echo'margin-left:-50px;';}
		echo'"><p style="width:200px; float:right;">'.$info['title'].'<a href="?editsong='.$info['ID'].'"><br>| edit</a> | <a href="?deletesong='.$info['ID'].'">delete</a> </p></li>';
		}
		echo'</ul></div>';
	}
	$data=mysql_query("select * from pages where ID='$view'");
	while($info=mysql_fetch_array($data))
		{
		$oldtitle=stripslashes($info['title']);
		$paragraphs=str_replace("<br>",'',$info['text']);
			$oldtext = stripslashes($paragraphs);	
			$subpage=stripslashes($info['subpage']);
		}
		
		
	echo'</td><td valign="top"><FORM ENCTYPE="multipart/form-data"  METHOD="POST">';echo'<INPUT TYPE="hidden" name="thisID" value="'.$view.'"><P>';
	echo'TITLE: <br><INPUT TYPE="text" name="title" value="'.$oldtitle.'"><P>';
	
	echo'<INPUT TYPE="hidden" name="thisID" value="'.$view.'"><P>';
	echo'Description of page:<br><textarea name="text" rows="20" cols="60">'.$oldtext.'</textarea><P></td><td valign="top">';
	
	
	echo'Subpage of <br>';
	echo'<select name="subpage"> <option value="'.$subpage.'">';
			if ($subpage=='main')
				{echo'Main Page';}
			

	else
				{
				$data4=mysql_query("select * from pages where ID='$subpage' ");
				while($info4=mysql_fetch_array($data4))
					{	
					echo$info4['title'];
					}
				}
			echo' </option>';
			
			echo'<option value="main">Main Page</option>';
			$data4=mysql_query("select * from pages where subpage='main' AND ID !='$thispageID' order by pageorder ASC");
			while($info4=mysql_fetch_array($data4))
				{
				echo'<option value="'.$info4['ID'].'"';
				echo'>'.stripslashes($info4['title']).'</option>';
				}
				
			echo'</select>';
	
	/*echo'Page Type<P>';
	$data2=mysql_query("select * from page_types where active ='y' order by ID ASC");
	while($info2=mysql_fetch_array($data2))
		{
		echo'<input type="radio" name="page_type" value="'.$info2['ID'].'" ';
		if($page_type==$info2['ID'])
			{echo' checked';}
	echo'>';
	echo stripslashes($info2['title']);
	echo'<br>';
		}
		*/
		
	echo'<b><P>Do you want to publish this page now?</b><br><input type="radio" name="published" value="y" ';
	if($published=='y'){echo' checked';}
	echo'>Yes<input type="radio" name="published" value="n"';
	if($published!='y')
		{echo' checked';}
	echo'>No';
	echo'<P><INPUT TYPE="submit" name="submit" VALUE="UPDATE this Page"></FORM></td></tr></table>';echo'</td></tr></table>';
 	 
 	 
 	 }
	}
}

else // go to login
{

}

	 ?>
