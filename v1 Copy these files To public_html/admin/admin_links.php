

<?
//////////ADMIN IS LOGGED IN	 
include('connect.php');

if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 
	
	 while($info = mysql_fetch_array( $check )) 
	{ $myuserID=$info['ID'];
	$mysite=$info['title'];}
}
?>

<script type="text/javascript" src="../js/jquery.js"></script><script type="text/javascript" src="/js/jquery-ui-1.7.1.custom.min.js"></script>

 <script>
$('.lightbox_trigger').click(function(e) {
		e.preventDefault();
		var link_href = $(this).attr("href");
		$('#content').load(link_href);			
	});	
	
$('.close a').click(function() {
	$('#lightbox').hide();
	});
	</script>
</head>
<?



///////////////////////////////////////UNPUBLISHED PAGES HERE
	
$data3=mysql_query("select * from pages where published !='y'");
$totalpages=mysql_num_rows($data3);
	echo 'Unpublished Pages:'. $totalpages.'<br>';
	while($info3=mysql_fetch_array($data3))
		{
		$published=$info3['published'];
		$thissubID=$info3['ID'];
		$page_type=$info3['page_type'];
		$title=stripslashes($info3['title']);
		$urltext=stripslashes($info3['urltext']);
		
echo'<a
style="background:#000; color:#fff;"
 href="/'.$urltext.'/?draft='.$info3['ID'].'">'.$title.'</a> <br>';
				
	}//while
	
		
	

/*
///////////////////////////////////////////////////////////sublinks
	$data4=mysql_query("select * from pages where subpage='$thissubID' order by pageorder ASC");
	
		$subcount=mysql_num_rows($data4);
		if($subcount!='0')
			{}
	*/
					
	 
		 

	 


	 ?>


