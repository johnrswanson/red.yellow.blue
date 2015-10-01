 <div style="margin-left: 17px;margin-top: -23px;">Link Colors</div><style>
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
	

<?include('connect.php');
if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	if ($pass != $info['password'])
	 	{ 	 	} 
	 else
	 {
	 //////////ADMIN IS LOGGED IN



$data = mysql_query("SELECT * FROM stylesheet order by ID asc limit 1")or die(mysql_error());
while($info = mysql_fetch_array( $data )) 
	{
		
			
		$fontfamily=stripslashes($info['fontfamily']);
		$fontweight=stripslashes($info['fontweight']);
		$myfontsize=stripslashes($info['linksize']);
	
			
		$linkcolor=stripslashes($info['linkcolor']);
		$hovercolor=stripslashes($info['hovercolor']);
		$selectedcolor=stripslashes($info['selectedcolor']);
	$navbackground=stripslashes($info['navbackground']);
		
		
		

		echo'<FORM ENCTYPE="multipart/form-data"  METHOD="POST" action="/index.php">';
		

echo'Main Menu Font:<br>
<div class="selex2" style=" clear:both;">';

	echo'<div class="slimx" style="">';
	if($fontfamily==''){$fontfamily='helvetica';}
		include('admin_fonts.php');
	echo'<select  name="fontfamily">';

		
		foreach($myfonts as $myfont){
		echo'<option style="font-family:'.$myfont.'" ';
		echo' value="'.$myfont.'" ';
		if ($fontfamily==$myfont){echo ' selected';}
		echo' >'.$myfont.'</option>';
		
		}
		
		echo'</select></div>';
		
		
		
		

		
		
		// HEADER FONT WEIGHT
		//echo'<input style="float: right;" type="submit" name="editelementnow" value="Save">'; 
		if($fontweight==''){$fontweight='regular';}
	echo'<div class="slimx" style="width: 75px;"><select style="width: 95px;" name="fontweight">';
		
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
		
				
//HEADER FONT SIZE
		echo'<div class="smallx" style="width: 50px; ">
		<select style="  width: 70px ;" name="fontsize">';
		$z='10';
			
			while($z<'120'){
			echo'<option style="" value="'.$z.'px"';
			if ($myfontsize==$z.'px'){echo ' selected';}
			echo'>'.$z.'px</option>';
			$z++;
			}
		
		echo'</select></div>
		
		</div>';
	

		
echo'<div class="selex2" style="clear:both;">';
////LINK COLOR
	if($linkcolor==''){$linkcolor='#cccccc';}
	echo' <input style="padding: 0px;  margn: 0px;  height: 18px; width:30px" 
	name="linkcolor" id="html5colorpicker" class="form-control" type="color" 
	value="'.$linkcolor.'" onchange="clickColor(0, -1, -1, 5)"> Menu Link Color
	</div> ';
	
	
	echo'<div class="selex2" style="float:left; clear:both">';
	if($hovercolor==''){$hovercolor='-';}
	echo'';
	echo' <input style="padding: 0px;  margn: 0px;  height: 18px; width:30px" 
	name="hovercolor" id="html5colorpicker" class="form-control" type="color" 
	value="'.$hovercolor.'" onchange="clickColor(0, -1, -1, 5)">
	  Hover Color
	  <span style="float:right"><input name="hovercolor" type="checkbox" value="-" ';
	if($hovercolor=='-'){echo 'checked';}
	echo'> None</span></div> ';
	
	/*echo'<div class="selex2" style="float:left; clear:both ">';
	if($selectedcolor==''){$selectedcolor='-';}
	echo'';
	echo' <input style="padding: 0px;  margn: 0px;  height: 18px; width:30px" 
	name="selectedcolor" id="html5colorpicker" class="form-control" type="color" 
	value="'.$selectedcolor.'" onchange="clickColor(0, -1, -1, 5)">
	 Selected Color<span style="float:right"> <input name="selectedcolor" type="checkbox" value="-" ';
	if($selectedcolor=='-'){echo 'checked';}
	echo'> None</span></div> ';
	*/


echo'<div class="selex2" style="clear:both; margin-top: 10px;"> ';
	if($navbackground==''){$navbackground='-';}
	echo' <input style="padding: 0px;  margn: 0px;  height: 18px; width:30px" 
	name="navbackground" id="html5colorpicker" class="form-control" type="color" 
	value="'.$navbackground.'" onchange="clickColor(0, -1, -1, 5)">
	 Menu Background <span  style="float:right;" ><input name="navbackground" type="checkbox" value="-" ';
	if($navbackground=='-'){echo 'checked';}
	echo'> None</span></div> ';
	

			//MENU Border Radius
	$z='0';
	echo'<div class="selex2"  style="margin-top: 10px; width:auto;">';
	echo'Round Menu: <select style="width: 40px;"  name="linksbarradius">';
	
	while($z<'30'){
			echo'<option value="'.$z.'px"';
			if ($linksbarradius==$z.'px'){echo ' selected';}
			echo'>'.$z.'</option>';
			$z=$z+5;
			}
			echo'</select></div>';

echo'<div style="margin-top:18px;width:100%; text-align:center; clear:both;"><input style="" type="submit" name="updatelink" value="Save"></div></form>';
		

			


	
	}//while

		 
		 
		 
		 
		 }//Admin login
	 	 
	}
}

else // go to login
{
}

	 ?>
