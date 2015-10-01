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
	echo'<p><div id="albumcontentRight">Drag and drop to change order</div><p>';
	echo'<a href="admin_new_album.php?albumID='.$view.'">To upload a new album, Click Here<P>';
	$data=mysql_query("select * from album where albumID='$view' order by albumorder ASC");
	$count=mysql_num_rows($data);
	
	if($count=='0')
		{echo'<P>You dont have any album members on this page yet. <P>';}
	else 
		{echo'  <P>There are '.$count.' albums on this page.<p>'; }
	
	
	echo'<div id="albumcontentLeft"><ul>';
	while($info=mysql_fetch_array($data))
		{
		echo'<li id="albumArray_'.$info['ID'].'">';
		echo'<a href="?editalbum='.$info['ID'].'"><img src="../img/album/thumbs/'.$userID.'/'.$info['photo'].'" style=" height:100px; float:left;';
		$path='../img/album/thumbs/'.$userID.'/'.$info['photo'].'';
		
		list($width_orig, $height_orig) = getimagesize($path);
		if ($width_orig >$height_orig)
		{echo'margin-left:-50px;';}
		
		echo'"><p style=" width:240px; float:right;">'.$info['title'].'<a href="?editalbum='.$info['ID'].'"><br>| edit</a>| <a href="?deletealbum='.$info['ID'].'">delete</a> </p></li>';
		}
	
	echo'</ul></div>';
	}
$data=mysql_query("select * from pages where ID='$view'");

while($info=mysql_fetch_array($data))
	{$thispageID=stripslashes($info['ID']);
	$oldtitle=stripslashes($info['title']);
	$paragraphs=str_replace("<br>",'',$info['text']);
	$oldtext = stripslashes($paragraphs);
	}
echo'</td><td valign="top"><FORM ENCTYPE="multipart/form-data"  METHOD="POST">';

echo'<INPUT TYPE="hidden" name="thisID" value="'.$view.'"><P>';
echo'TITLE: <br><INPUT TYPE="text" name="title" value="'.$oldtitle.'"><P>';
echo'urltext<br><INPUT TYPE="text" name="urltext" value="'.$oldurltext.'"><P>';

echo'<INPUT TYPE="hidden" name="thisID" value="'.$view.'"><P>';

echo'Description of page:<br>
<textarea name="text" rows="20" cols="80">'.$oldtext.'</textarea><P>';

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
					{	
					echo$info4['title'];
					}
				}
			echo' </option>';
			
			echo'<option value="main">Main Page</option>';
			$data4=mysql_query("select * from pages where subpage='main' AND ID !='$thispageID' and adminID='$userID' order by pageorder ASC");
			while($info4=mysql_fetch_array($data4))
				{
				echo'<option value="'.$info4['ID'].'"';
				echo'>'.stripslashes($info4['title']).'</option>';
				}
				
			echo'</select>';
		
		
/*
echo'Page Type<P>';
$data2=mysql_query("select * from page_types where active ='y' order by ID ASC");
while($info2=mysql_fetch_array($data2))
	{
		echo'<input type="radio" name="page_type" value="'.$info2['ID'].'" ';
		if($page_type==$info2['ID'])
			{echo' checked';}
		echo'>';
		echo stripslashes($info2['title']);echo'<br>';
	}

*/
echo'<b><P>Publish now?</b><br><input type="radio" name="published" value="y" ';
if($published=='y')
	{echo' checked';}
echo'>Yes<input type="radio" name="published" value="n"';
if($published!='y')
	{echo' checked';}
echo'>No';
echo'<P><INPUT TYPE="submit" name="submit" VALUE="UPDATE this Page"></FORM></td></tr></table>';echo'</td></tr></table>';

	 
	 	 }
	}
}

else // go to login
{
echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
exit;
}

	 ?>
