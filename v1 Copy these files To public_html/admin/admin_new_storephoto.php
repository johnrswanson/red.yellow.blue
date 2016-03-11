
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

	 

$submitnewstorephoto=$_POST['submitnewstorephoto'];
$storephotonum=$_GET['storephotoID'];

if (isset($storephotonum)){

echo'<FORM ENCTYPE="multipart/form-data" METHOD="POST">
		Select Multiple Photos: (max 5 at a time)<br>
		<INPUT NAME="filesToUpload[]" ID="filesToUpload" TYPE="file" multiple="multiple" >';

echo'<input type="hidden" name="storeID" value="'.$storephotonum.'">';

echo'<br><INPUT TYPE="submit" name="submitnewstorephoto" VALUE="UPLOAD File"></FORM>';}




	 ?>
