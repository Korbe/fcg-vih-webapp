import{E as v,d as i,U as m,e as r,o as n,f as u,n as c,a as s,t as p,i as w}from"./app-D2nUxda5.js";const g={class:"max-w-screen-xl mx-auto py-2 px-3 sm:px-6 lg:px-8"},x={class:"flex items-center justify-between flex-wrap"},f={class:"w-0 flex-1 flex items-center min-w-0"},h={key:0,class:"size-5 text-white",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},k={key:1,class:"size-5 text-white",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},b={class:"ms-3 font-medium text-sm text-white truncate"},_={class:"shrink-0 sm:ms-3"},M={__name:"Banner",setup(y){const d=v(),o=i(!0),t=i("success"),a=i("");return m(async()=>{var l,e;t.value=((l=d.props.jetstream.flash)==null?void 0:l.bannerStyle)||"success",a.value=((e=d.props.jetstream.flash)==null?void 0:e.banner)||"",o.value=!0}),(l,e)=>(n(),r("div",null,[o.value&&a.value?(n(),r("div",{key:0,class:c({"bg-brand-primary":t.value=="success","bg-red-700":t.value=="danger"})},[s("div",g,[s("div",x,[s("div",f,[s("span",{class:c(["flex p-2 rounded-lg",{"bg-brand-primary-600":t.value=="success","bg-red-600":t.value=="danger"}])},[t.value=="success"?(n(),r("svg",h,e[1]||(e[1]=[s("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"},null,-1)]))):u("",!0),t.value=="danger"?(n(),r("svg",k,e[2]||(e[2]=[s("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"},null,-1)]))):u("",!0)],2),s("p",b,p(a.value),1)]),s("div",_,[s("button",{type:"button",class:c(["-me-1 flex p-2 rounded-md focus:outline-none sm:-me-2 transition",{"hover:bg-brand-primary-600 focus:bg-brand-primary-600":t.value=="success","hover:bg-red-600 focus:bg-red-600":t.value=="danger"}]),"aria-label":"Dismiss",onClick:e[0]||(e[0]=w(z=>o.value=!1,["prevent"]))},e[3]||(e[3]=[s("svg",{class:"size-5 text-white",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[s("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M6 18L18 6M6 6l12 12"})],-1)]),2)])])])],2)):u("",!0)]))}};export{M as _};
