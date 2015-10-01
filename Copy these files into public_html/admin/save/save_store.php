<?include('../connect.php');
if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	if ($pass!= $info['password'])
	 	{
	 	} 
	 else
	 {
	 //////////ADMIN IS LOGGED IN
	 
	 
/*$deletestore=$_GET['deletestore'];
if (isset($deletestore)){
echo'<div style="width:100%; height:40px; color:#f00; font-size:20px; text-align:left;">';

echo'Are you sure you want to delete that store? <a href="?dstore='.$deletestore.'">YES. DELETE IT.</a></div>';}*/

$dstore=$_GET['deletestore'];
if (isset($dstore)){$delete=mysql_query("delete from store where ID='$dstore' limit 1");
echo'Product Has Been Deleted.';
//echo'<a href="/admin_new_store.php">Go Back</a><P>';
}



$dstorephoto=$_GET['deletestorephoto'];
if (isset($dstorephoto)){$delete=mysql_query("delete from store_photos where ID='$dstorephoto' limit 1");
echo'Product Photo Deleted. '; 
//echo'<a href="/admin_new_store.php">Go Back</a>';
}


$editstorenow=$_POST['editstorenow'];
if (isset($editstorenow))
	{
	$title=addslashes($_POST['title']);
	$newshorttext = str_replace("\r",'<br>',$_POST['short_text']);			
	$shorttext=addslashes($newshorttext);
	$newtext = str_replace("\r",'<br>',$_POST['text']);			
	$text=addslashes($newtext);
	$thisID=addslashes($_POST['thisID']);
	
	$update=mysql_query("update store set title= '$title' where ID='$thisID'");
	$update=mysql_query("update store set text= '$text' where ID='$thisID'");
		
	echo'<b> Changes Complete</b> ';

	}
	
	 	 }
	}
}

else // go to login
{
}

	 ?>
