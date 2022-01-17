(function(d){var h=[];d.loadImages=function(a,e){"string"==typeof a&&(a=[a]);for(var f=a.length,g=0,b=0;b<f;b++){var c=document.createElement("img");c.onload=function(){g++;g==f&&d.isFunction(e)&&e()};c.src=a[b];h.push(c)}}})(window.jQuery);
var wl;

var lwi=-1;function thresholdPassed(){var w=$(window).width();var p=false;var cw=0;if(w>=1200){cw++;}if(lwi!=cw){p=true;}lwi=cw;return p;}
ldsrcset=function(t){var e,r=document.querySelectorAll(t);for(e=0;e<r.length;e++){var c=r[e].getAttribute("data-srcset");r[e].setAttribute("srcset",c)}},ldsrc=function(t){var e=document.querySelector(t),r=e.getAttribute("data-src");e.setAttribute("src",r)};!function(){if("Promise"in window&&void 0!==window.performance){var e,t,r=document,n=function(){return r.createElement("link")},o=new Set,a=n(),i=a.relList&&a.relList.supports&&a.relList.supports("prefetch"),s=location.href.replace(/#[^#]+$/,"");o.add(s);var c=function(e){var t=location,r="http:",n="https:";if(e&&e.href&&e.origin==t.origin&&[r,n].includes(e.protocol)&&(e.protocol!=r||t.protocol!=n)){var o=e.pathname;if(!(e.hash&&o+e.search==t.pathname+t.search||"?preload=no"==e.search.substr(-11)||".html"!=o.substr(-5)&&".html"!=o.substr(-5)&&"/"!=o.substr(-1)))return!0}},u=function(e){var t=e.replace(/#[^#]+$/,"");if(!o.has(t)){if(i){var a=n();a.rel="prefetch",a.href=t,r.head.appendChild(a)}else{var s=new XMLHttpRequest;s.open("GET",t,s.withCredentials=!0),s.send()}o.add(t)}},p=function(e){return e.target.closest("a")},f=function(t){var r=t.relatedTarget;r&&p(t)==r.closest("a")||e&&(clearTimeout(e),e=void 0)},d={capture:!0,passive:!0};r.addEventListener("touchstart",function(e){t=performance.now();var r=p(e);c(r)&&u(r.href)},d),r.addEventListener("mouseover",function(r){if(!(performance.now()-t<1200)){var n=p(r);c(n)&&(n.addEventListener("mouseout",f,{passive:!0}),e=setTimeout(function(){u(n.href),e=void 0},80))}},d)}}();

$(function(){
r=function(){if(thresholdPassed()){dpi=window.devicePixelRatio;if($(window).width()>=1200){var a='data-src';var e=document.querySelector('.js39');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/leopold-645.jpg':'images/leopold-430-1.jpg'):'images/leopold-215-1.jpg');
var e=document.querySelector('.js35');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/alexander-645.jpg':'images/alexander-430-1.jpg'):'images/alexander-215-1.jpg');
var e=document.querySelector('.js37');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/stephanie-645.jpg':'images/stephanie-430-1.jpg'):'images/stephanie-215-1.jpg');}else{var a='data-src';var e=document.querySelector('.js39');if(e.hasAttribute('src')){a='src';}e.setAttribute(a,(dpi>1)?((dpi>2)?'images/leopold-516.jpg':'images/leopold-344-1.jpg'):'images/leopold-172-1.jpg');
var e=document.querySelector('.js35');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/alexander-516.jpg':'images/alexander-344-1.jpg'):'images/alexander-172-1.jpg');
var e=document.querySelector('.js37');e.setAttribute('src',(dpi>1)?((dpi>2)?'images/stephanie-516.jpg':'images/stephanie-344-1.jpg'):'images/stephanie-172-1.jpg');}}};
if(!window.HTMLPictureElement){$(window).resize(r);r();}
(function(){$('a[href^="#"]:not(.allowConsent,.noConsent,.denyConsent,.removeConsent)').each(function(i,e){$(e).click(function(){var t=e.hash.length>1?$('[name="'+e.hash.slice(1)+'"]').offset().top:0;return $("html, body").animate({scrollTop:t},400),!1})})})();
initMenu($('#m1')[0]);
ldsrcset('.js47 source');$('.c80').Stickyfill();
wl=new woolite();
wl.init();
wl.addAnimation($('.js36'), "1.00s", "0.00s", 1, 100);
wl.addAnimation($('.js38'), "1.00s", "0.00s", 1, 100);
wl.addAnimation($('.js40'), "1.00s", "0.00s", 1, 100);
wl.start();
if(location.hash){var o=location.hash.replace('#',''),e=function(){if(document.body.getBoundingClientRect().top>0){var t=document.querySelectorAll('[name="'+o+'"]')[0];t&&t.scrollIntoView(!0),setTimeout(e,100)}};e()}
});