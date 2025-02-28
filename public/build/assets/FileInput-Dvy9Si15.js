import{_ as u}from"./_plugin-vue_export-helper-DlAUqK2U.js";import{e as n,o as l,a,q as m,b as d,g as p,t as c}from"./app-D2nUxda5.js";function h(t,e){return l(),n("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor","aria-hidden":"true","data-slot":"icon"},[a("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13"})])}const f={name:"FileInput",props:{modelValue:[File,Object],accept:String},components:{PaperClipIcon:h},emits:["update:modelValue"],watch:{value(t){t||(this.$refs.file.value="")}},methods:{filesize(t){var e=Math.floor(Math.log(t)/Math.log(1024));return(t/Math.pow(1024,e)).toFixed(2)*1+" "+["B","kB","MB","GB","TB"][e]},browse(){this.$refs.file.click()},change(t){this.$emit("update:modelValue",t.target.files[0])},remove(){this.$emit("update:modelValue",null)}}},g={class:"border border-gray-300 rounded-md shadow-sm p-2"},x=["accept"],b={key:0},v={key:1,class:"flex items-center justify-between"},_={class:"flex-1 ml-2 pr-1"},w={class:"text-gray-500 text-xs"};function y(t,e,r,k,V,o){const i=m("PaperClipIcon");return l(),n("div",g,[a("input",{ref:"file",accept:r.accept,class:"hidden",type:"file",onChange:e[0]||(e[0]=(...s)=>o.change&&o.change(...s))},null,40,x),r.modelValue?(l(),n("div",v,[d(i,{class:"h-5 w-5 text-gray-400","aria-hidden":"true"}),a("div",_,[p(c(r.modelValue.name)+" ",1),a("span",w,"("+c(o.filesize(r.modelValue.size))+")",1)]),a("button",{class:"px-4 py-1 bg-gray-800 hover:bg-gray-700 rounded-md font-semibold text-xs text-white uppercase",type:"button",onClick:e[2]||(e[2]=(...s)=>o.remove&&o.remove(...s))}," Remove ")])):(l(),n("div",b,[a("button",{class:"flex px-4 p-2 bg-gray-800 hover:bg-gray-700 rounded-md font-semibold text-xs text-white uppercase",type:"button",onClick:e[1]||(e[1]=(...s)=>o.browse&&o.browse(...s))},[d(i,{class:"h-4 text-gray-400 mr-2","aria-hidden":"true"}),e[3]||(e[3]=a("span",null,"Durchsuchen",-1))])]))])}const F=u(f,[["render",y]]);export{F,h as r};
