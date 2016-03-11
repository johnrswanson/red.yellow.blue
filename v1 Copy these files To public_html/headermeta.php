<?	
////GET DEFAULT PAGE	
	$showpage=$_GET['l'];
	$showpage=(addslashes($showpage));

if($showpage=='')
	{
		$data33=mysql_query("select * from pages where published='y' and subpage='main' order by pageorder asc limit 1");
	while($info33=mysql_fetch_array($data33))
		{	$thispageID=$info33['ID'];
			$showpage=stripslashes($info33['urltext']);}
	}

$getpage = mysql_query("SELECT * FROM pages WHERE title='$showpage' ")or die(mysql_error());
while($pageinfo=mysql_fetch_array($getpage))
{$pagetitle=$pageinfo['title'];}



?>


<title> <?echo strtoupper($pagetitle);?> </title>
	<meta name="author" content=" ">
	<meta http-equiv="cleartype" content="on">
	<meta name="description" content="  " />
	<meta name="keywords" content=" "/>

<!--FACEBOOK-->
<meta property="og:url" content=" " />
<meta property="og:title" content=" " />
<meta property="og:description" content=" " />
<meta property="og:image" content=" " />

<!--IPHONE-->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="380" content="width=device-width, user-scalable=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimal-ui" />

	
<link rel="stylesheet" href="/css/jquery-ui.css">	
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/html5reset.css" media="all">
	
		
<!--GOOGLE FONTS AVAILABLE ON YOUR PAGES-->
	<link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One' rel='stylesheet' type='text/css'>
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Codystar">
	<link href='http://fonts.googleapis.com/css?family=Special+Elite|Fontdiner+Swanky|Abril+Fatface|Poiret+One|Cabin+Sketch|Unkempt|Rye|VT323|Finger+Paint|Londrina+Shadow' rel='stylesheet' type='text/css'>
	
<!--MOBILE / RESPOSIVE FRAMEWORK HERE-->
	<link rel="stylesheet" href="/css/responsivegridsystem.css" media="all">
	<link rel="stylesheet" href="/css/required.css" media="all">
	<link rel="stylesheet" href="/css/col.css" media="all">
	<link rel="stylesheet" href="/css/2cols.css" media="all">
	<link rel="stylesheet" href="/css/3cols.css" media="all">
	<link rel="stylesheet" href="/css/4cols.css" media="all">
	<link rel="stylesheet" href="/css/5cols.css" media="all">
	<link rel="stylesheet" href="/css/6cols.css" media="all">
	<link rel="stylesheet" href="/css/7cols.css" media="all">
	<link rel="stylesheet" href="/css/8cols.css" media="all">
	<link rel="stylesheet" href="/css/9cols.css" media="all">
	<link rel="stylesheet" href="/css/10cols.css" media="all">
	<link rel="stylesheet" href="/css/11cols.css" media="all">
	<link rel="stylesheet" href="/css/12cols.css" media="all">

<!-- REAL FAVICON GENERATOR 
	<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="/css/1024.css">
	<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="/css/768.css">
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="/css/480.css">
<link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicons/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="v/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/favicons/manifest.json">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/favicons/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">
-->







<?echo'</head>';?>
<!--
	PUT GOOGLE ANALYTICS HERE
	
	
	-->

