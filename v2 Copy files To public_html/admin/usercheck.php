<?include('../connect.php');
if (isset($_COOKIE['ID_myapp'])){ 
	$email = $_COOKIE['ID_myapp']; 
	$pass = $_COOKIE['Key_myapp'];
	$query1 = mysql_query("SELECT * FROM admin WHERE email = '$email' ")or die(mysql_error());
	while($info = mysql_fetch_array( $query1 )) {	
		$userID=$info['ID'];
		$name=$info['shortname'];
		
		if($pass!=$info['password']){
				header("Location:./index.php");
				exit;
			}
			
			else {
			$admin='true'; 
			$loggedin='true'; 
			}		
		}	
	}


else{
	$go = addslashes($_GET['go']);
	if($go == 'admin'){
		echo'<div ID="adminlogin">
			<a class="adminlogin" href="admin/login.php" onclick =""> <img src="img/ryblogo.png" width="40px"></a>
			</div>';
		}
}
?>


