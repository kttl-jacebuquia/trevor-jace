(this.webpackJsonptrevor=this.webpackJsonptrevor||[]).push([[8],{1:function(n,e){n.exports=jQuery},138:function(n,e,t){"use strict";t.r(e);var i=t(1),s=t.n(i),a=t(2),r=t(4),o=function(){function n(e){var t=this;Object(a.a)(this,n),this.handleCloseClick=function(n){n.preventDefault(),sessionStorage.setItem(t.sessionName,Date.now()),t.remove()},this.$container=s()("#siteBannerContainer"),this.$banner=null,this.bannerObj=e,this.sessionName="sessionBannerObj-".concat(this.bannerObj.id),this.isClosed()||(this.build(),this.insert())}return Object(r.a)(n,[{key:"insert",value:function(){"custom"===this.$banner.data("type")?this.$banner.prependTo(this.$container):this.$banner.appendTo(this.$container)}},{key:"build",value:function(){var n=this.bannerObj;this.$banner=s()("<div/>",{class:"site-banner__".concat(n.type),id:"site-banner-".concat(n.id),"data-type":n.type,"data-id":n.id});var e=s()("<div class='site-banner__container'><i class='site-banner__warning'></i></div>").appendTo(this.$banner),t=s()("<p class='site-banner__text'></p>").appendTo(e);s()("<span/>",{class:"site-banner__title",text:"".concat(n.title," ")}).appendTo(t),s()("<span/>",{class:"site-banner__description",text:n.desc}).appendTo(t),s()("<button role='button' class='site-banner__close-btn'><i class='trevor-ti-x'></i></button>").on("click",this.handleCloseClick).appendTo(e)}},{key:"isClosed",value:function(){return Object.keys(sessionStorage).includes(this.sessionName)}},{key:"remove",value:function(){this.$banner.remove()}}]),n}();window.trevorWP=window.trevorWP||{},window.trevorWP.siteBanners=function(){s.a.get("/wp-admin/admin-ajax.php?action=trevor-site-banners").then((function(n){n.success&&n.banners.forEach((function(n){return new o(n)}))}))}},2:function(n,e,t){"use strict";function i(n,e){if(!(n instanceof e))throw new TypeError("Cannot call a class as a function")}t.d(e,"a",(function(){return i}))},4:function(n,e,t){"use strict";function i(n,e){for(var t=0;t<e.length;t++){var i=e[t];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(n,i.key,i)}}function s(n,e,t){return e&&i(n.prototype,e),t&&i(n,t),n}t.d(e,"a",(function(){return s}))}},[[138,0]]]);
//# sourceMappingURL=site-banners.js.map