!function(e){var t={};function o(r){if(t[r])return t[r].exports;var i=t[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,o),i.l=!0,i.exports}o.m=e,o.c=t,o.d=function(e,t,r){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(e,t){if(1&t&&(e=o(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(o.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)o.d(r,i,function(t){return e[t]}.bind(null,i));return r},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="/",o(o.s=693)}({693:function(e,t,o){"use strict";o.r(t);var r,i,n,s;o(694);function a(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function u(e,t){if(!Object.prototype.hasOwnProperty.call(e,t))throw new TypeError("attempted to use private field on non-instance");return e}var p=0;var c=GT3,l=(c.Hooks,c.autobind),d=c.ThemesCore,_=d.Widgets.BasicWidget,f=d.jQuery,m=d.isRTL,g=c.Isotope,y=l((n=i=function(e){var t,o;function r(){var t;if(t=e.apply(this,arguments)||this,Object.defineProperty(a(t),s,{writable:!0,value:{isotope:".isotope",$isotope_wrapper:".isotope",$wrapper:".module_team"}}),t.isotope=null,t.query={},t.init(),t.extendUI(u(a(t),s)[s]),!t.ui.isotope)return a(t);t.isotope=new g(t.ui.isotope,{layoutMode:"masonry",itemSelector:".item-team-member, .gt3_practice_list__item, .gt3_course_item.isotope-item",percentPosition:!0,stagger:30,transitionDuration:"0.4s",masonry:{},originLeft:!m}),t.ui.$isotope_wrapper.imagesLoaded((function(){t.countFilterElements(f(t.el)),t.isotope.layout()})),f(t.el).on("click",".isotope-filter a",(function(e){e.preventDefault();var o=e.target||e.currentTarget,r=o.getAttribute("data-filter");f(o).siblings().removeClass("active"),t.isotope.arrange({filter:r})}));var o=1,r=t.ui.$wrapper.find(".item-team-member");r.each((function(){f(this).on("mouseover",(function(){o++,f(this).addClass("hovered").css({"z-index":o})})),f(this).on("mouseleave",(function(){f(this).removeClass("hovered")}))})),t.query={type:t.settings.type,grid_gap:t.settings.grid_gap,pagination_en:t.settings.pagination_en,query:t.settings.query,link_post:t.settings.link_post,custom_item_height:t.settings.custom_item_height,posts_per_line:t.settings.posts_per_line,show_social:t.settings.show_social,show_position:t.settings.show_position,show_description:t.settings.show_description,show_title:t.settings.show_title},t.query.action="gt3_themes_core_team_load_items";var i=!1;return f(".team_view_more_link",t.el).on("click",(function(e){!1 in t.settings||(e.preventDefault(),i||(i=!0,t.query.render_index=t.ui.$wrapper.attr("data-post-index"),t.query.query.paged++,f.ajax({type:"POST",data:t.query,url:gt3_themes_core.ajaxurl,success:function(e){if("post_count"in e&&e.post_count>0){var o=t.ui.$wrapper.attr("data-post-index");t.ui.$wrapper.attr("data-post-index",Number(o)+e.post_count);var r=document.createElement("div");r.innerHTML=e.respond,t.isotope.once("insertComplete",(function(){t.countFilterElements(t.ui.$wrapper)})),t.isotope.once("layoutComplete",(function(){t.isotope.layout()})),t.isotope.insert(r)}"max_page"in e&&(e.max_page<=t.query.query.paged||0===e.max_page)&&f(".team_view_more_link",t.el).remove(),"exclude"in e&&(t.query.query.exclude=e.exclude),i=!1},error:function(e){console.log(e),console.error("Error request"),i=!1}})))})),t.afterInit(),t}o=e,(t=r).prototype=Object.create(o.prototype),t.prototype.constructor=t,t.__proto__=o;var i=r.prototype;return i.start=function(){},i.resize=function(){this.isotope&&this.isotope.layout},i.countFilterElements=function(e){var t,o,r=e.find(".isotope-filter").children(),i=e.find(".gt3_isotope_parent");r.length&&r.each((function(e,r){r=f(r),t=r.attr("data-filter"),o="*"===t?i.children().length:i.find(t).length,r.attr("data-count",o)}))},r}(_),s="__private_"+p+++"_"+"ui",i.widgetName="gt3-core-team",r=n))||r;GT3.ThemesCore.onWidgetRegisterHandler(y.widgetName,y)},694:function(e,t,o){}});