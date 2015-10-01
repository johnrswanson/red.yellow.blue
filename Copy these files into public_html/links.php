
<style>
#pageLeft { width:100%; }
#pageLeft li { float:left; list-style:none; }
#pageRight {font-size: 9px; width: 100%; padding:0px; height: 0px; color:black; text-align: center;}
.sublinksbar{display:block;}
</style>



<script type="text/javascript">
 $(function() {$("#pageLeft ul").sortable({  opacity: 0.6,  forcePlaceholderSize: true, delay: 0, forceHelperSize: true, cursor: 'move',
 update: function() {
$("#pageRight").html('updating');
var pageorder = $(this).sortable("serialize") + '&action=updatePageOrder'; 
$.post("/updateDB.php", pageorder, function(theResponse)
{$("#pageRight").html('Page Order Saved!');
});
}
});
$( "#pageLeft" ).disableSelection();});
</script>


<?		


if($logo==''){$logo='-';}
echo'<div class="logo">';
	if($logo!='-'){echo'<div style="width: auto; text-align: center; height:'.$logoheight.'"><a href="/"><img style="max-height:'.$logoheight.'" src="/img/logo/'.$logo.'"></a></div>';}
	
echo'</div>';?>

<div class="linksbarmobile">
<a class="plus" href="#"><img src="/img/icons/mobilemenu.png"></a>
<a class="minus" style="display:none;" href="#"><img src="/img/icons/mobilemenu_off.png"></a>
</div>

<div id="pageRight"></div>
<div ID="linksbar" class="section group" style="">
<?			
if($loggedin=='true')
				{
				echo'<div ID="pageLeft">';
				}	
				
echo'<ul style="width: 100%;">';
$l=$_GET['l'];

$data3=mysql_query("select * from pages where published='y' and subpage='main' order by pageorder ASC");
$pagecount=mysql_num_rows($data3);
while($info3=mysql_fetch_array($data3))
	{
	$pageID=stripslashes($info3['ID']);
	$content=stripslashes($info3['content']);
	$title=stripslashes($info3['title']);
	$page_type=$info3['page_type'];
	$published=($info3['published']);
	$urltext=($info3['urltext']);
	$adminID=stripslashes($info3['adminID']);
	
	
	
	
	echo'<li ID="pageArray_'.$pageID.'" class=" link'.$pageID.' col span_1_of_'.$pagecount.' ">';

echo'<a class="';
if($urltext==$l){ echo 'selectedlink';}
echo'" ID="link'.$pageID.'" href="/'.$urltext.'" >'.$title.'</a>';




$data4=mysql_query("select * from pages where published='y' and subpage='$pageID' order by pageorder ASC");
$subcount=mysql_num_rows($data4);
if($subcount!='0')
			{
				
echo'<div class="sublinksbar sublinksbar'.$pageID.'">';
		while($info4=mysql_fetch_array($data4))
				{
				$subtitle=stripslashes($info4['title']);
				$subpageID=stripslashes($info4['ID']);
				$urltext=stripslashes($info4['urltext']);
			
		
			
			echo'
			<a ID="link'.$subpageID.'"';
			
			echo'href="/'.$urltext.'" >'.$subtitle.'</a><br>';
			
			
			
			}//while
			echo'</div>';//END submenu

			}//if subpages


	echo'</li>';//end sortable li 1 of however many
	
	
	
	}//while
	echo'</ul>';//end contentLeft 
	
	if($loggedin=='true'){
	echo'</div>';//end pageLeft 
	}
	?>
	


	
	

