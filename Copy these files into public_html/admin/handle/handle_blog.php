


<script type="text/javascript" src="/js/jquery.js"></script>

<script type="text/javascript" src="/js/jquery-ui-1.7.1.custom.min.js"></script>


<style>
#blogcontentphotoLeft {width: 500px;}
#blogcontentphotoLeft li {float:left; color:#000; width:500px; height:33px; }
#blogcontentphotoRight {float:left;width:490px;  font-size:10px; margin-top:0px; padding:10px; background-color:none;color:#000;}
</style>

<script>
$(function() {$("#blogphotocontentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function(){$("#blogphotocontentRight").html('updating');var order = $(this).sortable("serialize") + '&action=updateBlogphotoListings'; $.post("/admin/updateblogphotoDB.php", order, function(blogphotoResponse){$("#blogphotocontentRight").html('Order Changed!');});}});});

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
	


<?include('connect.php');
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
	 
	 
	 
	 
$editblog=$_GET['editblog'];
if(isset($editblog))
	{
	$data=mysql_query("select * from blog where ID='$editblog' order by title ASC");
	while($info=mysql_fetch_array($data))	
	{$title=stripslashes($info['title']);
	$thisblogID=stripslashes($info['blogID']);
	$paragraphs=str_replace("<br>",'',$info['text']);
			$oldtext = stripslashes($paragraphs);
	
	//echo'<a href="?page='.$blogID.'">Go Back to Collection</a><P>';
	echo'<div style="">';
	
	echo'<form method="post" action="/index.php" ENCTYPE="multipart/form-data" >';
	//echo'<P><INPUT NAME="userfile" TYPE="file"><P><img src="/img/blog/'.$info['photo'].'" width="200px"><P>';
	echo'<input style="float: right;"type="submit" name="editblognow" value="Save">';
	echo'<input type="text" name="title" value="'.$title.'"><P>';
	echo'<input type="hidden" name="thisID" value="'.$editblog.'"><P>';
	echo'<input type="hidden" name="blogID" value="'.$thisblogID.'"><P>';
	//echo'Short Text : <br><textarea name="short_text" rows="12" cols="30">'.$oldshorttext.'</textarea><P>';
	
	echo'<br><textarea name="text" style="width: 100%; height: 200px;" >'.$oldtext.'</textarea><P>';
	
	
	
	echo'<a class="lightbox_trigger2" style="padding:10px; background:#00cccc; color:#fff; text-decoration:none; font-size: 20px;  " href="/admin/admin_new_blogphoto.php?blogphotoID='.$editblog.'">+ Add Photos</a><P>';
	
	
	$row='0';
	echo'<div id="blogphotocontentRight">Drag and drop to change order</div>';
	echo'<div id="blogphotocontentLeft"><ul>';
	$data2=mysql_query("select * from blog_photos where blogID='$editblog' order by photoorder ASC");
	while($info2=mysql_fetch_array($data2))
		{echo'<li id="blogphotoArray_'.$info2['ID'].'">';
				echo' <a  class="lightbox_trigger2" style="margin-top:0px; z-index:1; background:#f00; padding-left:5px; text-decoration:none;  padding-right:5px;  padding-top:3px; float:left;  border-radius:3px;  color:#fff;" href="/admin/save/save_blog.php?deleteblogphoto='.$info2['ID'].'">X</a>';
				
		//echo'<a href="index.php?editblogphoto='.$info2['ID'].'">';
		echo ''.stripslashes($info2['title']).'<br><img style="z-index:10; width:120px; height:100px;  margin-top:0px;" src="/img/blog/'.stripslashes($info2['photo']).'" width="150px">';
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
echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
exit;
}

	 ?>
