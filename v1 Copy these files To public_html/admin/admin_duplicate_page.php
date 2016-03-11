<style>.picker{text-align: center; background: #eee;   min-height: 180px; margin: 0px; padding-top: 3px;}
.minisite{background: #fff; height: 120px; width: 150px; margin: auto; border:solid 1px #aaa;}
.minisite img{border:solid 1px #ddd;margin: -1px; padding: 2px;}
.headline{font-size: 12px; text-align: center; padding:2px;}
.headlineid{font-size: 12px; background: #000; color: #fff; text-align:left;padding:2px; }
.smalltxt{font-size: 5px; padding: 5px;}
</style>

<?


 
$dupeID=$_GET['dupeID'];
$bg=$_GET['bg'];
$bg='#'.$bg;
$pic=$_GET['pic'];
$safepic = str_replace( '+', ' ', $pic ); 
$funtitle=$_GET['t'];
if($funtitle==''){$funtitle='This Page';}
	echo'<form method="POST" action="/admin/confirm.php">';
		
		echo'Use '.$funtitle.' as a starting point for a New Page. <br>
		 <input type="text" name="title" value="" placeholder="New Page title">';
		 
echo'<br><input style="float:right;" type="submit" name="duper" value="Create Page" >';


	echo'<input type="hidden" name="photo" value="'.$safepic.'" >';
	echo'<input type="hidden" name="background" value="'.$bg.'">';
	echo'<input type="hidden" name="dupeID" value="'.$dupeID.'" >';
	
		echo'</form>';
		
		
	 ?>
