<style>body{font-family:helvetica;}
.loginresult{ border-radius: 20px; margin:auto;margin-top: 0%; width:260px; text-align: left; font-size: 18px; background: none; padding: 5px;}
</style>
<div class="loginresult">
<?include('./admin/connect.php');
//This code runs if the form has been submitted

$step=addslashes($_GET['step']);
$email=addslashes($_GET['email']);


if ($step!='2'){

if (isset($_POST['submit'])) 
		{  

		//This makes sure they did not leave any fields blank
		if (!$_POST['email'] | !$_POST['pass'] | !$_POST['pass2'] ) 
			{
			die('You did not complete all of the required fields');
			}
		
	
			// checks if the username is in use
		if (!get_magic_quotes_gpc()) 
			{
			$_POST['email'] = addslashes($_POST['email']);
			}
		$usercheck = $_POST['email'];
		$check = mysql_query("SELECT * FROM admin WHERE email = '$usercheck'") 
		or die(mysql_error());
		$check2 = mysql_num_rows($check);
		
		//if the name exists it gives an error
		if ($check2 != 0) 
			{
			die('Sorry, but that email address is in use'.$_POST['email'].' . Please use another one. <A href="register.php">GO BACK</a>.');
			}
		
			// checks if the username is in use
		if (!get_magic_quotes_gpc()) 
			{
			$_POST['title'] = addslashes($_POST['title']);
			}
		$mynewtitle = $_POST['title'];
		$check3 = mysql_query("SELECT * FROM admin WHERE title = '$mynewtitle'") 
		or die(mysql_error());
		$check4 = mysql_num_rows($check3);
		
		//if the name exists it gives an error
		if ($check4 != 0) 
			{
			die('Sorry, but there is already an account with that name'.$_POST['title'].' . Please use another one. <A href="/">GO BACK</a>.');
			}
		
		
		
		// this makes sure both passwords entered match
		if ($_POST['pass'] != $_POST['pass2']) 
			{
			die('Your passwords did not match. <a href="">GO BACK</a>');
			}
		

	
		
		// now we insert it into the database
$email=addslashes($_POST['email']);
$pass=addslashes($_POST['pass']);
$safepass=md5($pass);
$title=addslashes($_POST['title']);

mysql_query("INSERT INTO admin (ID, email, password, title) VALUES ('', '$email', '$safepass', '$title') ") or die(mysql_error());

	
	?>
	
	<img src="/img/logo.png">
		Ok your account is set up. <P>You may now <a class="lightbox_trigger" href="login.php">Login</a>
	

		<P> Your username is <?php echo $_POST['email'];
			
		}

else 
{	
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<p style="margin-top:10px;">
<input type="text" name="email"  placeholder="Enter Your Email"><br>
<p>
<p style="margin-top:10px;">
<input type="password" name="pass"  placeholder="Create A Password"></p>

<p style="margin-top:5px;">
<input type="password" name="pass2"  placeholder="Confirm Password">
</p>


</p>
<p style="margin-top:10px;">
<input type="submit" name="submit" value="Create user">
</p>
</form>




</div></div>


</div>
<?php
}
}
?>

</div></div></div>

</div></body>
</html>

