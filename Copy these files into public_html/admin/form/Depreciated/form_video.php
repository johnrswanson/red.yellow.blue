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
				 
echo'<table> <tr><td valign="top" style="padding:5px">';
$view=$_GET['page'];
$row='0';
if(isset($view))
	{
	echo'<div id="videocontentRight">Drag and drop to change order</div>';
	$data=mysql_query("select * from videos where playlist='$view' order by videoorder asc");
	$count=mysql_num_rows($data);
	
	if($count=='0')
		{echo'<P>You dont have any videos on this page yet.<P>';}
	else 
		{echo'  <P>Videos on this page: '.$count.' <br>';}
		
	echo'<a href="admin_new_video.php?videoID='.$view.'">To upload a new Video Click Here</a>';
	echo'<div id="videocontentLeft"><ul>';
	while($info=mysql_fetch_array($data))	
		{
		echo'<li id="videoArray_'.$info['ID'].'">';
		echo'<a href="?editvideo='.$info['ID'].'"><img src="../img/video/thumbs/'.$userID.'/'.$info['photo'].'"style=" height:100px; float:left; overflow:hidden; ';
		$path='../img/video/thumbs/'.$userID.'/'.$info['photo'].'';
		list($width_orig, $height_orig) = getimagesize($path);
		
		if ($width_orig >$height_orig)
			{echo'margin-left:-10px;';}
			
		echo'"><p style="float:left; width:200px;">'.stripslashes($info['title']).' <br> | edit </a> | <a href="?deletevideo='.$info['ID'].'">delete</a> |</P>';
		}
	echo'</ul></div>';
	}
echo'</td><td valign="top"><FORM ENCTYPE="multipart/form-data"  METHOD="POST">';echo'<INPUT TYPE="hidden" name="thisID" value="'.$page.'"><P>';
echo'<P>TITLE:<br>';echo'<INPUT TYPE="text" name="title" value="'.$oldtitle.'"><P>';
echo'urltext<br><INPUT TYPE="text" name="urltext" value="'.$oldurltext.'"><P>';

echo'<INPUT TYPE="hidden" name="thisID" value="'.$page.'"><P>';
echo'Description of page:<br><textarea name="text" rows="20" cols="60">'.$oldtext.'</textarea><P>';


$data2=mysql_query("select * from page_types where ID ='$page_type' order by ID ASC");
			while($info2=mysql_fetch_array($data2))
				{
				$styles=$info2['styles'];
				
								
		
				echo'<table><tr>';
		
			for($i=0; $i < $styles; $i++)
				{echo'<td margin="10px">';
				$j=$i+'1';
				echo'<img src="./admin_img/'.$info2['title'].''.$j.'.jpg" height="100px"><br>';
				echo'<input type="radio" name="page_style" value="'.$j.'" ';
				
				if($page_style==$j){echo 'checked';}
				
				echo'>Layout '.$j.'';
				echo'</td>';}
				echo'</tr></table>';
	
				}
echo'</td><td valign="top">';

echo'Subpage of <br>';
			echo'<select name="subpage"> <option value="'.$subpage.'">';
			if ($subpage=='main')
				{echo'Main Page';}
			
			else
				{
				$data4=mysql_query("select * from pages where ID='$subpage' and adminID='$userID' ");
				while($info4=mysql_fetch_array($data4))
					{	$thispageID=stripslashes($info4['ID']);
					echo $info4['title'];
					}
				}
			echo' </option>
			
			<option value="main">Main Page</option>';
			$data4=mysql_query("select * from pages where subpage='main' AND ID!='$thispageID' and adminID='$userID' order by pageorder ASC");
			while($info4=mysql_fetch_array($data4))
				{
				echo'<option value="'.$info4['ID'].'"';
				echo'>'.stripslashes($info4['title']).'</option>';
				}
			echo'</select>';
		


	echo'<b><P>Do you want to publish this page now?<br></b><input type="radio" name="published" value="y" ';
	if($published=='y')
		{echo' checked';}
	echo'>Yes<input type="radio" name="published" value="n"';
	if($published!='y')
		{echo' checked';}
	echo'>No';
	echo'<P><INPUT TYPE="submit" name="submit" VALUE="UPDATE this Video"></FORM></td></tr></table>';
echo'</td></tr></table>';
 	 
 	 
 	 }
	}
}

else // go to login
{
echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
exit;
}

	 ?>
