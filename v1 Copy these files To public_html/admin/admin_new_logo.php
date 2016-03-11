 
<script type="text/javascript">
$(document).ready(function(){	
	
		
$('.lightbox2_trigger').click(function(e) {
		e.preventDefault();
		$('.secretmenu').slideUp(500);
		var link_href = $(this).attr("href");
		var myoffset = $( this ).offset();
		$('#content2').html('loading...');		
		$('#content2').load(link_href);
		$('#lightbox2').show();
		 $('#lightbox2').offset( myoffset);
		 $('#lightbox2').animate({left: "10%"}, 300, "swing" );
	
	});
		$('.close2 a').click(function() {
			$('#content2').html('');
		$('#lightbox2').fadeOut(200);
	});

});
</script>
	
	<style>
	.selex{width: 105px; overflow:hidden; float:left; border-radius: 0px; font-size: 14px; border-radius: 5px; margin-right: 3px;margin-bottom: 3px;}
	.selex2{
		 background: #fff;  margin-top: 1px;  padding-left: 2px; padding-right: 2px; border-radius: 5px; font-family: arial; font-size: 12px;
		
		width: 209px; 
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



$data = mysql_query("SELECT * FROM stylesheet WHERE ID='1' order by ID asc limit 1")or die(mysql_error());
while($info = mysql_fetch_array( $data )) 
	{
		
		$logo=stripslashes($info['logo']);

		$logoheight=stripslashes($info['logoheight']);


		
		$sitewidth=stripslashes($info['sitewidth']);
		$headerwidth=stripslashes($info['headerwidth']);
		$headercolor=stripslashes($info['headercolor']);
		$opacity=stripslashes($info['opacity']);
		

		$linkcolor=stripslashes($info['linkcolor']);
		$hovercolor=stripslashes($info['hovercolor']);
		$selectedcolor=stripslashes($info['selectedcolor']);
		
		$linkbg=stripslashes($info['linkbg']);
		$hoverbg=stripslashes($info['hoverbg']);
		$selectedbg=stripslashes($info['selectedbg']);	
		
		$opacity=stripslashes($info['opacity']);
		$radius=stripslashes($info['radius']);
		$linksbarradius=stripslashes($info['linksbarradius']);
		$fontfamily=stripslashes($info['fontfamily']);
		$fontsize=stripslashes($info['linksize']);
		$fontweight=stripslashes($info['fontweight']);
		
		

		echo'<FORM ENCTYPE="multipart/form-data"  METHOD="POST" action="/index.php">';
		
		

echo' <div class="selex2" style=" width: 210px; height: auto;  padding: 3px; text-align: center; clear:both;"> 
		Site Banner <br>';
		if($logo!='')
		{
			echo'<img src="/img/logo/'.$logo.'" width="70px">';
			//echo'<br>Choose a new logo<br>';
			
		}
			echo'<INPUT style="width:200px; " NAME="file" TYPE="file"></div>';
			if($oldphoto==''){$oldphoto='-';}
		if($oldphoto!='-')
			{
			echo'
			<input name="removelogo" type="checkbox" value="-">Remove Logo</p>';
			}

	
//HEADER WIDTH
	echo'<div class="selex" style=" ">';
	echo'Header Width <br>';
	echo'  <select name="headerwidth">';
	
	
		$z='100';		
		while($z>'40'){
		echo'<option style="" value="'.$z.'%"';
		if ($headerwidth==$z.'%'){echo ' selected';}
		echo'>'.$z.'%</option>';
		$z=$z-5;
		}		

echo'</select></div><p style="width: 100%;"></p>';

	
//Logo Height
	echo'<div class="selex" style=" ">';
	echo'Logo Height <br>';
	echo'  <select name="logoheight">';
	
	
		$z='500';		
		while($z>'10'){
		echo'<option style="" value="'.$z.'px"';
		if ($logoheight==$z.'px'){echo ' selected';}
		echo'>'.$z.'px</option>';
		$z=$z-1;
		}		

echo'</select></div><p style="width: 100%;"></p>';



		
		//SITE WIDTH

	echo'<div class="selex" style="">';
	echo'Content Width'; 
	echo'<select name="sitewidth">';
	$z='100';		
		while($z>'60'){
		echo'<option style="" value="'.$z.'%"';
		if ($sitewidth==''.$z.'%'){echo ' selected';}
		echo'>'.$z.'%</option>';
		$z=$z-5;
		}		
	echo'</select></div>';
			



echo'<div class="selex2" style="">';
	if($headercolor==''){$headercolor='#ffffff';}
	echo'Header Background Color<br>';
	echo' <input style="padding: 0px;  margn: 0px;  height: 18px; width:30px" name="headercolor" id="html5colorpicker" class="form-control" type="color" value="'.$headercolor.'" onchange="clickColor(0, -1, -1, 5)">
	<input name="headercolor" type="checkbox" value="-" ';
	if($headercolor=='-'){echo 'checked';}
			echo'> None</div> <p style="width: 100%;"></p>';
			
	
//Opacity
	echo'<div class="selex" style="float:left; ">';
	echo'<select name="opacity">';
		$i='9';
			echo'<option style="" value="1" ';
			if ($opacity=='1'){echo ' selected';}
			echo'>Opacity 1</option>';
			
			while($i>'3'){
			echo'<option style="" value="0.'.$i.'"';
			if ($opacity=='0.'.$i){echo ' selected';}
			echo'>Opacity 0.'.$i.'</option>';
			$i--;
			}
		
		echo'</select></div>';




//HEADER Border Radius
	$z='0';
	echo'<div class="selex clear ">';
	echo'<select style=""  name="radius">';
	
	while($z<'30'){
			echo'<option value="'.$z.'px"';
			if ($radius==$z.'px'){echo ' selected';}
			echo'>Roundness '.$z.'</option>';
			$z=$z+5;
			}
			echo'</select></div>';





			
			
echo'<div style="clear:both; text-align: center;"><input type="submit" name="updatestyle" value="Save"></div>';
		


	
	}//while

		 
		 
		 
		 
		 }//Admin login
	 	 
	}
}

else // go to login
{
}

	 ?>
