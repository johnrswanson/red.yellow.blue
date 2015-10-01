<?$fakerows=(($columnset * 100)+ 10);?>
<style>

#photocontentLeft {width: 
<?echo$fakerows;?>px;
}
#photocontentLeft li {float:left; background-color:#eeeeee; color:#fff; width:90px; height:60px; overflow:hidden;}
#photocontentRight {float:left;width:650px; font-size:10px;  margin-top:padding:10px;background-color:none;color:#000;}

</style>

<script>
$(function() {$("#photocontentLeft ul").sortable({ opacity: 0.6, cursor: 'move', forcePlaceholderSize: true, forceHelperSize: true, update: function(){$("#photocontentRight").html('updating');var order = $(this).sortable("serialize") + '&action=updatePhotoListings'; $.post("/admin/updatephotoDB.php", order, function(photoResponse){$("#photocontentRight").html('Order Changed!');});}});});

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
	 	{ 	 	} 
	 else
		{
				 //////////ADMIN IS LOGGED IN
				 

$view=$myboxID;
$row='0';
if(isset($view))
	{
		
		//echo'<FORM ENCTYPE="multipart/form-data"  METHOD="POST" >';
				
//echo'<INPUT style="float: right; min-width: 100px;" TYPE="submit" name="submit" VALUE="Save Page">';

//echo'<br><b>Title:</b> <INPUT TYPE="text" name="title" value="'.$oldtitle.'">';
//echo'<br>urltext<INPUT TYPE="text" name="urltext" value="'.$oldurltext.'">';
//echo'<br>Publish now?</b> <input type="radio" name="published" value="y" ';
//if($published=='y')
			//{echo' checked';}
		//echo'>Yes <input type="radio" name="published" value="n"';
		//if($published!='y')
			//{echo' checked';}
		//echo'>No</p>';



	$data=mysql_query("select * from photos where gallery='$view' order by photoorder ASC");
	$count=mysql_num_rows($data);
	
	
	if($count=='0')
		{echo' <P>You dont have any photos in this box yet.<p>';}
	else
	 	{echo'<p>There are '.$count.' photos in this gallery<P>'; }
	
	//echo'<a class="lightbox_trigger2" style=" background:#00cccc; font-size: 20px; text-decoration:none;  padding:10px;   color:#fff;" href="/admin/admin_new_photo.php?photoID='.$view.'"> + Add Photos</a><P>';
	
	echo'<div id="photocontentLeft"><ul>';
	
	echo'<div id="photocontentRight">Drag and drop photos to change order</div><br>';
	$thiscount=0;
	
	while($info=mysql_fetch_array($data))
		{
		
		
		
echo'<li style="';
		if($columnset==$thisphotocount)
		{//echo'clear:both;';
		 $thisphotocount=0;}
		$thisphotocount++;
		
	echo'" id="photoArray_'.$info['ID'].'">
		<img src="/img/full/'.$info['photo'].'"style=" min-height:100px; min-width:90px;  overflow:hidden; z-index:10; margin-top:0px; ';
		$path='/img/full/'.$info['photo'].'';
		list($width_orig, $height_orig) = getimagesize($path);
		if ($width_orig >$height_orig)
		{
			echo'margin-left:-0px;';
		}
		
		echo'"></li>';
		}
	echo'</ul>';
	echo'</div>';
}
 	 
 	 
 	 }
	}
}

else // go to login
{
}

	 ?>
