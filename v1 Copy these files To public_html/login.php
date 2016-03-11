<?
$ref1=$_GET['ref'];
$ref=$_POST['ref2'];
if($ref==''){$ref="index";}

//Checks if there is a login cookie
include('./admin/connect.php');
if(isset($_COOKIE['ID_my_site']))
	{ 
	$email = $_COOKIE['ID_my_site']; 
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	while($info = mysql_fetch_array( $check )) 
		{
		$myuserID=$info['ID'];
		$mywebsite=$info['title'];
		$myemail=$info['email'];
		if ($pass != $info['password']) {}
		else
			{
			//ALREADY LOGGED IN
			echo'<style>body{font-family: helvetica; }</style><div class="loginresult"> ';
			echo'You are Logged in :<br>
			 <a href="./index.php"> 
			 <br>View My Website Now</a><br>';
			//echo'<a href="/logout.php">Logout</a></div>';
			//header("Location: ".$mysite."");
			exit;
			}
		}
}

//if the login form is submitted
if (isset($_POST['submit'])) 
	{
	
	// makes sure they filled it in
	if(!$_POST['email'] | !$_POST['pass']) 
		   {echo'<style>body{font-family: helvetica; }</style><div class="loginresult"> ';
		  // echo'You did not fill in a required field.<br>Try Again or <a href="register.php">Register Here</a><br>';
			echo'</div>';
			exit;
			}
			
	//CHECK DB
	if (!get_magic_quotes_gpc()) {$_POST['email'] = addslashes($_POST['email']);}
	$check = mysql_query("SELECT * FROM admin WHERE email = '".$_POST['email']."'")or die(mysql_error());
	
	//USER DOESNT EXIST
	$check2 = mysql_num_rows($check);
	if ($check2 == 0) 
		{
		echo'<div class="loginresult"> ';
		echo'Incorrect Login. <br> Try Again<br>';
		}
		else
		{
	//USER DOES EXIST	
	while($info = mysql_fetch_array( $check )) 
			{$myuserID=$info['ID'];
			$_POST['pass'] = stripslashes($_POST['pass']);
			$info['password'] = stripslashes($info['password']);
			
			//wrong Password
			if (md5($_POST['pass']) != $info['password']) 
				{
				echo'<div class="loginresult"> ';
				echo'Incorrect Login. <br>Try Again<br>';
				echo'</div>';
				}
			
				//Real User AND Right Password
				else 
					{ 
					// if login is ok then we add a cookie 
					$_POST['email'] = stripslashes($_POST['email']); 
					$hour = time() + 1000000; 
					setcookie(ID_my_site, $_POST['email'], $hour); 
					setcookie(Key_my_site, md5($_POST['pass']), $hour);	
					//then redirect them to the members area 
					$data3=mysql_query("select * from admin where ID='$myuserID' ");
						while($info3=mysql_fetch_array($data3))
							{$myuserID=$info3['ID'];
							$mywebsite=$info3['title'];
							$myemail=$info3['email'];
							}
							
//this CSS hack must be here unfortunately
echo'<style>body{font-family: helvetica; }</style>';

echo'<style>.loginresult{ border-radius: 20px; margin:auto;margin-top: 10%; width:300px; text-align: center; font-size: 20px; background: #ddd; padding: 20px}
							</style>';
					echo'<div class="loginresult"> '; 
						echo'<h3>You Are Logged In.</h3><br>
						<a href="./index.php">View Website</a>';
						//echo'<br><a href="/logout.php">Logout</a></div>';
	
					header("Location: /");
					exit;
					}
				
				} //while DB check
			} //while user exists
	} //form submitted	
	
//NOT LOGGED IN
else{echo'<style>body{font-family: helvetica; }</style><div class="loginresult"> '; }
echo'<form action="'. $_SERVER['PHP_SELF'].'" method="POST"> 
My Email: <input type="text" name="email" maxlength="50"><br>
Password: <input type="password" name="pass" maxlength="50"><br>
<input type="hidden" name="ref2" value="'.$ref1.'">
<input type="submit" name="submit" value="Login">';
echo'</form><P>';
//echo'<a href="forgotpass.php">Forgot Password</a><br>';
//echo'<P><a href="register.php">Register a New Account</a>';
	 

?>


</div>

</div>

<style>
.loginresult{ border-radius: 20px; margin:auto;margin-top: 20px; width:300px; text-align: center; font-size: 20px; background: #ddd; padding: 20px}
</style>
<style>body{font-family: helvetica; font-weight: lighter; }</style>

