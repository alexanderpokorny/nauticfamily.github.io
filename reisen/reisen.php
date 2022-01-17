<?php ini_set('default_charset','UTF-8');header('Content-Type: text/html; charset=UTF-8');header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');header('Cache-Control: post-check=0, pre-check=0', false);header('Pragma: no-cache'); ?><!DOCTYPE html>
<html lang="de-AT">
<head>
<meta charset="UTF-8">
<title>Reisen</title>
<meta name="referrer" content="same-origin">
<link rel="canonical" href="https://nautic.family/reisen/reisen.php">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<?php

    $pages = 10;
    $page = (isset($_GET['page']) ? $_GET['page'] : 1);
    if($page < 1) {
        $page = 1;
    }
    $current_page = 1;
    $current_result = 0;

    $blogName = 'reisen';
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

<style>html,body{-webkit-text-zoom:reset !important;-ms-text-size-adjust:100% !important;-moz-text-size-adjust:100% !important;-webkit-text-size-adjust:100% !important}@font-face{font-display:block;font-family:"Lato";src:url('../css/Lato-Black.woff2') format('woff2'),url('../css/Lato-Black.woff') format('woff');font-weight:900}@font-face{font-display:block;font-family:"Open Sans";src:url('../css/OpenSans-Regular.woff2') format('woff2'),url('../css/OpenSans-Regular.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Open Sans";src:url('../css/OpenSans-Semibold.woff2') format('woff2'),url('../css/OpenSans-Semibold.woff') format('woff');font-weight:600}@font-face{font-display:block;font-family:"EB Garamond";src:url('../css/EBGaramond-Regular.woff2') format('woff2'),url('../css/EBGaramond-Regular.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Lato";src:url('../css/Lato-Regular.woff2') format('woff2'),url('../css/Lato-Regular.woff') format('woff');font-weight:400}body>div{font-size:0}p, span,h1,h2,h3,h4,h5,h6{margin:0;word-spacing:normal;word-wrap:break-word;-ms-word-wrap:break-word;pointer-events:auto;max-height:1000000000px}sup{font-size:inherit;vertical-align:baseline;position:relative;top:-0.4em}sub{font-size:inherit;vertical-align:baseline;position:relative;top:0.4em}ul{display:block;word-spacing:normal;word-wrap:break-word;list-style-type:none;padding:0;margin:0;-moz-padding-start:0;-khtml-padding-start:0;-webkit-padding-start:0;-o-padding-start:0;-padding-start:0;-webkit-margin-before:0;-webkit-margin-after:0}li{display:block;white-space:normal}li p{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;-o-user-select:none;user-select:none}form{display:inline-block}a{text-decoration:inherit;color:inherit;-webkit-tap-highlight-color:rgba(0,0,0,0)}textarea{resize:none}.shm-l{float:left;clear:left}.shm-r{float:right;clear:right}.whitespacefix{word-spacing:-1px}html{font-family:sans-serif}body{font-size:0;margin:0}audio,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background:0 0;outline:0}b,strong{font-weight:700}dfn{font-style:italic}h1,h2,h3,h4,h5,h6{font-size:1em;line-height:1;margin:0}img{border:0}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=submit]{-webkit-appearance:button;cursor:pointer;box-sizing:border-box;white-space:normal}input[type=text],input[type=password],textarea{-webkit-appearance:none;appearance:none;box-sizing:border-box}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type=checkbox],input[type=radio]{box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}textarea{overflow:auto;box-sizing:border-box;border-color:#ddd}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}blockquote{margin-block-start:0;margin-block-end:0;margin-inline-start:0;margin-inline-end:0}:-webkit-full-screen-ancestor:not(iframe){-webkit-clip-path:initial!important}
html{-webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale}.menu-content{cursor:pointer;position:relative}li{-webkit-tap-highlight-color:rgba(0,0,0,0)}
#b{background-color:#fff}.v35{display:block;*display:block;zoom:1;vertical-align:top}.ps137{margin-top:0;top:0;position:-webkit-sticky;position:-moz-sticky;position:-o-sticky;position:-ms-sticky;position:sticky}.s166{width:100%;min-width:1200px;min-height:80px}.c195{z-index:1;pointer-events:none}.ps138{display:inline-block;width:0;height:0}.v36{display:inline-block;*display:inline;zoom:1;vertical-align:top}.ps139{position:relative;margin-top:0}.s167{width:100%;min-width:1200px;min-height:80px;height:80px}.c196{z-index:2;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;background-clip:padding-box;box-shadow:0 0 40px rgba(0,0,0,.5)}.ps140{position:relative;margin-top:14px}.s168{min-width:1200px;width:1200px;margin-left:auto;margin-right:auto;min-height:52px}.ps141{position:relative;margin-left:12px;margin-top:0}.s169{min-width:1175px;width:1175px;min-height:52px}.ps142{position:relative;margin-left:0;margin-top:0}.s170{min-width:179px;width:179px;min-height:52px;height:52px}.c198{z-index:4;pointer-events:auto}.a8{display:block}.i22{position:absolute;left:0;min-width:179px;max-width:179px;min-height:46px;max-height:46px;top:3px}.v37{display:inline-block;*display:inline;zoom:1;vertical-align:top;overflow:visible}.ps143{position:relative;margin-left:701px;margin-top:14px}.s171{min-width:295px;width:295px;min-height:24px;height:24px}.c199{z-index:3;pointer-events:auto}.v38{display:inline-block;*display:inline-block;zoom:1;vertical-align:top}.m8{padding:0px 0px 0px 0px}.ml8{outline:0}.s172{min-width:73px;width:73px;min-height:24px;height:24px}.mcv8{display:inline-block}.s173{min-width:73px;width:73px;min-height:24px}.c200{pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;background-clip:padding-box}.c201{pointer-events:auto;overflow:hidden;height:24px}.p22{padding-top:0;text-indent:0;padding-bottom:0;padding-right:0;text-align:right}.f45{font-family:Lato;font-size:15px;font-weight:900;font-style:normal;text-decoration:none;text-transform:none;color:#000;background-color:initial;line-height:20px;letter-spacing:normal;text-shadow:none}.ps144{position:relative;margin-left:1px;margin-top:0}.c202{pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;background-clip:padding-box}.c203{pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;background-clip:padding-box}.c204{pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#fff;background-clip:padding-box}.v39{display:inline-block;*display:inline;zoom:1;vertical-align:top;overflow:hidden}.ps145{position:relative;margin-top:68px}.s174{width:100%;min-width:1200px}.c205{z-index:5}.s175{pointer-events:none;min-width:1200px;width:1200px;margin-left:auto;margin-right:auto;min-height:749px}.s176{width:100%;min-width:1200px;min-height:749px}.c206{z-index:19;pointer-events:auto}.s177{min-width:880px;width:880px;min-height:49px}.c207{z-index:20;overflow:hidden;height:49px}.p23{padding-top:0;text-indent:0;padding-bottom:0;padding-right:0;text-align:left}.f46{font-family:"Open Sans";font-size:26px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;color:#000;background-color:initial;line-height:39px;letter-spacing:normal;text-shadow:none}.ps146{position:relative;margin-left:12px;margin-top:-18px}.s178{min-width:880px;width:880px;min-height:9px;-ms-transform:scale(1, -1);-moz-transform:scale(1, -1);-webkit-transform:scale(1, -1);transform:scale(1, -1);-ms-filter:"progid:DXImageTransform.Microsoft.Matrix(M11=1.000000, M12=0, M21=0, M22=-1.000000, SizingMethod='auto expand')"}.c208{z-index:21;pointer-events:none;border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#268bd2;opacity:0.50;background-clip:padding-box}.ps147{position:relative;margin-left:-880px;margin-top:28px}.s179{min-width:98px;width:98px;min-height:30px}.c209{z-index:22;overflow:hidden;height:30px}.f47{font-family:Lato;font-size:18px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;color:#000;background-color:initial;line-height:30px;letter-spacing:normal;text-shadow:none}.ps148{position:relative;margin-left:-98px;margin-top:73px}.s180{min-width:880px;width:880px;min-height:627px}.c210{z-index:23;overflow:hidden;height:627px}.p24{padding-top:0;text-indent:0;padding-bottom:0;padding-right:0;text-align:justify}.f48{font-family:"EB Garamond";font-size:18px;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;color:#000;background-color:initial;line-height:33px;letter-spacing:normal;text-shadow:none}.menu-device{background-color:rgb(0,0,0);display:none}@media (max-width:1199px) {.s166{min-width:960px;min-height:64px}.s167{min-width:960px;min-height:64px;height:64px}.ps140{margin-top:11px}.s168{min-width:960px;width:960px;min-height:42px}.ps141{margin-left:10px}.s169{min-width:936px;width:936px;min-height:42px}.s170{min-width:143px;width:143px;min-height:42px;height:42px}.i22{min-width:143px;max-width:143px;min-height:37px;max-height:37px;top:2px}.ps143{margin-left:561px;margin-top:11px}.s171{min-width:232px;width:232px;min-height:19px;height:19px}.s172{min-width:58px;width:58px;min-height:19px;height:19px}.s173{min-width:58px;width:58px;min-height:19px}.c201{height:19px}.f45{font-size:12px;line-height:16px}.ps144{margin-left:0}.ps145{margin-top:54px}.s174{min-width:960px}.s175{min-width:960px;width:960px;min-height:600px}.s176{min-width:960px;min-height:600px}.s177{min-width:704px;width:704px;min-height:40px}.c207{height:40px}.f46{font-size:20px;line-height:30px}.ps146{margin-left:10px;margin-top:-15px}.s178{min-width:704px;width:704px;min-height:7px}.ps147{margin-left:-704px;margin-top:22px}.s179{min-width:78px;width:78px;min-height:24px}.c209{height:24px}.f47{font-size:14px;line-height:23px}.ps148{margin-left:-78px;margin-top:58px}.s180{min-width:704px;width:704px;min-height:502px}.c210{height:502px}.f48{font-size:14px;line-height:26px}.menu-device{background-color:rgb(1,1,1);display:none}}</style>
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon-561ce4.png">
<meta name="msapplication-TileImage" content="../images/mstile-144x144-5d4623.png">
<link rel="manifest" href="../manifest.json" crossOrigin="use-credentials">
<link rel="alternate" hreflang="de-AT" href="https://nautic.family/reisen/reisen.php">
<link onload="this.media='all';this.onload=null;" rel="stylesheet" href="../css/site.e85ae3.css" media="print">
<!--[if lte IE 7]>
<link rel="stylesheet" href="../css/site.e85ae3-lteIE7.css" type="text/css">
<![endif]-->
<!--[if lte IE 8]>
<link rel="stylesheet" href="../css/site.e85ae3-lteIE8.css" type="text/css">
<![endif]-->
</head>
<body id="b">
<div class="v35 ps137 s166 c195">
<div class="ps138">
</div>
<div class="v36 ps139 s167 c196">
<div class="ps140 v35 s168">
<div class="v36 ps141 s169 c197">
<div class="v36 ps142 s170 c198">
<a href="../" class="a8"><img src="../images/nautic-family-logo-transparent-schwarz.svg" title="Nautic Family" class="i22"></a>
</div>
<div class="v37 ps143 s171 c199">
<ul class="menu-dropdown v38 ps142 s171 m8" id="m1">
<li class="v36 ps142 s172 mit8">
<a href="../" class="ml8"><div class="menu-content mcv8"><div class="v36 ps142 s173 c200"><div class="v36 ps142 s173 c201"><p class="p22 f45">Home</p></div></div></div></a>
</li>
<li class="v36 ps144 s172 mit8">
<a href="../leopold.html" class="ml8"><div class="menu-content mcv8"><div class="v36 ps142 s173 c202"><div class="v36 ps142 s173 c201"><p class="p22 f45">Leopold</p></div></div></div></a>
</li>
<li class="v36 ps144 s172 mit8">
<a href="../berichte.php" class="ml8"><div class="menu-content mcv8"><div class="v36 ps142 s173 c203"><div class="v36 ps142 s173 c201"><p class="p22 f45">Berichte</p></div></div></div></a>
</li>
<li class="v36 ps144 s172 mit8">
<a href="#" class="ml8"><div class="menu-content mcv8"><div class="v36 ps142 s173 c204"><div class="v36 ps142 s173 c201"><p class="p22 f45">Reisen</p></div></div></div></a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="v39 ps145 s174 c205">
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
<div class="ps133 v3 s162">
<div class="v1 ps135 s163 c184">
<div class="ps134">
<?php

    $control = '<div class="v1 ps3 s164 c185" style="display:none"><a href="#" class="f44 btn20 v2 s165">&lt;&lt;</a></div>';
    if($page > 1) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?page=' . ($page - 1);
        $control = str_replace('style="visibility:hidden"', '', $control);
        $control = str_replace('style="display:none"', '', $control);
        $control = str_replace('href="#"', 'href="' . $url . '"', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v1 ps136 s164 c186" style="display:none"><a href="#" class="f44 btn21 v2 s165">{page_num}</a></div>';
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

    $control = '<div class="v1 ps136 s164 c187" style="display:none"><a href="#" class="f44 btn22 v2 s165">{page_num}</a></div>';
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

    $control = '<div class="v1 ps136 s164 c188" style="display:none"><a href="#" class="f44 btn23 v2 s165">{page_num}</a></div>';
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

    $control = '<div class="v1 ps136 s164 c189" style="display:none"><a href="#" class="f44 btn24 v2 s165">{page_num}</a></div>';
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

    $control = '<div class="v1 ps136 s164 c75" style="display:none"><a href="#" class="f44 btn25 v2 s165">{page_num}</a></div>';
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

    $control = '<div class="v1 ps136 s164 c190" style="display:none"><a href="#" class="f44 btn26 v2 s165">{page_num}</a></div>';
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

    $control = '<div class="v1 ps136 s164 c191" style="display:none"><a href="#" class="f44 btn27 v2 s165">{page_num}</a></div>';
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

    $control = '<div class="v1 ps136 s164 c192" style="display:none"><a href="#" class="f44 btn28 v2 s165">{page_num}</a></div>';
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

    $control = '<div class="v1 ps136 s164 c6" style="display:none"><a href="#" class="f44 btn29 v2 s165">{page_num}</a></div>';
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

    $control = '<div class="v1 ps136 s164 c7" style="display:none"><a href="#" class="f44 btn30 v2 s165">{page_num}</a></div>';
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

    $control = '<div class="v1 ps136 s164 c193" style="display:none"><a href="#" class="f44 btn31 v2 s165">&gt;&gt;</a></div>';
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
<div class="c194">
</div>
<div class="menu-device"></div>
<script>dpth="../";!function(){var s=["../js/jquery.df69e5.js","../js/jqueryui.df69e5.js","../js/menu.df69e5.js","../js/menu-dropdown-animations.df69e5.js","../js/menu-dropdown.e85ae3.js","../js/stickyfill.df69e5.js","../js/reisen/reisen.e85ae3.js"],n={},j=0,e=function(e){var o=new XMLHttpRequest;o.open("GET",s[e],!0),o.onload=function(){if(n[e]=o.responseText,7==++j)for(var t in s){var i=document.createElement("script");i.textContent=n[t],document.body.appendChild(i)}},o.send()};for(var o in s)e(o)}();
</script>
<script type="text/javascript">
var ver=RegExp(/Mozilla\/5\.0 \(Linux; .; Android ([\d.]+)/).exec(navigator.userAgent);if(ver&&parseFloat(ver[1])<5){document.getElementsByTagName('body')[0].className+=' whitespacefix';}
</script>
</body>
</html>