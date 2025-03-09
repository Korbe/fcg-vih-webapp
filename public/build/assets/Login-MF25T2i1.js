import{C as x,e as c,o as n,b as a,a as s,u as t,m as _,w as o,g as d,P as u,f,t as v,i as h,c as y,n as k,F as V}from"./app-BKOQ3oKr.js";import{_ as B}from"./Checkbox-dCc9tbdi.js";import{_ as p}from"./InputError-DbZHnygg.js";import{_ as g}from"./InputLabel-Brf5nw8R.js";import{_ as P}from"./PrimaryButton-BPfE3GZH.js";import{_ as w}from"./TextInput-CYvoZA-4.js";import{r as j}from"./ArrowLeftIcon-CtVlV1ak.js";const C={class:"min-h-screen flex flex-col md:flex-row"},$={class:"w-full h-screen md:w-2/3 bg-white flex flex-col relative"},F={class:"flex-grow flex justify-center items-center"},N={class:"w-full max-w-md"},q={key:0,class:"mb-4 font-medium text-sm text-green-600"},S={class:"flex justify-center mb-10"},U={class:"mt-4"},z={class:"block mt-4"},A={class:"flex items-center"},E={class:"flex items-center justify-end mt-4"},H={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(m){const l=x({email:"",password:"",remember:!1}),b=()=>{l.transform(i=>({...i,remember:l.remember?"on":""})).post(route("login"),{onFinish:()=>l.reset("password")})};return(i,e)=>(n(),c(V,null,[a(t(_),{title:"Log in"}),s("div",C,[e[8]||(e[8]=s("div",{class:"w-full h-40 md:w-1/3 md:h-screen"},[s("img",{src:"/images/auth/church.jpeg",alt:"Bildbeschreibung",class:"object-cover w-full h-full"})],-1)),s("div",$,[a(t(u),{href:"/",class:"absolute top-4 left-4 flex items-center text-gray-900"},{default:o(()=>[a(t(j),{class:"h-5 w-5 mr-2"}),e[3]||(e[3]=d(" Zurück "))]),_:1}),s("div",F,[s("div",N,[m.status?(n(),c("div",q,v(m.status),1)):f("",!0),s("div",S,[a(t(u),{href:"/",class:"text-center"},{default:o(()=>e[4]||(e[4]=[s("img",{loading:"lazy",alt:"FCG Villach",class:"h-20",src:"/images/fcg-villach-logo-minimal.png"},null,-1)])),_:1})]),s("form",{onSubmit:h(b,["prevent"]),class:"p-5"},[s("div",null,[a(g,{for:"email",value:"Email"}),a(w,{id:"email",modelValue:t(l).email,"onUpdate:modelValue":e[0]||(e[0]=r=>t(l).email=r),type:"email",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),a(p,{class:"mt-2",message:t(l).errors.email},null,8,["message"])]),s("div",U,[a(g,{for:"password",value:"Passwort"}),a(w,{id:"password",modelValue:t(l).password,"onUpdate:modelValue":e[1]||(e[1]=r=>t(l).password=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password"},null,8,["modelValue"]),a(p,{class:"mt-2",message:t(l).errors.password},null,8,["message"])]),s("div",z,[s("label",A,[a(B,{checked:t(l).remember,"onUpdate:checked":e[2]||(e[2]=r=>t(l).remember=r),name:"remember"},null,8,["checked"]),e[5]||(e[5]=s("span",{class:"ms-2 text-sm text-gray-600"},"Angemeldet bleiben",-1))])]),s("div",E,[m.canResetPassword?(n(),y(t(u),{key:0,href:i.route("password.request"),class:"text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-primary-500"},{default:o(()=>e[6]||(e[6]=[d(" Passwort vergessen? ")])),_:1},8,["href"])):f("",!0),a(P,{class:k(["ms-4",{"opacity-25":t(l).processing}]),disabled:t(l).processing},{default:o(()=>e[7]||(e[7]=[d(" Anmelden ")])),_:1},8,["class","disabled"])])],32)])])])])],64))}};export{H as default};
//# sourceMappingURL=Login-MF25T2i1.js.map
