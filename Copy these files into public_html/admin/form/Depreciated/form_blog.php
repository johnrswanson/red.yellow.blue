<?include('connect.php');
?>
<script type="text/javascript" src="/js/jquery.js"></script>

<script type="text/javascript" src="./js/jquery-ui-1.7.1.custom.min.js"></script>


<style>
#blogcontentLeft {width: 500px;}
#blogcontentLeft li {float:left; color:#000; width:500px; height:33px; }
#blogcontentRight {float:left;width:490px;  font-size:10px; margin-top:0px; padding:10px; background-color:none;color:#000;}
</style>

<script>
$(function() {$("#blogcontentLeft ul").sortable({ opacity: 0.6, cursor: 'move', update: function(){$("#blogcontentRight").html('updating');

var order = $(this).sortable("serialize") + '&action=updateBlogListings'; 

$.post("./admin/updateblogDB.php", order, function(blogResponse){
	$("#blogcontentRight").html('Order Changed!');
	});
	}
});
});

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
 
				 

$view=$_GET['page'];
$row='0';
if(isset($view))
	{
	echo'<FORM ENCTYPE="multipart/form-data"  METHOD="POST">';
		
		
echo'<INPUT style="float: right; max-width: 100px;" TYPE="submit" name="submit" VALUE="Save Page">';
		echo'<br><b>Title:</b><INPUT TYPE="text" name="title" value="'.$oldtitle.'">';
echo'<br>urltext: <INPUT TYPE="text" name="urltext" value="'.$oldurltext.'">';
echo'<br>Publish Now? <input type="radio" name="published" value="y" ';
if($published=='y')
			{echo' checked';}
echo'>Yes<input type="radio" name="published" value="n"';if($published!='y'){echo' checked';}
echo'>No</p>';

	$data=mysql_query("select * from blog where blogID='$view' order by blogorder ASC");
	$count=mysql_num_rows($data);
	if($count=='0')
		{
		echo'<p>You dont have any content on this page yet. </p>';
		}
	else 
		{
		echo' <p> There are '.$count.' posts on this news page.</p>'; 
		}
		
		echo'<P><a class="lightbox_trigger2" style="background:#00cccc; padding:10px; font-size:20px; text-decoration:none; color:#fff;" href="/admin/admin_new_blog.php?blogID='.$view.'">+ Add Post</a><P>';

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
		{echo'<a class="lightbox_trigger2" href="/admin/index.php?editblog='.$thisblog.'"><img style="float:left; height:30px; width:30px;" height="30px" width="30px" src="../img/blog/thumbs/'.$info3['photo'].'">';}

		
		$color='#eeeeee';
		if($i=='2')
			{$i=0;$color='#afafaf';}
		$i++;
		
		
		echo'<a class="lightbox_trigger2" style="float:left; margin-left:10px;  width:400px; background:'.$color.';" href="admin/index.php?editblog='.$info2['ID'].'">';
		echo stripslashes($info2['title']);
		echo'</a>';
		echo' <a  class="lightbox_trigger2"  style="float:left; margin-top:0px; z-index:1; background:#f00; padding-top:5px; padding-left:5px; text-decoration:none;  padding-right:5px; width:10px; border-radius:3px;  color:#fff;" href="/admin/save/save_blog.php?deleteblog='.$info2['ID'].'">X</a>';
		}
	
	
		echo'</ul></div>';
	}
$data=mysql_query("select * from pages where ID='$view'");
while($info=mysql_fetch_array($data))
	{$thispageID=stripslashes($info['ID']);
	$oldtitle=stripslashes($info['title']);
	$oldurltext=stripslashes($info['urltext']);
	
	$paragraphs=str_replace("<br>",'',$info['text']);
			$oldtext = stripslashes($paragraphs);
			
	}


echo'<INPUT TYPE="hidden" name="thisID" value="'.$view.'">';

echo'<INPUT TYPE="hidden" name="thisID" value="'.$view.'">';
echo'<P style="clear:both;">Description of page:</p><textarea name="text" rows="10" cols="30">'.$oldtext.'</textarea>';

			$data2=mysql_query("select * from page_types where ID ='$page_type' order by ID ASC");
			while($info2=mysql_fetch_array($data2))
				{
				$styles=$info2['styles'];
				
			if ($styles>1){
								
		
				echo'<div style="width:350px;">';
		
			for($i=0; $i < $styles; $i++)
				{echo'<div style="margin-left:10px; float:left;">';
				$j=$i+'1';
				//echo'<img src="./admin_img/'.$info2['title'].''.$j.'.jpg" height="100px" width="120px"><br>';
				echo'<input type="radio" name="page_style" value="'.$j.'" ';
				
				if($page_style==$j){echo 'checked';}
				
				echo'>Layout '.$j.' <br>';
				echo'</div>';}//layout
				echo'</div>';//group
			}//if styles
				} //while styles

echo'<br><p>';
/*
echo'Subpage of <br>';
			echo'<select name="subpage"> <option value="'.$subpage.'">';
			if ($subpage=='main')
				{echo'Main Page';}
			
			else
				{
				$data4=mysql_query("select * from pages where ID='$subpage' ");
				while($info4=mysql_fetch_array($data4))
					{	
					echo$info4['title'];
					}
				}
			echo' </option>';
			
			echo'<option value="main">Main Page</option>';
			$data4=mysql_query("select * from pages where subpage='main' AND ID !='$thispageID' order by pageorder ASC");
			while($info4=mysql_fetch_array($data4))
				{
				echo'<option value="'.$info4['ID'].'"';
				echo'>'.stripslashes($info4['title']).'</option>';
				}
				
			echo'</select>';
		*/
			

/*
echo'Page Type<P>';

$data2=mysql_query("select * from page_types where active ='y' order by ID ASC");
while($info2=mysql_fetch_array($data2))
	{
		echo'<input type="radio" name="page_type" value="'.$info2['ID'].'" ';
		if($page_type==$info2['ID'])
			{echo' checked';}
		echo'>';echo stripslashes($info2['title']);
		echo'<br>';
	}
	*/
	
	

echo'</FORM>';

	 ?>
