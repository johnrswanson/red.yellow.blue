<?
include('../connect.php');
$boxitem=addslashes($_GET['boxitem']);

if($boxitem!=''){
	$query = mysql_query("SELECT * FROM blog_photos where blogID='$boxitem' order by photoorder asc ")or die(mysql_error());
	}
	

		
	
$arr = array();
while($info = mysql_fetch_object( $query )) 
	{	
	$arr[] = $info;			
	}
echo '{"photoinfo":'.json_encode($arr).'}';
?>