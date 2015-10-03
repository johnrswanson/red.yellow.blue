<?
echo'<div id="pageRight"></div>
<div ID="linksbar_simple" class="section group">
	';		

if($loggedin=='true')
				{echo'<div ID="pageLeft" style="width: 100%;">';}
				
					
				
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
	
	
	
	
	echo'<li ID="" class=" link'.$pageID.' "  style="width: 100%;float: left; clear: both;" >';

echo'<a class="';
if($urltext==$l){ echo 'selectedlink';}
echo'" ID="link'.$pageID.'" href="./'.$urltext.'" >'.$title.'</a>';




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
			
			echo'href="./'.$urltext.'" >'.$subtitle.'</a><br>';
			
			
			
			}//while
			echo'</div>';//END submenu

			}//if subpages


	echo'</li>';//end sortable li 1 of however many
	
	
	
	}//while
	if($loggedin=='true')
				{echo'</ul>';//end contentLeft 
					}
	
	
	echo'</div>';//end pageLeft 
echo'</div>';//end

	?>
	


	
	

