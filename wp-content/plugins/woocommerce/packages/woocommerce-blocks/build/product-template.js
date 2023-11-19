(()=>{var e,t={6012:(e,t,o)=>{"use strict";o.r(t);const r=window.wp.blocks,n=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"woocommerce/product-template","title":"Product Template","category":"woocommerce","description":"Contains the block elements used to render a product.","keywords":["WooCommerce"],"textdomain":"woocommerce","usesContext":["queryId","query","queryContext","displayLayout","templateSlug"],"supports":{"inserter":false,"reusable":false,"html":false,"align":["wide","full"],"anchor":true,"__experimentalLayout":{"allowEditing":false},"color":{"gradients":true,"link":true,"__experimentalDefaultControls":{"background":true,"text":true}},"typography":{"fontSize":true,"lineHeight":true,"__experimentalFontFamily":true,"__experimentalFontWeight":true,"__experimentalFontStyle":true,"__experimentalTextTransform":true,"__experimentalTextDecoration":true,"__experimentalLetterSpacing":true,"__experimentalDefaultControls":{"fontSize":true}}}}');var l=o(9196),s=o(4184),a=o.n(s),c=o(9307);const i=window.wp.data;var u=o(5736);const p=window.wp.blockEditor,d=window.wp.components,m=window.wp.coreData,w=window.wc.wcSettings,g=e=>"number"==typeof e,b=()=>{const e=(0,p.useInnerBlocksProps)({className:"wc-block-product"},{__unstableDisableLayoutClassNames:!0});return(0,l.createElement)("li",{...e})},y=(0,c.memo)((({blocks:e,blockContextId:t,isHidden:o,setActiveBlockContextId:r})=>{const n=(0,p.__experimentalUseBlockPreview)({blocks:e,props:{className:"wc-block-product"}}),s=()=>{r(t)},a={display:o?"none":void 0};return(0,l.createElement)("li",{...n,tabIndex:0,role:"button",onClick:s,onKeyPress:s,style:a})}));o(5500),(0,r.registerBlockType)(n,{icon:()=>(0,l.createElement)("svg",{width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",xmlns:"http://www.w3.org/2000/svg"},(0,l.createElement)("path",{fillRule:"evenodd",clipRule:"evenodd",d:"M6 4H18C19.1046 4 20 4.89543 20 6V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4ZM18 5.5H6C5.72386 5.5 5.5 5.72386 5.5 6V9H18.5V6C18.5 5.72386 18.2761 5.5 18 5.5ZM18.5 10.5H10L10 18.5H18C18.2761 18.5 18.5 18.2761 18.5 18V10.5ZM8.5 10.5H5.5V18C5.5 18.2761 5.72386 18.5 6 18.5H8.5L8.5 10.5Z",fill:"#1E1E1E"})),edit:({clientId:e,context:{query:{perPage:t,offset:o=0,order:r,orderBy:n,author:s,search:v,exclude:f,inherit:k,taxQuery:x,pages:h,..._},queryContext:C=[{page:1}],templateSlug:E,displayLayout:{type:S,columns:O,shrinkColumns:I}={type:"flex",columns:3,shrinkColumns:!1}},__unstableLayoutClassNames:B})=>{const[{page:P}]=C,[j,H]=(0,c.useState)(),T="product",L=(0,w.getSettingWithCoercion)("loopShopPerPage",12,g),{products:M,blocks:N}=(0,i.useSelect)((l=>{const{getEntityRecords:a,getTaxonomies:c}=l(m.store),{getBlocks:i}=l(p.store),u=c({type:T,per_page:-1,context:"view"}),d=k&&(null==E?void 0:E.startsWith("category-"))&&a("taxonomy","category",{context:"view",per_page:1,_fields:["id"],slug:E.replace("category-","")}),w={postType:T,offset:t?t*(P-1)+o:0,order:r,orderby:n};if(x&&!k){const e=Object.entries(x).reduce(((e,[t,o])=>{const r=null==u?void 0:u.find((({slug:e})=>e===t));return null!=r&&r.rest_base&&(e[null==r?void 0:r.rest_base]=o),e}),{});Object.keys(e).length&&Object.assign(w,e)}var g;(t&&(w.per_page=t),s&&(w.author=s),v&&(w.search=v),null!=f&&f.length&&(w.exclude=f),k)&&(d&&(w.categories=null===(g=d[0])||void 0===g?void 0:g.id),w.per_page=L);return{products:a("postType",T,{...w,..._}),blocks:i(e)}}),[t,P,o,r,n,e,s,v,T,f,k,E,x,_]),V=(0,c.useMemo)((()=>null==M?void 0:M.map((e=>({postType:e.type,postId:e.id})))),[M]);let W="";"flex"===S&&O>1&&(W=I?`wc-block-product-template__responsive columns-${O}`:`is-flex-container columns-${O}`);const q=(0,p.useBlockProps)({className:a()(B,"wc-block-product-template",W)});return M?M.length?(0,l.createElement)("ul",{...q},V&&V.map((e=>{var t,o;return(0,l.createElement)(p.BlockContextProvider,{key:e.postId,value:e},e.postId===(j||(null===(t=V[0])||void 0===t?void 0:t.postId))?(0,l.createElement)(b,null):null,(0,l.createElement)(y,{blocks:N,blockContextId:e.postId,setActiveBlockContextId:H,isHidden:e.postId===(j||(null===(o=V[0])||void 0===o?void 0:o.postId))}))}))):(0,l.createElement)("p",{...q}," ",(0,u.__)("No results found.","woocommerce")):(0,l.createElement)("p",{...q},(0,l.createElement)(d.Spinner,null))},save:function(){return(0,l.createElement)(p.InnerBlocks.Content,null)}})},5500:()=>{},9196:e=>{"use strict";e.exports=window.React},9307:e=>{"use strict";e.exports=window.wp.element},5736:e=>{"use strict";e.exports=window.wp.i18n}},o={};function r(e){var n=o[e];if(void 0!==n)return n.exports;var l=o[e]={exports:{}};return t[e].call(l.exports,l,l.exports,r),l.exports}r.m=t,e=[],r.O=(t,o,n,l)=>{if(!o){var s=1/0;for(u=0;u<e.length;u++){for(var[o,n,l]=e[u],a=!0,c=0;c<o.length;c++)(!1&l||s>=l)&&Object.keys(r.O).every((e=>r.O[e](o[c])))?o.splice(c--,1):(a=!1,l<s&&(s=l));if(a){e.splice(u--,1);var i=n();void 0!==i&&(t=i)}}return t}l=l||0;for(var u=e.length;u>0&&e[u-1][2]>l;u--)e[u]=e[u-1];e[u]=[o,n,l]},r.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return r.d(t,{a:t}),t},r.d=(e,t)=>{for(var o in t)r.o(t,o)&&!r.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.j=8538,(()=>{var e={8538:0};r.O.j=t=>0===e[t];var t=(t,o)=>{var n,l,[s,a,c]=o,i=0;if(s.some((t=>0!==e[t]))){for(n in a)r.o(a,n)&&(r.m[n]=a[n]);if(c)var u=c(r)}for(t&&t(o);i<s.length;i++)l=s[i],r.o(e,l)&&e[l]&&e[l][0](),e[l]=0;return r.O(u)},o=self.webpackChunkwebpackWcBlocksJsonp=self.webpackChunkwebpackWcBlocksJsonp||[];o.forEach(t.bind(null,0)),o.push=t.bind(null,o.push.bind(o))})();var n=r.O(void 0,[2869],(()=>r(6012)));n=r.O(n),((this.wc=this.wc||{}).blocks=this.wc.blocks||{})["product-template"]=n})();