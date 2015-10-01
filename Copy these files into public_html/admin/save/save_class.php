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
	 
	 
	 
$deleteclass=$_GET['deleteclass'];
if (isset($deleteclass))
	{echo'<div style="width:100%; height:40px; color:#f00; font-size:20px; text-align:left;">';

	echo'Are you sure you want to delete that class? <a href="?db='.$deleteclass.'">YES. DELETE IT.</a></div>';
	
	}
$db=$_GET['db'];
if (isset($db))
	{
	$delete=mysql_query("delete from class where ID='$db' limit 1");
	echo'Class entry Deleted';
	
	}

$editclassnow=$_POST['editclassnow'];

if (isset($editclassnow))
	{
	$title=addslashes($_POST['title']);
	$email=addslashes($_POST['email']);
	$phone=addslashes($_POST['phone']);
	$password=addslashes($_POST['password']);
	$newtext = str_replace("\r",'<br>',$_POST['text']);			
	$cleantext=addslashes($newtext);
	$classID=addslashes($_POST['classID']);
	$thisID=addslashes($_POST['thisID']);
	$tsrc="../img/class/thumbs/".$_FILES[userfile][name]; 
	if ($_FILES[userfile][name]!='')
		{
		$add="../img/class/".$_FILES[userfile][name];
		 if (!($_FILES[userfile][type] =="image/jpeg" ))
			 {
			echo "Your uploaded file must be of JPG. Other file types are not allowed<BR>";
			exit;
			}
		echo $add;
		if(move_uploaded_file ($_FILES[userfile][tmp_name],$add))
			{
			echo "<P>Successfully uploaded the class<P>";chmod("$add",0777);
			$photo=$_FILES[userfile][name];
			list($width_orig, $height_orig) = getimagesize($add);
			$target=200;
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
			mysql_query("update class set photo='$photo' where ID='$thisID' limit 1") 
			or die (mysql_error());
			}
		else
			{
			echo "Failed to upload file. Contact Site admin to fix the problem";
			exit;
			}
		}
	
	$update=mysql_query("update class set title= '$title' where ID='$thisID'");
	$update=mysql_query("update class set text= '$cleantext' where ID='$thisID'");
	
	if ($classID!='')
		{$update=mysql_query("update class set classID= '$classID' where ID='$thisID'");}
	
	echo'<b> Changes Complete</b> ';
	echo'<a href="admin_new_class.php?classID='.$classID.'">Go Back<P>';
	
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

