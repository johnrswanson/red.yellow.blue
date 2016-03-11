<?include('connect.php'); ?>
<?
if(isset($_COOKIE['ID_my_site']))
{ 
$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ 
	$userID=$info['ID'];
	$mywebsite=$info['title'];
	
	}
}?>
<?	

$myhome=$mywebsite;

///CSS EDITOR
$updatecss=$_POST['updatecss'];
if(isset($updatecss))
	{
	$newcss=addslashes($_POST['user_css']);
	$update=mysql_query("update stylesheet set user_css='$newcss' where ID='1'  limit 1 ");
	//echo'Style Sheet Updated! <a href="../index.php?u='.$usertitle.'">View Site</a>';
	//echo'<script>location.replace(location.pathname);</script>';
	}

$updatestyle=$_POST['updatelink'];
if (isset($updatestyle))
{
		$navbackground=addslashes($_POST['navbackground']);
		
		$linkcolor=addslashes($_POST['linkcolor']);
		$hovercolor=addslashes($_POST['hovercolor']);
		$selectedcolor=addslashes($_POST['selectedcolor']);
		
		$linkbg=addslashes($_POST['linkbg']);
		$hoverbg=addslashes($_POST['hoverbg']);
		$selectedbg=addslashes($_POST['selectedbg']);	
		
		
		$fontfamily=addslashes($_POST['fontfamily']);
		$fontsize=addslashes($_POST['fontsize']);
		$fontweight=addslashes($_POST['fontweight']);
		$linksbarradius=addslashes($_POST['linksbarradius']);
		
		mysql_query("update stylesheet set linksbarradius='$linksbarradius' where ID='1' limit 1") or die (mysql_error());

mysql_query("update stylesheet set linkcolor='$linkcolor' where ID='1' limit 1") or die (mysql_error());
mysql_query("update stylesheet set hovercolor='$hovercolor' where ID='1' limit 1") or die (mysql_error());
mysql_query("update stylesheet set selectedcolor='$selectedcolor' where ID='1' limit 1") or die (mysql_error());

mysql_query("update stylesheet set linkbg='$linkbg' where ID='1' limit 1") or die (mysql_error());
mysql_query("update stylesheet set hoverbg='$hoverbg' where ID='1' limit 1") or die (mysql_error());
mysql_query("update stylesheet set selectedbg='$selectedbg' where ID='1' limit 1") or die (mysql_error());

mysql_query("update stylesheet set linksize='$fontsize' where ID='1' limit 1") or die (mysql_error());
mysql_query("update stylesheet set fontfamily='$fontfamily' where ID='1' limit 1") or die (mysql_error());
mysql_query("update stylesheet set fontweight='$fontweight' where ID='1' limit 1") or die (mysql_error());

mysql_query("update stylesheet set navbackground='$navbackground' where ID='1' limit 1") or die (mysql_error());

		
echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'">';
exit;

}



//Edit  SITE STYLE 
$updatestyle=$_POST['updatestyle'];
if (isset($updatestyle))
{
	
		$sitewidth=addslashes($_POST['sitewidth']);
		$headerwidth=addslashes($_POST['headerwidth']);
		$headercolor=addslashes($_POST['headercolor']);
		$opacity=addslashes($_POST['opacity']);
		$radius=addslashes($_POST['radius']);
		$opacity=addslashes($_POST['opacity']);	
		$removelogo=addslashes($_POST['removelogo']);
		$logoheight=addslashes($_POST['logoheight']);
		
		
if ($_FILES[file][name]!=''){$add="./img/logo/".$_FILES[file][name];
echo $add;
if(move_uploaded_file ($_FILES[file][tmp_name],$add)){

echo "<P>Successfully uploaded the image<P>";chmod("$add",0777);}
else{echo "Failed to upload file Contact Site admin to fix the problem";exit;}

	$photoerror='true';
		if ($_FILES[file][type]=="image/jpg"){$photoerror='false';}
		if ($_FILES[file][type]=="image/jpeg"){$photoerror='false';}
		if ($_FILES[file][type]=="image/png"){$photoerror='false';}
		if ($_FILES[file][type]=="image/gif"){$photoerror='false';}
			
			  // You should also check filesize here.
    if ($_FILES[file]['size'] > 2000000000) {
        $photoerror='true';
            }
			
			if ($photoerror=='true'){
			echo "Your file must be a Photo ( Jpeg , PNG , or GIF) <br>
			Other file types are not allowed. <br>
			Maximum Filesize for uploading is set to 2MB per file for free users.
			<br>You must resize your photos and try again.  <BR>";
			exit;
			}

	
$photo=addslashes($_FILES[file][name]);
mysql_query("update stylesheet set logo='$photo' where ID='1' limit 1") or die (mysql_error());

}

if($removelogo=='-'){
mysql_query("update stylesheet set logo='' where ID='1' limit 1") or die (mysql_error());}
mysql_query("update stylesheet set logoheight='$logoheight' where ID='1' limit 1") or die (mysql_error());
mysql_query("update stylesheet set headerwidth='$headerwidth' where ID='1' limit 1") or die (mysql_error());
mysql_query("update stylesheet set sitewidth='$sitewidth' where ID='1' limit 1") or die (mysql_error());
mysql_query("update stylesheet set headercolor='$headercolor' where ID='1' limit 1") or die (mysql_error());
mysql_query("update stylesheet set opacity='$opacity' where ID='1' limit 1") or die (mysql_error());
mysql_query("update stylesheet set radius='$radius' where ID='1' limit 1") or die (mysql_error());

echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'">';

//echo'<P>You should now see your Style updated on the site. <a href="/'.$myhome.'">Reload Site</a>';
exit;
}







$dupepage=$_POST['duper'];
if (isset($dupepage))
	{
		
		
	$dupeID=$_POST['dupeID'];
	$title=addslashes($_POST['title']);
	$page_type='1';
	$subpage=addslashes($_POST['subpage']);
	if($title==''){$title='Untitled Page ';}
	$safetitle = str_replace(' ', '', $title);
	$urltext = preg_replace("/[^a-zA-Z0-9]+/", "", $safetitle);
	$page_style='1';
	$background=addslashes($_POST['background']);
	$photo=addslashes($_POST['photo']);
	
	if (!$page_style){$page_style='1';}
	if (!$subpage){$subpage='main';}
		
$insert10=mysql_query("insert into pages(ID, title, page_type, subpage, urltext, page_style, adminID, published) values ('', '$title', '$page_type', '$subpage', '$urltext', '$page_style', '$userID', 'y' )")or die(mysql_error());



$info50=mysql_query("select * from pages order by ID DESC Limit 1") or die (mysql_error());
	while($data50=mysql_fetch_array($info50)){
		$dupeme=$data50['ID'];
		$thisadmin=$data50['adminID'];
		//echo'page added';
	}
	
if($background!='')
{mysql_query("update pages set background='$background' where ID='$dupeme' limit 1") or die (mysql_error());}	

if($photo!='')
{mysql_query("update pages set photo='$photo' where ID='$dupeme' limit 1") or die (mysql_error());}	

//debug console oncsreen
echo '<br>Copying page'.$dupeID;

$data25=mysql_query("select * from page_element where pageID='$dupeID' order by ID limit 100") or die (mysql_error());
	$dupethese=mysql_num_rows($data25);
	echo'. Duplicating '.$dupethese.' items'; 
	while($info25=mysql_fetch_array($data25))
		{
			

//echo 'ID OF ELEMENT '.$counter.': '.$info25['ID'];
//$counter++;

$cleantext=addslashes($info25['pagecontent']);
$file=$info25['file'];
if($file!='')
{
	if ($thisadmin==$userID){
	$file=addslashes($info25['file']);
		}
		
	else{
		$file='newsamplephoto';
	}
}

$top=intval($info25['posx']); 
$left=addslashes($info25['posy']); 
$fontsize=addslashes($info25['fontsize']); 
$lineheight=addslashes($info25['fontsize']);
$color=addslashes($info25['color']);
$background=addslashes($info25['background']);
$fontfamily=addslashes($info25['fontfamily']);
$fontweight=addslashes($info25['fontweight']);
$floaty='none';
$textalign=addslashes($info25['textalign']);
$height=addslashes($info25['height']);
$width=addslashes($info25['width']);
$padding=addslashes($info25['padding']);
$margin='0';
$opacity=addslashes($info25['opacity']);
$round=addslashes($info25['radius']);
$elementlist=addslashes($info25['elementlist']);
$thisboxID=addslashes($info25['boxID']);



$data36=mysql_query("select * from page_box where ID='$thisboxID' order by ID DESC Limit 1") or die (mysql_error());
	while($info36=mysql_fetch_array($data36))
	{	
	$btitle=$info36['title'];
	$box_type=$info36['box_type'];
	$box_style=$info36['box_style'];
	$boxcolumnset=$info36['columnset'];
	//$box_style=addslashes($_POST['box_style']);
	
	$insert36=mysql_query
	("insert into page_box (ID, title, box_type, box_style, adminID, columnset)
	 values 
	 ('', '$btitle', '$box_type', '$box_style', '$userID' , '$boxcolumnset')")
	 
	 or die(mysql_error());

	
$info52=mysql_query("select * from page_box order by ID DESC Limit 1") or die (mysql_error());
	while($data52=mysql_fetch_array($info52)){
		$newboxID=$data52['ID'];
	}
	}

	$insert=mysql_query("insert into page_element 
	(ID, pagecontent, 
	file,
	 boxID, 
	 fontsize,
	 fontfamily, 
	 color, 
	 fontweight, 
	 background, 
	 margin, 
	 padding, 
	 height, 
	 width, 
	 posx, 
	 posy,
	 floaty,
	 opacity, 
	 textalign, 
	 radius, 
	 pageID, 
	 elementlist )
	
	VALUES
	('',
	'$cleantext', 
	'$file', 
	'$newboxID',
	'$fontsize', 
	'$fontfamily', 
	'$color', 
	'$fontweight', 
	'$background', 
	'$margin', 
	'$padding', 
	'$height', 
	'$width', 
	'$top', 
	'$left', 
	'$floaty', 
	'$opacity', 
	'$textalign', 
	'$round', 
	'$dupeme', 
	'$elementlist') 
	
	") or die (mysql_error());



			}//while elements

	echo' New Page has been Added <a href="/">OK</a>';


echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/">';
exit;
	}





	
	


///////Saved Dropped Position
$dragtop=$_POST['dragtop'];
if (isset($dragtop))
	{
		
$dragleft = addslashes($_POST['dragleft']);
$elementID=addslashes($_POST['elementID']);
$thiselement=str_replace('divArray_', '', $elementID );
 $update=mysql_query("update page_element set posx='$dragtop' where ID='$thiselement' limit 1") or die (mysql_error());
 $update=mysql_query("update page_element set posy='$dragleft' where ID='$thiselement' limit 1") or die (mysql_error());
//echo 'element'.$elementID;
//echo'Element position saved';

	}
	
	///////Saved SIZE
	$restop=$_POST['restop'];
if (isset($restop))
	{
		$restop = addslashes($_POST['restop']).'px';
	$resleft =	addslashes($_POST['resleft']);
	if($resleft>'100'){$resleft='100';}
$resleft = $resleft.'%';
$sizeelementID=addslashes($_POST['sizeelementID']);
$sizeelement=str_replace('divArray_', '', $sizeelementID );
 $update=mysql_query("update page_element set height='$restop' where ID='$sizeelement' limit 1") or die (mysql_error());
 $update=mysql_query("update page_element set width='$resleft' where ID='$sizeelement' limit 1") or die (mysql_error());
echo 'element'.$sizeelement;
echo 'width'.$resleft;
echo 'height'.$restop;
//echo'Element SIZE saved';

	}









//NEW PAGE BOX
$newpagebox=$_POST['newpagebox'];
if (isset($newpagebox))
	{
	$title=addslashes($_POST['title']);
	
	$box_type=addslashes($_POST['type']);
	$box_style=1;
	if($title==''){
		if ($box_type!='1'){
		$title='Untitled Box 1';
		}
		}
	//$box_style=addslashes($_POST['box_style']);
	$pageID=addslashes($_POST['pageID']);
	$insert=mysql_query
	("insert into page_box (ID, title, box_type, box_style, adminID)
	 values 
	 ('', '$title', '$box_type', '$box_style', '$userID' )")
	 
	 or die(mysql_error());

	
	$data3=mysql_query("select * from page_box order by ID DESC limit 1");
while($info3=mysql_fetch_array($data3))
{$boxID=$info3['ID'];
$latestadminID=$info3['adminID'];

if($userID!=$latestadminID)
{echo'There was an error creating your new element. Please try again later.';
exit;}

}

	mysql_query
	("insert into page_element (ID, pageID, boxID, height, width, background, margin, padding, opacity, elementlist, posx, posy)
	
	 VALUES
	('', '$pageID', '$boxID', 'auto', '500px', '#ffffff', 'auto', '10px', '1', '1000', '2', '2')") or die (mysql_error());
	
		//SWITCH FROM URLTEXT TO PAGE ID
	$data43=mysql_query("select * from pages where ID='$pageID' ");
					while($info43=mysql_fetch_array($data43))
						{
						$urltext=$info43['urltext'];
						}
						
						


echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/">';

//echo'<script>location.replace(./'.$myhome.'/'.$thisurltext.'/);</script>';	
exit;
	}





	
	
include('/admin/save/save_element.php');
include('/admin/save/save_photo.php');
include('/admin/save/save_video.php');
include('/admin/save/save_blog.php');
include('/admin/save/save_calendar.php');
include('/admin/save/save_store.php');
include('/admin/save/save_storecategory.php');
include('/admin/save/save_staff.php');
include('/admin/save/save_class.php');
include('/admin/save/save_album.php');
include('/admin/save/save_song.php');




//USE BG PHOTO ON THIS PAGE
$usephoto=$_GET['usephoto'];
if (isset($usephoto))
{
$fix=addslashes($_GET['thisID']);	
$remoteimg=$_GET['remoteimg'];
$remotefile=basename($remoteimg);
	
echo $remoteimg;


function download_image($image_url, $image_file){
    //$fp = fopen ($image_file, 'w+');              // open file handle

    //$ch = curl_init($image_url);
    
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // enable if you want
    //curl_setopt($ch, CURLOPT_FILE, $fp);          // output to file
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    //curl_setopt($ch, CURLOPT_TIMEOUT, 20000);      // some large value to allow curl to run for a long time
    //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    // curl_setopt($ch, CURLOPT_VERBOSE, true);   // Enable this line to see debug prints
    //curl_exec($ch);

    //curl_close($ch);                              // closing curl handle
    //fclose($fp);                                  // closing file handle
    
    $add="./img/full/".$remotefile;

    $photo=basename($add);
    echo $photo;
		//	mysql_query("update pages set photo='$photo' where ID='$fix' limit 1") or die (mysql_error());
	}

download_image($remoteimg, $remotefile);
		
			
}



///CHANGE BG COLOR PHOTO
$submitbgcolor=$_POST['submitbgcolor'];
if (isset($submitbgcolor))
	{$fix=addslashes($_POST['thisID']);
	$background=addslashes($_POST['background']);
	$removephoto=addslashes($_POST['removephoto']);
	
	if ($_FILES[file][name]!='')
		{$add="./img/full/".$_FILES[file][name];
		//echo $add;
		$photoerror='true';
		if ($_FILES[file][type]=="image/jpg"){$photoerror='false';}
		if ($_FILES[file][type]=="image/jpeg"){$photoerror='false';}
		if ($_FILES[file][type]=="image/png"){$photoerror='false';}
		if ($_FILES[file][type]=="image/gif"){$photoerror='false';}
			
			  // You should also check filesize here.
    if ($_FILES[file]['size'] > 2000000000) {
        $photoerror='true';
            }
			
			if ($photoerror=='true'){
			echo "Your file must be a Photo ( Jpeg , PNG , or GIF) <br>
			Other file types are not allowed. <br>
			Maximum Filesize for uploading is set to 2MB per file for free users.
			<br>You must resize your photos and try again.  <BR>";
			exit;
			}
		//echo $add;
		
		if(move_uploaded_file($_FILES[file][tmp_name],$add))
			{//echo "<P>Successfully uploaded the image<P>";
			chmod("$add",0777);
			$photo=$_FILES[file][name];
			mysql_query("update pages set photo='$photo' where ID='$fix' limit 1") or die (mysql_error());
			}
		else{
			echo "Failed to upload file. Contact Site admin to fix the problem";
		exit;}
		}
if($background!='')
{mysql_query("update pages set background='$background' where ID='$fix' limit 1") or die (mysql_error());}	
if($background=='-')
{mysql_query("update pages set background='none' where ID='$fix' limit 1") or die (mysql_error());}
if($removephoto=='-')
{mysql_query("update pages set photo='-' where ID='$fix' limit 1") or die (mysql_error());}

//SWITCH FROM URLTEXT TO PAGE ID
	$data39=mysql_query("select * from pages where ID='$fix' ");
					while($info39=mysql_fetch_array($data39))
						{
						$urltext=$info39['urltext'];
						}
						
	
						
						
//echo'<script>location.replace('/'.$mysite.'/'.$urltext.'');</script>';


	//echo'Page has been updated. Loading...';	
	echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'">';
exit;
		
	}

///EDIT PAGES
$submit=$_POST['submit'];
if (isset($submit))
	{
///GET VARS	
	$title=addslashes($_POST['title']);
	$urltext=addslashes($_POST['urltext']);
	$safeurltext = str_replace(' ', '', $urltext);
	$urltext = preg_replace("/[^a-zA-Z0-9]+/", "", $safeurltext);
	$content=addslashes($_POST['content']);
	$newtext = str_replace("\r",'<br>',$_POST['text']);			
	$cleantext=addslashes($newtext);
	$fix=addslashes($_POST['thisID']);
	$published=addslashes($_POST['published']);
	$page_type=addslashes($_POST['page_type']);
	$subpage=addslashes($_POST['subpage']);
	$page_style=addslashes($_POST['page_style']);
	
	
//PAGE EDIT - Write To DB
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


//SWITCH FROM URLTEXT TO PAGE ID
	$data3=mysql_query("select * from pages where ID='$fix' ");
					while($info3=mysql_fetch_array($data3))
						{$thisuserID=$info3['adminID'];
						$urltext=$info3['urltext'];
						
		$data4=mysql_query("select * from admin where ID='$thisuserID' ");
					while($info4=mysql_fetch_array($data4))
						{$mysite=$info4['title'];
						}
						}
						
						
//echo'<script>location.replace('/'.$mysite.'/'.$urltext.'');</script>';


	//echo'Page has been updated. Loading...';	
	echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'">';


	exit;

	//echo'<script>	location.replace(location.pathname);</script>';
	//echo'<a href="/$/'.$urltext.'">View Page</a>';
		}
	
	
	
	
	
	
	
	
	///////////DELETE PAGE
	$deletepage=$_GET['deletepage'];
if (isset($deletepage))
	{

	echo'Are you sure you want to delete that page? <a href="?dy='.$deletepage.'">YES, DELETE IT</a>';
	exit;
	}
	
	
$dy=$_GET['dy'];
if (isset($dy))
	{
		
	$deletepage=mysql_query("delete from pages where ID='$dy' limit 1");
echo'That page has been deleted. Loading Your Homepage...';
echo'<META http-equiv="refresh" content="0;URL=/">';

exit;
	
	}





////////////////////NEW TEXT page element
$submitnewelement=$_POST['submitnewelement'];
if (isset($submitnewelement))
	{
	$pageID=addslashes($_POST['pageID']);
	$newtext = str_replace("\r",'<br>',$_POST['mytext']);			
	$cleantext=addslashes($newtext);
	$margin=addslashes($_POST['margin']);
	$padding=addslashes($_POST['padding']);
	$height=addslashes($_POST['height']);
	$width='50';
	$color=addslashes($_POST['color']);
	$background=addslashes($_POST['background']);
$posy='2';
$posx='2';
	$fontfamily=addslashes($_POST['fontfamily']);
	$fontsize=addslashes($_POST['fontsize']);
	$fontweight=addslashes($_POST['fontweight']);
		
	$floaty=addslashes($_POST['floaty']);
		
		
	$opacity=addslashes($_POST['opacity']);
	$textalign=addslashes($_POST['textalign']);
	$radius=addslashes($_POST['radius']);

//SWITCH FROM URLTEXT TO PAGE ID
	$data3=mysql_query("select * from pages where ID='$pageID' ");
					while($info3=mysql_fetch_array($data3))
						{$thisuserID=$info3['adminID'];
						$urltext=$info3['urltext'];
						
						$data4=mysql_query("select * from admin where ID='$thisuserID' ");
					while($info4=mysql_fetch_array($data4))
						{$mysite=$info4['title'];
						}
						}

	
	mysql_query("insert into page_element (
	ID,
	 pagecontent, 
	 fontsize, 
	 fontfamily, 
	 color, 
	 fontweight, 
	 background, 
	 margin, 
	 padding, 
	 height, 
	 width, 
	 floaty, 
	 opacity, 
	 textalign, 
	 radius, 
	 pageID, 
	 layer,
	 elementlist,
	 posx, 
	 posy
	  )VALUES
	('',
	'$cleantext', 
	'$fontsize', 
	'$fontfamily', 
	'$color', 
	'$fontweight',
	'$background', 
	'0', 
	'$padding', 
	'$height', 
	'50', 
	'$floaty',
	'$opacity', 
	'$textalign', 
	'$radius',
	'$pageID', 
	'5',
	'1000', 
	'2', 
	'2' )
	") or die (mysql_error());
	
	//$elementID=("SELECT MAX(ID) FROM page_element");
	//echo'<P width="200px">Successfully Added. <a href="//'.$mysite.'/'.$urltext.'">Reload</a> ';
//echo'<script>location.replace(/'.$mysite.'/'.$urltext.'/#'.$mynewelement.');</script>';	
echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/">';
exit;
}
	
	
	
//NEW PHOTOS ON PAGE
$submitelementphoto=$_POST['submitelementphoto'];
if (isset($submitelementphoto))
{
	$pageID=$_POST['pageID'];
	
	$imagephotoID=addslashes($_GET['imagephotoID']);

$add="./img/full/".$_FILES[file][name];
//echo $add;
if(move_uploaded_file ($_FILES[file][tmp_name],$add)){

//echo "<P>Successfully uploaded the image<P>";
chmod("$add",0777);}
else{echo "Failed to upload file Contact Site admin to fix the problem";exit;}



$photoerror='true';
		if ($_FILES[file][type]=="image/jpg"){$photoerror='false';}
		if ($_FILES[file][type]=="image/jpeg"){$photoerror='false';}
		if ($_FILES[file][type]=="image/png"){$photoerror='false';}
		if ($_FILES[file][type]=="image/gif"){$photoerror='false';}
			
			  // You should also check filesize here.
    if ($_FILES[file]['size'] > 2000000000) {
        $photoerror='true';
            }
			
			if ($photoerror=='true'){
			echo "Your file must be a Photo ( Jpeg , PNG , or GIF) <br>
			Other file types are not allowed. <br>
			Maximum Filesize for uploading is set to 2MB per file for free users.
			<br>You must resize your photos and try again.  <BR>";
			exit;
			}


$photo=addslashes($_FILES[file][name]);

	mysql_query
	("insert into page_element (ID, file, pageID, elementlist , layer, posx, posy, width)
	
	 VALUES
	('', '$photo', '$pageID', '1000', '5', '2', '2', '50')") or die (mysql_error());
//echo'Upload Success';


//SWITCH FROM URLTEXT TO PAGE ID
	$data3=mysql_query("select * from pages where ID='$pageID' ");
					while($info3=mysql_fetch_array($data3))
						{$thisuserID=$info3['adminID'];
						$urltext=$info3['urltext'];
						
						$data4=mysql_query("select * from admin where ID='$thisuserID' ");
					while($info4=mysql_fetch_array($data4))
						{$mysite=$info4['title'];
						}
						}
echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/">';
//echo'<script>location.replace(/'.$mysite.'/'.$urltext.');</script>';	

}



	
//////DELETE PAGE ELEMENT
$delement=$_GET['deleteelement'];
if (isset($delement)){
	
	$data34=mysql_query("select * from page_element where ID='$delement' ");
					while($info34=mysql_fetch_array($data34))
						{$dpage=$info34['pageID'];}
						
						
					$data45=mysql_query("select * from pages where ID='$dpage' ");
					while($info45=mysql_fetch_array($data45))
						{$thepage=$info45['urltext'];
								}
						
						$delete34=mysql_query("delete from page_element where ID='$delement' limit 1") or die (mysql_error());
				
//echo'loading...';			
echo'<META http-equiv="refresh" content="0;URL=/'.$thepage.'">';
//echo'<script>location.replace(/'.$myhome.'/'.$thispage.');</script>';	
	
exit;
}








	
	
///EDIT ELEMENT
	
$lmntID=$_POST['lmntID'];
if (isset($lmntID))
	
{

	$newtext = str_replace("\r",'<br>',$_POST['mytext']);			
	$pagecontent=addslashes($newtext);
	$pageID=addslashes($_POST['pageID']);
	$elementID=addslashes($_POST['lmntID']);
	$layer=addslashes($_POST['layer']);
	$spacing=addslashes($_POST['spacing']);
	$lineheight=addslashes($_POST['lineheight']);
	
		$margin=addslashes($_POST['margin']);
		$padding=addslashes($_POST['padding']);
		//$height=addslashes($_POST['height']);
		//$width=addslashes($_POST['width']);
		$color=addslashes($_POST['color']);
		$background=addslashes($_POST['background']);

		$fontfamily=addslashes($_POST['fontfamily']);
		$fontsize=addslashes($_POST['fontsize']);
		$fontweight=addslashes($_POST['fontweight']);
		
		//$floaty=addslashes($_POST['floaty']);
		
		$margin=addslashes($_POST['margin']);
		$padding=addslashes($_POST['padding']);
		$opacity=addslashes($_POST['opacity']);
		$textalign=addslashes($_POST['textalign']);
		$radius=addslashes($_POST['radius']);
		$columnset=addslashes($_POST['columnset']);
		$boxtitle=addslashes($_POST['boxtitle']);


	
	$myphoto=addslashes($_FILES[file][name]);
	
		if($myphoto!=''){
$add="./img/full/".$_FILES[file][name];
//echo $add;
echo'<br>';

if(move_uploaded_file ($_FILES[file][tmp_name],$add)){

//echo "<P>Successfully uploaded the image<P>";

chmod("$add",0777);}
else{echo " Permissions Failed to upload file Contact Site admin to fix the problem";
exit;}


$photoerror='true';
		if ($_FILES[file][type]=="image/jpg"){$photoerror='false';}
		if ($_FILES[file][type]=="image/jpeg"){$photoerror='false';}
		if ($_FILES[file][type]=="image/png"){$photoerror='false';}
		if ($_FILES[file][type]=="image/gif"){$photoerror='false';}
			
			  // You should also check filesize here.
    if ($_FILES[file]['size'] > 2000000000) {
        $photoerror='true';
            }
			
			if ($photoerror=='true'){
			echo "Your file must be a Photo ( Jpeg , PNG , or GIF) <br>
			Other file types are not allowed. <br>
			Maximum Filesize for uploading is set to 2MB per file for free users.
			<br>You must resize your photos and try again.  <BR>";
			exit;
			}



else{
$photo=addslashes($_FILES[file][name]);
 mysql_query("update page_element set file='$photo' where ID='$elementID' limit 1") or die (mysql_error());
		
}
	}

$update=mysql_query("update page_element set layer= '$layer' where ID='$elementID' limit 1");
		
$update=mysql_query("update page_element set pagecontent= '$pagecontent' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set fontfamily= '$fontfamily' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set fontsize= '$fontsize' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set fontweight= '$fontweight' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set textalign= '$textalign' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set background= '$background' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set color= '$color' where ID='$elementID' limit 1");
//$update=mysql_query("update page_element set width= '$width' where ID='$elementID' limit 1");
//$update=mysql_query("update page_element set height= '$height' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set margin= '$margin' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set padding= '$padding' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set opacity= '$opacity' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set fontweight= '$fontweight' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set radius= '$radius' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set spacing= '$spacing' where ID='$elementID' limit 1");
$update=mysql_query("update page_element set lineheight= '$lineheight' where ID='$elementID' limit 1");


//$update=mysql_query("update page_element set floaty= '$floaty' where ID='$elementID' limit 1");



$data3=mysql_query("select * from page_element where ID='$elementID' ");
					while($info3=mysql_fetch_array($data3))
						{$thisPage=$info3['pageID'];
						$boxID=$info3['boxID'];
						$update=mysql_query("update page_box set columnset= '$columnset' where ID='$boxID' limit 1");
						
						$update=mysql_query("update page_box set title= '$boxtitle' where ID='$boxID' limit 1");


						$data4=mysql_query("select * from pages where ID='$thisPage' ");
					while($info4=mysql_fetch_array($data4))
						{$thisuserID=$info4['adminID'];
						$urltext=$info4['urltext'];
						
						$data5=mysql_query("select * from admin where ID='$thisuserID' ");
					while($info5=mysql_fetch_array($data5))
						{$mysite=$info5['title'];
						}
					}
				}

	
	//echo'<b> Changes Complete</b> ';
	
	//echo'loading...';			
	//echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/#'.$elementID.'">';
	//exit;
	}	
	
	
	
	
	
	



















////////////////////
//////////////////// USER HAS SUBMITTED THE FORM for NEW BLOG POST
$submitnewblog=$_POST['submitnewblog'];
if (isset($submitnewblog))
	{
		
	////////////////////GET VARIABLES
	$title=addslashes($_POST['title']);
	$blogID=addslashes($_POST['blogID']);
	$newtext = str_replace("\r",'<br>',$_POST['long_text']);			
	$cleantext=addslashes($newtext);
	
	$newshorttext = str_replace("\r",'<br>',$_POST['short_text']);			
	$cleanshorttext=addslashes($newshorttext);

	$now=date(y).'-'.date(m).'-'.date(d);
	
	mysql_query("insert into blog (ID, title, date, text, short_text, photo, blogID ) VALUES('', '$title', '$now', '$cleantext', '$cleanshorttext', '$photo', '$blogID')") or die (mysql_error());
	
	
	$data3=mysql_query("select * from page_element where boxID='$blogID' ");
					while($info3=mysql_fetch_array($data3))
						{$thiselement=$info3['pageID'];
							$thisPage=$info3['pageID'];
						
						
						$data4=mysql_query("select * from pages where ID='$thisPage' ");
					while($info4=mysql_fetch_array($data4))
						{$thisuserID=$info4['adminID'];
						$urltext=$info4['urltext'];
						
					}
			}
	
echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/#'.$thiselement.'">';

	}
	
	
	
	//EDIT BLOG ENTRIES
$editblognow=$_POST['editblognow'];
if (isset($editblognow))
	{
	$title=addslashes($_POST['title']);
	$newshorttext = str_replace("\r",'<br>',$_POST['short_text']);			
	$shorttext=addslashes($newshorttext);
	$newtext = str_replace("\r",'<br>',$_POST['text']);			
	$text=addslashes($newtext);
	$thisID=addslashes($_POST['thisID']);
	$blogID=addslashes($_POST['blogID']);
	$update=mysql_query("update blog set title= '$title' where ID='$thisID'");
	$update=mysql_query("update blog set text= '$text' where ID='$thisID'");
		
		
		//echo $blogID;
		$data33=mysql_query("select * from page_element where boxID='$blogID' ");
					while($info33=mysql_fetch_array($data33))
						{	$thiselement=$info33['ID'];
							$mypage=$info33['pageID'];
								//echo $mypage;
						}
						
				$data43=mysql_query("select * from pages where ID='$mypage' ");
					while($info43=mysql_fetch_array($data43))
						{
						$urltext=$info43['urltext'];
						}
			
	//echo'<b> Changes Complete</b> '; 
	//echo $myhome; echo $urltext;

	echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/#'.$thiselement.'">';



//echo'<a href="/'.$mysite.'/'.$urltext.'">Reload</a><P>';
exit;
	
	}

	
	
//////PHOTOS ADD FOR BLOGS


$submitnewblogphoto=$_POST['submitnewblogphoto'];
if (isset($submitnewblogphoto))
{$count=0;
$blogphotoID=$_POST['blogphotoID'];

		if(count($_FILES['filesToUpload'])) {
  foreach ($_FILES['filesToUpload'] as $file) {
  	
     //echo $count;
    //do your upload stuff here
$add="./img/blog/".$_FILES[filesToUpload][name][$count];

//echo $add;
//echo'<br>';

if(move_uploaded_file ($_FILES[filesToUpload][tmp_name][$count],$add))
{//echo "<P>Upload Success! Processing Thumbnail...<br>";
chmod("$add",0777);
}

else
{echo 'Upload Complete : <a href=""style="background:#00cccc; padding-left:3px; font-size: 20px; text-decoration:none;  padding-right:3px;  border-radius:10px;  color:#fff;" href="#"> OK </a>';
exit;}


$photoerror='true';
		if ($_FILES[filesToUpload][type][$count]=="image/jpg"){$photoerror='false';}
		if ($_FILES[filesToUpload][type][$count]=="image/jpeg"){$photoerror='false';}
		if ($_FILES[filesToUpload][type][$count]=="image/png"){$photoerror='false';}
		if ($_FILES[filesToUpload][type][$count]=="image/gif"){$photoerror='false';}
			
			  // You should also check filesize here.
    if ($_FILES[filesToUpload]['size'][$count] > 2000000000) {
        $photoerror='true';
            }
			
			if ($photoerror=='true'){
			echo "Your file must be a Photo ( Jpeg , PNG , or GIF) <br>
			Other file types are not allowed. <br>
			Maximum Filesize for uploading is set to 2MB per file for free users.
			<br>You must resize your photos and try again.  <BR>";
			exit;
			}




		$photo=$_FILES[filesToUpload][name][$count];
		
mysql_query("insert into blog_photos (ID, photo, blogID) VALUES('', '$photo', '$blogphotoID')") or die (mysql_error());

    //do your upload stuff here
    
    $count++;
   
     //echo'<P>Upload success. '.$photo.'<P>';
  }
  

}


}






//ADD PHOTO TO GALLERY
$submitnewphoto=$_POST['submitnewphoto'];
if (isset($submitnewphoto))
		{$count=0;
		if(count($_FILES['filesToUpload'])) {
  foreach ($_FILES['filesToUpload'] as $file) {
  	
  	
  
     //echo $count;
    //do your upload stuff here
$add="./img/full/".$_FILES[filesToUpload][name][$count];

//echo $add;
//echo'<br>';

if(move_uploaded_file ($_FILES[filesToUpload][tmp_name][$count],$add))
{//echo "<P>Upload Success! Processing Thumbnail...<br>";
chmod("$add",0777);

list($width_orig, $height_orig) = getimagesize($add);}

else
{echo 'Upload Comlete. <a href=""style="background:#00cccc; padding-left:3px; font-size: 20px; text-decoration:none;  padding-right:3px;  border-radius:10px;  color:#fff;" href="#"> OK </a><br> ';
//exit;
}



$photoerror='true';
		if ($_FILES[filesToUpload][type][$count]=="image/jpg"){$photoerror='false';}
		if ($_FILES[filesToUpload][type][$count]=="image/jpeg"){$photoerror='false';}
		if ($_FILES[filesToUpload][type][$count]=="image/png"){$photoerror='false';}
		if ($_FILES[filesToUpload][type][$count]=="image/gif"){$photoerror='false';}
			
			  // You should also check filesize here.
    if ($_FILES[filesToUpload]['size'][$count] > 2500000000) {
        $photoerror='true';
            }
			
			if ($photoerror=='true'){
			echo "Upload tips: Your file must be a Photo ( Jpeg , PNG , or GIF) <br>
			
			Other file types are not allowed. <br>
			Maximum Filesize for uploading is set to 2MB per file for free users.
			<br> <BR>";
			exit;
			}




		$photo=$_FILES[filesToUpload][name][$count];
		$title=addslashes($_POST['title']);
		$newtext = str_replace("\r",'<br>',$_POST['long_text']);			
		$cleantext=addslashes($newtext);
		$gallery=addslashes($_POST['gallery']);
mysql_query("insert into photos
(ID, title, text, photo, gallery) 
VALUES
('', '$title', '$cleantext', '$photo', '$gallery')") 
or die (mysql_error());
//echo'Upload '.$photo.' successful <br>';
//echo'<a href="admin_new_photo.php"></a><P>';
$count++;
}

  
}
$data33=mysql_query("select * from page_element where boxID='$gallery' ");
					while($info33=mysql_fetch_array($data33))
						{$thiselement=$info33['ID'];
							$mypage=$info33['pageID'];
								//echo $mypage;
						}
						
				$data43=mysql_query("select * from pages where ID='$mypage' ");
					while($info43=mysql_fetch_array($data43))
						{
						$urltext=$info43['urltext'];
						}

	echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/#'.$thiselement.'">';
exit;

}


	
	//EDIT GALLERY PHOTOS
$editphotonow=$_POST['editphotonow'];
if (isset($editphotonow))
	{
	$title=addslashes($_POST['title']);
	$newshorttext = str_replace("\r",'<br>',$_POST['short_text']);			
	$shorttext=addslashes($newshorttext);
	$newtext = str_replace("\r",'<br>',$_POST['text']);			
	$text=addslashes($newtext);
	$thisID=addslashes($_POST['thisID']);
	$blogID=addslashes($_POST['gallery']);
	$update=mysql_query("update photos set title= '$title' where ID='$thisID'");
	$update=mysql_query("update photos set text= '$text' where ID='$thisID'");
		
		
		//echo $blogID;
		$data33=mysql_query("select * from page_element where boxID='$blogID' ");
					while($info33=mysql_fetch_array($data33))
						{$thiselement=$info33['ID'];
							$mypage=$info33['pageID'];
								//echo $mypage;
						}
						
				$data43=mysql_query("select * from pages where ID='$mypage' ");
					while($info43=mysql_fetch_array($data43))
						{
						$urltext=$info43['urltext'];
						}
			
	//echo'<b> Changes Complete</b> '; 
	//echo $myhome; echo $urltext;

	echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/#'.$thiselement.'">';



//echo'<a href="/'.$mysite.'/'.$urltext.'/#">Reload</a><P>';
exit;
	
	}





//Videos
$submitnewvideo=$_POST['submitnewvideo'];
if (isset($submitnewvideo))

{
$title=addslashes($_POST['title']);
$long_text=addslashes($_POST['long_text']);
$playlist=addslashes($_POST['playlist']);
$youtubeID=addslashes($_POST['youtubeID']);

if($playlist=='-'){echo'You must select a collection.<br>
 Please press the back button and try again.';
  exit;}

mysql_query("insert into videos (ID, title, text, playlist, youtubeID) VALUES('', '$title', '$long_text', '$playlist', '$youtubeID')") or die (mysql_error());


	$data3=mysql_query("select * from page_element where boxID='$playlist' ");
	while($info3=mysql_fetch_array($data3))
	{$thiselement=$info3['ID'];
	$thisPage=$info3['pageID'];
	$data4=mysql_query("select * from pages where ID='$thisPage' ");
	while($info4=mysql_fetch_array($data4))
		{
		$thisuserID=$info4['adminID'];
		$urltext=$info4['urltext'];
		}
	}
	
echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/#'.$thiselement.'">';

echo'<P>Successfully Added Video.<a href="/'.$urltext.'">OK Cool</a>';


}

/////////////////////////////////////////////////////





////////////////////
//////////////////// USER HAS SUBMITTED THE FORM for NEW STORE ITEM
$submitnewstore=$_POST['submitnewstore'];
if (isset($submitnewstore))
	{
		
	////////////////////GET VARIABLES
	$title=addslashes($_POST['title']);
	$storeID=addslashes($_POST['storeID']);
	$newtext = str_replace("\r",'<br>',$_POST['mytext']);	
	$cleantext=addslashes($newtext);
	$price=addslashes($_POST['price']);
	$buybutton=addslashes($_POST['buybutton']);
	$inventory=addslashes($_POST['inventory']);
	$now=date(y).'-'.date(m).'-'.date(d);
	
	if($_FILES[userfile][name]!=''){
$add="./img/full/".$_FILES[userfile][name];
//echo $add;
if(move_uploaded_file ($_FILES[userfile][tmp_name],$add)){

//echo "<P>Successfully uploaded the image<P>";
chmod("$add",0777);}
else{echo "Failed to upload file Contact Site admin to fix the problem";exit;}




$photoerror='true';
		if ($_FILES[userfile][type][$count]=="image/jpg"){$photoerror='false';}
		if ($_FILES[userfile][type][$count]=="image/jpeg"){$photoerror='false';}
		if ($_FILES[userfile][type][$count]=="image/png"){$photoerror='false';}
		if ($_FILES[userfile][type][$count]=="image/gif"){$photoerror='false';}
			
			  // You should also check filesize here.
    if ($_FILES[userfile]['size'] > 2000000000) {
        $photoerror='true';
            }
			
			if ($photoerror=='true'){
			echo "Your file must be a Photo ( Jpeg , PNG , or GIF) <br>
			Other file types are not allowed. <br>
			Maximum Filesize for uploading is set to 2MB per file for free users.
			<br>You must resize your photos and try again.  <BR>";
			exit;
			}


$photo=addslashes($_FILES[userfile][name]);

	}
	mysql_query("insert into store (ID, title, mytext, price, buybutton, storeID, calltoaction ) VALUES('', '$title', '$cleantext', '$price', '$buybutton','$storeID', 'Buy')") or die (mysql_error());
	
	$data3=mysql_query("select * from store order by ID asc limit 1 ");
	while($info3=mysql_fetch_array($data3))
	{$productID=$info3['ID'];
	mysql_query("insert into store_photos (ID, photo, storeID ) VALUES('', '$photo', '$productID')") or die (mysql_error());
	}
	
	$data3=mysql_query("select * from page_element where boxID='$storeID' ");
	while($info3=mysql_fetch_array($data3))
	{$thiselement=$info3['ID'];
	$thisPage=$info3['pageID'];
	$data4=mysql_query("select * from pages where ID='$thisPage' ");
	while($info4=mysql_fetch_array($data4))
		{
		$thisuserID=$info4['adminID'];
		$urltext=$info4['urltext'];
		}
	}
	
echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/#'.$thiselement.'">';
exit;
	}
	
	
	
	//EDIT STORE ITEM
$editstorenow=$_POST['editstorenow'];
if (isset($editstorenow))
	{
	$title=addslashes($_POST['title']);
	$price=addslashes($_POST['price']);
	$calltoaction=addslashes($_POST['calltoaction']);

	$newshorttext = str_replace("\r",'<br>',$_POST['short_text']);			
	$shorttext=addslashes($newshorttext);
	$newtext = str_replace("\r",'<br>',$_POST['mytext']);			
	$mytext=addslashes($newtext);
	$thisID=addslashes($_POST['thisID']);
	$storeID=addslashes($_POST['storeID']);
	$update=mysql_query("update store set title= '$title' where ID='$thisID'");
	$update=mysql_query("update store set mytext= '$mytext' where ID='$thisID'");
	$update=mysql_query("update store set price= '$price' where ID='$thisID'");
	$update=mysql_query("update store set calltoaction= '$calltoaction' where ID='$thisID'");
		
		
		
		$data33=mysql_query("select * from page_element where boxID='$storeID' ");
		while($info33=mysql_fetch_array($data33)){
			$thiselement=$info33['ID'];
		$mypage=$info33['pageID'];}
						
		$data43=mysql_query("select * from pages where ID='$mypage' ");
		while($info43=mysql_fetch_array($data43)){$urltext=$info43['urltext'];}
		echo'<META http-equiv="refresh" content="0;URL=/'.$urltext.'/#'.$thiselement.'">';
		exit;
	
	}

	
	
//////PHOTOS ADD FOR STORE


$submitnewstorephoto=$_POST['submitnewstorephoto'];
if (isset($submitnewstorephoto))
{$count=0;
$storeID=$_POST['storeID'];


		if(count($_FILES['filesToUpload'])) {
  foreach ($_FILES['filesToUpload'] as $file) {
  	
     //echo $count;
    //do your upload stuff here
$add="./img/full/".$_FILES[filesToUpload][name][$count];

//echo $add;
//echo'<br>';

if(move_uploaded_file ($_FILES[filesToUpload][tmp_name][$count],$add))
{//echo "<P>Upload Success! Processing Thumbnail...<br>";
chmod("$add",0777);echo'Success;';
}

else
{echo 'Upload Complete : <a href=""style="background:#00cccc; padding-left:3px; font-size: 20px; text-decoration:none;  padding-right:3px;  border-radius:10px;  color:#fff;" href="#"> OK </a>';
exit;}


$photoerror='true';
		if ($_FILES[filesToUpload][type][$count]=="image/jpg"){$photoerror='false';}
		if ($_FILES[filesToUpload][type][$count]=="image/jpeg"){$photoerror='false';}
		if ($_FILES[filesToUpload][type][$count]=="image/png"){$photoerror='false';}
		if ($_FILES[filesToUpload][type][$count]=="image/gif"){$photoerror='false';}
			
			  // You should also check filesize here.
    if ($_FILES[filesToUpload]['size'][$count] > 2000000000) {
        $photoerror='true';
            }
			
			if ($photoerror=='true'){
			echo "Your file must be a Photo ( Jpeg , PNG , or GIF) <br>
			Other file types are not allowed. <br>
			Maximum Filesize for uploading is set to 2MB per file for free users.
			<br>You must resize your photos and try again.  <BR>";
			exit;
			}




		$photo=$_FILES[filesToUpload][name][$count];
		
mysql_query("insert into store_photos (ID, photo, storeID) VALUES('', '$photo', '$storeID')") or die (mysql_error());

    //do your upload stuff here
    
    $count++;
   
     //echo'<P>Upload success. '.$photo.'<P>';
  }
  

}


}





//echo 'CONFIRM IS LOADED 100%. It knows who you are. You are '.$mywebsite.''; 

?>