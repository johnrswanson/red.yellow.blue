<style>
	.boxposts{position:relative; display:none;}
	.less{ position:relative; display:none;}
	.posts{ position:relative; }
	</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<script type="text/javascript">
$(document).ready(function(){	$('.gointeractive').click(function(e) {
		e.preventDefault();
		var link_href = $(this).attr("href");
		$('#interactive').fadeOut(20);	
		$('#interactive2 .layer').html('loading...');	
	
		$('#interactive2 .layer').load(link_href);
			$('#interactive2').fadeIn(10);	
	});	
	
	
	$('.posts').click(function(f) {
		$('.boxposts').show(300);
		$('.story').hide(300);
		$('.posts').hide(100);
		$('.less').show(100);
		});	
		
		$('.less').click(function(g) {
		$('.boxposts').hide(300);
		$('.story').show(300);
		$('.less').hide(100);
		$('.posts').show(100);
		});	

	});
	</script>
	

<?
include('./admin/connect.php');


/////GALLERY INTERACTIVE LAYER
$viewphoto=$_GET['showphoto'];
if (isset($viewphoto))
{
	
	$data3=mysql_query("select * from photos where ID='$viewphoto' ")or die(mysql_error());
	while($info3=mysql_fetch_array($data3))
	 {$gallery=$info3['gallery'];
	 //echo $gallery;
		 $data4=mysql_query("select * from page_box where ID='$gallery' ");
		
		while($info4=mysql_fetch_array($data4))
	 	{
	 	$thisguy=stripslashes($info4['adminID']);
	 	}
	 	
	 	
	//thumbs
	echo'<div style=" float: right; width: 85%; 
	height: 50px;  
    overflow-y: hidden;
    ">';
	$data31=mysql_query("select * from photos where gallery='$gallery' order by photoorder ")or die(mysql_error());
	$pcount=mysql_num_rows($data31);
while($info31=mysql_fetch_array($data31))
	 {
		$myorder=$info31['photoorder'];
		echo'<div class="col span_1_of_'.$pcount.'" style=" float:right; max-width: 90px; margin: 0px; margin-top: 5px;">';
		echo'<a class="gointeractive" href="/interactive.php?showphoto='.$info31['ID'].'">
		<img style="margin: auto; width: auto; height: 50px;"src="/img/full/'.$info31['photo'].'" >
		</a>';
		echo'</div>';
	 }
	 	
	echo'</div>'; 
	 	 echo'<div style="min-width: 300px;  text-align: center;">
	 	 
	 	 <img style=" max-height: 86vh; margin: auto; " src="/img/full/'.$info3['photo'].'"></div>';
	 	 
	 	 
	 	 echo'<div style="position: fixed; bottom: 5px; left: 5px; height: auto; max-width: 300px; padding: 20px; background: #fff; z-index: 9999; 
	 	 opacity: 0.6; color: #000; "><b>'.$info3['title'].'</b><br>';
	 	echo''.$info3['text'].'</b>
	 	</div>';

	 	

	}
	 	
	
	
	
}


/////VIDEO PLAYER
$play=$_GET['play'];
if (isset($play))
{	echo $play;
$data33=mysql_query("select * from videos where ID='$play'");
while($info33=mysql_fetch_array($data33))
	{
		
	/*echo'
	<object style="min-width: 100%; width: 100%; height: 100%; ">
	<param name="movie" value="http://www.youtube.com/embed/VIDEO_ID?html5=1&amp;autoplay=true&amp;rel=0&amp;hl=en_US&amp;version=3"/>
	<param name="allowFullScreen" value="true"/>
	<param name="allowscriptaccess" value="always"/>
	<embed width="640" height="360" src="http://www.youtube.com/embed/'.$info33['youtubeID'].'?html5=1&amp;autoplay=true&amp;rel=0&amp;hl=en_US&amp;version=3" class="youtube-player" type="text/html" allowscriptaccess="always" allowfullscreen="true"/>
	</object>
		';*/
		
		
		echo'<p><object style="z-index:-1; min-height: 600px" height="auto;" width="100%"><param name="movie" value="http://www.youtube.com/v/'.$info33['youtubeID'].'&autoplay=1" /><embed   style="z-index:-1; min-height: 600px"src="http://www.youtube.com/v/'.$info33['youtubeID'].'&autoplay=1" type="application/x-shockwave-flash" width="100%" height="auto;" ></embed></object></p><br>';
	}
}





///BLOG INTERACTIVE LAYER
$readme=$_GET['read'];
if (isset($readme))
	{
echo'<a href="" onclick="return false" style="border: solid 1px #444; position: fixed; top: 50px; Left: 20px; background: #fff; font-size: 20px; padding: 15px; " class="posts"> &laquo; </a>';	 	
echo'<a href="" onclick="return false"  style="border: solid 1px #444; position: fixed; top: 50px; Left: 20px; background: #fff; font-size: 20px; padding: 15px;" class="less"> &raquo; </a>';	
		//echo $readme;
	$data3=mysql_query("select * from blog where ID='$readme' ");
	while($info3=mysql_fetch_array($data3))
	 	{
	 		echo'<div class="blogbox" style="background:#fff; max-width: 95%;   margin: auto; margin-top: 20px padding: 20px; height: 100vh; overflow-x: auto;">';
	 	$thispost=$info3['ID'];
	 	$thisblogID=$info3['blogID'];
	 	$title=$info3['title'];
	 	$text=$info3['text'];

	 	//OTHER BLOG POSTS IN THIS BOX
echo'<div class="boxposts" style="position:relative;  text-align: left; padding: 5px; left:10%; top: 50px; width: 60%; font-size: 20px; border: solid 0px #eee;">';
    
	$data31=mysql_query("select * from blog where blogID='$thisblogID' order by blogorder ")or die(mysql_error());
	$pcount=mysql_num_rows($data31);
	while($info31=mysql_fetch_array($data31))
	{
	$nexttitle=$info31['title'];
	$myorder=$info31['photoorder'];
	echo'<p style="border-bottom: solid 1px #ddd;margin-top: 10px; "><a class="gointeractive" href="/interactive.php?read='.$info31['ID'].'">'.$nexttitle.'</a></p>';
	}	
echo'</div>'; 
	
	
	$data5=mysql_query("select * from page_box where ID='$thisblogID' ");
	 while($info5=mysql_fetch_array($data5))
	 		{$thisguy=$info5['adminID'];}
//BLOG TITLE	
		echo'<div class="story">
		<div class="blogtitle" style="text-align:center; width: 100%; font-size: 1.5em"><b>'.$title.'</b></div><br>';
		
	
	
	//
	//FIRST BLOGPHOTO
	$thisblogphoto=$_GET['blogphoto'];
	if(isset($thisblogphoto))	{
		$data31=mysql_query("select * from blog_photos where ID='$thisblogphoto' limit 1  ")or die(mysql_error());}
		else{
		$data31=mysql_query("select * from blog_photos where blogID='$thispost' limit 1  ")or die(mysql_error());}
		$pcount=mysql_num_rows($data31);
	//echo $pcount;
		 while($info31=mysql_fetch_array($data31))
	 	{echo'<div style="width: 400px; margin: auto; text-align: center;"><img src="/img/blog/'.$info31['photo'].'" ></div><br>';}



	//Other Blog PHOTOS	
		$data31=mysql_query("select * from blog_photos where blogID='$thispost'  ")or die(mysql_error());
	$pcount=mysql_num_rows($data31);
	//echo $pcount;
	if ($pcount>'1'){
	 while($info31=mysql_fetch_array($data31))
	 {

		echo'<div class="col span_1_of_'.$pcount.'" style="float: right; max-width: 90px; margin: 0px; margin-top: 5px;">';
		echo'<a class="gointeractive" href="/interactive.php?read='.$thispost.'&blogphoto='.$info31['ID'].'">
		<img style="margin: auto; width: auto; height: 50px;"src="/img/blog/'.$info31['photo'].'" >
		</a><br>';
		
		echo'</div>';
		
		
	 }
	 }
echo'<br><p style=" clear:both; max-width: 1200px; text-align:left; margin:auto;">'.$text.'</p></div>';
	echo'</div>';}
		
	}





///SHOP INTERACTIVE LAYER
$item=$_GET['item'];
if (isset($item))
{
		$data3=mysql_query("select * from store where ID='$item' ");
	while($info3=mysql_fetch_array($data3))
	 	{
	 		echo'<div class="storebox" style="background:#fff; max-width: 75%;   margin: auto; margin-top: 20px padding: 20px; height: 100vh; overflow-x: auto;">';
	 	$thispost=$info3['ID'];
	 	$thisstoreID=$info3['storeID'];
	 	$title=$info3['title'];
	 	$text=$info3['mytext'];
	 	$calltoaction=$info3['calltoaction'];
	 		$price=$info3['price'];
	
	//echo $thisstoreID;
	 			 $data5=mysql_query("select * from page_box where ID='$thisstoreID' ");
	 			 while($info5=mysql_fetch_array($data5))
	 		
	 			 {$thisguy=$info5['adminID'];}
	 			 
	 $data=mysql_query("select * from admin where ID='$thisguy' ");
	while($info=mysql_fetch_array($data))
		{$officialemail=$info['email'];}

	 		
		echo'<center><b>'.$title.'</b><br>';
		$thisstorephoto=$_GET['storephoto'];
	if(isset($thisstorephoto))	{
			$data41=mysql_query("select * from store_photos where ID='$thisstorephoto' limit 1  ")or die(mysql_error());}
		else		
		{$data41=mysql_query("select * from store_photos where storeID='$thispost' limit 1  ")or die(mysql_error());}
		$pcount=mysql_num_rows($data41);
	//echo $pcount;
		 while($info41=mysql_fetch_array($data41))
	 	{echo'<img style="margin: auto; width: auto; height: 400px;" src="/img/full/'.$info41['photo'].'"><br>';}

echo'<b>'.$title.'</b>';
	 
	 echo'<br><b>$'.$price.'</b>';

	
	echo'<br>';
	$shipping='0.00';
	
	echo'<form style="width: 200px;" method="post" action="https://www.paypal.com/cgi-bin/webscr">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="add" value="1">
<input type="hidden" name="business" value="'.$officialemail.'">
<input type="hidden" name="item_name" value="'.$info3['title'].'">
<input type="hidden" name="item_number" value="'.$info3['ID'].'">
<input type="hidden" name="amount" value="'.$info3['price'].'">
<input type="hidden" name="shipping" value="'.$shipping.'">
<input type="hidden" name="shipping2" value="0.00">
<input type="hidden" name="handling" value="0.00 ">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="">
<input type="hidden" name="undefined_quantity" value="1">
<input type="image" src="/img/icons/cart.png" border="0" name="submit" width="30" height="30" alt="'.$calltoaction.'">
</form>';
echo'<br>';
	echo$calltoaction;

echo'<br><p style=" clear:both; max-width: 400px; text-align:left; margin:auto;">'.$text.'</p></div>';


$data31=mysql_query("select * from store_photos where storeID='$thispost'  ")or die(mysql_error());
	$pcount=mysql_num_rows($data31);
	//echo $pcount;
	 while($info31=mysql_fetch_array($data31))
	 {

		echo'<div class="col span_1_of_'.$pcount.'" style="float: right; max-width: 90px; margin: 0px; margin-top: 5px;">';
		echo'<a class="gointeractive" href="/interactive.php?item='.$thispost.'&storephoto='.$info31['ID'].'">
		<img style="margin: auto; width: auto; height: 50px;"src="/img/full/'.$info31['photo'].'" >
		</a><br>';
		
		echo'</div>';
		
		
	 }
	 
	}
	
	}
?>