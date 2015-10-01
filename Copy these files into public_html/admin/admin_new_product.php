<?include('connect.php');

$submitnewstore=$_POST['submitnewstore'];
$storenum=$_GET['storeID'];
if (isset($storenum))
	{
	if(!isset($submitnewstore))
		{
		echo'<FORM ENCTYPE="multipart/form-data"  METHOD="POST">';
		echo'<INPUT TYPE="submit" style="float:right" name="submitnewstore" VALUE="Add Product">';
		echo'
		<input type="hidden" name="storeID" value="'.$storenum.'">';
		
				
		echo'<INPUT TYPE="text" name="title" placeholder="Title of product"><br>';
		//echo'Upload Photo:<br><INPUT NAME="userfile" TYPE="file"><br>';
		echo'$<INPUT TYPE="text" name="price" style=" width:100px" style="width: 130px;" placeholder ="Enter Price"><br>
		(Do not enter the $ sign)<P>';
		//echo'<P>Inventory:<br><INPUT TYPE="text" name="inventory"><P>';
		echo'<textarea name="mytext" placeholder="Product Description"></textarea>';
		//echo'<p>Buy Button:<br><br><textarea placeholder="Leave this blank unless you have created your own custom buttons." name="buybutton"></textarea>';
		
		echo'</FORM>';
		}
	
	}



if (isset($submitnewstore)){
	$title=addslashes($_POST['title']);
	$price=addslashes($_POST['price']);
	$newtext = str_replace("\r",'<br>',$_POST['text']);			
	$cleantext=addslashes($newtext);
	$buybutton=addslashes($_POST['buybutton']);
	$section=addslashes($_POST['section']);
	$inventory=addslashes($_POST['inventory']);

if($section=='-'){echo'You must select a store section. Please press the back button and try again.'; exit;}
if($inventory==''){echo'You enter an Inventory Quantity . Please press the back button and try again.'; exit;}
if($title==''){echo'You enter a title . Please press the back button and try again.'; exit;}
if($price==''){echo'You enter a price . Please press the back button and try again.'; exit;}
$add="../img/store/".$userID."/".$_FILES[userfile][name];echo $add;if(move_uploaded_file ($_FILES[userfile][tmp_name],$add)){echo "<P>Successfully uploaded the image<P>";chmod("$add",0777);list($width_orig, $height_orig) = getimagesize($add);}else{echo "Failed to upload file Contact Site admin to fix the problem";exit;}$tsrc="../img/store/thumbs/".$userID."/".$_FILES[userfile][name]; echo $tsrc;


if (!($_FILES[userfile][type] =="image/jpeg" )){echo "Your uploaded file must be of JPG. Other file types are not allowed<BR>";exit;}
$target=200;
if($width_orig < $height_orig)
{$n_width = 200;$ratio=$target/$width_orig;$n_height=$height_orig*$ratio;}
else{$n_height = 200;$ratio=$target/$height_orig;$n_width = $width_orig*$ratio;}
if($_FILES[userfile][type]=="image/jpeg"){$im=ImageCreateFromJPEG($add); $width=ImageSx($im);$height=ImageSy($im);$newimage=imagecreatetruecolor($n_width,$n_height); 
imageCopyResampled($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);ImageJpeg($newimage,$tsrc);chmod("$tsrc",0777);}
$photo=$userID.'-';
$photo.=$_FILES[userfile][name];mysql_query("insert into store (ID, title, price, text, photo, section, inventory, buybutton) VALUES('', '$title', '$price', '$cleantext', '$photo', '$section', '$inventory', '$buybutton')") or die (mysql_error());echo'<P>You should now see your product on the site';
echo'<a href="admin_new_product.php">Continue</a><P>';}







	 
	 


	 ?>

