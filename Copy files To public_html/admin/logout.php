<?php 
$past = time() - 100; 
//this makes the time in the past to destroy the cookie 
setcookie(ID_myapp, gone, $past, "/"); 
setcookie(Key_myapp, gone, $past, "/"); 
echo'You are logged out<META HTTP-EQUIV=REFRESH CONTENT="1; URL=../index.php">';
?>
