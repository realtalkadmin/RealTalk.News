/**handles:wpcom-notes-admin-bar**/
"undefined"==typeof wpcom&&(wpcom={}),"undefined"==typeof wpcom.events&&(wpcom.events=_.extend({},Backbone.Events)),function(e){var t="2.1.10-0-ga21f8fa",n=window.wpNotesArgs||{},s=n.cacheBuster||t,a=n.iframeUrl||"https://widgets.wp.com/notes/",i=n.iframeAppend||"",o=n.iframeScroll||"no",r=n.wide||!1,c=n.beta||!1,l=!1,d,u,m=Backbone.View.extend({el:"#wp-admin-bar-notes",hasUnseen:null,initialLoad:!0,count:null,iframe:null,iframeWindow:null,messageQ:[],iframeSpinnerShown:!1,isJetpack:!1,linkAccountsURL:!1,currentMasterbarActive:!1,initialize:function(){var t=this,n=navigator.appVersion.match(/MSIE (\d+)/);if(n&&parseInt(n[1],10)<8){var s=t.$("#"+d),a=t.$(".ab-empty-item");if(!s.length||!a.length)return;var o=t.$el.offset();return t.$(".ab-item").removeClass("ab-item"),t.$("#wpnt-notes-unread-count").html("?"),s.html(' \t\t\t\t\t<div class="wpnt-notes-panel-header"><p>Notifications are not supported in this browser!</p> </div> \t\t\t\t\t<img src="http://i2.wp.com/wordpress.com/wp-content/mu-plugins/notes/images/jetpack-notes-2x.png" /> \t\t\t\t\t<p class="wpnt-ie-note"> \t\t\t\t\tPlease <a href="http://browsehappy.com" target="_blank">upgrade your browser</a> to keep using notifications. \t\t\t\t\t</p>').addClass("browse-happy"),t.$el.on("mouseenter",function(e){clearTimeout(t.fadeOutTimeout),s.is(":visible:animated")&&s.stop().css("opacity",""),a.css({"background-color":"#eee"}),s.show()}),void t.$el.on("mouseleave",function(){t.fadeOutTimeout=setTimeout(function(){clearTimeout(t.fadeOutTimeout),s.is(":animated")||s.fadeOut(250,function(){a.css({"background-color":"transparent"})})},350)})}"function"!=typeof e.fn.spin&&(e.fn.spin=function(e){}),this.isRtl=e("#wpadminbar").hasClass("rtl"),this.count=e("#wpnt-notes-unread-count"),this.panel=e("#"+d),this.hasUnseen=this.count.hasClass("wpn-unread"),"undefined"!=typeof wpNotesIsJetpackClient&&wpNotesIsJetpackClient&&(t.isJetpack=!0),t.isJetpack&&"undefined"!=typeof wpNotesLinkAccountsURL&&(t.linkAccountsURL=wpNotesLinkAccountsURL),this.$el.children(".ab-item").on("click touchstart",function(e){return e.preventDefault(),t.togglePanel(),!1}),this.preventDefault=function(e){return e&&e.preventDefault(),!1},"2"==i&&(this.panel.mouseenter(function(){document.body.addEventListener("mousewheel",t.preventDefault)}),this.panel.mouseleave(function(){document.body.removeEventListener("mousewheel",t.preventDefault)}),"undefined"!=typeof document.hidden&&document.addEventListener("visibilitychange",function(){t.postMessage({action:"toggleVisibility",hidden:document.hidden})})),e(document).bind("mousedown focus",function(n){var s;return!t.showingPanel||(s=e(n.target),!!s.is(document)||(!!s.closest("#wp-admin-bar-notes").length||(t.hidePanel(),!1)))}),e(document).on("keydown.notes",function(e){var n=wpNotesCommon.getKeycode(e);if(n&&(27==n&&t.hidePanel(),78==n&&t.togglePanel(),null!==this.iframeWindow))return!t.showingPanel||74!=n&&40!=n?!t.showingPanel||75!=n&&38!=n?!t.showingPanel||82!=n&&65!=n&&83!=n&&84!=n?void 0:(t.postMessage({action:"keyEvent",keyCode:n}),!1):(t.postMessage({action:"selectPrevNote"}),!1):(t.postMessage({action:"selectNextNote"}),!1)}),wpcom.events.on("notes:togglePanel",function(){t.togglePanel()}),t.isJetpack?t.loadIframe():setTimeout(function(){t.loadIframe()},3e3),t.count.hasClass("wpn-unread")?wpNotesCommon.bumpStat("notes-menu-impressions","non-zero"):wpNotesCommon.bumpStat("notes-menu-impressions","zero"),e(window).on("message",function(e){if(!e.data&&e.originalEvent.data&&(e=e.originalEvent),"https://widgets.wp.com"==e.origin)try{var n="string"==typeof e.data?JSON.parse(e.data):e.data;if("notesIframeMessage"!=n.type)return;t.handleEvent(n)}catch(e){}})},handleEvent:function(t){var n="undefined"!=typeof wpcomNewdash&&"undefined"!=typeof wpcomNewdash.router&&"undefined"!==wpcomNewdash.router.setRoute;if(t&&t.action)switch(t.action){case"togglePanel":this.togglePanel();break;case"render":this.render(t.num_new,t.latest_type);break;case"renderAllSeen":this.renderAllSeen();break;case"iFrameReady":this.iFrameReady(t);break;case"goToNotesPage":n?wpcomNewdash.router.setRoute("/notifications"):window.location.href="//wordpress.com/me/notifications/";break;case"widescreen":var s=e("#"+u);t.widescreen&&!s.hasClass("widescreen")?s.addClass("widescreen"):!t.widescreen&&s.hasClass("widescreen")&&s.removeClass("widescreen")}},render:function(t,n){var s=this,a=!1;if(!1!==this.hasUnseen||0!==t){if(this.initialLoad&&this.hasUnseen&&0!==t)return void(this.initialLoad=!1);this.hasUnseen||0===t||wpNotesCommon.bumpStat("notes-menu-impressions","non-zero-async");var i=wpNotesCommon.noteType2Noticon[n];"undefined"==typeof i&&(i="notification");var o=e("<span/>",{class:"noticon noticon-"+i}),r=this.getStatusIcon(t);0===t||this.showingPanel?(this.hasUnseen=!1,s.count.fadeOut(200,function(){s.count.empty(),s.count.removeClass("wpn-unread").addClass("wpn-read"),s.count.html(r),s.count.fadeIn(500)}),wpcom&&wpcom.masterbar&&wpcom.masterbar.hasUnreadNotifications(!1)):(this.hasUnseen&&s.count.fadeOut(400,function(){s.count.empty(),s.count.removeClass("wpn-unread").addClass("wpn-read"),s.count.html(o),s.count.fadeIn(400)}),this.hasUnseen=!0,s.count.fadeOut(400,function(){s.count.empty(),s.count.removeClass("wpn-read").addClass("wpn-unread"),s.count.html(o),s.count.fadeIn(400,function(){})}),wpcom&&wpcom.masterbar&&wpcom.masterbar.hasUnreadNotifications(!0))}},renderAllSeen:function(){if(this.hasToggledPanel){var e=this.getStatusIcon(0);this.count.removeClass("wpn-unread").addClass("wpn-read"),this.count.empty(),this.count.html(e),this.hasUnseen=!1,wpcom&&wpcom.masterbar&&wpcom.masterbar.hasUnreadNotifications(!1)}},getStatusIcon:function(t){var n="";switch(t){case 0:n="noticon noticon-notification";break;case 1:n="noticon noticon-notification";break;case 2:n="noticon noticon-notification";break;default:n="noticon noticon-notification"}return e("<span/>",{class:n})},togglePanel:function(){this.hasToggledPanel||(this.hasToggledPanel=!0);var t=this;if(this.loadIframe(),this.$el.toggleClass("wpnt-stayopen"),this.$el.toggleClass("wpnt-show"),this.showingPanel=this.$el.hasClass("wpnt-show"),e(".ab-active").removeClass("ab-active"),this.showingPanel){var n=this.$(".wpn-unread");n.length&&n.removeClass("wpn-unread").addClass("wpn-read"),this.reportIframeDelay(),this.hasUnseen?wpNotesCommon.bumpStat("notes-menu-clicks","non-zero"):wpNotesCommon.bumpStat("notes-menu-clicks","zero"),this.hasUnseen=!1}this.postMessage({action:"togglePanel",showing:this.showingPanel});var s=function(e){null===e.contentWindow?e.addEventListener("load",function(){e.contentWindow.focus()}):e.contentWindow.focus()};this.showingPanel?s(this.iframe[0]):window.focus(),this.setActive(this.showingPanel)},setActive:function(t){t?(this.currentMasterbarActive=e(".masterbar li.active"),this.currentMasterbarActive.removeClass("active"),this.$el.addClass("active")):(this.$el.removeClass("active"),this.currentMasterbarActive.addClass("active"),this.currentMasterbarActive=!1),this.$el.find("a").first().blur()},loadIframe:function(){var t=this,n=[],l,m,p,h;null===t.iframe&&(t.panel.addClass("loadingIframe"),t.isJetpack&&(n.push("jetpack=true"),t.linkAccountsURL&&n.push("link_accounts_url="+escape(t.linkAccountsURL))),("ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch)&&t.panel.addClass("touch"),h="rtl"==e("#"+d).attr("dir"),m=e("#"+d).attr("lang")||"en",n.push("v="+s),n.push("locale="+m),p=n.length?"?"+n.join("&"):"",l=a,"2"!=i||!t.isRtl&&!h||/rtl.html$/.test(a)||(l=a+"rtl.html"),l=l+p+"#"+document.location.toString(),"rtl"==e("#"+d).attr("dir")&&(l+="&rtl=1"),m.match(/^en/)||(l+="&lang="+m),t.iframe=e('<iframe style="display:none" id="'+u+'" frameborder=0 ALLOWTRANSPARENCY="true" scrolling="'+o+'"></iframe>'),t.iframe.attr("src",l),r&&(t.panel.addClass("wide"),t.iframe.addClass("wide")),c&&t.iframe.addClass("wpnt-is-beta"),t.panel.append(t.iframe))},reportIframeDelay:function(){if(!this.iframeWindow)return void(this.iframeSpinnerShown||(this.iframeSpinnerShown=(new Date).getTime()));if(null!==this.iframeSpinnerShown){var e=0;this.iframeSpinnerShown&&(e=(new Date).getTime()-this.iframeSpinnerShown),0===e?wpNotesCommon.bumpStat("notes_iframe_perceived_delay","0"):e<1e3?wpNotesCommon.bumpStat("notes_iframe_perceived_delay","0-1"):e<2e3?wpNotesCommon.bumpStat("notes_iframe_perceived_delay","1-2"):e<4e3?wpNotesCommon.bumpStat("notes_iframe_perceived_delay","2-4"):e<8e3?wpNotesCommon.bumpStat("notes_iframe_perceived_delay","4-8"):wpNotesCommon.bumpStat("notes_iframe_perceived_delay","8-N"),this.iframeSpinnerShown=null}},iFrameReady:function(t){var n=this,s=document.createElement("a");s.href=this.iframe.get(0).src,this.iframeOrigin=s.protocol+"//"+s.host,this.iframeWindow=this.iframe.get(0).contentWindow,"num_new"in t&&this.render(t.num_new,t.latest_type),this.panel.removeClass("loadingIframe").find(".wpnt-notes-panel-header").remove(),this.iframe.show(),this.showingPanel&&this.reportIframeDelay(),e(window).on("focus keydown mousemove scroll",function(){var e=(new Date).getTime();(!n.lastActivityRefresh||n.lastActivityRefresh<e-5e3)&&(n.lastActivityRefresh=e,n.postMessage({action:"refreshNotes"}))}),this.sendQueuedMessages()},hidePanel:function(){this.showingPanel&&this.togglePanel()},postMessage:function(e){var t=this;try{var n="string"==typeof e?JSON.parse(e):e;if(!_.isObject(n))return;n=_.extend({type:"notesIframeMessage"},n);var s=this.iframeOrigin;this.iframeWindow&&this.iframeWindow.postMessage?this.iframeWindow.postMessage(JSON.stringify(n),s):this.messageQ.push(n)}catch(e){}},sendQueuedMessages:function(){var e=this;_.forEach(this.messageQ,function(t){e.postMessage(t)}),this.messageQ=[]}});e(function(){0==e("#wpnt-notes-panel").length&&e("#wpnt-notes-panel2").length&&"undefined"!=typeof wpNotesIsJetpackClientV2&&wpNotesIsJetpackClientV2&&(a="https://widgets.wp.com/notifications/",i="2",o="yes",r=!0),d="wpnt-notes-panel"+i,u="wpnt-notes-iframe"+i,new m})}(jQuery);