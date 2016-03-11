 <!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	
	 	
	 		<?$u=$_GET['u'];
	 		$l=$_GET['l']; ?>
	 		
<?	
	error_reporting(0); 		

include('./admin/connect.php');

 
	
$loggedin='false';	
if(isset($_COOKIE['ID_my_site']))
{ 
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ 
	$myuserID=$info['ID'];
	if ($pass != $info['password'])
	 	{ 
		 	//echo'no user /password match.'; // DO NOTHING	
		 } 
	else
	 	{	
		 	$loggedin='true';
	 	// echo 'You are Logged In.';
	 	}
	}
}

?>

<?include('./headermeta.php'); ?>
</head>

<? echo'<body class="'.$showpage.'">';?>

<?include('./admin/confirm.php'); ?>
<?include('./requiredstyle.php'); ?>
<?include('./functions.php'); ?>
<?include('./scripts.php'); ?>
	 



<div id="lightbox">
<p class="close"><a href="" onclick="return false"><img src="/img/icons/close.png"></a></p>
<div id="content">

</div>
 
</div>

<div id="lightbox2">
<p class="close2"><a href="" onclick="return false"><img src="/img/icons/close.png"></a></p>
    <div id="content2">

</div>
 
</div>

<noscript></noscript>

<div id="wrapper">
<div id="headcontainer">
<header>

<?
include('./links.php');  
?>
</header>
	
	</div> 

<?
//////INTERACTIVE
echo'<div id="interactive" style="z-index: 100000;">';
echo'<div class="xinteractive"><a href="" onclick="return false">X</a></div>';
echo'<div class="layer">
<div style="color: red; font-size: 30px;">The LAYER IS EMPTY</div>';
echo'</div></div>';//end Interactive



echo'<div id="interactive2" style="z-index: 100000;">';
echo'<div class="xinteractive"><a href="" onclick="return false">X</a></div>';
echo'<div class="layer">
<div style="color: red; font-size: 30px;">The LAYER IS EMPTY</div>';
echo'</div></div>';//End 2nd Interactive Layer

	

	//SWITCH FROM URLTEXT TO PAGE ID
	$data3=mysql_query("select * from pages where urltext='$showpage' ");
					while($info3=mysql_fetch_array($data3))
					{$thispageID=$info3['ID'];}
	
	
 ///

///////ADMIN STUFF LOG IN AND LINKS
if($loggedin=='true')
	 	{
$data3=mysql_query("select * from pages where ID='$thispageID' limit 1");
while($info3=mysql_fetch_array($data3))
	{	$here=$info3['ID'];
	$pic=$info3['photo'];
	$safepic = str_replace( ' ', '+', $pic ); 
	$background=$info3['background'];
		$safebg=str_replace("#", "", $background);
			}
	 	
	$pagecheck = mysql_query("SELECT * FROM pages ")or die(mysql_error());
$pagecount=(mysql_num_rows($pagecheck));

echo'<div style="position: fixed; top: 0px; left: 0px; z-index: 10000; background: #fff; border-radius: 5px; padding: 3px;  border: solid 1px #ccc;" > ';

echo'<a class="secretmenu_trigger" href="#">
<img style="float: left;"  src="/img/icons/star_small.png" width="30px" style="margin: 5px;" >

</a>';

echo'<div class="secretmenu"  style="z-index: 1000; width: 318px; clear:both; ">';
	
echo'<p style="position: absolute; top: -40px; right: 0px; text-transform uppercase; font-size: 12px;"><a class="secretlink lightbox_trigger" href="/logout.php"><img  width="15px" src="/img/icons/logout.png"> Log out</a></p>';



//1st Menu Row

		
echo' <div class="menub">';
	

echo'<a class="secretlink lightbox_trigger" href="/admin/admin_new_page.php">
<img  width="30px" src="/img/icons/newpage.png"><br> New Page</a>';
	echo'</div>'; //nopages
	
if($pagecount!='0'){

	


	echo '<div class="menub">';
	echo '<a class="secretlink lightbox_trigger" href="/admin/admin_new_element.php?page='.$thispageID.'">
	<img width="40px" style="margin:auto;" src="/img/icons/addcontent.png"><br>Add Content</a> ';
	echo'</div>';



echo' <div class="menuc">
		<a class="secretlink lightbox_trigger small" href="/admin/index.php?page='.$thispageID.'">
		<img width="15px" src="/img/icons/editpage.png"><br> Edit Page</a>
		</div>';


echo' <div class="menuc">
<a class="secretlink lightbox_trigger small" href="/admin/admin_duplicate_page.php?dupeID='.$here.'&bg='.$safebg.'&pic='.$safepic.'">
<img src="/img/icons/copypage.png" width="27px">
<br> Copy Page</a></div>';


echo' <div class="menuc">
<a class="secretlink small" style="color: #000; " href="/index.php?dy='.$here.'">
<img  width="25px" src="/img/icons/deletepage.png"><br>Delete Page</a></div>';//lastrow of 3



		
echo' <div class="menuc">
	<a class="secretlink lightbox_trigger" href="/admin/form/form_simplebg.php?tpage='.$thispageID.'">
	<img  width="25px" src="/img/icons/stockimages.png"><br>Page Background</a>
	</div>';
echo' <div class="menuc">';
echo'<a class="secretlink lightbox2_trigger" href="/admin/findphoto.php?page='.$page.'"><img  width="25px" src="/img/icons/stockimages.png"> <br>Find Images</a>
</div>';
echo' <div class="menuc">';
echo'<a class="secretlink lightbox_trigger" href="/admin/admin_links.php"><img  width="25px" src="/img/icons/drafts.png"><br>Drafts</a></div> ';



	
echo' <div class="menuc">
<a class="secretlink small lightbox_trigger" style="color: #000; " href="/admin/admin_new_logo.php"><img src="/img/icons/sitestyle.png" width="30px"><br>Site Banner</a>
</div>';

echo' <div class="menuc">
<a class="secretlink small lightbox_trigger" style="color: #000; " href="/admin/admin_link_style.php"><img src="/img/icons/sitestyle.png" width="30px"><br>Nav Style</a>
</div>';//lastrow of 3

echo' <div class="menuc">';
echo'<a class="sectetlink small lightbox_trigger" href="/admin/admin_theme.php"><img src="/img/icons/sitestyle.png" width="30px"><br>CSS Editor</a>
</div>';

echo'<div style="font-size: 10px; margin-top: 20px; margin-bottom: 20px; ">View Mode:</p><form method="post" style="margin: 0px; font-size: 10px; ">';

		echo'<div class="menua">Designer<br>
		<input class="modebutton blue" name="mode" value="Designer" type="submit" style="padding:0px;">
		</div>';


		echo'<div class="menua">
		Desktop<br>
		<input class="modebutton yellow" name="mode" value="Viewer" type="submit" style="padding:0px;">
		</div>';
		
		echo'<div class="menua">
		Tablet<br>
		<input class="modebutton green" name="mode" value="Tablet" type="submit" style="padding:0px;">
		</div>';
		
			echo'<div class="menua">
		Phone<br>
		<input class="modebutton red" name="mode" value="Phone" type="submit" style="padding:0px;">
		</div>';
			echo'</form>';
		
	echo'</div>';
	
	} //end rows
	
	
	echo'</div>
</div>'; 
	   		
	
	 		
	 	}


?>


<div id="maincontentcontainer">
	<div id="maincontent">
	
<?
///////GET SELECTED PAGE
$data3=mysql_query("select * from pages where ID='$thispageID' limit 1");
while($info3=mysql_fetch_array($data3))
	{	
		
		$page_ID=$info3['ID'];
		$page=$info3['content'];
		$adminID=$info3['adminID'];
		$title=stripslashes($info3['title']);
		$text=stripslashes($info3['text']);
		$photo=stripslashes($info3['photo']);
		$background=stripslashes($info3['background']);	
		

			if($loggedin=='true')
				{include('./simplepage_editor.php');}
			if($loggedin=='false')
				{include('./simplepage_visitor.php');}
		

	}
	
		
if ($pageexist=='0')
	{
	echo 'No Page Published Here...';
	if($mywebsite==$u)
		{
		echo'<a class="lightbox_trigger" href="./admin/admin_new_page.php">
		<p><b>Start a page now.</b></a>';
		}
	 }
	
	
	?>
	</div> 
</div>
<!-- END Min Content Container-->

	   		
<div ID="newest" style="height: 10px;clear:both; width: 100%;"></div>
</div>

<div ID="footercontainer">
	<footer>
		<?include('./footer.php');?>
	</footer>
</div>
<!--END Footer container-->


<?
//END OF PAGE SCRIPTS	
?>
	<!--[if (lt IE 9) & (!IEMobile)]>
	<script src="js/selectivizr-min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="/js/dropzone.js"></script>

<?
//MOBILE STYLES LOAD AFTER EVERYTHING ELSE
?>
<style>
	
.goodbox{}
@media (max-width:12000px){
#linksbar{ }
#linksbar2{height: auto; display:none; width: 200px; position: absolute; z-index: 500; }
#headcontainer{ height: auto;}
header{ height: auto;height: auto; }
.plus{display:none;}
.elements{ float:none;  }
}


@media (max-width:950px){
	.plus{display:block;}
	body{max-width: 99vw; overflow-x:hidden;}
	.elements{position:relative; top: 0%;left:0%;  margin: auto; width: 80%; height: auto; min-height: 0px; float:none;}
	.elements>img{width: 90%; height: auto; margin: auto; }
	.pictures{width: 90%; min-width: 100%; max-width: 100%; height: auto;min-height: 0px; margin: auto; margin-top: 10px;  }
.linksbarmobile{display:block;}
	.goodbox{height: 140px; }
	
#linksbar{height: 0px; overflow:hidden; }
#linksbar_simple{height: 0px; overflow:hidden; display:none; }
}


@media (max-width:500px){

.goodbox{height:auto; }
.lightbox{width: 300px; height: auto; margin:0px;padding: 0px;margin-left: 0px;}
.lightbox2{width: 300px; height: auto; margin: auto; padding: 5px;}
.elements{position:relative; top: 0%;left:0%;  margin: auto; width: 90%; height: auto;min-height: 0px; padding: 3px;  float:none; clear:both;  }
.elements>img{width: 90%; height: auto; margin: auto; }
.pictures{width: 90%; min-width: 100%; max-width: 100%; height: auto;min-height: 0px; margin: auto; margin-top: 10px;  }
.largefont{font-size:25px;}
.smallfont{font-size:15px;}
#linksbar{height: 0px; overflow:hidden; }

.logo img{max-height: 50px;}

#headcontainer{ height: auto;}
header{ height: auto;}
.plus{display:block;}
.pagephoto{width: 100%; overflow: hidden;}
#maincontent{width:90;}

}
</style>


<?
// VIRTUAL CSS FOR MOBILE EDIT MODES 
if($mode=='Tablet'){
	
	echo'<style>
	html{height: auto;}
	body{height: auto;}
.goodbox{height:auto; }
#wrapper{max-width:600px; margin: auto; overflow:hidden; border: solid 5px #121212;  border-radius: 20px}
.elements{position:relative; top: 0%;left:0%;  margin: auto; width: 98%; height: auto; float:none;}
.elements{position:relative;  top: 0%;left:0%;  margin: auto; width: 98%; height: auto;  min-height: 0px; padding: 3px;  float:none; clear:both;  }
.elements>img{width: 90%; height: auto; margin: auto; }
.largefont{font-size:25px;}
.smallfont{font-size:15px;}
#linksbar{height: 0px; overflow:hidden; }
#linksbar_simple{height: 0px; overflow:hidden; }
#headcontainer{ height: auto;}
header{ height: auto;}
.plus{display:block;}
.pagephoto{width: 90%; overflow: hidden;}

.pagephoto{width: 360px; position: absolute;}
.col{width: 100%;}
</style>
';
}


if($mode=='Phone'){
	
	echo'<style>
	html{height: auto;}
	body{height: auto;}
.goodbox{height:auto; }
#wrapper{max-width:320px; margin: auto; overflow:hidden; border: solid 5px #121212; border-radius: 20px}
#maincontent{width:100%;}

.elements{position:relative; top: 0%;left:0%;  margin: auto; width: 97%; height: auto; float:none;}
.elements{position:relative;  top: 0%;left:0%;  margin: auto; width: 97%; height: auto; min-height: 0px; padding: 3px;  float:none; clear:both;  }
.elements>img{max-width: 99%; height: auto; margin: auto; }
.largefont{font-size:25px;}
.smallfont{font-size:15px;}
#linksbar{height: 0px; overflow:hidden; }
#linksbar_simple{height: 0px; overflow:hidden; }
#headcontainer{ height: auto;}
header{ height: auto;}
.plus{display:block;}
.pagephoto{width: 100%; overflow: hidden;}
.logo img{max-height: 50px;}
.pagephoto{width: 320px; position: absolute;}
.col{width: 100%;}
</style>
';
}

?>

<?mysql_close();
?>


<?exit;?>

</body></html>
