<?
error_reporting(0);

include('../connect.php');

if (isset($_POST['submit'])) 
		{  

		
		if (!$_POST['email'] | !$_POST['pass'] | !$_POST['pass2'] | !$_POST['shortname']) 
			{
			die('You did not complete all of the required fields');
			}
		
	
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
			die('Sorry, but somebody is already using that email address '.$_POST['email'].' . Please use another one. <A href="">GO BACK</a>.');
			}
		
		
		// this makes sure both passwords entered match
		if ($_POST['pass'] != $_POST['pass2']) 
			{
			die('Your passwords did not match. <a href="">GO BACK</a>');
			}
		


$email=addslashes($_POST['email']);
$pass=addslashes($_POST['pass']);
$pass=md5($pass);
$shortname=addslashes($_POST['shortname']);


mysql_query("INSERT INTO admin (ID, email, password, shortname) VALUES ('', '$email', '$pass', '$shortname' ) ") or die(mysql_error());
mysql_query("INSERT INTO stylesheet (ID) VALUES ('') ") or die(mysql_error());
mysql_query("INSERT INTO pages (ID, title) VALUES ('', 'Home') ") or die(mysql_error());

		$hour = time() + 1000000; 
		setcookie(ID_myapp, $_POST['email'], $hour, "/"); 
		setcookie(Key_myapp, md5($_POST['pass']), $hour,"/");
		echo'Success<META HTTP-EQUIV=REFRESH CONTENT="1; URL=../index.php">';


		?>
		 <P>
		
		
		<?php 

		}

else 
{	

	

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


 Your Name? <br>
<input type="text" name="shortname"><P>

 Enter Your Email<br>
<input type="text" name="email" maxlength="50"><P>

 Create a Password<br>
<input type="password" name="pass" maxlength="10"><P>

 Confirm Password<br>
<input type="password" name="pass2" maxlength="10"><P>


<input type="submit" name="submit" value="Sign Up Now"></form>


</div>
<?php
}
?>


</body>
</html>
