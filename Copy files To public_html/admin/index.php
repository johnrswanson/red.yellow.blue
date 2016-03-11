<?include('../connect.php');	
if(isset($_COOKIE['ID_myapp'])){ 
	$email = $_COOKIE['ID_myapp']; 
	$pass = $_COOKIE['Key_myapp'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	while($info = mysql_fetch_array( $check )) 
		{$mypass= $info['password'];
		if($pass == $mypass){header("Location:../index.php"); 	
			 exit;
			}	
		}
	}
?>

<html>
<head>
<title>Log In</title>
</head>

<body>		
	<form ID="user" method="post" action="admin/login.php">
		<input type="text" name="email" placeholder="Site Admin" > <br>
		<input type="password" placeholder="Enter Password" name="pass"> <br>
		<input type="submit" name="submitlogin" value="Login">
	</form>

</body>
</html>