<div style=" margin-top: -20px; margin-left:20px; margin-bottom: 5px; ">Edit Page</div>
<script>
$(document).ready(function(){
	
	$(".none_button a").click(function(){
		$(".flippers").hide()
		$(".none").slideDown(200);
			$(".buttons").css("background","none");
		$(".none_button").css("background","#aaa");
	});
	
	
	$(".bgcolor_button a").click(function(){
		$(".flippers").hide()
		$(".bgcolor").slideDown(200);
		$(".buttons").css("background","none");
		$(".bgcolor_button").css("background","#aaa");
	});
	
	$(".bgpic_button a").click(function(){
		$(".flippers").hide()
		$(".bgpic").slideDown(200);
		$(".buttons").css("background","none");
		$(".bgpic_button").css("background","#aaa");
	});
	


});
</script>



<style> .buttons{text-align:center; float: left; width: 50px; border: solid 1px #000; padding: 5px; margin: 5px; mrgin-top: 0px; padding-top: 0px; }
.flippers{position: relative;display:none;} 
.addtext_button{background:#aaa;}
.buttons{}


<?if($oldphoto!='-'){echo'.bgpic{display:block;}';}
else{
if($background!='-'){echo'.bgcolor{display:block;}';}
else
{echo'.none{display:block;}';}
}
?>

</style>


<?
////////////////////////////////////////NORMAL "PAGE" PAGE	{type 1}
		if($page_type=='1')
			{echo'<FORM  ENCTYPE="multipart/form-data"  METHOD="POST" action="/index.php">';
			
						
						

			
			echo'<p style="margin-bottom: 10px;"></b><INPUT TYPE="text" name="title" style="width: 300px"value="'.$oldtitle.'" placeholder="Title"></p>';
			
			echo'<p>/web/url/<INPUT TYPE="text" style="width: 200px" name="urltext" value="'.$oldurltext.'"></p>';
			
			
echo'<p>Subpage of<br>';
			echo'<select name="subpage" style="margin-bottom: 10px;"> <option value="'.$subpage.'">';
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
			echo' </option>
			
			<option value="main">Main Page</option>';
			$data4=mysql_query("select * from pages where subpage='main' and ID!='$page' and adminID='$userID' order by pageorder ASC");
			while($info4=mysql_fetch_array($data4))
				{
				echo'<option value="'.$info4['ID'].'"';
				echo'>'.stripslashes($info4['title']).'</option>';
				}
			echo'</select></p>';

			
//Subpage of

echo'<p style="float:left; width: 150px;">';
			
					
						
/////////////////PUBLISH NOW Y/N FOR ALL PAGES ?
			echo'<br><b>Publish Now?</b> <br>
			<input type="radio" name="published" value="y" ';
			if($published=='y')
				{
				echo' checked';
				}
			echo'> Yes | <input type="radio" name="published" value="n"';
			
	if($published!='y')
				{echo' checked';}
			echo'> No';

			
			echo'</p>';
					
	

			echo'<INPUT style="width: 100px;" TYPE="hidden" name="thisID" value="'.$page.'">';
				
		
	
	echo'<div style="text-align:center; width: 100%;">';



			echo'<INPUT TYPE="hidden" name="thisID" value="'.$page.'">';
			echo'<INPUT style=" width:120px; margin: auto; margin-top: 20px; " TYPE="submit" name="submit" VALUE="Save Page">';
						
//echo'<a style=" background: #f33; color: #fff; padding: 10px; margin-left: 50px; border-radius: 3px;" href="/index.php?dy='.$$page.'">Delete Page</a>';

			echo'</div>';
			echo'</form>';
						}
?>
