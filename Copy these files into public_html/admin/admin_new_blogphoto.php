
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

	 

$submitnewblogphoto=$_POST['submitnewblogphoto'];
$blogphotonum=$_GET['blogphotoID'];

if (isset($blogphotonum)){

echo'<FORM ENCTYPE="multipart/form-data" METHOD="POST">
		Select Multiple Photos: <br><INPUT NAME="filesToUpload[]" ID="filesToUpload" TYPE="file" multiple="multiple" >';
echo'<input type="hidden" name="blogphotoID" value="'.$blogphotonum.'">';

echo'<br><INPUT TYPE="submit" name="submitnewblogphoto" VALUE="UPLOAD File"></FORM>';}




	 ?>
