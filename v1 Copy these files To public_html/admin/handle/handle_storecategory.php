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
	 




$editstorecategory=$_GET['editstorecategory'];
if(isset($editstorecategory))
	{
	
	$data=mysql_query("select * from storecategory where ID='$editstorecategory' order by title ASC");
	while($info=mysql_fetch_array($data))
		{
		$thiscatID=$info['ID'];
		$title=stripslashes($info['title']);
		$paragraphs=str_replace("<br>",'',$info['text']);
			$oldtext = stripslashes($paragraphs);
		$storecategoryID=stripslashes($info['storecategoryID']);
		echo'<a href="?page='.$storecategoryID.'">Go Back</a><P>';
		echo'<table><tr><td valign="top">';
		//echo'<img src="../img/storecategory/'.$info['photo'].'" width="200px"><P>';
		echo'</td><td valign="top">';
		
		echo'<form method="post" ENCTYPE="multipart/form-data" >';
		//echo'<P><INPUT NAME="userfile" TYPE="file"><P>';
		echo'Shelf title:<P><input type="text" name="title" value="'.$title.'"><P>';
		echo'<input type="hidden" name="thisID" value="'.$editstorecategory.'"><P>';
		echo'Long Text : <br><textarea name="text" rows="10" cols="30">'.$oldtext.'</textarea><P>';
		echo'<input type="submit" name="editstorecategorynow" value="Make Changes to Shelf">';
		
		echo'</td><td valign="top">';
		echo'<a style="background:#00cccc; font-size: 20px; text-decoration:none;  padding:10px;   color:#fff;" href="admin_new_product.php?storeID='.$editstorecategory.'">+Add Product</a><P>';
		
		
		echo'<div id="storecontentRight">Drag and drop to change order</div>';
		echo'<div id="storecontentLeft"><ul>';
		$data2=mysql_query("select * from store where section='$thiscatID' order by storeorder ASC");
		while($info2=mysql_fetch_array($data2))
			{
			echo'<li id="storeArray_'.$info2['ID'].'">';
			echo' <a style="float: right; position: relative; top: 0px; right: 0px; color: #f00;" href="index.php?deletestore='.$info2['ID'].'">[X]</a>';
			echo'<img style="float: left; " src="../img/store/thumbs/'.stripslashes($info2['photo']).'" width="100px">';
		echo'<a  style="font-size: 20px; "href="index.php?editstore='.$info2['ID'].'">';
			echo ''.stripslashes($info2['title']).'';
			echo'</a></li>';
						}
		
		echo'</ul>';
		echo'</div>';

		
		/*$data2=mysql_query("select * from pages where page_type='7' AND ID!='$editstorecategory'  order by ID ASC");
		$num=mysql_num_rows($data2);
		if($num!='0')
			{
			echo'Move storecategory to an other collection:<br><select name="storecategoryID">';
			echo'<option value="'.$storecategoryID.'">Choose page</option>';
			while($info2=mysql_fetch_array($data2))
				{
				echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</option>';
				}
			echo'</select><P>';
			}
			else
				{ echo'<input type="hidden" name="storecategoryID" value="'.$storecategoryID.'">';}
				
				*/
				
				
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
