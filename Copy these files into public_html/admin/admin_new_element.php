<style>
.clear{clear:both;}
	.selex{width: 100px; 
	overflow:hidden; 
	float:left; 
	border-radius: 0px; 
	font-size: 11px;
	border-radius: 5px;
	 margin-right: 1px;
	 margin-left: 1px;
	 margin-top: 2px;
	margin-bottom: 2px;	 
	border-radius: 5px;}
	
	.slimx{width: 58px; 
	overflow:hidden; 
	float:left; 
	border-radius: 0px; 
	font-size: 11px;
	 margin-right: 1px;
	 margin-left: 1px;
	 margin-top: 2px;
	margin-bottom: 2px;
	border-radius: 5px;}
	
	.smallx{width: 41px;
	overflow:hidden; 
	float:left; 
	font-size: 11px;
	 margin-right: 1px;
	 margin-left: 1px;
	 margin-top: 2px;
	margin-bottom: 2px;
		 border-radius: 5px;}
		 
		 	
	.selex2{ background: #ffffff;  
	margin-top: 1px; 
	padding-left: 2px; 
	padding-right: 2px; 
	border-radius: 5px;
	 font-family: helvetica;
		clear:both; 
		width:260px;
		overflow:hidden; 
		float:left; 
		border-radius: 0px; 
		font-size: 10px;
		 border-radius: 5px;
		  margin:auto; 
		  margin-bottom: 3px;
		  }
		  
	label{text-align: left;}
	
	select{
	border: none; 
	border-radius:0px; 
	width: 115px;
	height: 30px; 
	background: #ccc; 
	font-size: 11px;
	padding-left: -5px;
	  }
	</style>
	<script>
$(document).ready(function(){
	
	$(".addphoto_button a").click(function(){
		$(".flippers").hide();
		$(".addphoto").slideDown(200);
			$(".buttons").css("background","none");
		$(".addphoto_button").css("background","#aaa");
		
		
	});
	
	
	$(".addtext_button a").click(function(){
		$(".flippers").hide();
		$(".addtext").slideDown(200);
		$(".buttons").css("background","none");
		$(".addtext_button").css("background","#aaa");
	});
	
	
$('.loadbox_trigger').click(function(e) {
		e.preventDefault();

		var link_href = $(this).attr("href");
		$(".flippers").hide();
		$('#addboxhere').html('loading...');		
		$('#addboxhere').load(link_href);
		
		
	});
	
	

	
});

</script>
<style> .buttons{float: left;
 width: 75px;
border-radius:8px;  
box-shadow:0px 5px 5px -3px;
padding: 8px; 
margin: 2px;
text-align:center; background: #fff; 
font-size: 10px; 
 }
 .buttons img{width: 50px;}
 .buttons a{color: #333333;}
.flippers{position: relative;} 
.addtext{display:none}
.addphoto{display:none}
.addbox{display:none}

</style>

<?

include('./connect.php');

		if(isset($_COOKIE['ID_my_site']))
	{ 
	$email = $_COOKIE['ID_my_site']; 
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	while($info = mysql_fetch_array( $check )) 
		{
		$myuserID=$info['ID'];
		$mywebsite=$info['title'];
		$paid=$info['paid'];
		
		}
		
	}

$thispage=$_GET['page'];

//echo $thispage;
$free_elements='20';
$free_pages='4';


if($paid!='y'){
$data22=mysql_query("select * from page_element where pageID='$thispage' ");
$count=mysql_num_rows($data22);
//echo $count;
if ($count>=$free_elements){echo'<b>Free Account:</b>
 <p>'.$free_elements.' things per page.<br> 
'.$free_pages.' pages. For Now....
</p> <p><a class="button" href="/welcome/services/"><b>Sign up for a paid account.</b></a><br>
  Get Unlimited things on your page, and unlimited pages  ';
exit;}
if ($count<='$free_elements'){ }
}
echo'<div style="margin-top: -20px; padding-left: 20px;">Add Content</div>';
echo'<div style="float:left; auto min-height:250px; margin: auto; text-align: center;">'; 
echo'<div class="flippers">';

echo'<div class=" addtext_button buttons"><a href="" onclick="return false"><img src="/img/icons/text.png"><br>Add Text</a></div>';
echo'<div class=" addphoto_button buttons"><a href="" onclick="return false"><img src="/img/icons/camera.png"><br>Add Photo</a></div>';


echo'<div class="addbox_button buttons" > <a class="loadbox_trigger"  href="/admin/admin_new_pagebox.php?page='.$thispage.'&type=2"><img src="/img/icons/gallerybox.png"><br>Photo box</a></div> ';

echo'<div class="addbox_button buttons" style="clear:both;" > <a class="loadbox_trigger"  href="/admin/admin_new_pagebox.php?page='.$thispage.'&type=3"><img src="/img/icons/blogbox.png"><br>Blog box</a></div> ';


echo'<div class="addbox_button buttons" > <a  class="loadbox_trigger"  href="/admin/admin_new_pagebox.php?page='.$thispage.'&type=4"><img src="/img/icons/videobox.png"><br>Video box</a></div>';

echo'<div class="addbox_button buttons"  > <a  class="loadbox_trigger"  href="/admin/admin_new_pagebox.php?page='.$thispage.'&type=7"><img src="/img/icons/shopbox.png"><br>Shop box</a></div>';


echo'<div class="addbox_button buttons"style="clear:both;" > <a class="loadbox_trigger" href="/admin/admin_new_pagebox.php?page='.$thispage.'&type=1"><img src="/img/icons/mobilemenu.png" height="40px;" width="40px;"><br>Menu Box</a></div></p> ';

echo'</div>';
echo'<div ID ="addboxhere"></div>';

		echo'<div class="addtext flippers">';
		echo'<FORM ENCTYPE="multipart/form-data"  METHOD="POST" >';
		echo'<input type="hidden" name="pageID" value="'.$thispage.'">';
		
			
		
	echo'<textarea name="mytext" style=" min-height: 50px; width:89%; margin-bottom: 10px;" placeholder="Write some words here. Choose Font and Style options below."></textarea><br>';
			
				
//FONT COLOR
	echo'<div class="selex2" >
	<input name="color" id="html5colorpicker" class="form-control" type="color" value="#777777" onchange="clickColor(0, -1, -1, 5)" style="height: 30px; width: 30px; float: left; padding: 0px; margin-right: 3px;">';
	//echo $color; 
		
		//FONT
	 
	echo'<div class="slimx">';
echo'<select name="fontfamily">';
		include('./admin_fonts.php');
		foreach($myfonts as $myfont){
		echo'<option style="font-family:'.$myfont.'" ';
		echo' value="'.$myfont.'" ';
		
		echo' >'.$myfont.'</option>';
		
		}
		
		echo'</select></div>';    
     
		echo'<div class="smallx">
		<select style="  width: 60px ;" name="fontsize">';
		$z='10';
			
			while($z<'120'){
			echo'<option style="" value="'.$z.'px"';
			if ($fontsize==$z){echo ' selected';}
			echo'>'.$z.'px</option>';
			$z++;
			}
		
		echo'</select></div>';
	
	

		// FONT WEIGHT
		//echo'<input style="float: right;" type="submit" name="editelementnow" value="Save">'; 
		$fontweight='regular';
	echo'<div class="slimx">
	<select name="fontweight">';
		
		echo'<option style="font-weight: regular" value="regular"';
		if($fontweight=='regular'){echo' selected';}
		echo'>Regular</option>';
		
		echo'<option style="font-weight: lighter" value="lighter"';
		if($fontweight=='lighter'){echo' selected';}
		echo'>Light</option>';
		
		echo'<option style="font-weight: bold" value="bold"';
		if($fontweight=='bold'){echo' selected';}
		echo'>Bold</option>';
		
		echo'</select></div>';
		
			
			
$textalign='left';
//ALIGN
echo'<div class="slimx" >';
echo'<select name="textalign">';
if ($textalign=='-'){$textalign='none';}
if ($textalign==' '){$textalign='none';}
	echo'<option value="left" ';
	if ($textalign=='left'){echo ' selected';}
	echo'>Left</option>';

	echo'<option value="center"';
	if ($textalign=='center'){echo ' selected';}
	echo'>Center</option>';
		
	
			
	echo'<option value="right"';
	if ($textalign=='right'){echo 'selected';}
	echo'> Right</option>';
	
	echo'</select></div>';

		echo'</div><div class="selex2" >';	

			
//Layer
	$z='1';
	echo'<div class="smallx clear" style="float:left;">Layer  ';
	echo'<select name="layer">';
	
	while($z<'6'){
			echo'<option value="'.$z.'"';
			if ($layer==$z.''){echo ' selected';}
			echo'>'.$z.'</option>';
			$z++;
			}
			echo'</select></div>';

	//PADDING
	$z='0';
	$padding='5px';
	echo'<div class="smallx">Padding';
	echo'<select name="padding">Padding';
	
			while($z<'101'){
			echo'<option style="" value="'.$z.'px"';
			if ($padding==$z.'px'){echo ' selected';}
			echo'>'.$z.'px</option>';
			$z++;
			}
			echo'</select></div>';
			
//Opacity
$opacity='1';
	echo'<div class="smallx">Opacity';
	echo'<select name="opacity">';
		$i='9';
			echo'<option style="" value="1" ';
			if ($opacity=='1'){echo ' selected';}
			echo'>1</option>';
			
			while($i>'2'){
			echo'<option style="" value="0.'.$i.'"';
			if ($opacity=='0.'.$i){echo ' selected';}
			echo'>0.'.$i.'</option>';
			$i--;
			}
		
		echo'</select></div>';
		

$radius='0';
//Border Radius
	$z='0';
	echo'<div class="smallx">Round ';
	echo'<select name="radius">';
	
	while($z<'101'){
			echo'<option value="'.$z.'px"';
			if ($radius==$z.'px'){echo ' selected';}
			echo'>'.$z.'</option>';
			$z++;
			}
			echo'</select></div>';
			
			
			
			
	//Line Height
	$z='0';
	$lineheight='5px';
	echo'<div class="smallx " style="font-size: 10px">Line Height';
	echo'<select name="lineheight">';
	
			while($z<'101'){
			echo'<option style="" value="'.$z.'px"';
			if ($lineheight==$z.'px'){echo ' selected';}
			echo'>'.$z.'px</option>';
			$z++;
			}
			echo'</select></div>';
	
	
	
	//Letter Spacing
	$z='0';
	
	echo'<div class="smallx " style="font-size: 10px">Letter Spacing';
	echo'<select name="spacing">';
	
			while($z<'101'){
			echo'<option style="" value="'.$z.'px"';
			if ($spacing==$z.'px'){echo ' selected';}
			echo'>'.$z.'px</option>';
			$z++;
			}
			echo'</select></div>';
	
			
	
				

	
		
	
	
echo'</div>';
//BACKGROUND COLOR FOR ELEMENT
	echo'<div class="selex2">';
	$background='-';
	echo' <input style="padding: 0px;  margn: 0px;  height: 28px; width:30px" name="background" id="html5colorpicker" class="form-control" type="color" value="'.$background.'" onchange="clickColor(0, -1, -1, 5)">
	Background Color
	<span style="float:right;"><input name="background" type="checkbox" value="-" ';
	if($background=='-'){echo 'checked';}
			echo'> None</span></div> ';
			echo'<div style="clear:both"></div>';
			


			
		


	
/*
/FLOAT DISABLED
$floaty='none';
echo'<div  class="selex">';
echo'<select name="floaty">';
if ($floaty=='-'){$floaty='none';}
if ($floaty==' '){$floaty='none';}
	echo'<option value="none" ';
	if ($floaty=='none'){echo ' selected';}
	echo'>No Float</option>';

	echo'<option value="left"';
	if ($floaty=='left'){echo ' selected';}
	echo'>Float Left</option>';
			
	echo'<option value="right"';
	if ($floaty=='right'){echo 'selected';}
	echo'>Float Right</option>';
	
	echo'</select></div>';
	*/
	
	echo'<div style="clear:both"></div>';
	
	//SUBMIT BUTTON
echo'<INPUT  style="clear:both; width: 100px; margin:auto; margin-top:20px;" TYPE="submit" name="submitnewelement" VALUE="Add Text">';
	

echo'</div>';

	echo'</FORM>';


echo' <div class="addphoto flippers"><div style="text-align:left; width: 100%;">Upload a Photo</div><FORM ENCTYPE="multipart/form-data"  METHOD="POST" class="dropzone">

<INPUT style="height: 150px; width: 350px; margin-top:20px;" NAME="file" TYPE="file">';
echo'<input type="hidden" name="pageID" value="'.$thispage.'">';
echo'<p><INPUT style="text-align: center; padding: 10px; margin-top:20px;"  TYPE="submit" name="submitelementphoto" VALUE="UPLOAD File"></FORM></p></div>';



echo' <div class="addbox flippers">';

$thistype=$_GET['type'];
echo'</script>';
	echo'<form method="POST" action="/index.php">';
	echo'<div class="alert" ><b></b>
	<input type="text" name="title" value="" placeholder="Box Title">';
	echo'<input type="hidden" name="page" value="'.$thispage.'">';
	echo'<input type="hidden" name="type" value="'.$thistype.'">';
	echo $thispagetype;
echo'</div>';

	echo'<input type="submit" name="newpagebox" value="Create Box">';
	echo'</form>';

echo'</div>';






echo'</div>';

	 
	


	 ?>