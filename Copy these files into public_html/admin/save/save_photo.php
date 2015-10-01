
<?
include('../connect.php');




$deleteimagephoto=$_GET['deleteimagephoto'];
if (isset($deleteimagephoto))
	{echo'<div style="width:100%; height:40px; color:#f00; font-size:20px; text-align:left;">';
	echo'Are you sure you want to delete that SUB-Photo? <a href="?dimagephoto='.$deleteimagephoto.'">
	YES. DELETE IT</a></div>';
	
	}

$dimagephoto=$_GET['dimagephoto'];
if (isset($dimagephoto)){
	$delete=mysql_query("delete from sub_photos where ID='$dimagephoto' limit 1");
echo'SUB-Photo Deleted.'; 
echo'<a href="admin_new_photo.php"></a><P>';
}

 
$deletephoto=$_GET['deletephoto'];
if (isset($deletephoto))
{
	$delete=mysql_query("delete from photos where ID='$deletephoto' limit 1")or die(mysql_error());
	echo'Photo Deleted';
	echo' <a href="">Reload Gallery</a><P>';
	}

$editphotonow=$_POST['editphotonow'];

if (isset($editphotonow))
	{$title=addslashes($_POST['title']);
	$short_text=addslashes($_POST['short_text']);
	$newtext = str_replace("\r",'<br>',$_POST['text']);			
	$cleantext=addslashes($newtext);
	$gallery=addslashes($_POST['gallery']);$thisID=addslashes($_POST['thisID']);
	
		$tsrc="../img/thumbs/".$userID."/".$_FILES[userfile][name]; 
	if ($_FILES[userfile][name]!='')
		{
		$add="../img/full/".$userID."/".$_FILES[userfile][name];
		 if (!($_FILES[userfile][type] =="image/jpeg" ))
			{
			echo "Your uploaded file must be of JPG. Other file types are not allowed<BR>";
			echo'<a href="admin_new_photo.php?photoID='.$editbnow.'">Go Back</a><P>';
			exit;}
		
		//echo $add;
		if(move_uploaded_file ($_FILES[userfile][tmp_name],$add))
				{
				//echo "<P>Successfully uploaded the blog<P>";
				chmod("$add",0777);$photo=$_FILES[userfile][name];
				list($width_orig, $height_orig) = getimagesize($add);$target=200;
				if ($width_orig < $height_orig){$n_width = 200;
				$ratio=$target/$width_orig;$n_height=$height_orig*$ratio;} 
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
				mysql_query("update photos set photo='$photo' where ID='$thisID' limit 1") or die (mysql_error());
				}
		else
			{echo "Failed to upload file. Contact Site admin to fix the problem";
			exit;
			}
		}
	
	$update=mysql_query("update photos set title= '$title' where ID='$thisID'");
	$update=mysql_query("update photos set text= '$cleantext' where ID='$thisID'");
	if($gallery!=''){$update=mysql_query("update photos set gallery= '$gallery' where ID='$thisID'");}
	echo'<b> Changes Complete</b> ';
	echo'<a href="./admin_new_photo.php?photoID='.$gallery.'">Go Back</a><P>';
	}

