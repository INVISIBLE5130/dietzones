<?php
if ($ex[3])
{
    $item->name = $item->name." #".strtoupper($ex[3]);
    $item->description = $item->description." - Hashtag #".strtoupper($ex[3]);
}

$lines = file('LinkB1.csv');
for ($i=0;$i<count($lines);$i++)
{
	$p = explode(";",$lines[$i]);
	$p[1] = str_replace('/1/','/'.$ex[2].'/', $p[1]);
	$p[1] = str_replace('/1','/'.$ex[2], $p[1]);
        if ($p[1]=="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])
	{
	    $item->name = $p[2];
	    $item->description = $p[4];
	}
		
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151510503-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-151510503-1');
    </script>


<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '944345652717690');
  fbq('track', 'PageView');

  if (window.sessionStorage.getItem('secondView')=='yes')
    fbq('track', 'Lead', { value: 1, currency: 'USD' })
  window.sessionStorage.setItem('secondView', 'yes');

</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=944345652717690&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
    
    <title><?=strip_tags($item->name)?><?=((ctype_digit($ex[2]) && $ex[2]>1)?" | Page #".$ex[2]:"")?> | <?=strip_tags($project_name)?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name='dmca-site-verification' content='bGNCQUg5cmV1Z29vcXgwNGJWMmNXUC8wbS9DUkZCTkFRbVBNWWFCblJmRT01' />
    <meta name="description" content="<?=strip_tags($item->description)?><?=((ctype_digit($ex[2]) && $ex[2]>1)?", Page number ".$ex[2]:"")?>">
    <meta name="keywords" content="<?=$item->keywords?>">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="https://<?=$_SERVER['HTTP_HOST']?>/rss" />
    <link rel="canonical" href="<?=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" />    
    <!--favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/icons/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/icons/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/icons/favicons/favicon-16x16.png">
    <link rel="manifest" href="/img/icons/favicons/site.webmanifest">
    <link rel="mask-icon" href="/img/icons/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/img/icons/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-config" content="/img/icons/favicons/browserconfig.xml">
    <meta name="p:domain_verify" content="feca9e547a700018f22335039740d74c"/>
    <meta name="theme-color" content="#ffffff">
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ultra&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yesteryear&amp;display=swap" rel="stylesheet"><!-- open graph-->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?=strip_tags($item->name)?> | <?=strip_tags($project_name)?>">
    <meta property="og:description" content="<?=strip_tags($item->description)?>">
    <meta property="og:image" content="/img/og-image.png">
    <meta property="og:url" content="<?=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
    <meta name="twitter:image" content="---">
    <meta name="twitter:title" content="<?=strip_tags($item->name)?> | <?=strip_tags($project_name)?>">
    <meta name="twitter:url" content="<?=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="<?=strip_tags($item->description)?>">
    <link rel="stylesheet" href="/css/build.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body><noscript>
        <h2>Your browser does not support JavaScript!</h2>
    </noscript>
    <nav class="navbar" id="navbar">
        <div class="navbar__left"><img class="navbar__burger" id="menu-open-scroll" src="/img/icons/burger.svg" alt="Open menu"><a class="navbar__logo-wrap" href="/"><img src="/img/big-logo.svg" alt="DietZones.com logo"></a></div>
        <ul class="menu">
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='News')?"menu__link_active":"")?>" href="/News/1">News</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Living')?"menu__link_active":"")?>" href="/Living/1">Living&nbsp;well</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Beauty')?"menu__link_active":"")?>" href="/Beauty/1">Beauty</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Diet')?"menu__link_active":"")?>" href="/Diet/1">Diet</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Fitness')?"menu__link_active":"")?>" href="/Fitness/1">Fitness</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Blog')?"menu__link_active":"")?>" href="/Blog/1">BLOG</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Celebrities')?"menu__link_active":"")?>" href="/Celebrities/1">Celebrities</a></li>
        </ul>
        
        <div class="navbar__btn-wrap"><img class="navbar__search" src="/img/icons/search.svg" alt="search"><a class="main-btn main-btn_accent-outline navbar__btn-signup" href="#">Sign up</a><a class="main-btn main-btn_black navbar__btn-signin" href="#">Sign in</a></div>
    
    </nav>
    <div class="menu-mobile" id="menu-mobile">
        <div class="menu-mobile__top">
            <div class="menu-mobile__top-left"><img class="menu-mobile__close" id="menu-close" src="/img/icons/burger.svg" alt="Open menu"><a href="/"><img class="menu-mobile__logo" src="/img/big-logo.svg" alt="DietZones.com logo"></a><img class="menu-mobile__search" src="/img/icons/search.svg" alt="search"></div>
            
            <div class="menu-mobile__btn-wrap"><a class="main-btn main-btn_accent-outline menu-mobile__btn-one" href="#">Sign up</a><a class="main-btn main-btn_black" href="#">Sign in</a></div> 
        </div>
        <div class="menu-mobile__search-out">
            <img class="menu-mobile__search-search" src="/img/icons/search.svg" alt="Search">
            <input type="search" class="menu-mobile__search-input"/>
            <img class="menu-mobile__search-close" src="/img/icons/close.svg" alt="Close">
        </div>
        <div class="menu-mobile__content">
            <div class="menu-mobile__col">
                <ul class="menu-mobile-list">
                    <li class="menu-mobile__item"><a class="menu-mobile__link" href="/News/1">News</a></li>
                    <li class="menu-mobile__item"><a class="menu-mobile__link" href="/Living/1">Living well</a></li>
                    <li class="menu-mobile__item"><a class="menu-mobile__link" href="/Beauty/1">Beauty</a></li>
                    <li class="menu-mobile__item"><a class="menu-mobile__link" href="/Diet/1">Diet</a></li>
                    <li class="menu-mobile__item"><a class="menu-mobile__link" href="/Fitness/1">Fitness</a></li>
                </ul>
            </div>
            <div class="menu-mobile__col">
                <ul class="menu-mobile-list">
                    <li class="menu-mobile__item"><a class="menu-mobile__link" href="/Blog/1">BLOG</a></li>
                    <li class="menu-mobile__item"><a class="menu-mobile__link" href="/Celebrities/1">Celebrities</a></li>
                    <li class="menu-mobile__item"><a class="menu-mobile__link" href="/privacy">Privacy Policy</a></li>
                    <li class="menu-mobile__item"><a class="menu-mobile__link" href="/terms">Terms and Condition</a></li>
                </ul>
            </div>
        </div>
        <div class="menu-mobile__footer">
            <div class="menu-mobile__footer-title">Subscribe to the diet newsletter</div>
            <form class="menu-mobile__form" action="/subscribers", method=POST><input class="menu-mobile__input" name= "email" type="text" placeholder="Enter your email"><button class="menu-mobile__btn" type="submit" value="ok">ok</button></form>
            <div class="menu-mobile__icons">
                <!--<div class="menu-mobile__icon"><img class="menu-mobile__img" src="/img/icons/fb.svg" alt="Facebook"></div>
                <div class="menu-mobile__icon"><img class="menu-mobile__img" src="/img/icons/twitter.svg" alt="twitter"></div>
                <div class="menu-mobile__icon"><img class="menu-mobile__img" src="/img/icons/instagram.svg" alt="instagram"></div>
                <div class="menu-mobile__icon"><img class="menu-mobile__img" src="/img/icons/youtube.svg" alt="youtube"></div>-->
                <div class="menu-mobile__icon"><a href="mailto:info@dietzones.com"><img class="menu-mobile__img" src="/img/icons/mail.svg" alt="e-mail"></a></div>
            </div>
        </div>
    </div>
    <section class="main">
        <div class="main__header"><img class="navbar__burger" id="menu-open" src="/img/icons/burger.svg" alt="Open menu"><a class="main__logo-wrap" href="/"><img class="main__logo" src="/img/big-logo.svg" alt="DietZones.com logo"></a>
            <div class="main__header-btn-wrap"> <img class="navbar__search desktop__search" src="/img/icons/search.svg" alt="search"> <a class="main-btn main-btn_accent-outline navbar__btn-signup" href="/">Sign up</a><a class="main-btn main-btn_black navbar__btn-signin" href="/">Sign in</a> </div>
        </div>
        <div class="main__search-out" id="search">
            <form class="formWidth" action="/search" method="POST" id="searchForm">
            <img class="main__search-search" src="/img/icons/search.svg" alt="Search" onclick="(document.getElementById('searchForm').submit())">
            <input type="search" class="main__search-input"/ name="search" autofocus>
            <img class="main__search-close" src="/img/icons/close.svg" alt="Close">
            </form>
        </div>
        <div class="main__menu">
            <ul class="menu">
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='News')?"menu__link_active":"")?>" href="/News/1">News</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Living')?"menu__link_active":"")?>" href="/Living/1">Living well</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Beauty')?"menu__link_active":"")?>" href="/Beauty/1">Beauty</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Diet')?"menu__link_active":"")?>" href="/Diet/1">Diet</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Fitness')?"menu__link_active":"")?>" href="/Fitness/1">Fitness</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Blog')?"menu__link_active":"")?>" href="/Blog/1">BLOG</a></li>
                <li class="menu__item"><a class="menu__link <?=(($ex[1]=='Celebrities')?"menu__link_active":"")?>" href="/Celebrities/1">Celebrities</a></li>
            </ul>
        </div>        