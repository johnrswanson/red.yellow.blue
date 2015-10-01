<?include('connect.php');
if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	if ($pass != $info['password'])
	 	{ echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
	 	} 
	 else
	 {
	 //////////ADMIN IS LOGGED IN
//include('admin_links.php');
?>

<script type="text/javascript">
		function makeFileList() {
			var input = document.getElementById("filesToUpload");
			var ul = document.getElementById("fileList");
			while (ul.hasChildNodes()) {
				ul.removeChild(ul.firstChild);
			}
			for (var i = 0; i < input.files.length; i++) {
				var li = document.createElement("li");
				li.innerHTML = input.files[i].name;
				ul.appendChild(li);
			}
			if(!ul.hasChildNodes()) {
				var li = document.createElement("li");
				li.innerHTML = 'No Files Selected';
				ul.appendChild(li);
			}
		}
	</script>

<?
//echo'<div style="float:left; width:350px; min-height: 250px; border:solid 2px #ccc; padding:20px; border-radius:20px;">';

	$submitnewphoto=$_POST['submitnewphoto'];
	$photonum=$_GET['photoID'];
if (isset($photonum))
	{
	if(!isset($submitnewphoto))
				{
			echo'<FORM ENCTYPE="multipart/form-data"  METHOD="POST" >
			Select Multiple Photos: (max 5 at a time) <br><INPUT NAME="filesToUpload[]" ID="filesToUpload" TYPE="file" multiple="multiple" onChange="makeFileList();">';
			echo'<input type="hidden" name="gallery" value="'.$photonum.'">';
			echo'<ul style="list-style-type: none;" id="fileList"><li>No Files Selected</li></ul>';

			echo'<P>Title:<br><INPUT TYPE="text" name="title"><P>';
			//echo'Photo Essay: <br><textarea name="long_text" rows="30" cols="40"></textarea>';
			echo'<P><INPUT TYPE="submit" name="submitnewphoto" VALUE="UPLOAD File"></FORM>';
			}
	
	
	
	

echo'</div>';
	}//photonum

	 }
	}
}

// go to login


	 ?>
