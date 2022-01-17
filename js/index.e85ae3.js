(function(d){var h=[];d.loadImages=function(a,e){"string"==typeof a&&(a=[a]);for(var f=a.length,g=0,b=0;b<f;b++){var c=document.createElement("img");c.onload=function(){g++;g==f&&d.isFunction(e)&&e()};c.src=a[b];h.push(c)}}})(window.jQuery);
var wl;

var lwi=-1;function thresholdPassed(){var w=$(window).width();var p=false;var cw=0;if(w>=1200){cw++;}if(lwi!=cw){p=true;}lwi=cw;return p;}
var notifyyt,notifyqueue;function onYouTubeIframeAPIReady(){notifyyt(),window.loadyt=function(e){e()}}window.loadyt=function(e){var t=document.createElement("script");t.src="https://www.youtube.com/player_api";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(t,n),notifyqueue||(notifyqueue=[],notifyyt=function(){var e;for(e=0;e<notifyqueue.length;++e){(0,notifyqueue[e])()}}),notifyqueue.push(e)};window.plstp||(window.plstp=[]),plst=function(p,w){for(f in window.plstp)window.plstp[f]();window.plstp=[],window.plstp[p]=w},plrm=function(p){delete window.plstp[p]};ldsrcset=function(t){var e,r=document.querySelectorAll(t);for(e=0;e<r.length;e++){var c=r[e].getAttribute("data-srcset");r[e].setAttribute("srcset",c)}},ldsrc=function(t){var e=document.querySelector(t),r=e.getAttribute("data-src");e.setAttribute("src",r)};!function(){if("Promise"in window&&void 0!==window.performance){var e,t,r=document,n=function(){return r.createElement("link")},o=new Set,a=n(),i=a.relList&&a.relList.supports&&a.relList.supports("prefetch"),s=location.href.replace(/#[^#]+$/,"");o.add(s);var c=function(e){var t=location,r="http:",n="https:";if(e&&e.href&&e.origin==t.origin&&[r,n].includes(e.protocol)&&(e.protocol!=r||t.protocol!=n)){var o=e.pathname;if(!(e.hash&&o+e.search==t.pathname+t.search||"?preload=no"==e.search.substr(-11)||".html"!=o.substr(-5)&&".html"!=o.substr(-5)&&"/"!=o.substr(-1)))return!0}},u=function(e){var t=e.replace(/#[^#]+$/,"");if(!o.has(t)){if(i){var a=n();a.rel="prefetch",a.href=t,r.head.appendChild(a)}else{var s=new XMLHttpRequest;s.open("GET",t,s.withCredentials=!0),s.send()}o.add(t)}},p=function(e){return e.target.closest("a")},f=function(t){var r=t.relatedTarget;r&&p(t)==r.closest("a")||e&&(clearTimeout(e),e=void 0)},d={capture:!0,passive:!0};r.addEventListener("touchstart",function(e){t=performance.now();var r=p(e);c(r)&&u(r.href)},d),r.addEventListener("mouseover",function(r){if(!(performance.now()-t<1200)){var n=p(r);c(n)&&(n.addEventListener("mouseout",f,{passive:!0}),e=setTimeout(function(){u(n.href),e=void 0},80))}},d)}}();

$(function(){
r=function(){if(thresholdPassed()){dpi=window.devicePixelRatio;if($(window).width()>=1200){var a='data-src';var e=document.querySelector('.js4');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/anchor-312599-114.png':'images/anchor-312599-76.png'):'images/anchor-312599-38.png');
var a='data-src';var e=document.querySelector('.js5');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/anchor-312599-114.png':'images/anchor-312599-76.png'):'images/anchor-312599-38.png');
var e=document.querySelector('.js2');e.setAttribute('src',(dpi>1)?'images/leopold-quicksilver-616-1.png':'images/leopold-quicksilver-308-1.png');
var e=document.querySelector('.js6');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/anchor-312599-114.png':'images/anchor-312599-76.png'):'images/anchor-312599-38.png');
var e=document.querySelector('.js7');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/alexander-645.jpg':'images/alexander-430-1.jpg'):'images/alexander-215-1.jpg');
var e=document.querySelector('.js9');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/stephanie-645.jpg':'images/stephanie-430-1.jpg'):'images/stephanie-215-1.jpg');
var e=document.querySelector('.js11');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/leopold-645.jpg':'images/leopold-430-1.jpg'):'images/leopold-215-1.jpg');}else{var a='data-src';var e=document.querySelector('.js4');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/anchor-312599-93.png':'images/anchor-312599-62.png'):'images/anchor-312599-31.png');
var a='data-src';var e=document.querySelector('.js5');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/anchor-312599-90.png':'images/anchor-312599-60.png'):'images/anchor-312599-30.png');
var e=document.querySelector('.js2');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/leopold-quicksilver-738.png':'images/leopold-quicksilver-492-1.png'):'images/leopold-quicksilver-246-1.png');
var e=document.querySelector('.js6');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/anchor-312599-90-1.png':'images/anchor-312599-60-1.png'):'images/anchor-312599-30-1.png');
var e=document.querySelector('.js7');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/alexander-516.jpg':'images/alexander-344-1.jpg'):'images/alexander-172-1.jpg');
var e=document.querySelector('.js9');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/stephanie-516.jpg':'images/stephanie-344-1.jpg'):'images/stephanie-172-1.jpg');
var e=document.querySelector('.js11');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/leopold-516.jpg':'images/leopold-344-1.jpg'):'images/leopold-172-1.jpg');}}};
if(!window.HTMLPictureElement){$(window).resize(r);r();}
(function(){$('a[href^="#"]:not(.allowConsent,.noConsent,.denyConsent,.removeConsent)').each(function(i,e){$(e).click(function(){var t=e.hash.length>1?$('[name="'+e.hash.slice(1)+'"]').offset().top:0;return $("html, body").animate({scrollTop:t},400),!1})})})();
window.loadyt(function(){var p=new YT.Player('pl1',{host:'https://www.youtube-nocookie.com',videoId: '4pn6T1ux9Uw',playerVars:{'playsinline':1,'rel':0},events:{onStateChange:function(e){1===e.data&&plst('pl1',function(){e.target.pauseVideo()}),2===e.data&&plrm('pl1')}}});});initMenu($('#m1')[0]);
ldsrcset('.js27 source');ldsrcset('.js28 source');$('.c15').Stickyfill();
wl=new woolite();
wl.init();
wl.addAnimation($('.js1'), "1.00s", "0.00s", 1, 100);
wl.addAnimation($('.js3'), "1.00s", "0.00s", 1, 100);
wl.addAnimation($('.js8'), "1.00s", "0.00s", 1, 100);
wl.addAnimation($('.js10'), "1.00s", "0.00s", 1, 100);
wl.addAnimation($('.js12'), "1.00s", "0.00s", 1, 100);
wl.addAnimation($('.js13'), "1.00s", "0.00s", 1, 100);
wl.start();
if(location.hash){var o=location.hash.replace('#',''),e=function(){if(document.body.getBoundingClientRect().top>0){var t=document.querySelectorAll('[name="'+o+'"]')[0];t&&t.scrollIntoView(!0),setTimeout(e,100)}};e()}
});