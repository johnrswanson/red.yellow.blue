<div style=" margin-top: -20px; margin-left:20px; margin-bottom: 5px; ">New Page</div>
<style>.picker{text-align: center; background: #fff;   min-height: 180px; margin: 0px; padding-top: 3px;width: 50%; float: left;}
.minisite{background: #fff; height: 120px; width: 150px; margin: auto; border:solid 1px #aaa;}
.minisite img{border:solid 1px #ddd;margin: -1px; padding: 2px;}
.headline{font-size: 12px; text-align: center; padding:2px;}
.headlineid{font-size: 12px; background: #000; color: #fff; text-align:left;padding:2px; }
.smalltxt{font-size: 5px; padding: 5px;}

</style>

<script>
	
	
	$('.lightbox_trigger').click(function(e) {
		e.preventDefault();
		$('.secretmenu').slideUp(500);
		var link_href = $(this).attr("href");
		var myoffset = $( this ).offset();
		$('#content').html('loading...');		
		$('#content').load(link_href);
		$('#lightbox').show();
		 $('#lightbox').offset( myoffset);
		 $('#lightbox').animate({left: "15%"}, 300, "swing" );
	
	});
</script>

<?include('connect.php');
if(isset($_COOKIE['ID_my_site']))
{
	$email = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM admin WHERE email = '$email'")or die(mysql_error());
	 while($info = mysql_fetch_array( $check )) 
	{ $userID=$info['ID'];
	$paid=$info['paid'];
	if ($pass != $info['password'])
	 	{ //echo'<META HTTP-EQUIV=REFRESH CONTENT="1; URL=login.php?ref=index">';
	 	} 
	 else
	 {
	 //////////ADMIN IS LOGGED IN
	 
//include('admin_links.php');
/////////////////////////////////////////ADD NEW



if (!isset($newpage))
	{
		//////////////////JQ CSS
echo'<style>';
$data2=mysql_query("SELECT * FROM page_types where active ='y'")or die(mysql_error()); 
while($info2=mysql_fetch_array($data2))
{$thisID=$info2['ID'];

echo'#selectpage'.$thisID.'
{position:relative;
padding:3px;
}

#group'.$thisID.'
{position:relative;
padding:3px;
display:none;}';
}//while

echo'input[text]{height: 40px; width: 100%;}';
echo'</style>';
echo'<script src="./js/jquery.js" type="text/javascript"></script>';

	
///////////////SCRIPTS
		echo'<script type="text/javascript">';

	echo'$(function() {';
$data2=mysql_query("select * from page_types");
	while($info2=mysql_fetch_array($data2))
	{
    echo' $(\'#selectpage'.$info2['ID'].'\').click(function() {';
     echo'$(\'.groups\').fadeOut(200);';

    echo'$(\'#group'.$info2['ID'].'\').fadeIn(200);';
    
echo'});';
	

}//while
echo' });';

echo'</script>';




	
	echo'<div style="color:#000; width: 100%;">'; 
	
echo'</div>';
		
	echo'<div class="section group" style="max-width:500px; max-height: 500px; overflow:auto; margin-bottom: 20px;">'; 
	
//BLANK	
echo '<div class="col span_2_of_2 picker"  >'; 
			echo'<a class="lightbox_trigger" href="/admin/admin_duplicate_page.php?dupeID=391&bg=&pic=-&t=BlankCanvas">';
			echo'<div class="minisite"></div>';
			echo'Blank Canvas</a>';
		echo'</div>';
	

/*
//MINIMALIST
echo '<div class="col span_1_of_2 picker" >'; 
		echo '<a class="lightbox_trigger" href="/admin/admin_duplicate_page.php?dupeID=323&bg=ffffff&pic=-&t=Minimalist">';
			echo '<div class="minisite">
					<div class="headline">Your Headline</div>
					<img src="/img/icons/camera.png" width="45px">
					<div class="smalltxt">
			The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog.</div>
						
						</div>';
						
		
			
			echo'Minimalist</a>';
		echo'</div>';
		

//SPLASH		
echo'<div class="col span_1_of_3 picker" >'; 
	echo'<a class="lightbox_trigger" href="/admin/admin_duplicate_page.php?dupeID=332&bg=dddddd&pic=-&t=FullSplash">';
		echo'<div class="minisite" >';
			echo'<div class="headline"style="text-align:right; margin-top: 30px;">Your Headline</div>
				<div class="smalltxt " style="text-align:right">
				The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog.</div>
				</div>';
						
			echo'Full Splash</a><br>';
		
		echo'</div>';



	
		
		
//PORTFOLIO
echo'<div class="col span_1_of_3 picker" style="margin-left:0px;">'; 
echo '<a class="lightbox_trigger" href="/admin/admin_duplicate_page.php?dupeID=258&bg=ffffff&pic=-&t=Portfolio">';

			echo'<div class="minisite">';
							echo'<div class="headline"> Photo Gallery</div>
					<div style="font-size: 2px; text-align:center; margin: 5px;">
		The quick brown fox jumped over the lazy dog. <br>The quick brown fox jumped over the lazy dog. </div>
					<div style="text-align: center; width: 100px; margin: auto;">
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding: 2px;">
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding: 2px;">
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding: 2px;">
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding: 2px;">
					
					<br>
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding:2px;">
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding:2px;">
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding:2px;">
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding:2px;">
					<br>
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding:2px;">
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding:2px;">
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding:2px;">
					<img src="/img/icons/ryblogo.png" width="20px" style="float:left; padding:2px;">
					</div></div>';		
			echo'Portfolio</a><br>';
			
		echo'</div>';
	
		

//CENTERSTAGE
		echo'<div class="col span_1_of_3 picker" >'; 
		echo'<a class="lightbox_trigger" href="/admin/admin_duplicate_page.php?dupeID=252&bg=ffffff&pic=-&t=CenterStage">';
			echo'<div class="minisite">			
						
						<div class="headline">Featured</div>
						
						<img src="/img/icons/camera.png" width="35px" style="float:none; padding: 2px;">
						
						<div class="smalltxt" style="text-align:center;">
						The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog.
						 </div>
							
							<div style="text-align: center; width: 60px; margin:auto;">
							
							<img src="/img/icons/ryblogo.png" width="16px" style="float:left; padding: 2px;">
							<img src="/img/icons/ryblogo.png" width="16px" style="float:left; padding: 2px;">
							<img src="/img/icons/ryblogo.png" width="16px" style="float:left; padding: 2px;">
							
							</div>
						
						
					</div>';
		
		
						
			echo'Center Stage<br></a>';
		
		echo'</div>';
		
		
				
//SPREAD
echo'<div class="col span_1_of_3 picker"  >'; 
	echo'<a class="lightbox_trigger" href="/admin_duplicate_page.php?dupeID=282&bg=ffffff&pic=-&t=CenterStage">';

			echo'<div class="minisite">
			
				<div class="headline"> 2 panel</div>
					<div style="font-size: 2px; text-align:center; margin: 5px;">
		The quick brown fox jumped over the lazy dog. <br>The quick brown fox jumped over the lazy dog. </div>
					<div style="text-align: center; width: 90px; margin: auto;">
					<img src="/img/icons/ryblogo.png" width="40px" style="float:left; padding: 2px;">
					<img src="/img/icons/ryblogo.png" width="40px" style="float:left; padding: 2px;">
					
					
					<br>
					<img src="/img/icons/ryblogo.png" width="40px" style="float:left; padding:2px;">
					<img src="/img/icons/ryblogo.png" width="40px" style="float:left; padding:2px;">
					
										</div></div>';
		
		
						
			echo'Spread<br></a>';
	
		echo'</div>';

		
	
	
	*/
	echo'</div>';
	
	
		echo'</form>';
	}//newpage

 
	 	 }
	}
}

else // go to login
{

}

	 ?>
