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
	 


$editstore=$_GET['editstore'];
if(isset($editstore))
	{
	$data=mysql_query("select * from store where ID='$editstore' order by title ASC");
	while($info=mysql_fetch_array($data))
		{
		$title=stripslashes($info['title']);
		$paragraphs=str_replace("<br>",'',$info['text']);
					$oldtext = stripslashes($paragraphs);
					
		$buybutton=stripslashes($info['buybutton']);
		$price=stripslashes($info['price']);
		$section=stripslashes($info['section']);
		$inventory=stripslashes($info['inventory']);
		echo'<a href="admin_new_product.php?storeID='.$section.'">Go Back to Collection</a><P>';
		echo'<table><tr><td valign="top"><img src="../img/store/'.$userID.'/'.$info['photo'].'" width="200px"><P>';
		echo'</td> <td width="20px"></td><td valign="top">';
		echo'<form method="post">';
		echo'Product title:<P><input type="text" name="title" value="'.$title.'"><P>';
		echo'Price<br>$<input type="text" name="price" value="'.$price.'"><P>';
		echo'Inventory<br><input type="text" name="inventory" value="'.$inventory.'"><P>';
		echo'<input type="hidden" name="thisID" value="'.$editstore.'"><P>';
		echo'Custom Buy Button <br> (leave blank unless you have created your own custom paypal cart buttons) <br><textarea name="buybutton" rows="20" cols="80">'.$buybutton.'</textarea>';
		
		echo'Description: <br><textarea name="text" rows="20" cols="80">'.$oldtext.'</textarea><P>';
		
		/*$data2=mysql_query("select * from storecategory where ID!='$section' order by title ASC");
		$num=mysql_num_rows($data2);
		if($num!='0')
			{
			echo'Move Product to an other Section:<br><select name="section">';
			echo'<option value="'.$section.'">Choose Section</option>';
			while($info2=mysql_fetch_array($data2)){
			echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</a>';}
			echo'</select><P>';
			}
		else
			{ 
			echo'<input type="hidden" name="section" value="'.$section.'">';
			}*/
			
		echo'<input type="submit" name="editstnow" value="Make Changes to Product">';
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
