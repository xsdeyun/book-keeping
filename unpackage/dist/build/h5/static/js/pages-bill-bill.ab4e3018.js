(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-bill-bill"],{"08e4":function(t,i,n){"use strict";var a=n("9656"),e=n.n(a);e.a},"24dc":function(t,i,n){"use strict";var a;n.d(i,"b",(function(){return e})),n.d(i,"c",(function(){return s})),n.d(i,"a",(function(){return a}));var e=function(){var t=this,i=t.$createElement,n=t._self._c||i;return n("v-uni-view",[n("v-uni-view",{staticClass:"list"},[n("v-uni-view",{staticClass:"item-list"},[n("v-uni-view",{staticClass:"item-list-title"},[t._v(t._s(t.data.time)),n("v-uni-text",[t._v(t._s(1==t.data.type?"支":"收"))]),t._v(t._s(t.data.account))],1),n("v-uni-view",{staticClass:"item-list-cont flex justify-between"},[n("v-uni-view",{staticClass:"item-list-icon flex justify-start"},[n("v-uni-view",{staticClass:"item-list-icon-image"},[n("v-uni-image",{attrs:{src:t.data.icon}})],1),n("v-uni-view",{staticClass:"item-list-icon-title"},[t._v(t._s(t.data.title))])],1),n("v-uni-view",{staticClass:"item-list-money"},[t._v(t._s(t.data.money))])],1),n("v-uni-view",{staticClass:"item-list-notice"},[t._v(t._s(t.data.remarks))])],1)],1)],1)},s=[]},"6da2":function(t,i,n){var a=n("24fb");i=a(!1),i.push([t.i,"\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n/* 列表 */.list[data-v-01bc40d4]{max-height:500px;overflow-y:auto;padding-bottom:50px}.item-list[data-v-01bc40d4]{width:90%;background:#e8eef6;box-shadow:8px 8px 16px #ccd1d8,-8px -8px 16px #fff;border-radius:15px;margin-left:5%;margin-top:20px;padding:10px}.item-list-cont[data-v-01bc40d4]{line-height:60px}.item-list-title[data-v-01bc40d4]{margin-left:10px;font-weight:700}.item-list-title uni-text[data-v-01bc40d4]{display:inline-block;width:20px;height:20px;line-height:20px;border-radius:50%;background-color:#007aff;text-align:center;color:#fff;margin-left:10px;font-size:12px;margin-right:10px}.item-list-icon[data-v-01bc40d4]{margin-top:10px;line-height:50px}.item-list-icon-image[data-v-01bc40d4]{width:50px;height:50px;background:#fff;border-radius:50%;display:flex;justify-content:center;align-items:center}.item-list-icon-image uni-image[data-v-01bc40d4]{width:40px;height:40px}.item-list-icon-title[data-v-01bc40d4]{margin-left:20px;font-weight:700}.item-list-money[data-v-01bc40d4]{margin-right:20px;font-size:18px\n}.item-list-notice[data-v-01bc40d4]{width:100%;padding:10px;margin-top:5px;word-break:break-all}",""]),t.exports=i},"7c9d":function(t,i,n){"use strict";n.r(i);var a=n("24dc"),e=n("f355");for(var s in e)"default"!==s&&function(t){n.d(i,t,(function(){return e[t]}))}(s);n("08e4");var d,c=n("f0c5"),o=Object(c["a"])(e["default"],a["b"],a["c"],!1,null,"01bc40d4",null,!1,a["a"],d);i["default"]=o.exports},9656:function(t,i,n){var a=n("6da2");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var e=n("4f06").default;e("5a54fab8",a,!0,{sourceMap:!1,shadowMode:!1})},"9a94":function(t,i,n){"use strict";Object.defineProperty(i,"__esModule",{value:!0}),i.default=void 0;var a={data:function(){return{data:{}}},onLoad:function(t){this.onload(t.id)},methods:{onload:function(t){var i=this;this.$request.request("/api.php/Record/details",{id:t},"get").then((function(t){i.data=t.data})).catch((function(t){}))}}};i.default=a},f355:function(t,i,n){"use strict";n.r(i);var a=n("9a94"),e=n.n(a);for(var s in a)"default"!==s&&function(t){n.d(i,t,(function(){return a[t]}))}(s);i["default"]=e.a}}]);