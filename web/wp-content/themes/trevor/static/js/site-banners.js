(this.webpackJsonptrevor=this.webpackJsonptrevor||[]).push([[8],{1:function(n,e){n.exports=jQuery},138:function(n,e,t){"use strict";t.r(e);var s=t(1),i=t.n(s),a=t(2),r=t(4),o=function(){function n(e){var t=this;Object(a.a)(this,n),this.handleCloseClick=function(n){n.preventDefault(),sessionStorage.setItem(t.sessionName,Date.now()),t.remove()},this.$container=i()("#siteBannerContainer"),this.$banner=null,this.bannerObj=e,this.sessionName="sessionBannerObj-".concat(this.bannerObj.id),this.isClosed()||(this.build(),this.insert())}return Object(r.a)(n,[{key:"insert",value:function(){"custom"===this.$banner.data("type")?this.$banner.prependTo(this.$container):this.$banner.appendTo(this.$container)}},{key:"build",value:function(){var n=this.bannerObj;this.$banner=i()("<div/>",{class:"site-banner__".concat(n.type),id:"site-banner-".concat(n.id),"data-type":n.type,"data-id":n.id});var e=i()("<div class='site-banner__container'><i class='site-banner__warning'></i></div>").appendTo(this.$banner),t=i()("<p class='site-banner__text'></p>").appendTo(e);i()("<span/>",{class:"site-banner__title",text:"".concat(n.title," ")}).appendTo(t),i()("<span/>",{class:"site-banner__description",text:n.desc}).appendTo(t),i()("<button role='button' class='site-banner__close-btn'><i class='trevor-ti-x'></i></button>").on("click",this.handleCloseClick).appendTo(e)}},{key:"isClosed",value:function(){return Object.keys(sessionStorage).includes(this.sessionName)}},{key:"remove",value:function(){this.$banner.remove()}}]),n}();window.trevorWP=window.trevorWP||{},window.trevorWP.siteBanners=function(){i.a.get("/wp-json/trevor/v1/site-banners").then((function(n){n.success&&n.banners.forEach((function(n){return new o(n)}))}))}},2:function(n,e,t){"use strict";function s(n,e){if(!(n instanceof e))throw new TypeError("Cannot call a class as a function")}t.d(e,"a",(function(){return s}))},4:function(n,e,t){"use strict";function s(n,e){for(var t=0;t<e.length;t++){var s=e[t];s.enumerable=s.enumerable||!1,s.configurable=!0,"value"in s&&(s.writable=!0),Object.defineProperty(n,s.key,s)}}function i(n,e,t){return e&&s(n.prototype,e),t&&s(n,t),n}t.d(e,"a",(function(){return i}))}},[[138,0]]]);
//# sourceMappingURL=site-banners.js.map