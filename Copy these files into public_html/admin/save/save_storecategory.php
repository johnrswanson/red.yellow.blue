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
	 
	 
$deletestorecategory=$_GET['deletestorecategory'];
if (isset($deletestorecategory))
	{echo'<div style="width:100%; height:40px; color:#f00; font-size:20px; text-align:left;">';

	echo'Are you sure you want to delete that storecategory? <a href="?dstorecategory='.$deletestorecategory.'">Yes, I am sure. Delete it</a></div>';
	}

$dstorecategory=$_GET['dstorecategory'];
if (isset($dstorecategory))
	{$delete=mysql_query("delete from storecategory where ID='$dstorecategory' limit 1");
	echo'storecategory entry Deleted.'; 
	echo'<a href="../admin_new_storecategory.php?storecategoryID='.$dstorecategory.'">Go Back</a><P>';
	}

$deletestore=$_GET['deletestore'];if (isset($deletestore))
	{echo'<div style="width:100%; height:40px; color:#f00; font-size:20px; text-align:left;">';

	echo'Are you sure you want to delete that Product?<a href="?dstore='.$deletestore.'">Yes, I am sure. Delete it</a></div>';
	
	}

$dstore=$_GET['dstore'];
if (isset($dstore))
	{$delete=mysql_query("delete from store where ID='$dstore' limit 1");
	echo' category  Deleted.'; 
	echo'<a href="../admin_new_storecategory.php?">Go Back</a><P>';
	exit;
	}


$editstorecategorynow=$_POST['editstorecategorynow'];
if (isset($editstorecategorynow))
	{
	$title=addslashes($_POST['title']);
	$short_text=addslashes($_POST['short_text']);
	$newtext = str_replace("\r",'<br>',$_POST['text']);			
	$cleantext=addslashes($newtext);
	$storecategoryID=addslashes($_POST['storecategoryID']);
	$thisID=addslashes($_POST['thisID']);
	$tsrc="../img/storecategory/thumbs/".$userID."/".$_FILES[userfile][name]; 
	if ($_FILES[userfile][name]!='')
		{
		$add="../img/storecategory/".$userID."/".$_FILES[userfile][name];
		 if (!($_FILES[userfile][type] =="image/jpeg" ))
			 {
			echo "Your uploaded file must be of JPG. Other file types are not allowed<BR>";
			echo'<a href="admin_new_storecategory.php?storecategoryID='.$editbnow.'">Go Back</a><P>';
			exit;
			}
		
		echo $add;
		if(move_uploaded_file ($_FILES[userfile][tmp_name],$add))
			{
			//echo "<P>Successfully uploaded the storecategory<P>";
			chmod("$add",0777);$photo=$_FILES[userfile][name];list($width_orig, $height_orig) = getimagesize($add);$target=200;
			
			if ($width_orig < $height_orig)
				{$n_width = 200;$ratio=$target/$width_orig;$n_height=$height_orig*$ratio;}
			 else 
			 	{$n_height = 200;$ratio=$target/$height_orig;$n_width = $width_orig*$ratio;}
			 
			 if($_FILES[userfile][type]=="image/jpeg")
				{
				$im=ImageCreateFromJPEG($add); 
				$width=ImageSx($im); 
				$height=ImageSy($im);
				$newimage=imagecreatetruecolor($n_width,$n_height); 
				imageCopyResampled($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
				ImageJpeg($newimage,$tsrc);
				chmod("$tsrc",0777);
				}
				$photo=$_FILES[userfile][name];
				mysql_query("update storecategory set photo='$photo' where ID='$thisID' limit 1") or die (mysql_error());
			}
		
		else {echo "Failed to upload file. Contact Site admin to fix the problem";exit;}
		}
	
	$update=mysql_query("update storecategory set title= '$title' where ID='$thisID'");
	$update=mysql_query("update storecategory set text= '$cleantitle' where ID='$thisID'");
	
	if ($storecategoryID!='')
		{
		$update=mysql_query("update storecategory set storecategoryID= '$storecategoryID' where ID='$thisID'");
		}
	echo'<b> Changes Complete</b> ';echo'<a href="index.php?page='.$storecategoryID.'">Go Back<P>';

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
