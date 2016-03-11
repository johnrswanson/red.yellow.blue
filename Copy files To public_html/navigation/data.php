<?
include('../connect.php');
$page=$_GET['page'];
$pageurl=$_GET['pageurl'];


if($pageurl!=''){
	$query = mysql_query("SELECT * FROM pages where title='$pageurl' order by ID desc Limit 1 ")or die(mysql_error());	
	}
	
else{

if($page==''){
	
	$query = mysql_query("SELECT * FROM pages where published='y' order by pageorder asc ")or die(mysql_error());	

}

else{
$query = mysql_query("SELECT * FROM pages where ID='$page' ")or die(mysql_error());	
}
}
$arr = array();
while($info = mysql_fetch_object( $query )) 
	{	
	$arr[] = $info;			
	}
echo '{"navinfo":'.json_encode($arr).'}';
?>