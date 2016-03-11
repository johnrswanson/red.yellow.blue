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
	 
	 
$deletesong=$_GET['deletesong'];
if (isset($deletesong))
	{echo'<div style="width:100%; height:40px; color:#f00; font-size:20px; text-align:left;">';

	echo'Are you sure you want to delete that song? <a href="?db='.$deletesong.'">YES. DELETE IT</a></div>';
	
	}
$dsong=$_GET['dsong'];
if (isset($dsong))
	{
	$delete=mysql_query("delete from song where ID='$db' limit 1");
	echo'Song Deleted';
	
	}

$editsongnow=$_POST['editsongnow'];

if (isset($editsongnow))
	{
	$title=addslashes($_POST['title']);
	$newtext = str_replace("\r",'<br>',$_POST['text']);			
		$cleantext=addslashes($newtext);
	$songID=addslashes($_POST['songID']);
	$thisID=addslashes($_POST['thisID']);
	$tsrc="../img/song/thumbs/".$userID."/".$_FILES[userfile][name]; 
	if ($_FILES[userfile][name]!='')
		{
		$add="../img/song/".$userID."/".$_FILES[userfile][name];
		 if (!($_FILES[userfile][type] =="audio/mp3" )){
		echo "Your uploaded file must be Mp3 audio. Other file types are not allowed<BR>";
		exit;}
		//echo $add;
		if(move_uploaded_file ($_FILES[userfile][tmp_name],$add)){
		//echo "<P>Successfully uploaded the song<P>";
		chmod("$add",0777);$mp3=$_FILES[userfile][name];
		mysql_query("update song set filename='$mp3' where ID='$thisID' limit 1") or die (mysql_error());}
		else
			{
			echo "Failed to upload file. Contact Site admin to fix the problem";exit;
			}
		}
	
	$update=mysql_query("update song set title= '$title' where ID='$thisID'");
	$update=mysql_query("update song set text= '$cleantext' where ID='$thisID'");
	if ($songID!=''){$update=mysql_query("update song set songID= '$songID' where ID='$thisID'");}
	
	echo'<b> Changes Complete</b> ';
	echo'<a href="index.php?editalbum='.$songID.'">Go Back<P>';

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
