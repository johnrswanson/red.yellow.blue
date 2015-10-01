<?include('../connect.php');
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
	 
	 


$dvideo=$_GET['deletevideo'];
if (isset($dvideo))
{$delete=mysql_query("delete from videos where ID='$dvideo' limit 1");
echo'Video Deleted';
//echo'<a href="admin_new_video.php?">Go Back</a><P>';
}


$editvideonow=$_POST['editvideonow'];
if (isset($editvideonow))
{
$title=addslashes($_POST['title']);
$short_text=addslashes($_POST['short_text']);
$text=addslashes($_POST['text']);$playlist=addslashes($_POST['playlist']);
$thisID=addslashes($_POST['thisID']);$tsrc="../img/video/thumbs/".$userID."/".$_FILES[userfile][name];
if ($_FILES[userfile][name]!=''){$add="../img/video/".$userID."/".$_FILES[userfile][name];
if (!($_FILES[userfile][type] =="image/jpeg" ))
{
echo "Your uploaded file must be of JPG. Other file types are not allowed<BR>";
exit;
}

//echo $add;
if(move_uploaded_file ($_FILES[userfile][tmp_name],$add))
{
//echo "<P>Successfully uploaded the Video<P>";
chmod("$add",0777);
$photo=$_FILES[userfile][name];
list($width_orig, $height_orig) = getimagesize($add);$target=200;
if ($width_orig < $height_orig){$n_width = 200;$ratio=$target/$width_orig;$n_height=$height_orig*$ratio;}
 else {$n_height = 200;$ratio=$target/$height_orig;$n_width = $width_orig*$ratio;}
if($_FILES[userfile][type]=="image/jpeg")
{$im=ImageCreateFromJPEG($add); 
$width=ImageSx($im);$height=ImageSy($im);
$newimage=imagecreatetruecolor($n_width,$n_height);
imageCopyResampled($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
ImageJpeg($newimage,$tsrc);
chmod("$tsrc",0777);}
$photo=$_FILES[userfile][name];

mysql_query("update videos set photo='$photo' where ID='$thisID' limit 1") or die (mysql_error());
}
else
{
echo "Failed to upload file. Contact Site admin to fix the problem";exit;
}
}

$update=mysql_query("update videos set title= '$title' where ID='$thisID'");
$update=mysql_query("update videos set text= '$text' where ID='$thisID'");
if($playlist!='')
{$update=mysql_query("update videos set playlist= '$playlist' where ID='$thisID'");
}echo'<b> Changes Complete</b> ';
echo'<a href="admin_new_video.php?videoID='.$playlist.'">Go Back</a><P>';

}
 	 }
	}
}

else // go to login
{
echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
}

	 ?>
