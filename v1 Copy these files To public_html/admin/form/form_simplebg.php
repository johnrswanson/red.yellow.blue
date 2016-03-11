<div style=" margin-top: -20px; margin-left:20px; margin-bottom: 5px; ">Background for This Page</div>

<?
include('../connect.php');

$tpage=$_GET['tpage'];
//echo $tpage;


$data53=mysql_query("select * from pages where ID='$tpage' order by ID ASC limit 1");
		while($info53=mysql_fetch_array($data53))
			{
///////////////////////GET COMMOMN VARS FOR SELECTED PAGE
		$thisadminID=$info53['adminID'];
			$oldphoto=stripslashes($info53['photo']);
			$background=stripslashes($info53['background']);
			
			}

//echo $oldphoto;
?>
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
		echo'<FORM  ENCTYPE="multipart/form-data"  METHOD="POST" action="/index.php">';
		echo'<INPUT style="width: 100px;" TYPE="hidden" name="thisID" value="'.$tpage.'">';
				
			echo'<div style="margin-top: 10px;  width: 40px;"><b>Background:</b></div> ';
			
			// CHOOSE THE BACKGROUND TABS
			//echo'<div class="none_button buttons"><a href="">None</a></div>';
			echo'<div class="bgcolor_button buttons"><a href="" onclick ="return false">Color</a></div>';
			echo'<div class="bgpic_button buttons"><a href="" onclick ="return false">Photo</a></div>';
			echo'<p style="clear:both;"></p>';

		
	
			
		///COLOR	
		echo'<div class="bgcolor flippers">';
			if($background==''){$background='#ffffff';}
				echo'<input style=" height: 80px; width:160px" name="background" id="html5colorpicker" class="form-control" type="color" value="'.$background.'" onchange="clickColor(0, -1, -1, 5)"><br>';
		echo'</div>';
					
		
		///PHOTO
		echo'<div class="bgpic flippers">';
	
			if($oldphoto!='-')
			{
			echo'<img src="/img/full/'.$oldphoto.'" width="200px"><br>
			<input name="removephoto" type="checkbox" value="-">Remove Background Photo</p>';
			}
			
			echo'<input name="photo" type="hidden" value="'.$oldphoto.'">';
	echo'<p>';
	echo'<INPUT style="width: 300px; height: 80px; padding: 10px; text-align: center;" NAME="file" TYPE="file"></p>';

	echo'</div>';
	
	echo'<div style="text-align:center; width: 100%;">';



			echo'<INPUT TYPE="hidden" name="thisID" value="'.$tpage.'">';
		
			echo'<INPUT style=" width:120px; margin: auto; margin-top: 20px; " TYPE="submit" name="submitbgcolor" VALUE="Save Page">';
						
//echo'<a style=" background: #f33; color: #fff; padding: 10px; margin-left: 50px; border-radius: 3px;" href="/index.php?dy='.$$page.'">Delete Page</a>';

			echo'</div>';
			echo'</form>';
					
?>
