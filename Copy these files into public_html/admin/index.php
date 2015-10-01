<?include('./connect.php');
include('./admin.css');
	
$submit=$_POST['submit'];
$page=$_GET['page'];
$delete=$_GET['delete'];

///////////////////////////////ALL PAGES///////HANDLE PAGES FOR ALL PAGE TYPES
include('./handle/handle_element.php');
include('./handle/handle_photo.php');
include('./handle/handle_video.php');
include('./handle/handle_blog.php');
//include('./handle/handle_calendar.php');
include('./handle/handle_store.php');
//include('./handle/handle_storecategory.php');
//include('./handle/handle_album.php');
//include('./handle/handle_song.php');


//////////////////////////////////////////PAGE HAS BEEN SELECTED
if (isset($page))
	{
	if (!isset($submit))
		{
		$data3=mysql_query("select * from pages where ID='$page' and adminID='$userID' order by ID ASC");
		while($info3=mysql_fetch_array($data3))
			{
///////////////////////GET COMMOMN VARS FOR SELECTED PAGE
$adminID=$info3['adminID'];
			$oldphoto=stripslashes($info3['photo']);
			$background=stripslashes($info3['background']);
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
			
		/*echo 'Page Type: ';
		$data2=mysql_query("select * from page_types where ID ='$page_type' order by ID ASC");
		while($info2=mysql_fetch_array($data2))
			{echo stripslashes($info2['title']);echo'';}
		*/
			

		
////////////////////////////////////ALL PAGES ////////FORM FOR EACH PAGE TYPE LOCATED IN /form FOLDER	
		if($page_type=='1'){include('./form/form_simplepage.php');}	
		if($page_type=='2'){include('./form/form_photo.php');}
		if($page_type=='3'){include('./form/form_blog.php');}
		if($page_type=='4'){include('./form/form_video.php');}
		if($page_type=='5'){include('./form/form_calendar.php');}
		if($page_type=='6'){include('./form/admin_custompage.php');}
		if($page_type=='7'){include('./form/form_store.php');}
		if($page_type=='8'){include('./form/form_staff.php');}
		if($page_type=='9'){include('./form/form_class.php');}
		if($page_type=='10'){include('./form/form_album.php');}
		if($page_type=='11'){include('./form/form_magazine.php');}
		}
	}


?>

