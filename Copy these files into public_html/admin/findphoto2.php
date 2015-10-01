<?include('connect.php');

//FREE STOCK PHOTOS SOURCE
	function search($keyword)	{
$getpage='https://stocksnap.io/search/'.$keyword.'/sort/date/desc';
$page = file_get_contents($getpage);
$doc = new DOMDocument(); 
$doc->loadHTML($page);


$images = $doc->getElementsByTagName('img'); 
foreach($images as $image) 
	{echo $image->getAttribute('src') .'<br />';
    echo '<img src="';
    
    //echo$getpage.'/';
  
    $stealphoto=$image->getAttribute('src');
    $show=str_replace("280h","960w",$stealphoto); 
    echo $show.'" ><br />';
    echo '<p>'.$image->getAttribute('alt').'</p>';
	}
	
	
	
	
	//PEXELS
$getpage='http://www.pexels.com/search/'.$keyword.'';
$page = file_get_contents($getpage);
$doc = new DOMDocument(); 
$doc->loadHTML($page);


$images = $doc->getElementsByTagName('img'); 
foreach($images as $image) 
	{echo $image->getAttribute('src') .'<br />';
    echo '<img src="';
    
    //echo$getpage.'/';
  
    $stealphoto=$image->getAttribute('src');
    $show=str_replace("-medium","-large",$stealphoto); 
    echo $show.'" ><br />';
    echo '<p>'.$image->getAttribute('alt').'</p>';
	}

	
//JAY MANTRI  
$getpage='http://jaymantri.com/search/'.$keyword.'';
$page = file_get_contents($getpage);
$doc = new DOMDocument(); 
$doc->loadHTML($page);

$images = $doc->getElementsByTagName('img'); 
foreach($images as $image) 
	{echo $image->getAttribute('src') .'<br />';
    echo '<img src="';
    
    //echo$getpage.'/';
  
    $stealphoto=$image->getAttribute('src');
    $show=str_replace("280h","960w",$stealphoto); 
    echo $show.'" ><br />';
    echo '<p>'.$image->getAttribute('alt').'</p>';
	}




//OLD TIMEY  SOURCE 
$getpage='http://nos.twnsnd.co/search/'.$keyword.'';
$page = file_get_contents($getpage);
$doc = new DOMDocument(); 
$doc->loadHTML($page);

$images = $doc->getElementsByTagName('img'); 
foreach($images as $image) 
	{echo $image->getAttribute('src') .'<br />';
    echo '<img src="';
    
    //echo$getpage.'/';
  
    $stealphoto=$image->getAttribute('src');
    $show=str_replace("280h","960w",$stealphoto); 
    echo $show.'" ><br />';
    echo '<p>'.$image->getAttribute('alt').'</p>';
	}




//Public Domain Archive 
$getpage='http://publicdomainarchive.com/?s='.$keyword.'';
$page = file_get_contents($getpage);
$doc = new DOMDocument(); 
$doc->loadHTML($page);

$images = $doc->getElementsByTagName('img'); 
foreach($images as $image) 
	{echo $image->getAttribute('src') .'<br />';
    echo '<img src="';
    
    //echo$getpage.'/';
  
    $stealphoto=$image->getAttribute('src');
    $show=str_replace("280h","960w",$stealphoto); 
    echo $show.'" ><br />';
    echo '<p>'.$image->getAttribute('alt').'</p>';
	}

	}



	
function scrape($getpage)	{
$page = file_get_contents($getpage);
$tags = explode('<',$page);
$doc = new DOMDocument(); 
$doc->loadHTML($page);


$images = $doc->getElementsByTagName('img'); 
foreach($images as $image) 
	{echo $image->getAttribute('src') .'<br />';
    echo '<img src="';
    echo $image->getAttribute('src') . '" ><br />';
    
    
    echo '<img src="';
        echo$getpage.'/';
    echo $image->getAttribute('src') . '" ><br />';
	
	 echo '<p>'.$image->getAttribute('alt').'</p>';
	}

foreach ($tags as $tag)
{
  // skip scripts
  if (strpos($tag,'script') !== FALSE) continue;
   if (strpos($tag,'style') !== FALSE) continue;
  // get text
  $text = strip_tags('<'.$tag);
  // only if text present remember
  if (trim($text) != '') 
  $texts[] = $text;
}


	foreach ($texts as $element)
	
	echo '<p>'.$element.'</p>';
	}


if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	$paid=$info['paid'];
	if ($pass != $info['password'])
	 	{ //echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
	 	} 
	 else
	 {
	 //////////ADMIN IS LOGGED IN
	 
//include('admin_links.php');
/////////////////////////////////////////ADD NEW




$getpage=$_GET['url'];
$keyword=$_GET['keyword'];

echo'<form action="/admin/findphoto.php">
<input type="text" placeholder="Enter Url" name="url"> or 
<input type="text" placeholder="Search Topic" name="keyword">
<input value=Get content" type="submit">
</form><br><a href="http://red.yellow.blue/admin/findphoto.php">Reset</a><br>';


echo$getpage.'<br>';
echo$keyword.'<br>';

if($keyword!=''){search($keyword);}
if($getpage!=''){scrape($getpage);}

/*
if (!isset($newpage))
	{
		//////////////////JQ CSS
echo'<style>';
$data2=mysql_query("SELECT * FROM page_types where active ='y'")or die(mysql_error()); 
while($info2=mysql_fetch_array($data2))
{$thisID=$info2['ID'];

echo'#selectpage'.$thisID.'
{position:relative;
padding:3px;
}

#group'.$thisID.'
{position:relative;
padding:3px;
display:none;}';
}//while

echo'input[text]{height: 40px; width: 100%;}';
echo'</style>';
echo'<script src="./js/jquery.js" type="text/javascript"></script>';

	
///////////////SCRIPTS
		echo'<script type="text/javascript">';

	echo'$(function() {';
$data2=mysql_query("select * from page_types");
	while($info2=mysql_fetch_array($data2))
	{
    echo' $(\'#selectpage'.$info2['ID'].'\').click(function() {';
     echo'$(\'.groups\').fadeOut(200);';

    echo'$(\'#group'.$info2['ID'].'\').fadeIn(200);';
    
echo'});';
	

}//while
echo' });';

echo'</script>';

	
$free_elements='20';
$free_pages='4';

if($paid!='y'){
$data22=mysql_query("select * from pages where  published='y' and adminID='$userID' ");
$count=mysql_num_rows($data22);
//echo $count;
if ($count>=$free_pages){echo'<b>Free Account:</b>
 <p>'.$free_elements.' things per page.<br> 
'.$free_pages.' pages. For Now....
</p> <p><a class="button" href="/welcome/services/"><b>Sign up for a paid account.</b></a><br>
  Get Unlimited things on your page, and unlimited pages';
exit;}
if ($count<='$free_elements'){ }
}


	echo'<form method="POST" action="/index.php">';
	echo'<div class="alert" > 
	<input type="text" name="title" value="" placeholder="Title of the new page">';
	
echo'</div>';
		

	
	
	
	echo'<input type="submit" name="new" value="Create Page">';
	echo'</form>';
	}//newpage
*/
 
	 	 }
	}
}

else // go to login
{

}

	 ?>
