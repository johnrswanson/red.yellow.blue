
<?
echo'<style>';

echo'
html{height: 100%;}
body{overflow-x:hidden; height: 100%;}';

$data3=mysql_query("select * from stylesheet where adminID='$thisguyID' ");
while($info3=mysql_fetch_array($data3)){
	$user_css=stripslashes($info3['user_css']);
	
	$logo=stripslashes($info3['logo']);
	
	$sitewidth=stripslashes($info3['sitewidth']);
	$headerwidth=stripslashes($info3['headerwidth']);
	$headercolor=stripslashes($info3['headercolor']);
		
	$navbackground=stripslashes($info3['navbackground']);
		
	$logoheight=stripslashes($info3['logoheight']);
	
	$linkcolor=stripslashes($info3['linkcolor']);
	$hovercolor=stripslashes($info3['hovercolor']);
		
		
		
	$radius=stripslashes($info3['radius']);
	$linksbarradius=stripslashes($info3['linksbarradius']);
	$linkfontfamily=stripslashes($info3['fontfamily']);
	$fontsize=stripslashes($info3['linksize']);
	$fontweight=stripslashes($info3['fontweight']);
		
	$radius=stripslashes($info3['radius']);
	$opacity=stripslashes($info3['opacity']);
	
	echo'
	a{color: #333;}


#headcontainer
	{width:'.$headerwidth.'; 
	background:'.$headercolor.';
	margin: auto;
	border-radius:'.$radius.';
	opacity:'.$opacity.';
	}
	
	header{width:'.$sitewidth.'; 
	}
	#maincontentcontainer{
		width:100%;}
	#maincontent{
		width:'.$sitewidth.'; 
		 max-width: 1200px;
		margin: auto;}
	
	#linksbar{z-index:100000; 
		width: 100%; 
		background:'.$navbackground.' ;
		margin:auto;
		border-radius: '.$linksbarradius.';
		font-family:'.$linkfontfamily.';
		}

	
	#linksbar a{ 
color:'.$linkcolor.';
font-size:'.$fontsize.';
font-weight:'.$fontweight.';
font-family:'.$linkfontfamily.';

	}
	
	#linksbar a:hover{
	color:'.$hovercolor.';
	font-family:'.$linkfontfamily.';
	}
	
		#linksbar_simple a{ 
color:'.$linkcolor.';

	}
	
	#linksbar_simple a:hover{
	color:'.$hovercolor.';
	
	}
	
	
	';
	
	
	echo'.sublinksbar{ min-width: 300px;  width: 20%;  height: 0px; text-align: center;  position: fixed;  background:'.$headercolor.';  padding: 0px; margin: 0px; top: auto; margin-top: -1px;  }
	
	
	#linksbar_simple .sublinksbar {position: relative; clear:both; height: 0px; text-align; left; width: 100%;  }
	
	#linksbar_simple ul li .sublinksbar a {display:block; }
	
	#linksbar ul li .sublinksbar a
	{display:none; position: relative; margin: auto; width: 300px;  right:0px; z-index: 100000; border-bottom: solid 1px; #333; background:'. $headercolor.' ; height: '.$fontsize.'; padding-top: 5px; padding-bottom: 5px; clear:both; width: 100%;   }';
	
	
	echo'#linksbar_simple ul li .sublinksbar a
	{display:none; position: relative; top:  z-index: 100000; 	 }';

	
	
	
	echo $user_css;
	
}

?>


.menua{width:20%; float: left; text-align: center; padding: 3px; margin: 3px; border:none; border-radius: 3px; font-size: 10px;}


.menub{width:45%; height: 60px; float: left; text-align: center; padding: 3px; padding-top: 8px;margin: 3px; border: solid 1px #ddd; border-radius: 3px; font-size: 10px;}

.menuc{width:28%; height: 50px; float: left; text-align: center; padding: 3px; padding-top: 8px;margin: 3px; border: solid 1px #ddd; border-radius: 3px; font-size: 10px;}

.plus{display: none; font-size:30px; text-align:right; margin-right: 25px; }
.minus{display: none; font-size:30px; float:right; margin-right: 25px; }
.boxlist{font-size: 13px; text-transform: uppercase; 
line-height: 15px;}

.login{position: absolute; top: 0px ; left: 0px; z-index: 1 }

.secretmenu_trigger{font-size: 14px; padding: 0px; padding-bottom: 0px; width: 200px; 
background: #000;  color:#000; }

.secretmenu_trigger:hover{font-size: 14px; padding: 0px;   width: 200px; 
background: none; color:#fff; border-radius: 20px;  }

secretmenu_trigger:active{border:none; decoration: none;}

.secretmenu{   color:#000;  text-align: left; display:none; font-size: 18px; font-family: arial;   padding:0px; position: relative;  top: 10px; left: 0px; z-index: 1000; width:300px; min-height: 300px; border-radius: 10px;   }

.secretmenu a{color:#000;}
.secretmenu .col{background:none;}

.secretlink{ color: #000; width: 100%; min-width: 50px;  position: relative; z-index: 1000; margin-left: 8px; margin-bottom: 3px; border: none; padding: 3px; border-radius: 5px; background: none; min-width: 100px; }
a.secretlink{color: #000; clear:both; } 

a.secretlink:hover{background: none; color:#ccc; border-radius: 0px; border: none;}
.small{font-size: 12px;}
.secretmenu:after{clear;both; }

#lightbox{
	position:absolute;
	 top:100px; 
    left:10%;
    width:auto;
    height: auto;
    
    min-height: 10px;
    max-height: 700px;
    max-width: 1100px; 
     min-width: 200px; 
       background:#1e1e1e; color: #fff; 
    border: solid 1px #ddd;
    opacity: 0.9;
    text-align:left;
    display:none;
    z-index: 10001; 
    padding: 10px;
    padding-top: 3px;
    border-radius: 10px;}
#lightbox .selex2{color: black;}	
	
#lightboxstill{
    position:absolute;  
    opacity: 1;
    top:80px; 
    left:10%;
    width:90%;
    max-width: 1100px; 
    min-width: 250px; 
    background:#e0e0e0; color: #000; border: solid 1px #ddd;
    box-shadow: -5px 5px 10px -5px #333;
    text-align:left;
    display:none;
    z-index: 1; 
    padding: 10px;
    padding-top: 3px;
    border-radius: 10px;
}



#lightbox2{position:absolute;
 top:100px; 
    left:10%;
    width:auto;
    max-width: 1100px; 
    min-width: 250px; 
    background:#e0e0e0; color: #000; border: solid 1px #ddd;
    box-shadow: -5px 5px 10px -5px #333;
    text-align:left;
    display:none;
    z-index: 10002; 
    padding: 5px;
    padding-top: 3px;
    border-radius: 10px;
    opacity:1;}
    
#interactive
	{
	display:none;
	position: fixed; 
	top: 0px; 
	bottom:0px;
	right: 0px; 
	left: 0px; 
	z-index: 10000;
	background:#111;
	background-repeat: repeat-all;
	
	}
	
	#interactive2
	{
	display:none;
	position: fixed; 
	top: 0px; 
	bottom:0px;
	right: 0px; 
	left: 0px; 
	z-index: 10000;
	background:#111;
	background-repeat: repeat-all;
	
	}

  
.close{text-align: left; padding: 0px; margin:0px; margin-left: -5px:}
.close2{text-align: left;padding: 0px; margin:0px;  margin-left: -5px:}
.xinteractive{float: right ;padding: 0px; margin:0px; background: #f99; padding: 10px; margin: 5px;}

#wrapper{width: 100%; height: 100%;overflow; hidden;}
#footercontainer{position: absolute; bottom: 0px; clear:both; min-height: 20px; background: none; border: none; width: 100%;}

.linksbarmobile{position: relative;  width: 50px; float:right; top: 0px; right: 1px; min-height: 40px; z-index: 100000; display:none; 

<? if($logo!=''){echo 'margin-top: -'. $logoheight;}?>;
}

</style>





