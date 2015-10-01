<style>
#videocontentLeft {width: 500px;}
#videocontentLeft li {clear:both; color:#000; width:500px; height:60px; }
#videocontentRight {float:left;width:500px;  font-size:10px; margin-top:0px; padding:10px; background-color:none;color:#000;}
</style>

<script>
$(function() {$("#videocontentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function(){$("#videocontentRight").html('updating');var order = $(this).sortable("serialize") + '&action=updateVideoListings'; $.post("/admin/updatevideoDB.php", order, function(videoResponse){$("#videocontentRight").html('Order Changed!');});}});});

</script>

     <script>
$('.lightbox_trigger2').click(function(e) {
		e.preventDefault();
		var link_href = $(this).attr("href");
		var myoffset = $( this ).offset();
		$('#content2').load(link_href);
		$('#lightbox2').show();
		$('#lightbox2').offset( myoffset);
		$('#lightbox2').animate({left: "10%"}, 300, "swing" );
	
		
	});
	
	
$('.close2 a').click(function() {
	$('#lightbox2').hide();
	});
	</script>

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
				 

$view=$myboxID;
$row='0';
if(isset($view))
	{
	$data=mysql_query("select * from videos where playlist='$view' order by videoorder asc");
	$count=mysql_num_rows($data);
	//echo'<FORM ENCTYPE="multipart/form-data"  METHOD="POST">';
	//echo'<INPUT style="float:right; max-width: 100px;" TYPE="submit" name="submit" VALUE="Save Page">';
	//echo'<INPUT TYPE="hidden" name="thisID" value="'.$page.'">';
//echo'<br>Title: ';
//echo'<INPUT TYPE="text" name="title" value="'.$oldtitle.'">';

	if($count=='0')
		{echo'<P>You do not have any videos here yet.</P>';}
	else 
		{echo'  <P>There are '.$count.' videos in this box.</P>';}
		
	//echo'<a class="lightbox_trigger2"style="background:#00cccc; padding:10px; font-size:20px; text-decoration:none; color:#fff;" href="/admin/admin_new_video.php?videoID='.$view.'">+ Add Video</a><p>';
	echo'<div id="videocontentRight">Drag and drop to change order</div>';
	
	echo'<div id="videocontentLeft"><ul>';
	while($info=mysql_fetch_array($data))	
		{
		echo'<li id="videoArray_'.$info['ID'].'">';
		//echo'<a class="lightbox_trigger2" style="float:left;" href="./admin/index.php?editvideo='.$info['ID'].'">
		echo'<img style="float:left;" src="http://img.youtube.com/vi/'.$info['youtubeID'].'/default.jpg" width ="50px">';

		echo'</a>';
		
		
$color='#eeeeee';
if($i=='2'){$i=0;$color='#ddd';}
$i++;


//echo'<a class="lightbox_trigger2" style="float:left; background:'.$color.'; width:200px; padding-left:10px;" href="/admin/index.php?editvideo='.$info['ID'].'">';
echo'<div style="float:left; background:'.$color.'; width:200px; padding-left:10px;">';

echo stripslashes($info['title']);
if ($info['title']=='')
echo 'Untitled Video';
echo'</div>';
//echo'</a>';

		
		echo'<a class="lightbox_trigger2" style="margin-top:0px; z-index:1; background:#f00; padding-left:5px; text-decoration:none; padding-top:3px; padding-right:5px; float:left; border-radius:3px;  color:#fff;" href="/admin/save/save_video.php?deletevideo='.$info['ID'].'">X</a></li>';
		}
	echo'</ul></div><p style="clear:both"></p>';
	}


echo'<INPUT TYPE="hidden" name="thisID" value="'.$page.'"><br>';
//echo'<p style="clear: both;">Description of page:<br><textarea name="text" rows="10" cols="40">'.$oldtext.'</textarea><br>';


			$data2=mysql_query("select * from page_types where ID ='$page_type' order by ID ASC");
			while($info2=mysql_fetch_array($data2))
				{
				$styles=$info2['styles'];
				if ($styles>1){	
		
			for($i=0; $i < $styles; $i++)
				{
				$j=$i+'1';
				//echo'<img src="./admin_img/'.$info2['title'].''.$j.'.jpg" height="100px"><br>';
				echo'<input type="radio" name="page_style" value="'.$j.'" ';
				
				if($page_style==$j){echo 'checked';}
				
				echo'>Layout '.$j.'';
				}
				
				}
				}


/*echo'Subpage of <br>';
			echo'<select name="subpage"> <option value="'.$subpage.'">';
			if ($subpage=='main')
				{echo'Main Page';}
			
			else
				{
				$data4=mysql_query("select * from pages where ID='$subpage' ");
				while($info4=mysql_fetch_array($data4))
					{	$thispageID=stripslashes($info4['ID']);
					echo $info4['title'];
					}
				}
			echo' </option>
			
			<option value="main">Main Page</option>';
			$data4=mysql_query("select * from pages where subpage='main' AND ID!='$thispageID' order by pageorder ASC");
			while($info4=mysql_fetch_array($data4))
				{
				echo'<option value="'.$info4['ID'].'"';
				echo'>'.stripslashes($info4['title']).'</option>';
				}
			echo'</select>';
		*/


	//echo'</FORM>';

 	 
 	 
 	 }
	}
}

else // go to login
{

exit;
}

	 ?>
