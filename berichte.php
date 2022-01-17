<?php ini_set('default_charset','UTF-8');header('Content-Type: text/html; charset=UTF-8');header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');header('Cache-Control: post-check=0, pre-check=0', false);header('Pragma: no-cache'); ?><!DOCTYPE html>
<html lang="de-AT">
<head>
<meta charset="UTF-8">
<title>Berichte</title>
<meta name="referrer" content="same-origin">
<link rel="canonical" href="https://nautic.family/berichte.php">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<?php

    $pages = 10;
    $page = (isset($_GET['page']) ? $_GET['page'] : 1);
    if($page < 1) {
        $page = 1;
    }
    $current_page = 1;
    $current_result = 0;

    $blogName = 'berichte';
    $blogJSON = file_get_contents($blogName . '.json');
    if($blogJSON === FALSE) {
        echo $blogName;
        exit(-1);
    }

    $blogData = json_decode($blogJSON, TRUE);
    if($blogData == NULL) {
        echo "JSON";
        exit(-2);
    }

    $blogPostsPerPage = $blogData['blogPostsPerPage'];
    $blogPostsMargin = $blogData['blogPostsMargin'];
    $blogPosts = $blogData['blogPosts'];
    $devices = $blogData['devices'];
    $css = $blogData['css'];
    $mq = $blogData['mq'];

    $end_page = $page + $pages / 2 - 1;
    if($end_page < $pages) {
        $end_page = $pages;
    }
    $blogPostsCount = count($blogPosts);
    $blogPostsPages = intval(($blogPostsCount - 1) / $blogPostsPerPage) + 1;
    if($blogPostsPages < $end_page) {
        $end_page = $blogPostsPages;
    }

    $start_page = $end_page + 1 - $pages;
    if($start_page < 1) {
        $start_page = 1;
    }

    $style = '';
    foreach($devices as $device) {
        $deviceCSSClasses = $css[$device];
        $mediaQuery = (isset($mq[$device]) ? $mq[$device] : NULL);
        if($mediaQuery !== NULL) {
            $style .= "@media " . $mediaQuery . ' {';
        }
        $style .= ".bpwc{width:100%;margin:auto}";
        $style .= ".bpc{width:" . ($device == "default" ? 960 : $device) . "px;margin:auto}";
        $style .= ".bpm{margin-top:" . $blogPostsMargin[$device] . "px}";
        $cssClassesAdded = array();
        $blogPostIndex = ($page - 1) * $blogPostsPerPage;
        $count = 0;
        while($blogPostIndex < $blogPostsCount && ++$count <= $blogPostsPerPage) {
            $blogPost = $blogPosts[$blogPostIndex++];

            $cssClasses = $blogPost['cssClasses'];
            foreach($cssClasses as $cssClass) {
                if(!in_array($cssClass, $cssClassesAdded) && isset($deviceCSSClasses[$cssClass])) {
                    $style .= $deviceCSSClasses[$cssClass];
                }
                $cssClassesAdded[] = $cssClass;
            }
        }
        if($mediaQuery !== NULL) {
            $style .= '}';
        }
    }
    echo "<style>" . $style . "</style>";

?>

<style>html,body{-webkit-text-zoom:reset !important;-ms-text-size-adjust:100% !important;-moz-text-size-adjust:100% !important;-webkit-text-size-adjust:100% !important}@font-face{font-display:block;font-family:"Lato";src:url('css/Lato-Black.woff2') format('woff2'),url('css/Lato-Black.woff') format('woff');font-weight:900}@font-face{font-display:block;font-family:"Open Sans";src:url('css/OpenSans-Regular.woff2') format('woff2'),url('css/OpenSans-Regular.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Open Sans";src:url('css/OpenSans-Semibold.woff2') format('woff2'),url('css/OpenSans-Semibold.woff') format('woff');font-weight:600}@font-face{font-display:block;font-family:"EB Garamond";src:url('css/EBGaramond-Regular.woff2') format('woff2'),url('css/EBGaramond-Regular.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Lato";src:url('css/Lato-Regular.woff2') format('woff2'),url('css/Lato-Regular.woff') format('woff');font-weight:400}body>div{font-size:0}p, span,h1,h2,h3,h4,h5,h6{margin:0;word-spacing:normal;word-wrap:break-word;-ms-word-wrap:break-word;pointer-events:auto;max-height:1000000000px}sup{font-size:inherit;vertical-align:baseline;position:relative;top:-0.4em}sub{font-size:inherit;vertical-align:baseline;position:relative;top:0.4em}ul{display:block;word-spacing:normal;word-wrap:break-word;list-style-type:none;padding:0;margin:0;-moz-padding-start:0;-khtml-padding-start:0;-webkit-padding-start:0;-o-padding-start:0;-padding-start:0;-webkit-margin-before:0;-webkit-margin-after:0}li{display:block;white-space:normal}li p{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;-o-user-select:none;user-select:none}form{display:inline-block}a{text-decoration:inherit;color:inherit;-webkit-tap-highlight-color:rgba(0,0,0,0)}textarea{resize:none}.shm-l{float:left;clear:left}.shm-r{float:right;clear:right}.whitespacefix{word-spacing:-1px}html{font-family:sans-serif}body{font-size:0;margin:0}audio,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background:0 0;outline:0}b,strong{font-weight:700}dfn{font-style:italic}h1,h2,h3,h4,h5,h6{font-size:1em;line-height:1;margin:0}img{border:0}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=submit]{-webkit-appearance:button;cursor:pointer;box-sizing:border-box;white-space:normal}input[type=text],input[type=password],textarea{-webkit-appearance:none;appearance:none;box-sizing:border-box}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type=checkbox],input[type=radio]{box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}textarea{overflow:auto;box-sizing:border-box;border-color:#ddd}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}blockquote{margin-block-start:0;margin-block-end:0;margin-inline-start:0;margin-inline-end:0}:-webkit-full-screen-ancestor:not(iframe){-webkit-clip-path:initial!important}
html{-webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale}.menu-content{cursor:pointer;position:relative}li{-webkit-tap-highlight-color:rgba(0,0,0,0)}
#b{background-color:#fff}.v21{display:block;*display:block;zoom:1;vertical-align:top}.ps93{margin-top:0;top:0;position:-webkit-sticky;position:-moz-sticky;position:-o-sticky;position:-ms-sticky;position:sticky}.s111{width:100%;min-width:1200px;min-height:80px}.c119{z-index:1;pointer-events:none}.ps94{display:inline-block;width:0;height:0}.v22{display:inline-block;*display:inline;zoom:1;vertical-align:top}.ps95{position:relative;margin-top:0}.s112{width:100%;min-width:1200px;min-height:80px;height:80px}.c120{z-index:2;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;background-clip:padding-box;box-shadow:0 0 40px rgba(0,0,0,.5)}.ps96{position:relative;margin-top:14px}.s113{min-width:1200px;width:1200px;margin-left:auto;margin-right:auto;min-height:52px}.ps97{position:relative;margin-left:12px;margin-top:0}.s114{min-width:1175px;width:1175px;min-height:52px}.ps98{position:relative;margin-left:0;margin-top:0}.s115{min-width:179px;width:179px;min-height:52px;height:52px}.c122{z-index:4;pointer-events:auto}.a5{display:block}.i19{position:absolute;left:0;min-width:179px;max-width:179px;min-height:46px;max-height:46px;top:3px}.v23{display:inline-block;*display:inline;zoom:1;vertical-align:top;overflow:visible}.ps99{position:relative;margin-left:701px;margin-top:14px}.s116{min-width:295px;width:295px;min-height:24px;height:24px}.c123{z-index:3;pointer-events:auto}.v24{display:inline-block;*display:inline-block;zoom:1;vertical-align:top}.m5{padding:0px 0px 0px 0px}.ml5{outline:0}.s117{min-width:73px;width:73px;min-height:24px;height:24px}.mcv5{display:inline-block}.s118{min-width:73px;width:73px;min-height:24px}.c124{pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;background-clip:padding-box}.c125{pointer-events:auto;overflow:hidden;height:24px}.p13{padding-top:0;text-indent:0;padding-bottom:0;padding-right:0;text-align:right}.f31{font-family:Lato;font-size:15px;font-weight:900;font-style:normal;text-decoration:none;text-transform:none;color:#000;background-color:initial;line-height:20px;letter-spacing:normal;text-shadow:none}.ps100{position:relative;margin-left:1px;margin-top:0}.c126{pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;background-clip:padding-box}.c127{pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;background-clip:padding-box}.c128{pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;background-clip:padding-box}.v25{display:inline-block;*display:inline;zoom:1;vertical-align:top;overflow:hidden}.ps101{position:relative;margin-top:68px}.s119{width:100%;min-width:1200px}.c129{z-index:5}.s120{pointer-events:none;min-width:1200px;width:1200px;margin-left:auto;margin-right:auto;min-height:583px}.s121{width:100%;min-width:1200px;min-height:194px}.c130{z-index:19;pointer-events:auto}.s122{min-width:880px;width:880px;min-height:49px}.c131{z-index:20;overflow:hidden;height:49px}.p14{padding-top:0;text-indent:0;padding-bottom:0;padding-right:0;text-align:left}.f32{font-family:"Open Sans";font-size:26px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;color:#000;background-color:initial;line-height:39px;letter-spacing:normal;text-shadow:none}.ps102{position:relative;margin-left:12px;margin-top:-18px}.s123{min-width:880px;width:880px;min-height:9px;-ms-transform:scale(1, -1);-moz-transform:scale(1, -1);-webkit-transform:scale(1, -1);transform:scale(1, -1);-ms-filter:"progid:DXImageTransform.Microsoft.Matrix(M11=1.000000, M12=0, M21=0, M22=-1.000000, SizingMethod='auto expand')"}.c132{z-index:21;pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#268bd2;opacity:0.50;background-clip:padding-box}.ps103{position:relative;margin-left:-880px;margin-top:28px}.s124{min-width:98px;width:98px;min-height:30px}.c133{z-index:22;overflow:hidden;height:30px}.f33{font-family:Lato;font-size:18px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;color:#000;background-color:initial;line-height:30px;letter-spacing:normal;text-shadow:none}.ps104{position:relative;margin-left:-98px;margin-top:73px}.s125{min-width:880px;width:880px;min-height:72px}.c134{z-index:23;overflow:hidden;height:72px}.p15{padding-top:0;text-indent:0;padding-bottom:0;padding-right:0;text-align:justify}.f34{font-family:"EB Garamond";font-size:18px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;color:#000;background-color:initial;line-height:33px;letter-spacing:normal;text-shadow:none}.s126{width:100%;min-width:1200px;min-height:389px}.c135{z-index:24;pointer-events:auto}.c136{z-index:25;overflow:hidden;height:49px}.c137{z-index:26;pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#268bd2;opacity:0.50;background-clip:padding-box}.c138{z-index:27;overflow:hidden;height:30px}.s127{min-width:880px;width:880px;min-height:267px}.c139{z-index:28;overflow:hidden;height:267px}.ps105{position:relative;margin-top:84px}.s128{pointer-events:none;min-width:1200px;width:1200px;margin-left:auto;margin-right:auto;min-height:50px}.ps106{display:inline-block;*display:inline;position:relative;left:50%;-ms-transform:translate(-50%,0);-webkit-transform:translate(-50%,0);transform:translate(-50%,0)}.s129{min-width:880px;width:880px;min-height:50px}.c140{z-index:18}.s130{min-width:60px;width:60px;min-height:50px}.c141{z-index:6;pointer-events:auto}.f35{font-family:"Helvetica Neue", sans-serif;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;background-color:initial;line-height:14px;letter-spacing:normal;text-shadow:none;text-indent:0;text-align:center;padding-top:18px;padding-bottom:18px;margin-top:0;margin-bottom:0}.btn8{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn8:hover{background-color:#82939e;border-color:#000;color:#000}.btn8:active{background-color:#52646f;border-color:#000;color:#fff}.v26{display:inline-block;overflow:hidden;outline:0}.s131{width:60px;padding-right:0;height:14px}.ps107{position:relative;margin-left:15px;margin-top:0}.s132{min-width:59px;width:59px;min-height:50px}.c142{z-index:7;pointer-events:auto}.btn9{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn9:hover{background-color:#82939e;border-color:#000;color:#000}.btn9:active{background-color:#52646f;border-color:#000;color:#fff}.s133{width:59px;padding-right:0;height:14px}.c143{z-index:8;pointer-events:auto}.btn10{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn10:hover{background-color:#82939e;border-color:#000;color:#000}.btn10:active{background-color:#52646f;border-color:#000;color:#fff}.c144{z-index:9;pointer-events:auto}.btn11{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn11:hover{background-color:#82939e;border-color:#000;color:#000}.btn11:active{background-color:#52646f;border-color:#000;color:#fff}.c145{z-index:10;pointer-events:auto}.btn12{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn12:hover{background-color:#82939e;border-color:#000;color:#000}.btn12:active{background-color:#52646f;border-color:#000;color:#fff}.c146{z-index:11;pointer-events:auto}.btn13{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn13:hover{background-color:#82939e;border-color:#000;color:#000}.btn13:active{background-color:#52646f;border-color:#000;color:#fff}.ps108{position:relative;margin-left:14px;margin-top:0}.c147{z-index:12;pointer-events:auto}.btn14{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn14:hover{background-color:#82939e;border-color:#000;color:#000}.btn14:active{background-color:#52646f;border-color:#000;color:#fff}.c148{z-index:13;pointer-events:auto}.btn15{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn15:hover{background-color:#82939e;border-color:#000;color:#000}.btn15:active{background-color:#52646f;border-color:#000;color:#fff}.c149{z-index:14;pointer-events:auto}.btn16{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn16:hover{background-color:#82939e;border-color:#000;color:#000}.btn16:active{background-color:#52646f;border-color:#000;color:#fff}.c150{z-index:15;pointer-events:auto}.btn17{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn17:hover{background-color:#82939e;border-color:#000;color:#000}.btn17:active{background-color:#52646f;border-color:#000;color:#fff}.s134{min-width:59px;width:59px;min-height:50px}.c151{z-index:16;pointer-events:auto}.btn18{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn18:hover{background-color:#82939e;border-color:#000;color:#000}.btn18:active{background-color:#52646f;border-color:#000;color:#fff}.s135{width:59px;padding-right:0;height:14px}.c152{z-index:17;pointer-events:auto}.btn19{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;background-clip:padding-box;color:#000}.btn19:hover{background-color:#82939e;border-color:#000;color:#000}.btn19:active{background-color:#52646f;border-color:#000;color:#fff}.c153{display:inline-block;position:relative;margin-left:0;margin-top:0}.menu-device{background-color:rgb(0,0,0);display:none}@media (max-width:1199px) {.s111{min-width:960px;min-height:64px}.s112{min-width:960px;min-height:64px;height:64px}.ps96{margin-top:11px}.s113{min-width:960px;width:960px;min-height:42px}.ps97{margin-left:10px}.s114{min-width:936px;width:936px;min-height:42px}.s115{min-width:143px;width:143px;min-height:42px;height:42px}.i19{min-width:143px;max-width:143px;min-height:37px;max-height:37px;top:2px}.ps99{margin-left:561px;margin-top:11px}.s116{min-width:232px;width:232px;min-height:19px;height:19px}.s117{min-width:58px;width:58px;min-height:19px;height:19px}.s118{min-width:58px;width:58px;min-height:19px}.c125{height:19px}.f31{font-size:12px;line-height:16px}.ps100{margin-left:0}.ps101{margin-top:54px}.s119{min-width:960px}.s120{min-width:960px;width:960px;min-height:468px}.s121{min-width:960px;min-height:156px}.s122{min-width:704px;width:704px;min-height:40px}.c131{height:40px}.f32{font-size:20px;line-height:30px}.ps102{margin-left:10px;margin-top:-15px}.s123{min-width:704px;width:704px;min-height:7px}.ps103{margin-left:-704px;margin-top:22px}.s124{min-width:78px;width:78px;min-height:24px}.c133{height:24px}.f33{font-size:14px;line-height:23px}.ps104{margin-left:-78px;margin-top:58px}.s125{min-width:704px;width:704px;min-height:58px}.c134{height:58px}.f34{font-size:14px;line-height:26px}.s126{min-width:960px;min-height:312px}.c136{height:40px}.c138{height:24px}.s127{min-width:704px;width:704px;min-height:214px}.c139{height:214px}.ps105{margin-top:67px}.s128{min-width:960px;width:960px;min-height:40px}.s129{min-width:704px;width:704px;min-height:40px}.s130{min-width:48px;width:48px;min-height:40px}.f35{font-size:9px;line-height:11px;padding-top:15px;padding-bottom:14px}.s131{width:48px;height:11px}.ps107{margin-left:12px}.s132{min-width:47px;width:47px;min-height:40px}.s133{width:47px;height:11px}.ps108{margin-left:11px}.s134{min-width:48px;width:48px;min-height:40px}.s135{width:48px;height:11px}.menu-device{background-color:rgb(1,1,1);display:none}}</style>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon-561ce4.png">
<meta name="msapplication-TileImage" content="images/mstile-144x144-5d4623.png">
<link rel="manifest" href="manifest.json" crossOrigin="use-credentials">
<link rel="alternate" hreflang="de-AT" href="https://nautic.family/berichte.php">
<link onload="this.media='all';this.onload=null;" rel="stylesheet" href="css/site.e85ae3.css" media="print">
<!--[if lte IE 7]>
<link rel="stylesheet" href="css/site.e85ae3-lteIE7.css" type="text/css">
<![endif]-->
<!--[if lte IE 8]>
<link rel="stylesheet" href="css/site.e85ae3-lteIE8.css" type="text/css">
<![endif]-->
</head>
<body id="b">
<div class="v21 ps93 s111 c119">
<div class="ps94">
</div>
<div class="v22 ps95 s112 c120">
<div class="ps96 v21 s113">
<div class="v22 ps97 s114 c121">
<div class="v22 ps98 s115 c122">
<a href="./" class="a5"><img src="images/nautic-family-logo-transparent-schwarz.svg" title="Nautic Family" class="i19"></a>
</div>
<div class="v23 ps99 s116 c123">
<ul class="menu-dropdown v24 ps98 s116 m5" id="m1">
<li class="v22 ps98 s117 mit5">
<a href="./" class="ml5"><div class="menu-content mcv5"><div class="v22 ps98 s118 c124"><div class="v22 ps98 s118 c125"><p class="p13 f31">Home</p></div></div></div></a>
</li>
<li class="v22 ps100 s117 mit5">
<a href="leopold.html" class="ml5"><div class="menu-content mcv5"><div class="v22 ps98 s118 c126"><div class="v22 ps98 s118 c125"><p class="p13 f31">Leopold</p></div></div></div></a>
</li>
<li class="v22 ps100 s117 mit5">
<a href="#" class="ml5"><div class="menu-content mcv5"><div class="v22 ps98 s118 c127"><div class="v22 ps98 s118 c125"><p class="p13 f31">Berichte</p></div></div></div></a>
</li>
<li class="v22 ps100 s117 mit5">
<a href="reisen/reisen.php" class="ml5"><div class="menu-content mcv5"><div class="v22 ps98 s118 c128"><div class="v22 ps98 s118 c125"><p class="p13 f31">Reisen</p></div></div></div></a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="v25 ps101 s119 c129">
<?php

    $blogPostIndex = ($page - 1) * $blogPostsPerPage;
    $documentReady = '';
    $facebookFix = '';
    $resizeImages = '';
    $animations = '';
    $count = 0;
    while($blogPostIndex < $blogPostsCount && ++$count <= $blogPostsPerPage) {
        $blogPost = $blogPosts[$blogPostIndex++];

        echo '<article class="bp';
        if($blogPost['w']) echo 'w';
        echo 'c';
        if($count > 1) echo ' bpm';
        echo '">';
        echo $blogPost['html'];
        echo '</article>';

        $documentReady .= $blogPost['documentReady'];
        $facebookFix .= $blogPost['facebookFix'];
        $resizeImages .= $blogPost['resizeImages'];
        $animations .= $blogPost['animations'];
    }

    echo '<script type="text/javascript">var blogDocumentReady=function(){' . $documentReady . '}';
    echo ',blogFacebookFix=function(){' . $facebookFix . '}';
    echo ',blogResizeImages=function(){' . $resizeImages . '}';
    echo ',blogAnimationsSetup=function(){' . $animations . '}';
    echo '</script>';

?>

</div>
<div class="ps105 v21 s128">
<div class="v22 ps97 s129 c140">
<div class="ps106">
<?php

    $control = '<div class="v22 ps98 s130 c141" style="display:none"><a href="#" class="f35 btn8 v26 s131">&lt;&lt;</a></div>';
    if($page > 1) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . ($page - 1);
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        $control = str_replace('href="#"', 'href="' . $url . '"', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps107 s132 c142" style="display:none"><a href="#" class="f35 btn9 v26 s133">{page_num}</a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #677a85"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps107 s130 c143" style="display:none"><a href="#" class="f35 btn10 v26 s131">{page_num}</a></div>';
    $buttonPage = $start_page + 2 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #677a85"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps107 s132 c144" style="display:none"><a href="#" class="f35 btn11 v26 s133">{page_num}</a></div>';
    $buttonPage = $start_page + 3 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #677a85"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps107 s130 c145" style="display:none"><a href="#" class="f35 btn12 v26 s131">{page_num}</a></div>';
    $buttonPage = $start_page + 4 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #677a85"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps107 s130 c146" style="display:none"><a href="#" class="f35 btn13 v26 s131">{page_num}</a></div>';
    $buttonPage = $start_page + 5 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #677a85"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps108 s130 c147" style="display:none"><a href="#" class="f35 btn14 v26 s131">{page_num}</a></div>';
    $buttonPage = $start_page + 6 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #677a85"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps107 s130 c148" style="display:none"><a href="#" class="f35 btn15 v26 s131">{page_num}</a></div>';
    $buttonPage = $start_page + 7 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #677a85"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps107 s132 c149" style="display:none"><a href="#" class="f35 btn16 v26 s133">{page_num}</a></div>';
    $buttonPage = $start_page + 8 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #677a85"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps107 s130 c150" style="display:none"><a href="#" class="f35 btn17 v26 s131">{page_num}</a></div>';
    $buttonPage = $start_page + 9 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #677a85"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps107 s134 c151" style="display:none"><a href="#" class="f35 btn18 v26 s135">{page_num}</a></div>';
    $buttonPage = $start_page + 10 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . $buttonPage;
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        if($buttonPage == $page) {
            $control = str_replace('href="#"', 'style="border: 0; background-color: #c0c0c0; color: #fff; border-color: #677a85"', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        }
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps107 s130 c152" style="display:none"><a href="#" class="f35 btn19 v26 s131">&gt;&gt;</a></div>';
    if($page < $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . ($page + 1);
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        $control = str_replace('href="#"', 'href="' . $url . '"', $control);
    }
    echo $control;

?>

</div>
</div>
</div>
<div class="c153">
</div>
<div class="menu-device"></div>
<script>dpth="/";!function(){var s=["js/jquery.df69e5.js","js/jqueryui.df69e5.js","js/menu.df69e5.js","js/menu-dropdown-animations.df69e5.js","js/menu-dropdown.e85ae3.js","js/stickyfill.df69e5.js","js/berichte.e85ae3.js"],n={},j=0,e=function(e){var o=new XMLHttpRequest;o.open("GET",s[e],!0),o.onload=function(){if(n[e]=o.responseText,7==++j)for(var t in s){var i=document.createElement("script");i.textContent=n[t],document.body.appendChild(i)}},o.send()};for(var o in s)e(o)}();
</script>
<script type="text/javascript">
var ver=RegExp(/Mozilla\/5\.0 \(Linux; .; Android ([\d.]+)/).exec(navigator.userAgent);if(ver&&parseFloat(ver[1])<5){document.getElementsByTagName('body')[0].className+=' whitespacefix';}
</script>
</body>
</html>