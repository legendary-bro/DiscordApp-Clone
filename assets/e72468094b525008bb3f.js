(window.webpackJsonp=window.webpackJsonp||[]).push([[183],{6867:function(n,a,i){"use strict";n.exports.parse=function(n){var a,i=/^(?:(en-GB-oed|i-ami|i-bnn|i-default|i-enochian|i-hak|i-klingon|i-lux|i-mingo|i-navajo|i-pwn|i-tao|i-tay|i-tsu|sgn-BE-FR|sgn-BE-NL|sgn-CH-DE)|(art-lojban|cel-gaulish|no-bok|no-nyn|zh-guoyu|zh-hakka|zh-min|zh-min-nan|zh-xiang))$|^((?:[a-z]{2,3}(?:(?:-[a-z]{3}){1,3})?)|[a-z]{4}|[a-z]{5,8})(?:-([a-z]{4}))?(?:-([a-z]{2}|\d{3}))?((?:-(?:[\da-z]{5,8}|\d[\da-z]{3}))*)?((?:-[\da-wy-z](?:-[\da-z]{2,8})+)*)?(-x(?:-[\da-z]{1,8})+)?$|^(x(?:-[\da-z]{1,8})+)$/i.exec(n);if(!i)return null;i.shift();var t=null,e=[];i[2]&&(t=(a=i[2].split("-")).shift(),e=a);var s=[];i[5]&&(s=i[5].split("-")).shift();var l=[];if(i[6]){var r;(a=i[6].split("-")).shift();for(var u=[];a.length;){var o=a.shift();1===o.length?r?(l.push({singleton:r,extension:u}),r=o,u=[]):r=o:u.push(o)}l.push({singleton:r,extension:u})}var h=[];i[7]&&((h=i[7].split("-")).shift(),h.shift());var g=[];return i[8]&&(g=i[8].split("-")).shift(),{langtag:{language:{language:t,extlang:e},script:i[3]||null,region:i[4]||null,variant:s,extension:l,privateuse:h},privateuse:g,grandfathered:{irregular:i[0]||null,regular:i[1]||null}}}}}]);
//# sourceMappingURL=e72468094b525008bb3f.js.map