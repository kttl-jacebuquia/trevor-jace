(this.webpackJsonptrevor=this.webpackJsonptrevor||[]).push([[9],{1:function(e,n){e.exports=jQuery},141:function(e,n,t){"use strict";t.r(n);var i=t(1),s=t.n(i),a=t(3),r=t(4),o=function(){function e(n){var t=this;Object(a.a)(this,e),this.handleCloseClick=function(e){e.preventDefault(),sessionStorage.setItem(t.sessionName,Date.now()),t.remove(),t.updateSiteBannerCSSvariable()},this.$container=s()("#siteBannerContainer"),this.$banner=null,this.bannerObj=n,this.sessionName="sessionBannerObj-".concat(this.bannerObj.id),this.containerHeight=0,this.isClosed()||(this.build(),this.insert())}return Object(r.a)(e,[{key:"insert",value:function(){"custom"===this.$banner.data("type")?this.$banner.prependTo(this.$container):this.$banner.appendTo(this.$container),this.updateSiteBannerCSSvariable()}},{key:"build",value:function(){var e=this.bannerObj;this.$banner=s()("<div/>",{class:"site-banner__".concat(e.type),id:"site-banner-".concat(e.id),"data-type":e.type,"data-id":e.id});var n=s()("<div class='site-banner__container'><i class='site-banner__warning'></i></div>").appendTo(this.$banner),t=s()("<p class='site-banner__text'></p>").appendTo(n);s()("<span/>",{class:"site-banner__title",text:"".concat(e.title," ")}).appendTo(t),s()("<span/>",{class:"site-banner__description",text:e.desc}).appendTo(t),s()("<button role='button' class='site-banner__close-btn'><i class='trevor-ti-x text-indigo'></i></button>").on("click",this.handleCloseClick).appendTo(n)}},{key:"isClosed",value:function(){return Object.keys(sessionStorage).includes(this.sessionName)}},{key:"remove",value:function(){this.$banner.remove()}},{key:"updateSiteBannerCSSvariable",value:function(){var e=document.documentElement;this.containerHeight=this.$container.height(),e.style.setProperty("--site-banner-height","".concat(this.containerHeight,"px"))}}]),e}();window.trevorWP=window.trevorWP||{},window.trevorWP.siteBanners=function(){s.a.get("/wp-json/trevor/v1/site-banners").then((function(e){e.success&&e.banners.forEach((function(e){return new o(e)}))}))}},3:function(e,n,t){"use strict";function i(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}t.d(n,"a",(function(){return i}))},4:function(e,n,t){"use strict";function i(e,n){for(var t=0;t<n.length;t++){var i=n[t];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}function s(e,n,t){return n&&i(e.prototype,n),t&&i(e,t),e}t.d(n,"a",(function(){return s}))}},[[141,0]]]);
//# sourceMappingURL=site-banners.js.map