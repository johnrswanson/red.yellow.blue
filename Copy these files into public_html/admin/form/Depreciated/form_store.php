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
				 
echo'<table> <tr> <td valign="top" style="padding:5px">';
$view=$_GET['page'];
$row='0';
if(isset($view))
	{
	echo'<P><div id="storecategorycontentRight">Drag and drop storecategory to change order</div><p>';
	$data=mysql_query("select * from storecategory where storecategoryID='$view' order by storecategoryorder ASC");$count=mysql_num_rows($data);
	if($count=='0')
		{echo'<P>You dont have any product categories on this page yet. <P>';}
	else 
		{echo'<P> There are '.$count.' product categories in this section<P>';}
		
	echo'<a href="admin_new_storecategory.php?storecategoryID='.$view.'">To upload a new Product Category, Click Here</a><P>';echo'<div id="storecategorycontentLeft"><ul>';
	while($info=mysql_fetch_array($data))
		{
		echo'<li id="storecategoryArray_'.$info['ID'].'"><a href="?editstorecategory='.$info['ID'].'"><img  src="../img/storecategory/thumbs/'.$userID.'/'.$info['photo'].'"style=" height:100px; width:100px; float:left;overflow:hidden';
		$path='../img/thumbs/'.$userID.'/'.$info['photo'].'';
		list($width_orig, $height_orig) = getimagesize($path);
		if ($width_orig >$height_orig){echo'margin-left:-50px;';}
		echo' "><p style="width:200px; float:right;">'.stripslashes($info['title']).'- <br>| edit | </a><a href="?deletestorecategory='.$info['ID'].'">delete</a></p></li>';
		}
	echo'</ul>';echo'</div>';
	}
echo'</td><td valign="top"><FORM ENCTYPE="multipart/form-data"  METHOD="POST" >';
echo'<INPUT TYPE="hidden" name="thisID" value="'.$view.'"><P>';
echo'TITLE<br><INPUT TYPE="text" name="title" value="'.$oldtitle.'"><P>';
echo'urltext<br><INPUT TYPE="text" name="urltext" value="'.$oldurltext.'"><P>';

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
echo'<select name="subpage"> <option value="'.$subpage.' and adminID='$userID' ">';
			if ($subpage=='main')
				{echo'Main Page';}
			

echo' <option value="">-</option><option value="main">Main Page</option>';

$data4=mysql_query("select * from pages where subpage='main' and ID !='$view' and adminID='$userID' order by pageorder ASC");
while($info4=mysql_fetch_array($data4))
	{
	echo'<option value="'.$info4['ID'].'"';
	echo'>'.stripslashes($info4['title']).'</option>';
	}
echo'</select><br>(set to - to leave this alone)<P>';

/*
echo'Page Type<P>';
$data2=mysql_query("select * from page_types where active ='y' order by ID ASC");
while($info2=mysql_fetch_array($data2))
	{
	echo'<input type="radio" name="page_type" value="'.$info2['ID'].'" ';
	if($page_type==$info2['ID'])
		{echo' checked';}	
	echo'>';
	echo stripslashes($info2['title']);
	echo'<br>';
	}
	*/
echo'<b><P>Do you want to publish this page now?</b><br><input type="radio" name="published" value="y" ';
if($published=='y')
	{echo' checked';}
echo'>Yes<input type="radio" name="published" value="n"';
if($published!='y')
	{echo' checked';}
echo'>No';
echo'<P><INPUT TYPE="submit" name="submit" VALUE="UPDATE this Page"></FORM></td></tr></table>';
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
