<?//Connect To Database


$hostname="ENTER DATABASE HOSTNAME OR ADDRESS";

$dbname="ENTER YOUR DATABASE NAME";

$username="ENTER DATABASE USERNAME HERE";

$password="ENTER DATABASE PASSWORD HERE";



mysql_connect($hostname,$username, $password) OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db($dbname);



//IMPORTANT
//ONCE YOU HAVE ADDED THESE 4 Variables, you must drop this file into the same folder as ~/index.php

?>
