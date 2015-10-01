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
	 ?>
	 
<html><head>
<?

echo'</head>';
		

echo'<div style="position:absolute; top:0px; padding:3px; width:100%;  color:#093; font-size:20px; text-align:center;">';

$new=$_POST['new'];
if (isset($new))
	{
	$title=addslashes($_POST['title']);
	$page_type=addslashes($_POST['page_type']);
	
	
	
	$subpage=addslashes($_POST['subpage']);
	$urltext=addslashes($_POST['urltext']);
	
	if($page_style==''){$page_style='1';}
	$insert=mysql_query("insert into pages(ID, title, page_type, subpage, urltext, adminID, page_style) values ('', '$title', '$page_type', '$subpage', '$urltext', '$userID', '$page_style' )")or die(mysql_error());
	echo'Page Added. ';
	
	}

include('save/save_photo.php');
include('save/save_video.php');
include('save/save_blog.php');
include('save/save_calendar.php');
include('save/save_store.php');
include('save/save_storecategory.php');
include('save/save_staff.php');
include('save/save_class.php');
include('save/save_album.php');
include('save/save_song.php');

//////////////////////////////USER HAS PRESSED THE SUBMIT BUTTON FOR PAGES
$submit=$_POST['submit'];
if (isset($submit))
	{
///GET VARS	
	$title=addslashes($_POST['title']);
	$urltext=addslashes($_POST['urltext']);
	$content=addslashes($_POST['content']);
	$newtext = str_replace("\r",'<br>',$_POST['text']);			
	$cleantext=addslashes($newtext);
	$fix=addslashes($_POST['thisID']);
	$published=addslashes($_POST['published']);
	$page_type=addslashes($_POST['page_type']);
	$subpage=addslashes($_POST['subpage']);
	$page_style=addslashes($_POST['page_style']);
	
	if ($_FILES[userfile][name]!='')
		{$add="../img/pages/".$userID."/".$_FILES[userfile][name];
		if (!($_FILES[userfile][type] =="image/jpeg" ))
			{
			echo "Your uploaded file must be of JPG. Other file types are not allowed<BR>";
			exit;
			}
		//echo $add;
		
		if(move_uploaded_file($_FILES[userfile][tmp_name],$add))
			{//echo "<P>Successfully uploaded the image<P>";
			chmod("$add",0777);
			$photo=$_FILES[userfile][name];
			mysql_query("update pages set photo='$photo' where ID='$fix' limit 1") or die (mysql_error());
			}
		else{
			echo "Failed to upload file. Contact Site admin to fix the problem";
		exit;}
		}
	
	/////////PAGE ORDER - WRITE TO DB NOW
if($title!='')
{mysql_query("update pages set title='$title' where ID='$fix' limit 1") or die (mysql_error());}

if($cleantext!='')
{mysql_query("update pages set text='$cleantext' where ID='$fix' limit 1") or die (mysql_error());}

if($content!='')
{mysql_query("update pages set content='$content' where ID='$fix' limit 1") or die (mysql_error());}

if($page_type!='')
{mysql_query("update pages set page_type='$page_type' where ID='$fix' limit 1") or die (mysql_error());}

if($published!='')
{mysql_query("update pages set published='$published' where ID='$fix' limit 1") or die (mysql_error());}

if($subpage!='')
{mysql_query("update pages set subpage='$subpage' where ID='$fix' limit 1") or die (mysql_error());}		

if($urltext!='')
{mysql_query("update pages set urltext='$urltext' where ID='$fix' limit 1") or die (mysql_error());}		


if($page_style!='')
{mysql_query("update pages set page_style='$page_style' where ID='$fix' limit 1") or die (mysql_error());}		



	echo'Page has been updated.';}
	
	
	///////////////////////////DELETE PAGES
	$delete=$_GET['delete'];
if (isset($delete))
	{
		echo'<div style="width:100%; height:40px; color:#f00; font-size:20px; text-align:left;">';

	echo'Are you sure you want to delete that page? <a href="?dy='.$delete.'">YES, DELETE IT</a>';
	echo'</div>';
	}
$dy=$_GET['dy'];
if (isset($dy))
	{
		
	$delete=mysql_query("delete from pages where ID='$dy' limit 1");
	echo'That page has been deleted';
	
	}

	
	echo'</div>';






//include('admin_links.php');
$submit=$_POST['submit'];
$page=$_GET['page'];
$delete=$_GET['delete'];

///////////////////////////////ALL PAGES///////HANDLE PAGES FOR ALL PAGE TYPES

include('handle/handle_photo.php');
include('handle/handle_video.php');
include('handle/handle_blog.php');
include('handle/handle_calendar.php');
include('handle/handle_store.php');
include('handle/handle_storecategory.php');
include('handle/handle_staff.php');
include('handle/handle_class.php');
include('handle/handle_album.php');
include('handle/handle_song.php');


//////////////////////////////////////////PAGE HAS BEEN SELECTED
if (isset($page))
	{
	if (!isset($submit))
		{
		$data3=mysql_query("select * from pages where ID='$page' and adminID='$userID' order by ID ASC");
		while($info3=mysql_fetch_array($data3))
			{
///////////////////////GET COMMOMN VARS FOR SELECTED PAGE
			$oldphoto=stripslashes($info3['photo']);
			$paragraphs=str_replace("<br>",'',$info3['text']);
			$oldtext = stripslashes($paragraphs);
			$oldcontent=stripslashes($info3['content']);
			$oldtitle=stripslashes($info3['title']);
			$oldurltext=stripslashes($info3['urltext']);
			
			$page_type=$info3['page_type'];
			$published=($info3['published']);
			$subpage=($info3['subpage']);
			$page_style=($info3['page_style']);
			}
			
			echo '<P>Page Type: ';
			$data2=mysql_query("select * from page_types where ID ='$page_type' order by ID ASC");
			while($info2=mysql_fetch_array($data2))
				{
				echo stripslashes($info2['title']);echo'<P>';
				$styles=$info2['styles'];
				
				
	
				}

				
				
////////////////////////////////////////NORMAL "PAGE" PAGE	{type 1}
		if($page_type=='1')
			{
			echo'<br><P><FORM ENCTYPE="multipart/form-data"  METHOD="POST">';
			
			
				
				echo'<table width="100%"><tr><td valign="top">';
			
			
			echo'<INPUT TYPE="hidden" name="thisID" value="'.$page.'"><P>';
			echo'<INPUT NAME="userfile" TYPE="file"><br><img src="../img/pages/'.$userID.'/'.$oldphoto.'" width="200px"><P></td><td valign="top" width="50%">';
			echo'Page Title:<INPUT TYPE="text" name="title" value="'.$oldtitle.'"><P>';
			echo'urltext:<INPUT TYPE="text" name="urltext" value="'.$oldurltext.'"><P>';
			echo'<INPUT TYPE="hidden" name="thisID" value="'.$page.'"><P>';
			echo'<textarea name="text" rows="20" cols="60">'.$oldtext.'</textarea>';
			
			
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
			
			echo'</td><td>';
			
			echo'Subpage of <br>';
			echo'<select name="subpage"> <option value="'.$subpage.'">';
			if ($subpage=='main')
				{echo'Main Page';}
			
			else
				{
				$data4=mysql_query("select * from pages where ID='$subpage' and adminID='$userID'  ");
				while($info4=mysql_fetch_array($data4))
					{	
					echo$info4['title'];
					}
				}
			echo' </option>
			
			<option value="main">Main Page</option>';
			$data4=mysql_query("select * from pages where subpage='main' and adminID='$userID' order by pageorder ASC");
			while($info4=mysql_fetch_array($data4))
				{
				echo'<option value="'.$info4['ID'].'"';
				echo'>'.stripslashes($info4['title']).'</option>';
				}
			echo'</select>';
			
			
			
/*
//////////////////PAGE TYPE DROPDOWN  FOR ALL PAGES
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
			
			
/////////////////PUBLISH NOW Y/N FOR ALL PAGES ?
			echo'<b><P>Do you want to
			<br> publish this page now?</b>
			<br>
			<input type="radio" name="published" value="y" ';
			if($published=='y')
				{
				echo' checked';
				}
			echo'>Yes<input type="radio" name="published" value="n"';
			if($published!='y')
				{echo' checked';}
			echo'>No';
			echo'<P><INPUT TYPE="submit" name="submit" VALUE="UPDATE this Page">
			</FORM></td></tr></table>';
			}
		
/////////////////////////////////////////////////////////////////////////////CUSTOMPHP
		if($page_type=='6')
		{echo'<table><tr><td width="300px"></td><td valign="top">	
		<br><P><FORM ENCTYPE="multipart/form-data"  METHOD="POST">';
		echo'<INPUT TYPE="hidden" name="thisID" value="'.$page.'"><P>';
		echo'Page Title <INPUT TYPE="text" name="title" value="'.$oldtitle.'"><P>';
		echo'urltext <INPUT TYPE="text" name="urltext" value="'.$oldurltext.'"><P>';
		
		echo'Include content: <INPUT TYPE="text" name="content" value="'.$oldcontent.'"><P>
		by placing the custom php file in your "Pages" folder<P>';
			echo'<P><INPUT TYPE="hidden" name="thisID" value="'.$page.'"><P></td></td><td width="30px"><td valign="top">';
		
echo'Subpage of <br>';
			echo'<select name="subpage"> <option value="'.$subpage.'">';
			if ($subpage=='main')
				{echo'Main Page';}
			
			else
				{
				$data4=mysql_query("select * from pages where ID='$subpage' ");
				while($info4=mysql_fetch_array($data4))
					{	
					echo$info4['title'];
					}
				}
			echo' </option>
			
			<option value="main">Main Page</option>';
			$data4=mysql_query("select * from pages where subpage='main' order by pageorder ASC");
			while($info4=mysql_fetch_array($data4))
				{
				echo'<option value="'.$info4['ID'].'"';
				echo'>'.stripslashes($info4['title']).'</option>';
				}
			echo'</select>';
			
			/////////////////PUBLISH NOW Y/N FOR ALL PAGES ?
			echo'<b><P>Do you want to
			<br> publish this page now?</b>
			<br>
			<input type="radio" name="published" value="y" ';
			if($published=='y')
				{
				echo' checked';
				}
			echo'>Yes<input type="radio" name="published" value="n"';
			if($published!='y')
				{echo' checked';}
			echo'>No';
			echo'<P><INPUT TYPE="submit" name="submit" VALUE="UPDATE this Page">
				</FORM></td></tr></table>';
			}
		
			

		
////////////////////////////////////ALL PAGES ////////FORM FOR EACH PAGE TYPE LOCATED IN /form FOLDER		
		if($page_type=='2'){include('form/form_photo.php');}
		if($page_type=='3'){include('form/form_blog.php');}
		if($page_type=='4'){include('form/form_video.php');}
		if($page_type=='5'){include('form/form_calendar.php');}
		if($page_type=='7'){include('form/form_store.php');}
		if($page_type=='8'){include('form/form_staff.php');}
		if($page_type=='9'){include('form/form_class.php');}
		if($page_type=='10'){include('form/form_album.php');}
		
		}
	}


		}//else YES to Login
	}//while user matches
}//if login exists
else // go to login
{
echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
exit;
}
?>

