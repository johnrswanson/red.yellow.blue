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
	 
	


$editcalendar=$_GET['editcalendar'];
if(isset($editcalendar))
	{$data=mysql_query("select * from calendar where ID='$editcalendar' order by title ASC");
	while($info=mysql_fetch_array($data))
		{$title=stripslashes($info['title']);
		$text=stripslashes($info['text']);
		$mydate=stripslashes($info['date']);
		$calendarID=stripslashes($info['calendarID']);
		echo'<a href="?page='.$calendarID.'">Go Back to Calendar</a><P>';
		
		echo'<table><tr><td valign="top">';
		//echo'<img src="../img/calendar/'.$info['photo'].'" width="300px"><P>';
		echo'</td> <td width="20px"></td><td valign="top">';
		
		echo'<form method="post">';
		//echo'<P><INPUT NAME="userfile" TYPE="file"><P>';
		echo'Title:<P><input type="text" name="title" value="'.$title.'"><P>';
		echo'<input type="hidden" name="calendarID" value="'.$calendarID.'"><P>';
		echo'<input type="hidden" name="thisID" value="'.$editcalendar.'"><P>';
		
		//echo'Long Text : <br><textarea name="text" rows="15" cols="30">'.$text.'</textarea><P>';
		echo'Date:<select name="mydate">';
		echo'<option value="">'.$mydate.'</option>';
		$today=date(Y).'-'.date(m).'-'.date(d);
		$mdate=strtotime($today);
		for ($i=1; $i<360; $i++)
			{$numdate=date("Y-m-d", $mdate);
			$textdate = date("D M j Y", $mdate);
		echo'<option value="'.$numdate.'">'.$textdate.'</option>';
		$mdate=$mdate+86400;}
		echo'</select>';
		
		/*
		echo'Change Time:<select name="time">
		<option value="">-</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		
		</select>';
		
		echo':<select name="ampm">
		<option value="">-</option>
		<option value="am">AM</option>
		<option value="pm">AM</option>
		</select>';
		
		
		echo'Change Teacher to :
		<select name="teacher">';
		echo' <option value="-">-</option>';
		$data2=mysql_query("select * from staff order by title ASC");
		while($info2=mysql_fetch_array($data2)){echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</option>';}
		
		echo'</select><P>';
		
		echo'Class:<select name="class">';
		echo' <option value="-">-</option>';
		$data2=mysql_query("select * from class order by title ASC");
		while($info2=mysql_fetch_array($data2)){echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</option>';}
		
		echo'</select>';*/
		
		
		$data2=mysql_query("select * from pages where ID!='$calendarID' AND page_type='5' order by title ASC");
		$num=mysql_num_rows($data2);
		if($num>'1'){
		echo'<P>Move event to an other calendar:<br><select name="calendarID">';
		echo'<option value="'.$info['calendarID'].'">Choose page</option>';
		while($info2=mysql_fetch_array($data2)){echo'<option value="'.$info2['ID'].'">'.stripslashes($info2['title']).'</option>';}
		echo'</select><P>';}
		
		echo'<input type="submit" name="editcalendarnow" value="Make Changes to calendar">';
		echo'</form></td></tr></table>';}exit;}
		
		 
	 	 }
	}
}

else // go to login
{
echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
exit;
}

	 ?>
