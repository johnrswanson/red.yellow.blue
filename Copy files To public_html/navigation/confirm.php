 <?
include('../connect.php');
echo'Hello ';
$pageID=$_POST['pageID'];
$title=$_POST['title'];
$pagetitle=$_POST['pagetitle'];
$urltext=$_POST['urltext'];
$newpage=$_POST['newpage'];
$newelement=$_POST['newelement'];
$newboxitem=$_POST['newboxitem'];
$editboxitem=$_POST['editboxitem'];
$update=$_POST['update'];
$deletepage=$_POST['deleteme'];
$deleteelement=$_POST['deleteelement'];
$deleteboxelement=$_POST['deleteboxelement'];
$editme=$_POST['ID'];
$css=$_POST['css'];
$bgphoto=$_POST['bgphoto'];
$boxphotos=$_POST['boxphotos'];
$bgcolor=$_POST['bgcolor'];
$bannerphoto=$_POST['bannerphoto'];
$bannercolor=$_POST['bannercolor'];
$linkcolors=$_POST['linkcolors'];
$pagedetails=$_POST['pagedetails'];

if ($newpage=='add'){
	echo 'adding... ';
	mysql_query("insert into pages (ID, title, urltext, published) values('', '$pagetitle', '$urltext', 'y')")or die(mysql_error());
	echo ' New Page Added';
}
	
	if ($pagedetails=='edit'){
		
		$pagetitle=$_POST['pagetitle'];
		$publish=$_POST['publish'];

	$update = mysql_query("update pages set title= '$pagetitle' where ID='$pageID' limit 1");
	echo'title was updated';
	$update = mysql_query("update pages set published= '$publish' where ID='$pageID' limit 1");

	}
	
if ($css=='edit'){
	$newcss = addslashes($_POST['usercss']);
	$update = mysql_query("update admin set usercss= '$newcss'");
	echo'CSS was updated';
}


if($linkcolors == 'new'){
	echo'updating link colors';
		$color=$_POST['linkpick'];
		$hovercolor=$_POST['hoverpick'];
		$selectedcolor=$_POST['selectedcolor'];
		$linksize=$_POST['linksize'];
		$linkfont=$_POST['linkfont'];
		$update=mysql_query("update stylesheet set linkcolor='$color' where ID='1' ");		
		$update=mysql_query("update stylesheet set hovercolor= '$hovercolor' where ID='1' ");		
		$update=mysql_query("update stylesheet set selectedcolor= '$selectedcolor' where ID='1' ");		
		$update=mysql_query("update stylesheet set linksize= '$linksize' where ID='1' ");	
		$update=mysql_query("update stylesheet set linkfont= '$linkfont' where ID='1' ");	
				
			
		}

	
	if ($bannercolor=='new'){
		$color=$_POST['color'];
		$update=mysql_query("update stylesheet set bannerphoto= '' where ID='1' ");		
		$update=mysql_query("update stylesheet set bannercolor= '$color' where ID='1' ");		
	}
			
	if ($bannerphoto=='new'){
		$photo=addslashes($_FILES[file][name]);
		if($photo!=''){
				$photo.=date("m.d.yg:i:sa");
			echo ' -> Adding Photo ';
			$add="../img/full/".$photo;
					echo $add;
			if(move_uploaded_file ($_FILES[file][tmp_name],$add)){
	
				//echo "<P>Successfully uploaded the image<P>";
				chmod("$add",0777);
			}
			else{
				echo " -> Photo Upload Directory Error";exit;}
				
				$photoerror='true';
				if ($_FILES[file][type]=="image/jpg"){$photoerror='false';}
				if ($_FILES[file][type]=="image/jpeg"){$photoerror='false';}
				if ($_FILES[file][type]=="image/png"){$photoerror='false';}
				if ($_FILES[file][type]=="image/gif"){$photoerror='false';}
				if ($_FILES[file]['size'] > 2000000000) {
		        $photoerror='true';
		            }	
				if ($photoerror=='true'){
					echo " -> Photo Upload Type Error";
					exit;
				}
			else{echo' -> Photo Upload Success';}
			
			$update=mysql_query("update stylesheet set bannerphoto= '$photo' where ID='1' ");		
		
	}
}
	
	
		
		if ($bgcolor=='new'){
			$color=$_POST['color'];
		$update=mysql_query("update pages set photo= '' where ID='$pageID' limit 1");		
		$update=mysql_query("update pages set background= '$color' where ID='$pageID' limit 1");		
	
			
		}
			
if ($bgphoto=='new'){
	$photo=addslashes($_FILES[file][name]);
	if($photo!=''){
			$photo.=date("m.d.yg:i:sa");
		echo ' -> Adding Photo ';
		$add="../img/full/".$photo;		
		echo $add;
		if(move_uploaded_file ($_FILES[file][tmp_name],$add)){

			//echo "<P>Successfully uploaded the image<P>";
			chmod("$add",0777);
		}
		else{
			echo " -> Photo Upload Directory Error";exit;}
			
			$photoerror='true';
			if ($_FILES[file][type]=="image/jpg"){$photoerror='false';}
			if ($_FILES[file][type]=="image/jpeg"){$photoerror='false';}
			if ($_FILES[file][type]=="image/png"){$photoerror='false';}
			if ($_FILES[file][type]=="image/gif"){$photoerror='false';}
			if ($_FILES[file]['size'] > 2000000000) {
	        $photoerror='true';
	            }	
			if ($photoerror=='true'){
				echo " -> Photo Upload Type Error";
				exit;
			}
		else{echo' -> Photo Upload Success';}
		
		$update=mysql_query("update pages set photo= '$photo' where ID='$pageID' limit 1");		
	
	}

	
}			
	
if ($newelement=='add'){	
	$newtext = str_replace("\r",'<br>',$_POST['mytext']);			
	$cleantext=addslashes($newtext);
	
	$margin=addslashes($_POST['margin']);
	$padding=addslashes($_POST['padding']);
	$height=addslashes($_POST['height']);
	$width='500';
	$color=addslashes($_POST['color']);
	$background=addslashes($_POST['background']);

	$posy='100';
	$posx='100';
	$fontfamily=addslashes($_POST['fontfamily']);
	$fontsize=addslashes($_POST['fontsize']);
	$fontweight=addslashes($_POST['fontweight']);	
	$floaty=addslashes($_POST['floaty']);	
	$opacity=addslashes($_POST['opacity']);
	$textalign=addslashes($_POST['textalign']);
	$radius=addslashes($_POST['radius']);
	echo 'Adding element';
	
	$isbox=addslashes($_POST['isbox']);
	//for New BOXES
	if ($isbox=='true'){
	$boxtitle=addslashes($_POST['boxtitle']);
	if ($boxtitle=='')
	{$cleantext='Untitled Box';}
	else{$cleantext=addslashes($_POST['boxtitle']);}
		$insertbox=mysql_query("insert into page_box (ID, title, columnset) values  ('', '$cleantext', '3' )") or die(mysql_error());

	
		$data3=mysql_query("select * from page_box order by ID DESC limit 1");
		while($info3=mysql_fetch_array($data3)){
			$thisbox=$info3['ID'];
		}				
	}
	
	//for New PHOTOS
	$photo=addslashes($_FILES[file][name]);
	if($photo!=''){
		$photo.=date("m.d.yg:i:sa");
		echo ' -> Adding Photo ';
		$add="../img/full/".$photo;
		echo $add;
		if(move_uploaded_file ($_FILES[file][tmp_name],$add)){

			//echo "<P>Successfully uploaded the image<P>";
			chmod("$add",0777);
		}
		else{
			echo " -> Photo Upload Directory Error";exit;}
			
			$photoerror='true';
			if ($_FILES[file][type]=="image/jpg"){$photoerror='false';}
			if ($_FILES[file][type]=="image/jpeg"){$photoerror='false';}
			if ($_FILES[file][type]=="image/png"){$photoerror='false';}
			if ($_FILES[file][type]=="image/gif"){$photoerror='false';}
			if ($_FILES[file]['size'] > 2000000000) {
	        $photoerror='true';
	            }	
			if ($photoerror=='true'){
				echo " -> Photo Upload Type Error";
				exit;
			}
		else{echo' -> Photo Upload Success';}
	}
	
	mysql_query("insert into page_element (
	ID,
	 pagecontent, 
	 fontsize, 
	 file,
	 fontfamily, 
	 color, 
	 fontweight, 
	 background, 
	 margin, 
	 padding, 
	 height, 
	 spacing,
	 width, 
	 floaty, 
	 opacity, 
	 textalign, 
	 radius, 
	 pageID, 
	 layer,
	 elementlist,
	 posx, 
	 posy, 
	 absw, 
	 boxID
	  )VALUES
	('',
	'$cleantext', 
	'20', 
	'$photo', 
	'helvetica', 
	'$color', 
	'100',
	'$background', 
	'0', 
	'0', 
	'auto', 
	'0',
	'300', 
	'none',
	'$opacity', 
	'$textalign', 
	'0',
	'$pageID', 
	'5',
	'1000', 
	'100', 
	'30', 
	'400',
	'$thisbox' )
	") or die (mysql_error());
	echo 'New Element Added';
}


if ($editboxitem!=''){
	$data3=mysql_query("select * from page_element where ID='$elementID' order by ID DESC limit 1");
		while($info3=mysql_fetch_array($data3)){
			$thisbox=$info3['boxID'];
		}				

	
	$title=addslashes($_POST['title']);
	$newtext = str_replace("\r",'<br>',$_POST['mytext']);			
	$cleantext=addslashes($newtext);
	$photo=addslashes($_FILES[file][name]);
	if($photo!=''){
		$photo.=date("m.d.yg:i:sa");
		echo ' -> Adding Photo ';
		$add="../img/full/".$photo;
		echo $add;
		if(move_uploaded_file ($_FILES[file][tmp_name],$add)){

			//echo "<P>Successfully uploaded the image<P>";
			chmod("$add",0777);
		}
		else{
			echo " -> Photo Upload Directory Error";exit;}
			
			$photoerror='true';
			if ($_FILES[file][type]=="image/jpg"){$photoerror='false';}
			if ($_FILES[file][type]=="image/jpeg"){$photoerror='false';}
			if ($_FILES[file][type]=="image/png"){$photoerror='false';}
			if ($_FILES[file][type]=="image/gif"){$photoerror='false';}
			if ($_FILES[file]['size'] > 2000000000) {
	        $photoerror='true';
	            }	
			if ($photoerror=='true'){
				echo " -> Photo Upload Type Error";
				exit;
			}
		else{
			mysql_query("update box_element set  photo= '$photo' where ID = '$editboxitem ' limit 1 ") or die (mysql_error());

			echo' -> Photo Upload Success';
			
		}
	}
	mysql_query("update box_element set  title= '$title' where ID = '$editboxitem ' limit 1 ") or die (mysql_error());
mysql_query("update box_element set  mytext= '$cleantext' where ID = '$editboxitem ' limit 1 ") or die (mysql_error());


	}
	
	
if ($boxphotos=='add'){
	
	$contentID=$_POST['contentID'];
	$photo=addslashes($_FILES[file][name]);
	
	if($photo!=''){
		$photo.=date("m.d.yg:i:sa");
		echo ' -> Adding Photo ';
		$add="../img/full/".$photo;
		echo $add;
		if(move_uploaded_file ($_FILES[file][tmp_name],$add)){

			//echo "<P>Successfully uploaded the image<P>";
			chmod("$add",0777);
		}
		else{
			echo " -> Photo Upload Directory Error";exit;}
			
			$photoerror='true';
			if ($_FILES[file][type]=="image/jpg"){$photoerror='false';}
			if ($_FILES[file][type]=="image/jpeg"){$photoerror='false';}
			if ($_FILES[file][type]=="image/png"){$photoerror='false';}
			if ($_FILES[file][type]=="image/gif"){$photoerror='false';}
			if ($_FILES[file]['size'] > 2000000000) {
	        $photoerror='true';
	            }	
			if ($photoerror=='true'){
				echo " -> Photo Upload Type Error";
				exit;
			}
		else{echo' -> Photo Upload Success';}
	}
	mysql_query("insert into blog_photos (ID, blogID, photo ) values  ('', '$contentID', '$photo') ") or die (mysql_error());


}
	
	
if ($newboxitem=='add'){
	$elementID=$_POST['elementID'];
	
		$data3=mysql_query("select * from page_element where ID='$elementID' order by ID DESC limit 1");
		while($info3=mysql_fetch_array($data3)){
			$thisbox=$info3['boxID'];
		}				

	
	$title=addslashes($_POST['title']);
	$newtext = str_replace("\r",'<br>',$_POST['mytext']);			
	$cleantext=addslashes($newtext);
	$photo=addslashes($_FILES[file][name]);
	if($photo!=''){
		$photo.=date("m.d.yg.i.sa");
		echo ' -> Adding Photo ';
		$add="../img/full/".$photo;
		echo $add;
		if(move_uploaded_file ($_FILES[file][tmp_name],$add)){

			//echo "<P>Successfully uploaded the image<P>";
			chmod("$add",0777);
		}
		else{
			echo " -> Photo Upload Directory Error";exit;}
			
			$photoerror='true';
			if ($_FILES[file][type]=="image/jpg"){$photoerror='false';}
			if ($_FILES[file][type]=="image/jpeg"){$photoerror='false';}
			if ($_FILES[file][type]=="image/png"){$photoerror='false';}
			if ($_FILES[file][type]=="image/gif"){$photoerror='false';}
			if ($_FILES[file]['size'] > 2000000000) {
	        $photoerror='true';
	            }	
			if ($photoerror=='true'){
				echo " -> Photo Upload Type Error";
				exit;
			}
		else{echo' -> Photo Upload Success';}
	}
	mysql_query("insert into box_element (ID, boxID, title, mytext, photo, date ) values  ('', '$thisbox', '$title', '$cleantext', '$photo', '') ") or die (mysql_error());


}

if ($deletepage!=''){	
	$delete = mysql_query("delete from pages where ID='$deletepage' limit 1");
	$delete = mysql_query("delete from page_element where pageID='$deleteelement' ");

	echo 'Page Deleted Successfully';
	echo 'Page Items Deleted Successfully';
}
	
	
if ($deleteelement!=''){	
	$delete = mysql_query("delete from page_element where ID='$deleteelement' limit 1");
	echo 'Item Deleted Successfully';
}

if ($deleteboxelement!=''){	
	$delete = mysql_query("delete from box_element where ID='$deleteboxelement' limit 1");
	echo 'BoxItem Deleted Successfully';
}

	
if ($editme!=''){	
	echo $editme;
	$newtext = str_replace("\r",'<br>',$_POST['pagecontent']);			
	$pagecontent=addslashes($newtext);
	$pageID=addslashes($_POST['pageID']);
	$elementID=addslashes($_POST['ID']);
	$layer=addslashes($_POST['layer']);
	$spacing=addslashes($_POST['spacing']);
	$lineheight=addslashes($_POST['lineheight']);
	$margin=addslashes($_POST['margin']);
	$padding=addslashes($_POST['padding']);
	//$height=addslashes($_POST['height']);
	//$width=addslashes($_POST['width']);
	$color=addslashes($_POST['color']);
	$background=addslashes($_POST['background']);
	if ($background==''){$background=' ';}
	$fontfamily=addslashes($_POST['fontfamily']);
	$fontsize=addslashes($_POST['fontsize']);
	$fontweight=addslashes($_POST['fontweight']);
	$margin=addslashes($_POST['margin']);
	$padding=addslashes($_POST['padding']);
	$opacity=addslashes($_POST['opacity']);
	$textalign=addslashes($_POST['textalign']);
	$radius=addslashes($_POST['radius']);
	$columnset=addslashes($_POST['columnset']);
	$boxtitle=addslashes($_POST['boxtitle']);
	
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
	$update=mysql_query("update page_element set columnset= '$columnset' where ID='$elementID' limit 1");
	$update=mysql_query("update page_element set lineheight= '$lineheight' where ID='$elementID' limit 1");
	

	
	//$update=mysql_query("update page_element set floaty= '$floaty' where ID='$elementID' limit 1");
	$data3=mysql_query("select * from page_element where ID='$elementID' ");
	while($info3=mysql_fetch_array($data3))
		{$thisPage=$info3['pageID'];
		$boxID=$info3['boxID'];
		$update=mysql_query("update page_box set columnset= '$columnset' where ID='$boxID' limit 1");
		
		$update=mysql_query("update page_box set title= '$boxtitle' where ID='$boxID' limit 1");
	}
	echo 'Item Saved Successfully';
}

	
	
//reorder navigation links	
$action = mysql_real_escape_string($_POST['action']); 
$updatepage = $_POST['pageArray'];
if ($action == "updatePageOrder"){
	$pageCounter = 1;
	foreach ($updatepage as $value) {
		$updatenow=mysql_query("UPDATE pages SET pageorder = '$pageCounter' WHERE ID = '$value'")or die(mysql_error('Page order was not updated in DB'));
		$pageCounter = $pageCounter + 1;	
	}
	echo '<pre>';
	print_r($updateRecordsArray);
	echo '</pre>';
	echo 'Page Order Saved';
}
	
	
//reorder elements links	
$elementaction = mysql_real_escape_string($_POST['action']); 
$updateElements = $_POST['element'];
if ($elementaction == "updateElementOrder"){
	$elementCounter = 1;
	foreach ($updateElements as $value) {
		$updatenow=mysql_query("UPDATE page_element SET elementlist = '$elementCounter' WHERE ID = '$value'")or die(mysql_error('Element order was not updated in DB'));
		$elementCounter = $elementCounter + 1;	
	}
	echo '<pre>';
	print_r($updateRecordsArray);
	echo '</pre>';
	echo 'Element Order Saved';
}
	
		
//reorder elements links	
$action = mysql_real_escape_string($_POST['action']); 
$updateBox = $_POST['boxelement'];
if ($action == "updateBox"){
	$boxCounter = 0;
		
	foreach ($updateBox as $value) {
		$boxCounter = $boxCounter + 1;
		$updatenow=mysql_query("UPDATE box_element SET boxelementorder = '$boxCounter' WHERE ID = '$value'")or die(mysql_error('Element order was not updated in DB'));
		
	}
	
	echo 'Box Order Saved';
}
	


	
?>