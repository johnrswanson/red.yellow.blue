<?
$ref1=$_GET['ref'];
$ref=$_POST['ref2'];
if($ref==''){$ref="index";}

//Checks if there is a login cookie
include('connect.php');
if(isset($_COOKIE['ID_my_site']))

//if there is, it logs you in and directes you to the members page
	{ 
	$email = $_COOKIE['ID_my_site']; 
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	while($info = mysql_fetch_array( $check )) 
			{
			if ($pass != $info['password']) 
					{
					}
			else
					{
					
					header("Location: ".$ref.".php");
					
					}
			}
	}

//if the login form is submitted
if (isset($_POST['submit'])) 
	{ // if form has been submitted
	// makes sure they filled it in
	if(!$_POST['email'] | !$_POST['pass']) 
			{
			 echo'You did not fill in a required field.<br>
<a href="">Try Again</a> or <a href="register.php">Register Here</a>';
exit;
			}
	// checks it against the database
	
	if (!get_magic_quotes_gpc()) 
		{
		$_POST['email'] = addslashes($_POST['email']);
		}
	$check = mysql_query("SELECT * FROM admin WHERE email = '".$_POST['email']."'")or die(mysql_error());
	
	//Gives error if user dosen't exist
	$check2 = mysql_num_rows($check);
	if ($check2 == 0) 
		{
echo'<div id="container">';
include('header.php');
		echo'
			 Sorry, I couldn\'t find an account with that email.<br>  
		 <a href="">Try Again</a>';
		}
	while($info = mysql_fetch_array( $check )) 
			{
			$_POST['pass'] = stripslashes($_POST['pass']);
			$info['password'] = stripslashes($info['password']);
			$_POST['pass'] = $_POST['pass'];
			
			//gives error if the password is wrong
			if ($_POST['pass'] != $info['password']) 
				{
				
echo'Sorry, Incorrect password<br><a href="">Try Again</a></div></div>';
				}
			
			
			else 
				{ 
				// if login is ok then we add a cookie 
				$_POST['email'] = stripslashes($_POST['email']); 
				$hour = time() + 1000000; 
				setcookie(ID_my_site, $_POST['email'], $hour); 
				setcookie(Key_my_site, $_POST['pass'], $hour);	
				
				//then redirect them to the members area 
				header("Location: ".$ref.".php");
				exit;
				} 
			} 
	} 
else 
	{	
	
	
	
	// if they are not logged in 
echo'
	Login Here:<br>
<table>
	<form action="'. $_SERVER['PHP_SELF'].'" method="POST"> 
<tr><td>
Email: </td><td><input type="text" name="email" maxlength="40"><P>
</td></tr><tr><td>
Password: </td><td><input type="password" name="pass" maxlength="50">
<input type="hidden" name="ref2" value="'.$ref1.'">
</td></tr><table>
	<input type="submit" name="submit" value="Login">';
echo'</form><P>';
//echo'<a href="forgotpass.php">Forgot Password</a>';
//echo'<P><a href="register.php">Register a New Account</a></center>';
	} 

?>



</div>
