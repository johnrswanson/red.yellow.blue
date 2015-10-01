<?
//THIS IS  THE ORIGINAL SIMPLE PAGE WITH ONE PHOTO AND ONE TEXT BLOCK! NEVER FORGET!!
				//echo'<div class="pagetitle">'.$title.'</div>';
				//echo'<div class="pagetext">'.$text.'</div>';


/////START MAKING NEW SIMPLE PAGE 
echo'<div ID="pagearea" class="pagebox" >';//CSS /Jquery hook to reload
	
	
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
					
							

echo'<div style="position:relative; opacity:0.99;">';		
				
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
	if($x+$y=='0'){$position='relative';}
$background=$info2['background'];
if($background=='-'){$background='none';}

//ELEMENT CSS RULES			
echo'<style>
.element'.$info2['ID'].'{
position:'.$position.';
z-index:'.$layer.';
top:'.$info2['posx'].'px; 
left:'.$info2['posy'].'%; 
font-size:'.($info2['fontsize']).'; 
color:'.($info2['color']).';
background:'.$background.';
font-family:'.($info2['fontfamily']).';
font-weight:'.($info2['fontweight']).';
float:none;
text-align:'.$info2['textalign'].';
height:'.$info2['height'].';
width:'.$info2['width'].';
padding:'.$info2['padding'].';
margin:0px;
opacity:'.$info2['opacity'].';
line-height:'.$safelineheight.'px;
letter-spacing:'.$info2['spacing'].';
border-radius:'.$info2['radius'].';';


$file=stripslashes($info2['file']);
if($file==''){echo'overflow-y:auto;';}
echo'
}

.picture'.$info2['ID'].'{min-height: '.$info2['height'].';  min-width: '.$absw.'; max-width: '.$absw.'; overflow:visible; overflow-x:visible; overflow-y:visible;}


';//end element CSS rules
				
echo'@media (max-width:479px){
.element'.$info2['ID'];
echo'{';
				
	if($info2['fontsize']>25)
		{echo' font-size: 20px;';}
		else{echo' font-size: 15px;';}
				
echo'}';//end //mobile fonts
			
echo'}';//end //mobile rules
		
		
echo'</style>';
		



?>


					
		
		<?
		echo '<div class="elements element'.$info2['ID'].' "';//end classes
		echo ' ID="divArray_';
echo $info2['ID'].'">';
			
							
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
			if($file=='newsamplephoto'){$file='/img/icons/camera.png';
			echo '<img style="overflow:hidden; height:'.$info2['height'].'; width="95%" src="'.$file.'">';
						}
			else{
		echo '<img class="picture'.$info2['ID'].' pictures "   src="/img/full/'.$file.'">';
			
		
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
		
		
	$linkbox='0';
	if($box_type=='1'){ include('./links_simple.php'); 
	$linkbox++;
	}
		
	if($box_type=='2')
		{listGallery($boxID);}
	
	if($box_type=='3')
		{listBlog($boxID);}
	
	
	if($box_type=='4')
		{
		$play=$_GET['play']; 
		echo $play; 
		listVideo($boxID, $play);
		}
	
	if($box_type=='7')
		{listItems($boxID);}
	
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
		
		
if($linkbox!='0')
		{
	echo'<style>#linksbar{height: 0px; overflow:hidden;}</style>';}
if($linkbox=='0')
{
	echo'<style>#linksbar{height: auto; display:block;}</style>';
		}
		
		}
		
		echo'</div>'; // custom styles		

		}	//END while loop	
	echo'</div>';//position rel		
echo'</div>';//pagebox

?>














	

  


	
