

<script type="text/javascript" src="/js/jquery.js"></script>

<script type="text/javascript" src="/js/jquery-ui-1.7.1.custom.min.js"></script>


<style>
#storecontentphotoLeft {width: 500px;}
#storecontentphotoLeft li {float:left; color:#000; width:500px; height:33px; }
#storecontentphotoRight {float:left;width:490px;  font-size:10px; margin-top:0px; padding:10px; background-color:none;color:#000;}
</style>

<script>
$(function() {$("#storephotocontentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function(){$("#storephotocontentRight").html('updating');var order = $(this).sortable("serialize") + '&action=updatestorephotoListings'; $.post("/admin/updatestorephotoDB.php", order, function(storephotoResponse){$("#storephotocontentRight").html('Order Changed!');});}});});

</script>

 <script>
$('.lightbox_trigger2').click(function(e) {
		e.preventDefault();
		var link_href = $(this).attr("href");
	
		$('#content2').load(link_href);
		$('#lightbox2').show();
	
		
	});
	
	
$('.close2 a').click(function() {
	$('#lightbox2').hide();
	});
	</script>
	


<?
include('connect.php');
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
	 
	 
	 
	 
$editstore=$_GET['editstore'];
if(isset($editstore))

	{
	$data=mysql_query("select * from store where ID='$editstore' order by title ASC");
	while($info=mysql_fetch_array($data))	
	{$title=stripslashes($info['title']);
	$thisstoreID=stripslashes($info['storeID']);
	$paragraphs=str_replace("<br>",'',$info['mytext']);
	$oldtext = stripslashes($paragraphs);
	$buybutton=stripslashes($info['buybutton']);
		$price=stripslashes($info['price']);
		$section=stripslashes($info['section']);
		$inventory=stripslashes($info['inventory']);
		$calltoaction=stripslashes($info['calltoaction']);
	//echo'<a href="?page='.$storeID.'">Go Back to Collection</a><P>';
	echo'<div style="">';
	
	echo'<form method="post" action="/index.php" ENCTYPE="multipart/form-data" >';
	//echo'<P><INPUT NAME="userfile" TYPE="file"><P><img src="/img/store/'.$info['photo'].'" width="200px"><P>';
	echo'<input style="float: right;"type="submit" name="editstorenow" value="Save">';
	echo'<p><input type="text" name="title" value="'.$title.'"><br>';
	echo'Price $<input type="text" style="width: 130px;" name="price" value="'.$price.'"></P>';
	echo'Call to Action:<br><input type="text" style="width: 130px;" name="calltoaction" value="'.$calltoaction.'"><P>';
	
	echo'<input type="hidden" name="thisID" value="'.$editstore.'"><P>';
	echo'<input type="hidden" name="storeID" value="'.$thisstoreID.'"><P>';
	//echo'Short Text : <br><textarea name="short_text" rows="12" cols="30">'.$oldshorttext.'</textarea><P>';
	
	echo'<br><textarea name="mytext" style="width: 100%; height: 200px;" >'.$oldtext.'</textarea><P>';
	
	
	
	echo'<a class="lightbox_trigger2" style="padding:10px; background:#00cccc; color:#fff; text-decoration:none; font-size: 20px;  " href="/admin/admin_new_storephoto.php?storephotoID='.$editstore.'">+ Add Photos</a><P>';
	
	
	$row='0';
	echo'<div id="storephotocontentRight">Drag and drop to change order</div>';
	echo'<div id="storephotocontentLeft"><ul>';
	$data2=mysql_query("select * from store_photos where storeID='$editstore' order by photoorder ASC");
	while($info2=mysql_fetch_array($data2))
		{echo'<li id="storephotoArray_'.$info2['ID'].'">';
				echo' <a  class="lightbox_trigger2" style="margin-top:0px; z-index:1; background:#f00; padding-left:5px; text-decoration:none;  padding-right:5px;  padding-top:3px; float:left;  border-radius:3px;  color:#fff;" href="/admin/save/save_store.php?deletestorephoto='.$info2['ID'].'">X</a>';
				
		//echo'<a href="index.php?editstorephoto='.$info2['ID'].'">';
		echo ''.stripslashes($info2['title']).'<br><img style="z-index:10; width:120px; height:100px;  margin-top:0px;" src="/img/full/'.stripslashes($info2['photo']).'" width="150px">';
		//echo'</a>';
		echo'</li>';
		
		}
	echo'</ul></div>';
	
	
	
		
		echo'</form>';
	}
	exit;
	}
 
	 	 }
	}
}

else // go to login
{

}

	 ?>

					

