!function(e){var t={};function r(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,r),i.l=!0,i.exports}r.m=e,r.c=t,r.d=function(e,t,o){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(r.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)r.d(o,i,function(t){return e[t]}.bind(null,i));return o},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=660)}({660:function(e,t,r){"use strict";r.r(t);var o,i,n;r(661);function s(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}var a=GT3,l=(a.Hooks,a.autobind),u=a.ThemesCore,d=u.Widgets.BasicWidget,c=u.isRTL,p=u.jQuery,f=l((n=i=function(e){var t,r;function o(){var t;t=e.apply(this,arguments)||this;var r=p(".module_testimonial",t.el);if(!r.length)return s(t);var o=r.data("settings");return p(".testimonials_item",r).css("display",""),p(".testimonials_rotator",r).slick({autoplay:o.autoplay,autoplaySpeed:o.autoplaySpeed,fade:o.fade,dots:o.dots,arrows:o.arrows,slidesToScroll:o.items_per_line,slidesToShow:o.items_per_line,focusOnSelect:!0,speed:500,infinite:!0,prevArrow:'<div class="slick-prev gt3_modified"><div class="theme_icon-arrows-left"></div>'+o.l10n.prev+"</div>",nextArrow:'<div class="slick-next gt3_modified">'+o.l10n.next+'<div class="theme_icon-arrows-right"></div></div>',responsive:[{breakpoint:600,settings:{slidesToShow:1,slidesToScroll:1}}],rtl:c}),t}return r=e,(t=o).prototype=Object.create(r.prototype),t.prototype.constructor=t,t.__proto__=r,o}(d),i.widgetName="gt3-core-testimonials",o=n))||o;GT3.ThemesCore.onWidgetRegisterHandler(f.widgetName,f)},661:function(e,t,r){}});