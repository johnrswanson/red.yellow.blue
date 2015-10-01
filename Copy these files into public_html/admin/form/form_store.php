<br>THIS FEATURE IS CURRENTLY UNDER CONSTRUCTION<br>

<style>
#storecontentLeft {}
#storecontentLeft li {float:left; color:#000; width:300px;  height:auto; }
#storecontentRight { background: none; float:left; color:#000; font-size:10px; margin-top:0px; padding:10px;}
</style>

<script>
$(function() {$("#storecontentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function(){$("#storecontentRight").html('updating');var order = $(this).sortable("serialize") + '&action=updateStoreListings'; $.post("/admin/updatestoreDB.php", order, function(storeResponse){$("#storecontentRight").html('Order Changed!');});}});});

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
 
				 

$view=$myboxID;
$row='0';
if(isset($view))
	{
	
	$data=mysql_query("select * from store where storeID='$view' order by storeorder ASC");
	$count=mysql_num_rows($data);
	if($count=='0')
		{
		echo'<p>You do not have any products in this Shop box yet. </p>';
		}
	else 
		{
		echo' <p>Products in this Shop box:'.$count.' </p>'; 
		}
		
		
		
		
		
		//echo'<P><a class="lightbox_trigger2" style="background:#00cccc; padding:10px; font-size:20px; text-decoration:none; color:#fff;" href="/admin/admin_new_store.php?storeID='.$view.'">+ Add Post</a><P>';

		echo'<div id="storecontentRight">Drag and drop to change order</div>';
	echo'<div id="storecontentLeft"><ul>';
	$i=1;
	$data2=mysql_query("select * from store where storeID='$view' order by storeorder ASC");
	while($info2=mysql_fetch_array($data2))
		{
			
		$thisstore=$info2['ID'];	
		
		echo'<li id="storeArray_'.$thisstore.'">';
		
		$data3=mysql_query("select * from store_photos where storeID='$thisstore' order by photoorder ASC limit 1");
		while($info3=mysql_fetch_array($data3))
		{echo'<a class="lightbox_trigger2" href="/admin/index.php?editstore='.$thisstore.'"><img style="float:left; height:50px; width:50px;" src="/img/full/'.$info3['photo'].'">';}

		
		$color='#eeeeee';
		if($i=='2')
			{$i=0;$color='#afafaf';}
		$i++;
		
		
		echo'<a class="lightbox_trigger2" style="float:left; margin-left:10px;  width:200px; background:'.$color.';" href="/admin/index.php?editstore='.$info2['ID'].'">';
		echo stripslashes($info2['title']);
		echo'</a>';
		echo' <a  class="lightbox_trigger2"  style="float:left; margin-top:0px; z-index:1; background:#f00; padding-top:5px; padding-left:5px; text-decoration:none;  padding-right:5px; width:10px; border-radius:3px;  color:#fff;" href="/admin/save/save_store.php?deletestore='.$info2['ID'].'">X</a></li>';
		}
		echo'</ul></div>';
	}
	
		
	


	 ?>
