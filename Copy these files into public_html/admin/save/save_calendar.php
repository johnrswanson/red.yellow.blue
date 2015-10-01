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
	 
	 

$deletecalendar=$_GET['deletecalendar'];
if (isset($deletecalendar)){
	echo'<div style="width:100%; height:40px; color:#f00; font-size:20px; text-align:left;">';

	echo'Are you sure you want to delete that calendar?
	 <a href="?dcalendat='.$deletecalendar.'">YES. DELETE IT</a>/div>';}
	$dcalendar=$_GET['dcalendar'];if (isset($dcalendar)){$delete=mysql_query("delete from calendar where ID='$dcalendar' limit 1");
	echo'Calendar Deleted';}


$editcalendarnow=$_POST['editcalendarnow'];
if (isset($editcalendarnow)){
$title=addslashes($_POST['title']);
$thisID=addslashes($_POST['thisID']);
$text=addslashes($_POST['text']);
$class=addslashes($_POST['class']);
$teacher=addslashes($_POST['teacher']);
$time=addslashes($_POST['time']);
$ampm=addslashes($_POST['ampm']);
$calendarID=addslashes($_POST['calendarID']);
$thisID=addslashes($_POST['thisID']);
$mydate=addslashes($_POST['mydate']);

/*
if ($_FILES[userfile][name]!='')
	{
	$add="../img/calendar/".$_FILES[userfile][name]; 
	if (!($_FILES[userfile][type] =="image/jpeg" )){
	echo "Your uploaded file must be of JPG. Other file types are not allowed<BR>";exit;}
	echo $add;if(move_uploaded_file ($_FILES[userfile][tmp_name],$add))
		{
		echo "<P>Successfully uploaded the calendar<P>";
		chmod("$add",0777);$photo=$_FILES[userfile][name];
		mysql_query("update calendar set photo='$photo' where ID='$fix' limit 1") or die (mysql_error());
		}
	else{echo "Failed to upload file. Contact Site admin to fix the problem";exit;}
	}

*/
if($title!=''){
	//echo $title;
$update=mysql_query("update calendar set title= '$title' where ID='$thisID'");}
if($mydate!=''){
	//echo $mydate;
$update=mysql_query("update calendar set date= '$mydate' where ID='$thisID'");}

//if($calendarID!='-')$update=mysql_query("update calendar set class= '$class' where ID='$thisID'");
//if($calendarID!='-')$update=mysql_query("update calendar set teacher= '$teacher' where ID='$thisID'");
//if($time!='-'){$update=mysql_query("update calendar set time= '$time' where ID='$thisID'");}
//if($ampm!='-'){$update=mysql_query("update calendar set ampm= '$ampm' where ID='$thisID'");}
if($calendarID!=''){$update=mysql_query("update calendar set calendarID= '$calendarID' where ID='$thisID'");}
echo'<b> Changes Complete</b> ';
echo'<a href="admin_new_calendar?calendarID='.$calendarID.'">Go Back</a><P>';
}

	 	 }
	}
}

else // go to login
{
echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';

}

	 ?>