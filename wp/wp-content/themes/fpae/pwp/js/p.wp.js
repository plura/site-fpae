/*
 * Plura P jQuery Plugin Collection for Wordpress
 * 
 * Copyright (c) 2015 Plura
 *
 * Date: 2015-12-02 12:30:50 (Tue, 02 Dez 2015)
 * Revision: 6246
 */
plura.obj(".wp.LightBox",function(a){var e={data:PWP.dir+"php/process.php?type=lightbox",group:"lightbox-gallery",size:"medium",options:{}},d,h=function(c){var b,a;for(b=0;b<c.length;b+=1)a=$("#"+c[b].id),a.attr("title")||(a.children("img").length&&a.children("img").attr("alt")?a.attr("title",a.children("img").attr("alt")):a.attr("title",a.text())),a.prop("href",c[b].url);console.log(d);if(!1!==d.group)d.target.colorbox(d.options);else for(b=0;b<c.length;b+=1)$("#"+c[b].id).colorbox(d.options)},k=
function(a){a.preventDefault()};(function(){var c,b=[],f,g=plura.wp.LightBox.i||0;d=$.extend(!0,{},e,a);a.target.length&&(a.target.each(function(a){c="IMG"===$(this).prop("tagName")?$(this).parent():$(this);c.prop("id","lightbox_"+g+"_"+a).click(k);!1!==d.group&&c.prop("rel",d.group);b[a]='{"id":"'+c.prop("id")+'", "url": "'+c.prop("href")+'"}'}),f={json:"["+b.join(",")+"]",size:d.size},$.getJSON(d.data,f,h),plura.wp.LightBox.i=g+1)})()});(function(a){a.fn.pwpLightbox=plura.wp.LightBox})(jQuery);
plura.obj(".wp.NavSlide",function(a){var e=$.extend({},{speed:"slow"},a);$(this).find("li ul").addClass("jqhide");$(this).find("li").hover(function(){$(this).children("ul").slideDown(e.speed)},function(){$(this).children("ul").slideUp(e.speed)});$(this).find(".jqhide").css({left:"auto",display:"none"})});(function(a){a.fn.pwpNavSlide=plura.wp.NavSlide})(jQuery);
$(function(){$("li.current-cat").each(function(){for(var a=$(this).parent().parent();a.hasClass("cat-item");)a.addClass("current-cat-ancestor"),a=a.parent().parent()});$(".pwp_nav_ssf.slide").pwpNavSlide();var a=new plura.net.Client({classes:!0});PWP.lang&&$("body").addClass("lang-"+PWP.lang);a.data.ie&&7>a.data.version&&($("input[type=checkbox]").addClass("checkbox"),$("input[type=radio]").addClass("radio"),$("input[type=text]").addClass("text"),$("input[type=submit]").addClass("submit"))});
