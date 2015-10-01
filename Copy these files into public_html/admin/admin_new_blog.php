<?include('connect.php');

	 

echo'<div style="float:left; width:350px; min-height:300px;">';

$submitnewblog=$_POST['submitnewblog'];
$blognum=$_GET['blogID'];
if (isset($blognum))
	{
	if(!isset($submitnewblog))
		{
		echo'<FORM ENCTYPE="multipart/form-data"  METHOD="POST">';
		echo'<input type="hidden" name="blogID" value="'.$blognum.'">';
		
		
		/*if(!isset($blognum))
			{
			echo'<P>* Please select a page...<br>';
			echo'<select name="classID"><option value="-">Please Select</option>';
			$data=mysql_query("select * from pages where page_type='3' order by ID ASC");
			while($info=mysql_fetch_array($data))
				{
				echo'<option value="'.$info['ID'].'">'.stripslashes($info['title']).'</option>';
				}
			echo'</select><P>';
			}*/
		
		
		echo'<P>Title:<br><INPUT TYPE="text" name="title"><P>';
		echo'Text: <br><textarea name="long_text" rows="10" cols="25"></textarea><P>';
		//echo'Short Text: <br><textarea name="short_text" rows="5" cols="25"></textarea>';
		
		
		
		echo'
		<P>
		<INPUT TYPE="submit" name="submitnewblog" VALUE="Create New Post"></FORM>
		';
		}
	}


////////////////////
//////////////////// USER HAS SUBMITTED THE FORM 
if (isset($submitnewblog))
	{
		
	////////////////////GET VARIABLES
	$title=addslashes($_POST['title']);
	$blogID=addslashes($_POST['blogID']);
	$newtext = str_replace("\r",'<br>',$_POST['long_text']);			
	$cleantext=addslashes($newtext);
	
	$newshorttext = str_replace("\r",'<br>',$_POST['short_text']);			
	$cleanshorttext=addslashes($newshorttext);
	
	
	//if($playlist=='-'){echo'You must select a collection. Please press the back button and try again.'; exit;}
	
	// Below lines are to display file name, temp name and file type , you can use them for testing your script only//////
	//echo "File Name: ".$_FILES[userfile][name]."<br>";
	//echo "tmp name: ".$_FILES[userfile][tmp_name]."<br>";
	//echo "File Type: ".$_FILES[userfile][type]."<br>";
	//echo "<br><br>";
	
	/*$add="../img/blog/".$_FILES[userfile][name]; 
	// the path with the file name where the file will be stored, upload is the directory name. 
	
	//echo $add;
	if(move_uploaded_file ($_FILES[userfile][tmp_name],$add))
		{
		//echo "<P>Successfully uploaded the image<P>";
		chmod("$add",0777);
		list($width_orig, $height_orig) = getimagesize($add);
		
		}
	else
		{
			echo "Failed to upload file Contact Site admin to fix the problem";
		exit;}
		
	
	//$filename = $_FILES[userfile][name] ;
	///////// Start the thumbnail generation//////////////
	
	$tsrc="../img/blog/thumbs/".$_FILES[userfile][name]; // Path where thumb nail image will be stored
	//echo $tsrc;
	if (!($_FILES[userfile][type] =="image/jpeg" ))
		{
		echo "Your uploaded file must be of JPG. Other file types are not allowed<BR>";
		exit;
		}
		
	//list($width_orig, $height_orig) = getimagesize($add);
	$target=200;
	
	
	
	if ($width_orig < $height_orig)
	 {   $n_width = 200;
	$ratio=$target/$width_orig;
	$n_height=$height_orig*$ratio;
	} 
	
	else {
	$n_height = 200;
	$ratio=$target/$height_orig;
	   $n_width = $width_orig*$ratio;
	}
	
	
	
	////////////// starting of JPG thumb nail creation//////////
	if($_FILES[userfile][type]=="image/jpeg"){
	$im=ImageCreateFromJPEG($add); 
	$width=ImageSx($im); // Original picture width is stored
	$height=ImageSy($im); // Original picture height is stored
	$newimage=imagecreatetruecolor($n_width,$n_height); 
	imageCopyResampled($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
	ImageJpeg($newimage,$tsrc);
	chmod("$tsrc",0777);
	}
	
	//////////////// End of JPG thumb nail creation //////////
	$photo=$_FILES[userfile][name];
	*/
	
	$now=date(y).'-'.date(m).'-'.date(d);
	
	mysql_query("insert into blog (ID, title, date, text, short_text, photo, blogID ) VALUES('', '$title', '$now', '$cleantext', '$cleanshorttext', '$photo', '$blogID')") or die (mysql_error());
	
	
	$data100=mysql_query("Select * from blog order by ID desc limit 1;");
	while($info100=mysql_fetch_array($data100)){$newpost=$info100['ID'];}
	echo'<P width="200px">Successfully posted. 
	<a href="/" style=" padding:20px; margin:20px; border-radius:10px; color:white; background:#00cccc;">
	ok</a>';
	
	}


echo'</div>';

	 
	


	 ?>