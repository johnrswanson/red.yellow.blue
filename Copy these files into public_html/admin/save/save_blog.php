<?include('../connect.php');
if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	if ($pass!= $info['password'])
	 	{ echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
	 	} 
	 else
	 {
	 //////////ADMIN IS LOGGED IN
	 
	 
/*$deleteblog=$_GET['deleteblog'];
if (isset($deleteblog)){
echo'<div style="width:100%; height:40px; color:#f00; font-size:20px; text-align:left;">';

echo'Are you sure you want to delete that blog? <a href="?dblog='.$deleteblog.'">YES. DELETE IT.</a></div>';}*/

$dblog=$_GET['deleteblog'];
if (isset($dblog)){$delete=mysql_query("delete from blog where ID='$dblog' limit 1");
echo'Blog entry Deleted.'; 
//echo'<a href="/admin_new_blog.php">Go Back</a><P>';
}



$dblogphoto=$_GET['deleteblogphoto'];
if (isset($dblogphoto)){$delete=mysql_query("delete from blog_photos where ID='$dblogphoto' limit 1");
echo'Blog Photo Deleted. '; 
//echo'<a href="/admin_new_blog.php">Go Back</a>';
}


$editblognow=$_POST['editblognow'];
if (isset($editblognow))
	{
	$title=addslashes($_POST['title']);
	$newshorttext = str_replace("\r",'<br>',$_POST['short_text']);			
	$shorttext=addslashes($newshorttext);
	$newtext = str_replace("\r",'<br>',$_POST['text']);			
	$text=addslashes($newtext);
	$thisID=addslashes($_POST['thisID']);
	
	$update=mysql_query("update blog set title= '$title' where ID='$thisID'");
	$update=mysql_query("update blog set text= '$text' where ID='$thisID'");
		
	echo'<b> Changes Complete</b> ';

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
