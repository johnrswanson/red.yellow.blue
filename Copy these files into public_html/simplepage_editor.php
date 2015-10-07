
<style>
li { list-style:none;    }
#elementLeft {width: auto; }
#elementLeft li { list-style:none; color:#000; width: auto;   }
#elementRight { font-size:10px; margin:0px; padding:0px; background-color:none;color:#000;}
.ui-resizable-handle{margin-top: 10px; margin-left: 10px;}
</style>

  	

<?
/////////GET LOGIN INFO FOR USER  -- IS VISITOR LOGGED IN?

if(isset($_COOKIE['ID_my_site']))
{ 
$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ 
	$myuserID=$info['ID'];
	$mywebsite=$info['title'];
	if ($pass != $info['password'])
	 	{ 	} 
	else
	 	{
	 		
	 	$loggedin='true';
	 	}
	}
}








if($loggedin=='true'){

//EDITOR MODE
$mode=$_POST['mode'];
	
	if ($mode==''){$mode='Designer';}
echo'<style> 

#elementLeft{height:1.25vh;}
.red{color: red;

	background:url(\'/img/icons/phone.png\')0px 0px;
	background-repeat:no-repeat;
	background-size: 90%;
	border-color: none}
	
	
.green{clear:both;
	background:url(\'/img/icons/tablet.png\')2px 1px;
	background-repeat:no-repeat;
	background-size: 90%;
	border-color: none;
	}



.yellow{clear:both;
	background:url(\'/img/icons/desktop.png\')2px 3px;
	background-repeat:no-repeat;
	background-size: 90%;
	border-color: none;
	}
	
.blue{
	color: blue;
	background:url(\'/img/icons/designer.png\')3px 3px;
	background-repeat:no-repeat;
	background-size: 80%;
	border-color: blue;}
	
.modebutton{ 

	width: 50px;
	height: 50px; 
 color: #555555; 
font-family: helvetica;
text-transform: uppercase; 
border-radius: 0px;
padding: 1px;
font-size: 0px;
text-shadow:0px;
padding:0px;
padding-top: 10px;
margin-bottom: 0px;

}




</style>';


echo'<div style="position:fixed; top: 0px; right:99px; z-index: 199999;">
		
	</div>';
	
	
	
	
}







/////START MAKING NEW SIMPLE PAGE 
echo'<div ID="pagearea" class="pagebox">';//CSS /Jquery hook to reload
	
	
//PUT BACKGROUND PHOTO FULL WIDTH MIN HEIGHT 100%
	echo'<div class="pagephoto" style="position: fixed; z-index: -1; top: 0px; right: 0px; width: 100%; height: 100%; min-width: 100%;  ';
	
//BACKGROUND COLOR as alternative
	if($background!='-'){echo'background:'.$background.';' ;}

//Check for BACKGROUND PHOTO and print on page 
	if($photo!='-'){
	echo'background: url(\'/img/full/'.$photo.'\'); ';
	}
	echo' background-size: cover;  background-repeat: no-repeat;   ">';
	echo'</div> ';
					
							
				
///MAKE EDITS POSSIBLE			
if($loggedin=='true')
{


				
				
				
				

				
		if($mode=='Designer'){		
//////DRAGNDROP FORM	<!--VERSION 3 -->			
echo'<form ID="livesaver"  style=" display:block; font-size:10px;  margin: 0px; padding: 0px; position: fixed; top: 20px; right: 100px; z-index: 100000000; 

height:00px; 

overflow:hidden; " method="POST"> 
 <input type="hidden" ID="elementID" name="elementID" value="">
top:<input type="text" ID="dragtop" name="dragtop" value="" style="font-size: 9px; padding: 1px; height: 15px; width:30px; "/>px
<br>left:<input type="text" ID="dragleft" name="dragleft" value="" style="font-size: 9px; padding: 1px; height: 15px; width:30px; "/> %
<input type="hidden" ID="suxess" name="suxess" value="ready"/>
<input type="hidden" ID="mode" name="mode" value="'.$mode.'"/>
<input  type="submit" ID="elementpos" name="elementpos" value="Save Position" style="height:0px; width: 0px; padding: 0px;">
 </form>';


				
//FORM FOR RESIZE
echo'<form  ID="sizesaver" style="  font-size:10px; position: fixed; top: 20px; right: 180px; display:block; margin:0px; padding:0px; z-index: 100000000;

height: 0px; 

overflow:hidden;"  method="POST"> 
<input type="hidden" ID="sizeelementID" name="sizeelementID" value="">

width : <input type="text" ID="resleft" name="resleft" value="" style="font-size: 9px; padding: 1px; height: 15px; width:30px; " /> %<br>
abs w : <input type="text" ID="absresleft" name="absresleft" value="" style="font-size: 9px; padding: 1px; height: 15px; width:30px; " />px<br>

height:<input type="text" ID="restop" name="restop" value="" style="font-size: 9px; padding: 1px; height: 15px; width:30px; "/>px<br>

top:<input type="text" ID="respostop" name="dragrestop" value="" style="font-size: 9px; padding: 1px; height: 15px; width:30px;"/>px<br>

left:<input type="text" ID="resposleft" name="dragresleft" value="" style="font-size: 9px; padding: 1px; height: 15px; width:30px; "/> %

<input type="hidden" ID="suxess" name="suxess" value="ready"/>
<input type="hidden" ID="mode" name="mode" value="'.$mode.'"/>
<input  type="submit" ID="elementres" name="elementres" value="Save Size" style="height:0px; width: 0px; padding: 0px;">
</form>';
		}

				}	

				
				
echo'<div id="elementRight"></div>
<div ID="elementLeft" style="width: 100%;  min-height: 200000px; position: relative; opacity:0.99; ">';
		
/////PAGE ELEMENT LOOP STARTS HERE		
$data2=mysql_query("select * from page_element where pageID='$page_ID' order by elementlist ASC");
	while($info2=mysql_fetch_array($data2))
		{	
			
			$layer=$info2['layer'];
if($layer==''){$layer='1';}	

		$fontsize=$info2['fontsize'];
		$lineheight=$info2['lineheight'];
	$fontsize=str_replace("px", "", "$fontsize");
	$lineheight=str_replace("px", "", "$lineheight");
	if($lineheight<$fontsize){$safelineheight=$fontsize;}		
	
$x=$info2['posx'];
if($x==''){$x='0';}
$y=$info2['posy'];
if($y==''){$y='0';}

$position='absolute';
$height=$info2['height'];

$absw=$info2['absw'];
//if($x+$y=='0'){$position='relative';}

$background=$info2['background'];
if($background=='-'){$background='none';}

			
//ELEMENT CSS RULES			
echo'<style>
.element'.$info2['ID'].'{
position:'.$position.';
z-index:'.$layer.';
top:'.($info2['posx']).'px; 
left:'.$info2['posy'].'%; 
font-size:'.($info2['fontsize']).'; 
line-height:'.($info2['fontsize']).';
color:'.($info2['color']).';
background:'.($info2['background']).';
font-family:'.($info2['fontfamily']).';
font-weight:'.($info2['fontweight']).';
float:none;
text-align:'.$info2['textalign'].';
height: '.$info2['height'].';
width:'.$info2['width'].';
line-height:'.$safelineheight.'px;
letter-spacing:'.$info2['spacing'].';
padding:'.$info2['padding'].';
margin:0px;
opacity:'.$info2['opacity'].';';
if($mode=='Viewer')	{
	$file=stripslashes($info2['file']);
//if($file==''){echo'overflow-y:auto;';}
	
}
echo'border-radius:'.$info2['radius'].';
}';//end element CSS rules


if($mode=='Viewer')	{
echo'
.picture'.$info2['ID'].'{min-height: '.$info2['height'].';  min-width: '.$absw.'; max-width: '.$absw.';overflow:visible; overflow-x:visible; overflow-y:visible;}';
}

			
echo'@media (max-width:479px){
.element'.$info2['ID'];
echo'{';
				
	if($info2['fontsize']>25)
		{echo' font-size: 20px;';}
		else{echo' font-size: 15px;';}
				
echo'}';//end //mobile fonts
			
echo'}';//end //mobile rules
		
	
				
echo'</style>';
		

			
if($loggedin=='true')
{





if($mode=='Designer')		
	{	echo'<style>
	.elements{box-shadow:inset 0px 0px 0px 1px #00f;}
	.stacker{display:none;}
	.mover{ display:none;position: relative; top: auto; left: auto; display:block; z-index: 120000; padding: 0px; float:left; text-align: left;width: 20px; height: 20px;  background: #eee;
	}
	</style>';
	}


if($mode=='Viewer')		
	{	
	echo'<style>.elements{border:none;}
.stacker{display:none}
.mover{display:none}
</style>';	
	}


}


?>


					
		
		<?
		echo '<div class="elements element'.$info2['ID'].' "';
		
		
		
		echo ' ID="';
		
if($loggedin=='true'){
			echo 'divArray_';		
				
			}
echo $info2['ID'].'">';
			
				
//////////////EDIT BUTTON
			if($loggedin=='true')
				{	
				
				
				
				echo'<div ID="thiseditor'.$info2['ID'].'" class="dropedit" 
				style="position: 
				absolute; z-index:0;  
				text-align: center; 
				//float: right;
				display:none;
				min-width:100px; 
				height: 20px;
				line-height: 20px;
				margin:0px;
				padding:-'.$info2['padding'].';
				border-top: solid 1px #f00;
				border-left: solid 1px #f00;
				border-right: solid 1px #f00;
				font-size: 15px;  opacity: 0.9;
				background: #fff; 
				color #000 ;font-family: helvetica; font-weight: bold;
				';
				
			echo'	">';
								

				 
					
	
	
				
				echo'<a class="lightbox_trigger" href="/admin/index.php?editelement='.$info2['ID'].'&mode='.$mode.'">EDIT</a>';
				
				$boxID=$info2['boxID'];
				if ($boxID!=''){
					$data3=mysql_query("select * from page_box where ID='$boxID' ");
	while($info3=mysql_fetch_array($data3))
		{	$box_type=$info3['box_type'];
		
		if($box_type=='1')
		{ echo' | <a class="lightbox_trigger" href="/admin/admin_new_page.php">New Page</a>';}
		
		
		if($box_type=='2')
		{ echo' | <a class="lightbox_trigger" href="/admin/admin_new_photo.php?photoID='.$info3['ID'].'">Add Photos</a>';}
		
		if($box_type=='3')
		{ echo' | <a class="lightbox_trigger" href="/admin/admin_new_blog.php?blogID='.$info3['ID'].'">Add Post</a>';}
				
				
		if($box_type=='4')
		{ echo' | <a class="lightbox_trigger" href="/admin/admin_new_video.php?videoID='.$info3['ID'].'">Add Video</a>';}
		
					if($box_type=='7')
		{ echo' | <a class="lightbox_trigger" href="/admin/admin_new_product.php?storeID='.$info3['ID'].'">Add Product</a>';}
		
		
		/* 
		//ADDITIONAL BOX TYPES CAN GO HERE 
		if($box_type==' (123) ')
		{ echo' | <a class="lightbox_trigger" href="/admin/admin_new_(XYZ).php?storeID='.$info3['ID'].'">ADD (XYZ)</a>';}
		*/
		

			
		
		}
				}
	
	
				echo'</div>';
				}
				
				
				
//////THE ACTUAL ELEMENT CONTENTS ARE HERE
			
	
	//TEXT
		echo stripslashes($info2['pagecontent']);
		
		$data3=mysql_query("select * from pages where ID='$page_ID' ");
	while($info3=mysql_fetch_array($data3))
		{	$thisuser=$info3['adminID'];
		}
		
	//PHOTO
		$file=stripslashes($info2['file']);
		if ($file!=''){
			
			echo'<script>$( ".element'.$info2['ID'].'" ).resizable( "option", "aspectRatio", true );</script>';
			
			if($file=='newsamplephoto'){$file='/img/icons/camera.png';
			echo '<img style="overflow:hidden;  width="95%" src="'.$file.'">';
}
			else{
		echo '
		
		<img class="picture'.$info2['ID'].' pictures " style="width: 100%;" src="/img/full/'.$file.'">';
			
			}
			}
			
	//BOX	
		
			
			$boxID=$info2['boxID'];
$data3=mysql_query("select * from page_box where ID='$boxID' ");
	while($info3=mysql_fetch_array($data3))
		{$boxtitle=$info3['title'];
		$box_style=$info3['box_style'];

		$box_type=$info3['box_type'];
		echo '<div class="boxtitle">'.$boxtitle.' </div>';
		echo'<br>';
		
	
	$linkboxes='0';
	if($box_type=='1')
		{ 
		include('./links_simple.php'); 
		$linkboxes++;
		}
		
	if($box_type=='2')
		{ listGallery($boxID);}
	
	if($box_type=='3')
		{ listBlog($boxID);}
	
	
	if($box_type=='4')
		{
		$play=$_GET['play']; 
		echo $play; 
		listVideo($boxID, $play);
		}
	
	if($box_type=='7')
		{listItems($boxID);}
	
	
	
//ADDITIONAL BOX CONTENT GOES HERE
	
//if($page_type=='5'){include('./pages/calendar/calendar'.$box_style.'.php');}


/*if($page_type=='6')
				{
				$safepage='pages/custom/'.$page;
		    	if(file_exists($safepage)){include($safepage);}
		    	else{
		    		echo'page not found.';
		    		
		    		exit;
		    		}
		    	}

if($box_type=='10'){include('./pages/music/music'.$page_style.'.php');}
if($box_type=='11'){include('./pages/magazine/magazine'.$page_style.'.php');}
*/


		
if($linkboxes!='0')
		{
	echo'<style>#linksbar{height: 0px; overflow:hidden;}</style>';}
if($linkboxes=='0')
{
	echo'<style>#linksbar{height: auto; display:block;}</style>';
		}


		}
		echo'</div>'; // custom styles

		
					
				
		
	?><script>
$(document).ready(function(){	
$('.dropedit').click(function() {
$('.dropedit').slideUp(0);
});

$('.element<?echo $info2['ID'];?>').click(function() {
	$('.dropedit').fadeOut(0);
	$('#thiseditor<?echo $info2['ID'];?>').slideDown(10);
	
	});
	});	
	
</script>
	<?			

		}	//END while loop	
		
		
		if($loggedin=='true')
				{
				
				echo'<div style="height: 300px; "></div>';
				//echo'</ul>';
				echo'</div>';
				
				}	
				
				
				
				
echo'</div>';//pagebox
if($loggedin=='true')
{
	
	
if($mode=='Phone'){$mobilemode='Mobile';}
if($mode=='Tablet'){$mobilemode='Mobile';}
	
	
	
if($mode=='Designer')	{?>	
	
	
		<script>
$( ".elements" ).resizable({  
	
	 handles: " e, s, w, ne, se, sw, nw",
	 containment:"parent",

	
	stop: function( event, ui ) {
		
var width = ui.size.width;
var height = ui.size.height;

var boxWidth = $('#elementLeft').offsetParent().width();
var mywidth = 100 * width / boxWidth;
var safewidth=mywidth.toFixed(3);
var dragposition = ui.position;
	var myleft=dragposition['left'];
	var sideWidth = $(this).offsetParent().width();
	var leftpct = 100 * myleft / sideWidth;
	var safeleft=leftpct.toFixed(3);
	
      $('#respostop').val(''+dragposition['top']+'');
      $('#resposleft').val(''+safeleft+'');

$('#absresleft').val(''+width+'');

$('#resleft').val(''+safewidth+'');
$('#restop').val(''+height+'');

      var thisID=$(ui.element).attr("ID");
      $('#sizeelementID').val(''+thisID+'');

var data= $( "#sizesaver" ).serialize();
$.post('/admin/confirm_live.php' , data);

		}
	
	} );
</script>
	
	<script>
	


$( "#elementLeft > .elements" ).draggable({ containment:"parent", delay: 100,  cursor: "move", 
cancel:".stacker", 
cancel:"iframe",
 grid: [ 5, 5 ],
  
drag:function(b,ui){ 
	dragposition = ui.position;
	var myleft=dragposition['left'];
	var sideWidth = $(this).offsetParent().width();
	var leftpct = 100 * myleft / sideWidth;
	var safeleft=leftpct.toFixed(3);
	
      $('#dragtop').val(''+dragposition['top']+'');
      $('#dragleft').val(''+safeleft+'');
      var thisID=$(this).attr("ID");
      $('#elementID').val(''+thisID+'');

	}, 
stop: function(b,ui){
        var data= $( "#livesaver" ).serialize();
  		$.post('/admin/confirm_live.php' , data);
     	}
  		
} );

</script>
<?
}
if($mobilemode=='Mobile')	{?>	


<script type="text/javascript">
 $(function() {$("#elementLeft").sortable({ cursorAt: { left: 5 }, opacity:0.6, forcePlaceholderSize: true, forceHelperSize: true, cursor: "move", 
items:".elements",
  update: function(event, ui) {
 	
	
	var thisone= ui.item.attr("id");
	ui.item.css("top", "0");
	var order = $(this).sortable("serialize") + '&stackID='+thisone+'&action=updateElementListings'; 
	
	$.post("/updateelementDB.php", order, function(elementResponse){
		
	});
	
	
}

});



});
</script>
<?}

}?>














	

  


	
