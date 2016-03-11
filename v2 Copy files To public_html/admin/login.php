<?
include('../connect.php');
if (isset($_POST['submitlogin']))
	{
	if(!$_POST['email'] | !$_POST['pass'])
		{echo'Login Details Incorrect';exit;}
	
	if (!get_magic_quotes_gpc())	
		{$_POST['email'] = addslashes($_POST['email']);}
	
	$check = mysql_query("SELECT * FROM admin WHERE email = '".$_POST['email']."'")or die(mysql_error());
	$check2 = mysql_num_rows($check);
	
	if ($check2 == 0)
		{echo'Login Details Incorrect';}
	
	while($info = mysql_fetch_array( $check ))
		{
			$_POST['pass'] = stripslashes($_POST['pass']);
			$info['password'] = stripslashes($info['password']);
			$pass = $_POST['pass'];

		if (md5($pass)!= $info['password'])
			{echo' Login Details Incorrect';}
			
		else{// if login is ok then we add a cookie
			$_POST['email'] = stripslashes($_POST['email']);
			$hour = time() + 100000;
			setcookie(ID_myapp, $_POST['email'], $hour, "/");
			setcookie(Key_myapp, md5($_POST['pass']), $hour, "/");
			header("Location: ../index.php");
			}
		}
	}
	else{	echo'<form ID="user" method="post" action="login.php">
		<input type="text" name="email" placeholder="Site Admin" > <br>
		<input type="password" placeholder="Enter Password" name="pass"> <br>
		<input type="submit" name="submitlogin" value="Login">
	</form>';}
?>



