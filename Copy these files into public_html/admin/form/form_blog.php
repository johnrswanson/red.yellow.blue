


<style>
#blogcontentLeft {width: 500px;}
#blogcontentLeft li {float:left; color:#000; width:500px; height:33px; }
#blogcontentRight {float:left;width:490px;  font-size:10px; margin-top:0px; padding:10px; background-color:none;color:#000;}
</style>

<script>
$(function() {$("#blogcontentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function(){$("#blogcontentRight").html('updating');var order = $(this).sortable("serialize") + '&action=updateBlogListings'; $.post("/admin/updateblogDB.php", order, function(blogResponse){$("#blogcontentRight").html('Order Changed!');});}});});

</script>

    <script>
$('.lightbox_trigger3').click(function(ea) {
		ea.preventDefault();
		var link_href = $(this).attr("href");
		var myoffset = $( this ).offset();
		$('#content').load(link_href);
		$('#lightbox').show();
		$('#lightbox').offset( myoffset);
		$('#lightbox').animate({left: "10%"}, 300, "swing" );
	
		
	});
	
	
$('.close a').click(function() {
	$('#lightbox').hide();
	});
	</script>
	
	
	

<?
 
				 

$view=$myboxID;
$row='0';
if(isset($view))
	{
	
	$data=mysql_query("select * from blog where blogID='$view' order by blogorder ASC");
	$count=mysql_num_rows($data);
	if($count=='0')
		{
		echo'<p>You do not have anything in this box yet. </p>';
		}
	else 
		{
		echo' <p> There are '.$count.' things in this box.</p>'; 
		}
		
		
		
		
		
		//echo'<P><a class="lightbox_trigger2" style="background:#00cccc; padding:10px; font-size:20px; text-decoration:none; color:#fff;" href="/admin/admin_new_blog.php?blogID='.$view.'">+ Add Post</a><P>';

		echo'<div id="blogcontentRight">Drag and drop to change order</div>';
	echo'<div id="blogcontentLeft"><ul>';
	$i=1;
	$data2=mysql_query("select * from blog where blogID='$view' order by blogorder ASC");
	while($info2=mysql_fetch_array($data2))
		{
			
		$thisblog=$info2['ID'];	
		
		echo'<li id="blogArray_'.$thisblog.'">';
		
		$data3=mysql_query("select * from blog_photos where blogID='$thisblog' order by photoorder ASC limit 1");
		while($info3=mysql_fetch_array($data3))
		{echo'<a class="lightbox_trigger3" href="/admin/index.php?editblog='.$thisblog.'"><img style="float:left; height:30px; width:30px;" height="30px" width="30px" src="/img/blog/'.$info3['photo'].'">';}

		
		$color='#eeeeee';
		if($i=='2')
			{$i=0;$color='#afafaf';}
		$i++;
		
		
		echo'<a class="lightbox_trigger3" style="float:left; margin-left:10px;  width:400px; background:'.$color.';" href="/admin/index.php?editblog='.$info2['ID'].'">';
		echo stripslashes($info2['title']);
		echo'</a>';
		echo' <a  class="lightbox_trigger3"  style="float:left; margin-top:0px; z-index:1; background:#f00; padding-top:5px; padding-left:5px; text-decoration:none;  padding-right:5px; width:10px; border-radius:3px;  color:#fff;" href="/admin/save/save_blog.php?deleteblog='.$info2['ID'].'">X</a></li>';
		}
		echo'</ul></div>';
	}
	
		
	


	 ?>
