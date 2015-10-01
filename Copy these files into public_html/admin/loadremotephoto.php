<?

$page=$_GET['thisID'];


//FREE STOCK PHOTOS SOURCE
	function search($keyword)	{



	
	
	
//PEXELS
$getpage='http://www.pexels.com/search/'.$keyword.'';
$page = file_get_contents($getpage);
$doc = new DOMDocument(); 
$doc->loadHTML($page);


$images = $doc->getElementsByTagName('img'); 
foreach($images as $image) 
	{
		//echo $image->getAttribute('src') .'<br />';
    echo '<img src="';
    
    //echo$getpage.'/';
  
    $stealphoto=$image->getAttribute('src');
    $show=str_replace("-medium","-large",$stealphoto); 
    echo $show.'" >';
    //echo '<p>'.$image->getAttribute('alt').'</p>';
	}

	
//JAY MANTRI  
$getpage='http://jaymantri.com/search/'.$keyword.'';
$page = file_get_contents($getpage);
$doc = new DOMDocument(); 
$doc->loadHTML($page);

$images = $doc->getElementsByTagName('img'); 
foreach($images as $image) 
	{
		//echo $image->getAttribute('src') .'<br />';
    echo '<img src="';
    
    //echo$getpage.'/';
  
    $stealphoto=$image->getAttribute('src');
    $show=str_replace("280h","960w",$stealphoto); 
    echo $show.'" ><br />';
    //echo '<p>'.$image->getAttribute('alt').'</p>';
	}




//OLD TIMEY  SOURCE 
$getpage='http://nos.twnsnd.co/search/'.$keyword.'';
$page = file_get_contents($getpage);
$doc = new DOMDocument(); 
$doc->loadHTML($page);

$images = $doc->getElementsByTagName('img'); 
foreach($images as $image) 
	{
		//echo $image->getAttribute('src') .'<br />';
	
	$stealphoto=$image->getAttribute('src');
     if($stealphoto!='http://38.media.tumblr.com/avatar_005dd81621de_128.png')
    {
    	echo '<img src="';
    //echo$getpage.'/';
  
        $show=str_replace("280h","960w",$stealphoto); 
   
    echo $show.'" ><br />';
 //   echo '<p>'.$image->getAttribute('alt').'</p>';
    }
	}




//Public Domain Archive 
$getpage='http://publicdomainarchive.com/?s='.$keyword.'';
$page = file_get_contents($getpage);
$doc = new DOMDocument(); 
$doc->loadHTML($page);

$images = $doc->getElementsByTagName('img'); 
foreach($images as $image) 
	{
		//echo $image->getAttribute('src') .'<br />';
    echo '<img src="';
    
    //echo$getpage.'/';
  
    $stealphoto=$image->getAttribute('src');
    $show=str_replace("280h","960w",$stealphoto); 
    echo $show.'" ><br />';
    //echo '<p>'.$image->getAttribute('alt').'</p>';
	}
	
	
	
	

//STOCKSNAP
$getpage='https://stocksnap.io/search/'.$keyword.'/sort/date/desc';
$page = file_get_contents($getpage);
$doc = new DOMDocument(); 
$doc->loadHTML($page);


$images = $doc->getElementsByTagName('img'); 
foreach($images as $image) 
	{
	//echo $image->getAttribute('src') .'<br />';
$stealphoto=$image->getAttribute('src');
if ($stealphoto!='/assets/img/snappa_sidebar.png'){
    echo '<img src="';
  $show=str_replace("280h","960w",$stealphoto); 
    echo $show.'" style="width: 80%;" ><br />';
    //echo '<p>'.$image->getAttribute('alt').'</p>';
     echo'';
 	//echo'<input value="'.$show.'" type="checkbox" name="remoteimg"> Use this Photo<br>';
	//echo'<input ID="getphoto" name="usephoto" value="Use This Photo" type="submit">';
    }
	}
	
}












////////////


$keyword=$_GET['keyword'];

echo'Here are some photos of '.$keyword.'. <br>
Photos found here are FREE to use for any purpose, under the Creative Commons Zero License.<br>
Right click to <b>Save</b> then click <b>Browse</b> to upload your file ';
echo'<div style="height: 500px; overflow:auto; width: auto;">';
if(strlen($keyword)>'0')
{
	search($keyword);
}
echo'</div>';

?>