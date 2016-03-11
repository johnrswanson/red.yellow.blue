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
	border-radius: 5px;
	padding-left: 0px;}
	
	.slimx{width: 58px; 
	overflow:hidden; 
	float:left; 
	border-radius: 0px; 
	font-size: 11px;
	 margin-right: 1px;
	 margin-left: 1px;
	 margin-top: 2px;
	margin-bottom: 2px;
	border-radius: 5px;
	padding-left: 0px;}
	
	.smallx{width: 41px;
	overflow:hidden; 
	float:left; 
	font-size: 11px;
	 margin-right: 1px;
	 margin-left: 0px;
	 margin-top: 2px;
	margin-bottom: 2px;
		 border-radius: 5px;
		 padding-left: 0px;}
	
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
		font-size: 10px;
		 border-radius: 0px;
		  margin:auto; 
		  margin-bottom: 3px;
		  }
		  
	label{text-align: left;}
	input{border-radius:0 }
	
	select{
	border: none; 
	border-radius:none; 
	width: 115px;
	height: 30px; 
	background: #ccc; 
	font-size: 11px;
	margin-left:-3px;
		
	  }
	</style>
<style>
	.selex{width: 90px; overflow:hidden; float:left; border-radius: 0px; font-size: 14px; border-radius: 5px; margin-right: 3px;
	margin-bottom: 3px;}
	.selex2{
		 background: #fff;  margin-top: 1px;  padding-left: 2px; padding-right: 2px; border-radius: 5px; font-family: arial; font-size: 12px;
		 
		clear:both; 
		width: 260px; 
		overflow:hidden; 
		float:left; 
		border-radius: 0px; 
		font-size: 13px;
		 border-radius: 5px;
		  margin-right: 3px; 
		  margin-bottom: 3px;
		  }
	
	select{
	border: none; 
	border-radius:0px; 
	width: 130px;
	 padding-left: -3px;
	 padding-top: 5px; padding-bottom: 5px;
	  }
	</style>
	
	

<!--USE THIS WHEN FIX FOR SERIALIZE FOR PHOTOS AND TEXT LINE BREAKS IS FOUND
<script type="text/javascript">     
$(document).ready(function(){

  
           
  $( "#helper" ).submit(function(j) {
  	j.preventDefault();
    	var data= $( "#helper" ).serialize();
  		$.post('/admin/confirm.php' , data);
	$("#lightbox").html('Success. Element Updated.  <a href="">OK</a> ');
    });



});  

</script>
-->



<?


if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	if ($pass != $info['password'])
	 	{
	 	} 
	 else
	 {
	 	//////////ADMIN IS LOGGED IN
 
 
 //GET ELEMENT VARIABLES
$editelement=$_GET['editelement'];
if(isset($editelement))
	{ 
	$data=mysql_query("select * from page_element where ID='$editelement' order by ID ASC limit 1");
	while($info=mysql_fetch_array($data))	
	{	$thispage=$_info['pageID'];
		$file=stripslashes($info['file']);
		$height=stripslashes($info['height']);
		$width=stripslashes($info['width']);
		$fontcolor=stripslashes($info['color']);
		$background=stripslashes($info['background']);
		$radius=stripslashes($info['radius']);
		$fontfamily=stripslashes($info['fontfamily']);
		$fontsize=stripslashes($info['fontsize']);
		$fontweight=stripslashes($info['fontweight']);
		$floaty=stripslashes($info['floaty']);
		$paragraphs=str_replace("<br>",'',$info['pagecontent']);
		$oldtext = stripslashes($paragraphs);
		$fontfamily=stripslashes($info['fontfamily']);
		$margin=stripslashes($info['margin']);
		$padding=stripslashes($info['padding']);
		$opacity=stripslashes($info['opacity']);
		$textalign=stripslashes($info['textalign']);
		$layer=stripslashes($info['layer']);
		$lineheight=stripslashes($info['lineheight']);
		$spacing=stripslashes($info['spacing']);
		
		$myboxID=stripslashes($info['boxID']);
		$mode=$_GET['mode'];
	
	
	
		
///GET BOX INFO FOR THIS ELEMENT IF IT IS A BOX		
$data25=mysql_query("select * from page_box where ID='$myboxID' order by ID ASC");
	
	while($info25=mysql_fetch_array($data25))	
	{	
		$box_type=stripslashes($info25['box_type']);
		$columnset=stripslashes($info25['columnset']);
		$boxtitle=stripslashes($info25['title']);
		//echo $box_type;
		//end while
	}
	echo'<div style="">';//NOT NESSARY 
	?>

	<?
	
///BEGIN HANDLE ELEMENT FORM
	echo'<form method="post" ID="helper" ENCTYPE="multipart/form-data">';
	
	
//Pass on the elementID
	echo'<input type="hidden"  name="lmntID" value="'.$editelement.'">';

	
///FORMS FOR BOXES ONLY
	if($myboxID!=''){
if($box_type!='1'){
//BOX TITLE
	echo'<input type="text" 
	name="boxtitle" 
	value="'.$boxtitle.'" 
	style="width:250px;">';
		
		
// ROWS FOR BOX
	echo' <div class="selex2" style=" width: 110px; overflow:hidden;"> 
		<div class="selex" style="width: 60px;" > Columns:</div>';
	echo'<div style="width: 40px; overflow:hidden;">';
	echo'<select class="selex" style="width: 60px;" name="columnset"></div>';
		$c='1'; while($c<'10'){
			echo'<option style="" value="'.$c.'"';
			if ($columnset==$c){echo ' selected';}
			echo'>'.$c.'</option>';
			$c++;
			}
		echo'</select></div>';
		echo'</div>';
		
}			
				
				
echo'<div style="clear:both;">';
 //LOAD FORMS FOR BOX TYPES	
		if($box_type=='2'){include('./form/form_photo.php');}
		if($box_type=='3'){include('./form/form_blog.php');}
		if($box_type=='4'){include('./form/form_video.php');}
		//if($box_type=='5'){include('/admin/form/form_calendar.php');}
		//if($box_type=='6'){include('/admin/form/admin_custompage.php');}
		if($box_type=='7'){include('./form/form_store.php');}
		//if($box_type=='8'){include('/admin/form/form_staff.php');}
		//if($box_type=='9'){include('/admin/form/form_class.php');}
		//if($box_type=='10'){include('/admin/form/form_album.php');}
		//if($box_type=='11'){include('/admin/form/form_magazine.php');}
	
				echo'</div>';
	}
	
//EDIT THE ACTUAL TEXT OF THIS ELEMENT
	if ($oldtext!=''){
		if($background=='-'){$editbg='#ffffff';} else {$editbg=$background;}	
echo'<textarea name="mytext" style=" background-color:#ffffff; margin-bottom: 10px; border: none; min-height: 150px; width: 99%; min-width:80%; color: #000000 ; font-size: 15px;  font-family: '.$fontfamily.'" >'.$oldtext.'</textarea><br>';
			
		}

	
//EDIT PHOTO FOR THIS ELEMENT
	if ($file!=''){
		
		echo'<P><INPUT NAME="file" TYPE="file"><P><img src="/img/full/'.$file.'" width="200px"><br>';
	}		
		
		
		if ($file==''){		
//FONT COLOR
	echo'<div class="selex2" >
	<input name="color" id="html5colorpicker" class="form-control" type="color" value="'.$fontcolor.'" onchange="clickColor(0, -1, -1, 5)" style="height: 30px; width: 30px; float: left; padding: 0px; margin-right: 3px;">';
	//echo $color; 
		
		//FONT
	 
	echo'<div class="slimx">';
echo'<select name="fontfamily">';
		include('./admin_fonts.php');
		foreach($myfonts as $myfont){
		echo'<option style="font-family:'.$myfont.'" ';
		echo' value="'.$myfont.'" ';
		if($myfont==$fontfamily){echo' selected ';}
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

			}	
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
			
			
			
if ($file==''){				
	//Line Height
	$z='0';

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
	
	echo' <input style="padding: 0px;  margn: 0px;  height: 28px; width:30px" name="background" id="html5colorpicker" class="form-control" type="color" value="'.$background.'" onchange="clickColor(0, -1, -1, 5)">
	Background Color
	<span style="float:right;"><input name="background" type="checkbox" value="-" ';
	if($background=='-'){echo 'checked';}
			echo'> None</span></div> ';
			echo'<div style="clear:both"></div>';
			


}				
		


	
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

		


	
			

echo'<div style="clear:both; text-align: center;">';
	echo'<input style=" position: relative; right:0px; margin:auto; margin-top: 20px;" type="submit" name="editelementnow" value="Save">';
	

	echo'<input type="hidden" ID="mode" width="50px" name="mode" value="'.$mode.'"/>';
		
	
echo'<a style=" background: #f33; color: #fff; padding: 10px; margin-left: 50px; border-radius: 3px; " href="/?deleteelement='.$editelement.'">Delete</a>';
	
		echo'</div></form>';
		
	
	exit;
	}//end loop
	
	}//isset
 
	 	 }//login
	}
}



	 ?>
	 
		
