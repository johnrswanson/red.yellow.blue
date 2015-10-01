
<?include('./admin/connect.php');





//GALLERY BOX

function listGallery($view){
	
	?>
<script>
$(function() {$("#photoLeft<?echo $view?>").sortable({ opacity: 0.6, forcePlaceholderSize: true, forceHelperSize: true, update: function()
{
$("#photoRight<?echo $view?>").html('updating');
var order = $(this).sortable("serialize") + '&action=updatePhotoListings'; 
$.post("/updatephotoDB.php", order, function(photoResponse){$("#photoRight<?echo $view?>").html('Photo Order Changed!');});}});

});

</script>

<?
	
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
	 	$loginy='y';
	 	}
	}
}




	

$data=mysql_query("select * from page_box where ID='$view' ");
	while($info=mysql_fetch_array($data))
		{$thisguy=$info['adminID'];
		$mycolumnset=$info['columnset'];
if($thisguy==$myuserID){$loginy='y';}
		}
		
		
		
		$zheight=(1 / $mycolumnset); // .5, .3, .25, .20
		
		$offsetter=($mycolumnset * 5); // 20, 40, 50, 60, 70 80
		
		$xheight= ($zheight * 1000);
		$yheight=($xheight - $offsetter);
		//$colheight=$yheight.'px';

//if($mycolumnset=='1'){$goodheight='100%'; $colheight='100%'; $goodwidth='auto';}
//if($mycolumnset=='2'){$goodheight='450px'; $colheight='440px'; }
//if($mycolumnset=='3'){$goodheight='340px'; $colheight='330px'; }
//if($mycolumnset>='4'){$goodheight='230px'; $colheight='160px'; }


$goodwidth='100%';
$goodheight='auto';
$colheight='auto';
$photocount=1;
$trip=0;
$prev='';

echo'<div id="gallerybox" style="width: 100%;">';







 if($loginy=='y'){echo'<div id="photoRight'.$view.'" style="font-family: arial; font-size: 10px; position:relative; top: 0px; margin-left:80%; height: 0px; margin-top: -10px;"></div>';
 echo'<div class="section group" ID="photoLeft'.$view.'" >'; }
 else{ echo'<div class="section group">';}

 //echo'<ul width="100%">';
	$thiscount=#mycolumnset;
	$data=mysql_query("select * from photos where gallery='$view' order by photoorder asc");
		while($info=mysql_fetch_array($data))
		{	
			$myorder=$info['photoorder'];
			$pad=".5%";
			if($goodwidth==''){
			$colwide=$colheight * 1.2;
			}
			else {$colwide=$goodwidth;}
		echo'<div';
			//echo'<li ';
		
	
		
			if($thiscount==$mycolumnset){
			//echo' style="clear:both;" ';
			$thiscount='0';
			$pad='0%';
			}
			$thiscount++;
	echo' ID="photoArray_'.$info['ID'].'" class="col span_1_of_'.$mycolumnset.'" style="margin-left:'.$pad.';" >';
				if($loginy=='y'){
			//EDIT BUTTONS
	echo'<div style="text-align:left; position:relative; top:0px; left: 0px;  background: #fff; opacity: 0.8;  ">';
			
echo' <a class="lightbox_trigger"  href="/admin/save/save_photo.php?deletephoto='.$info['ID'].'">
					<img  style="margin-left: 3px;" alt="Delete Photo" src="/img/icons/xclose.png" width="15px"></a> ';
		
echo'<a class="lightbox_trigger" style="text-align:right;   background: #fff;  border: solid 1px #aaa;  opacity: 1; margin-left: 5px; margin-top: 0px; padding-left: 3px; color:#000;" href="/admin/index.php?editphoto='.$info['ID'].'">
					 <img src="/img/icons/edit.png" width="20px">   </a>';
					echo'</div>';
					}
	//image file
echo'<style>.goodbox{height: '.$colheight.';}</style>';
	echo'<div class="goodbox" style=" width:'.$goodwidth.'; max-width:'.$goodwidth.';  overflow:hidden; padding:0px; margin: 0px; margin-top: -20px; text-align: center; ">';
	
	echo'<div style=" height: auto; background: none;">'.$info['title'].'</div>';
			if($loginy!='y'){echo'<a class="gointeractive" href="/interactive.php?showphoto='.$info['ID'].'">';}
			echo' <img width="'.$goodwidth.'" style="min-height: '.$goodheight.'; min-width:'.$goodwidth.';"  src="/img/full/'.$info['photo'].'"> ';
			if($loginy!='y'){echo'</a>';}
			echo $login;
		echo'</div>';
		
		
		
		//echo'</li>';//
		echo'</div>';//col
	}



	echo'</div>';//end section
	



echo'</div>';//end gallery box
	



}//end function

























////BLOG BOX	
	function listBlog($view)	{
		
		
		
$data=mysql_query("select * from page_box where ID='$view' ");
	while($info=mysql_fetch_array($data))
		{$thisguy=$info['adminID'];
		$mycolumnset=$info['columnset'];
		}
		
	echo'<div class="blogbox">';	
$data=mysql_query("select * from blog where blogID='$view' order by blogorder asc");
$thiscount='0';
echo'<div class="section group" style="text-align: left;">';
		while($info=mysql_fetch_array($data))
		{$thisblogID=$info['ID'];


		if($thiscount==$mycolumnset)
			{ echo'</div><div class="section group "  style="text-align: left;">';$thiscount='0';}
			 $thiscount++;
			 
echo'<div class="col span_1_of_'.$mycolumnset.' blogitem tiny jump'.$myorder.'">
<a class=" blogtitle gointeractive" href="/interactive.php?read='.$info['ID'].'">';
echo''.stripslashes($info['title']).'';
echo'</a>';




$data3=mysql_query("select * from blog_photos where blogID='$thisblogID' order by photoorder ASC limit 1");
$count3=mysql_num_rows($data3);
if($count3!=0){

while($info3=mysql_fetch_array($data3))
{
echo'<div ID="blogbutton'.$info['ID'].'" class="blogthumbnail">';
echo'<a class=" blogtitle gointeractive" href="/interactive.php?read='.$info['ID'].'">';
echo'<img src="/img/blog/'.$info3['photo'].'" >';
echo'</a></div>';
}
}

/*$str=stripslashes($info['text']);
$shorttext= substr($str, 0, 500);
$chars=strlen ( $str );

echo'<div class="blogshorttext"><p>'.$shorttext.' ';

if($chars>'500')
{echo'<a   style="color:#000;" class="gointeractive morebutton" href="/interactive.php?read='.$info['ID'].'">';
echo  ' - More... ';
echo'</a> ';
}


echo'</p>';
echo'</div>';
*/




echo'</div>';//blogitem
}//while
echo'</div>';//End Group
echo'</div>';//end blog box
}




//VIDEO BOX

function listVideo($view, $playnow){
	
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

	
$data=mysql_query("select * from page_box where ID='$view' ");
	while($info=mysql_fetch_array($data))
		{$thisguy=$info['adminID'];
		$mycolumnset=$info['columnset'];
		if($thisguy==$myuserID){$lp='true';}
		}


echo'<div class="videobox">';
		

$data=mysql_query("select * from videos where playlist='$view' order by videoorder asc");

$vidcount=mysql_num_rows($data);
//empty  of videos
if($vidcount=='0'){echo'<div style="text-align: left; height:235px; overflow:hidden; background:none;">
<img src="/img/icons/videobox.png" width="100px;" >
</div>';}

if($vidcount!='0'){
echo'<script type="text/javascript">
$(document).ready(function(){';

while($info=mysql_fetch_array($data))
		{
			if($lp!='true'){
		echo'		$("#play'.$info['ID'].' a").click(function(e){
						e.preventDefault();
					$("#play'.$info['ID'].'").hide(0);
					$("#player'.$info['ID'].'").slideDown(1000);
				});';
			}
		}
		
		
		echo'	});
			</script>';

echo'<div class="section group"  style="padding: 0px; margin:0px; width: 100%; text-align:center;">';
	$thiscount='0';
	$data2=mysql_query("select * from videos where playlist='$view' order by videoorder asc");
$vidcount=mysql_num_rows($data2);
	
			if($vidcount=='1'){$vidheight='580px'; $vidwidth="100%";}	
			if($vidcount=='2'){$vidheight='430px'; $vidwidth="100%";}	
			if($vidcount=='3'){$vidheight='320px'; $vidwidth="100%";}
			if($vidcount=='4'){$vidheight='220px'; $vidwidth="100%";}
			if($vidcount>'4'){$vidheight='160px'; $vidwidth="100%";}

while($info=mysql_fetch_array($data2))
		{
				
		if($thiscount==$mycolumnset)
		{ echo'</div><div class="section group" style=" width: 100%; text-align:center;">';
		 $thiscount='0';}
		 $thiscount++;
		
		$thisvideo=$info['ID'];
		$pre='maxres';
		$thumb='default'; 
		
		$thumbpath='http://img.youtube.com/vi/'.$info['youtubeID'].'/'.$pre.''.$thumb.'.jpg';
		$photoinfo=getimagesize($thumbpath);
		 if($photoinfo['3']==''){$pre='';  }
		 
		// if($mycolumnset<'4'){echo'<style> .default{overflow:hidden;}</style>'; }
		echo'<div class="col span_1_of_'.$mycolumnset.'" style="color:#fff;';
		if($mycolumnset==''){$mycolumnset='1';}
		if($mycolumnset=='1'){
		echo' width: 100%; ';}
		echo'text-align: center;">';
		
	echo'<div ID="play'.$info['ID'].'" >';
		echo'<a href="" onclick="return false">';
		echo'<div class="videolist_title">'.$info['title'].'</div>';
		echo'<img src="http://img.youtube.com/vi/'.$info['youtubeID'].'/'.$pre.''.$thumb.'.jpg" height="'.$vidheight.'" width="'.$vidwidth.'" style="margin:auto;"></a>';
		echo'</div>';
				
		echo'<div class="player" style="display:none; margin: none; padding: none;" ID="player'.$info['ID'].'"><object style="z-index:-1;" param name="movie" value="http://www.youtube.com/v/'.$info['youtubeID'].'&autoplay=1" height="'.$vidheight.'" width="'.$vidwidth.'" />
		<embed src="http://www.youtube.com/v/'.$info['youtubeID'].'&autoplay=1" type="application/x-shockwave-flash" 
		height="'.$vidheight.'" width="'.$vidwidth.'">
		</embed></object>';
		echo'</div>';
		
	echo'</div>';
		
		
		
		}
		echo'</div>';//columnset

}		




	echo'</div>';//end video box
}





////INTERACTIVE LAYERS

//blog Viewer
function read($readme)
{$data3=mysql_query("select * from blog where ID='$readme' ");
	while($info3=mysql_fetch_array($data3))
	 {
	 	
	 	$blogID=$info3['blogID'];
	 $data4=mysql_query("select * from page_box where ID='$readme' ");
	while($info4=mysql_fetch_array($data4))
	 	{$myhome=stripslashes($info4['urltext']);}
	}
}


//photo Viewer
function showPhoto($mypic)
{$data3=mysql_query("select * from photos where ID='$mypic' ");
	while($info3=mysql_fetch_array($data3))
	 {$gallery=$info3['gallery'];
	 
		 $data4=mysql_query("select * from page_box where ID='$gallery' ");
	while($info4=mysql_fetch_array($data4))
	 	{$myhome=stripslashes($info4['urltext']);
	 	}
	 	 

	}
}


//video Player

function playVideo($playnow){
	
$data=mysql_query("select * from videos where ID='$playnow' order by videoorder asc LIMIT 1");
while($info=mysql_fetch_array($data))
{
	
/*echo'
<object style="min-width: 100%; width: 100%; height: 100%; ">
<param name="movie" value="http://www.youtube.com/embed/VIDEO_ID?html5=1&amp;autoplay=true&amp;rel=0&amp;hl=en_US&amp;version=3"/>
<param name="allowFullScreen" value="true"/>
<param name="allowscriptaccess" value="always"/>
<embed width="640" height="360" src="http://www.youtube.com/embed/'.$info['youtubeID'].'?html5=1&amp;autoplay=false&amp;rel=0&amp;hl=en_US&amp;version=3" class="youtube-player" type="text/html" allowscriptaccess="always" allowfullscreen="true"/>
</object>
	';
*/	
	
	echo'<p><object style="text-align: center;z-index:-1;" height="500px;" width="100%"><param name="movie" value="http://www.youtube.com/v/'.$info['youtubeID'].'&autoplay=0" /><embed height="500px;" src="http://www.youtube.com/v/'.$info['youtubeID'].'&autoplay=0" type="application/x-shockwave-flash" width="100%"></embed></object></p><br>';
}
}



////store BOX	
	function listItems($view)	{
		
		
		
$data=mysql_query("select * from page_box where ID='$view' ");
	while($info=mysql_fetch_array($data))
		{$thisguy=$info['adminID'];
		$mycolumnset=$info['columnset'];
		}
		
		$data=mysql_query("select * from admin where ID='$thisguy' ");
	while($info=mysql_fetch_array($data))
		{$officialemail=$info['email'];}
		

		
		
	echo'<div class="storebox">';	
	echo'<form style="float:right;" name="_xclick" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="'.$officialemail.'">
<input type="image" src="" border="0" name="submit" alt="Checkout">
<input type="hidden" name="display" value="1">
</form>';
$data=mysql_query("select * from store where storeID='$view' order by storeorder asc");
$thiscount='0';
echo'<div class="section group" style="text-align: left;">';
		while($info=mysql_fetch_array($data))
		{
		$thisstoreID=$info['ID'];
		$calltoaction=$info['calltoaction'];
		$price=$info['price'];


		if($thiscount==$mycolumnset)
			{ echo'</div><div class="section group "  style="text-align: left;">';$thiscount='0';}
			 $thiscount++;
			 
			



			 
echo'<div class="col span_1_of_'.$mycolumnset.' storeitem tiny jump'.$myorder.'">';

//STORE PHOTOS
$data3=mysql_query("select * from store_photos where storeID='$thisstoreID' order by photoorder ASC limit 1");
$count3=mysql_num_rows($data3);
if($count3!=0)
{
while($info3=mysql_fetch_array($data3))
	{
	echo'<div ID="storebutton'.$info['ID'].'" class="storethumbnail">';
	echo'<a class=" storetitle gointeractive" href="/interactive.php?item='.$info['ID'].'">';
	echo'<img src="/img/full/'.$info3['photo'].'" >';
	echo'</a>';
	echo'</div>';
	}
}
echo'<a class=" storetitle gointeractive" href="/interactive.php?item='.$info['ID'].'">';
echo stripslashes($info['title']);
echo'</a>';



	
	$shipping='0.00';
	echo'<div class="price" style="clear;both">';
	echo'$';
	echo $info['price'];
	echo'</div>';
	

	echo'<form style="width: 50px;" method="post" action="https://www.paypal.com/cgi-bin/webscr">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="add" value="1">
<input type="hidden" name="business" value="'.$officialemail.'">
<input type="hidden" name="item_name" value="'.$info['title'].'">
<input type="hidden" name="item_number" value="'.$info['ID'].'">
<input type="hidden" name="amount" value="'.$info['price'].'">
<input type="hidden" name="shipping" value="'.$shipping.'">
<input type="hidden" name="shipping2" value="0.00">
<input type="hidden" name="handling" value="0.00 ">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="">
<input type="hidden" name="undefined_quantity" value="1">
<input type="image" src="/img/icons/cart.png" border="0" name="submit" width="30px" alt="'.$calltoaction.'">
</form>';


echo $calltoaction;
/*	 
	//MORE INFO
$str=stripslashes($info['mytext']);
$shorttext= substr($str, 0, 300);
$chars=strlen ( $str );

echo'<div class="storeshorttext"><p>'.$shorttext.' ';

if($chars>'500')
{echo'<a   style="color:#000;" class="gointeractive morebutton" href="/interactive.php?item='.$info['ID'].'">';
echo  ' - More Info... ';
echo'</a> ';
}
echo'</p>';
echo'</div>';

*/


echo'</div>';//storeitem
}//while
echo'</div>';//End Group
echo'</div>';//end store box
}


//
?>

