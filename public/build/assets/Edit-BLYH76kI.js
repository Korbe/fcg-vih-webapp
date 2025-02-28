import{_ as w}from"./AppLayout-BILqpFTa.js";import{J as k,a as F}from"./Input-DXZHpb43.js";import{_ as A}from"./InputError-B-6EK9vL.js";import{J as V}from"./Button-FfNiB3Cm.js";import{_ as P}from"./DangerButton-eHgmSkGh.js";import{r as j,F as L}from"./FileInput-Dvy9Si15.js";import{q as m,c as C,o as l,w as d,a as s,i as g,k as u,b as r,x as p,g as c,e as b,f as x}from"./app-D2nUxda5.js";import{_ as J}from"./_plugin-vue_export-helper-DlAUqK2U.js";import"./Banner-CrJVuffU.js";const U={metaInfo:{title:"Create Post"},components:{FileInput:L,JetDangerButton:P,JetButton:V,JetInput:F,JetInputError:A,JetLabel:k,AppLayout:w,PaperClipIcon:j},props:{post:Object},data(){return{form:this.$inertia.form({title:this.post.title,author:this.post.author,published_at:this.post.published_at}),audioForm:this.$inertia.form({audio:this.post.audio}),audio_url:null}},watch:{"audioForm.audio"(n){this.audio_url=null;let t=window.URL||window.webkitURL;n&&t&&(this.audio_url=t.createObjectURL(n))}},methods:{updatePost(){this.form.put(route("dashboard.posts.update",this.post.id))},deletePost(){this.form.delete(route("dashboard.posts.destroy",this.post.id))},updateAttachment(){this.audioForm.post(route("dashboard.posts.audio",this.post.id))}}},B={class:"py-12"},I={class:"max-w-3xl mx-auto sm:px-6 lg:px-8"},E={class:"bg-white overflow-hidden shadow-xl sm:rounded-lg"},N={class:"space-y-8 divide-y divide-gray-200 sm:space-y-5"},S={class:"p-6"},R={class:"space-y-6 sm:space-y-5"},T={class:"sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5"},D={class:"mt-1 sm:mt-0 sm:col-span-2"},M={class:"sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"},O={class:"mt-1 sm:mt-0 sm:col-span-2"},q={class:"sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"},z={class:"mt-1 sm:mt-0 sm:col-span-2"},G={class:"sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"},H={class:"mt-1 sm:mt-0 sm:col-span-2"},K=["value"],Q={class:"sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"},W={class:"mt-1 sm:mt-0 sm:col-span-2"},X=["value"],Y={class:"bg-gray-200 bg-opacity-25 flex flex-row-reverse"},Z={class:"p-6 space-x-4"},$={class:"mt-5 bg-white overflow-hidden shadow-xl sm:rounded-lg"},ss={class:"space-y-8 divide-y divide-gray-200 sm:space-y-5"},ts={class:"p-6"},os={class:"space-y-6 sm:space-y-5"},es={class:"sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5"},rs={class:"mt-1 sm:mt-0 sm:col-span-2"},is={key:0,class:"sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"},ms={class:"mt-1 sm:mt-0 sm:col-span-2"},ds=["src"],as=["src"],ls={class:"bg-gray-200 bg-opacity-25 flex flex-row-reverse"},ns={class:"p-6 space-x-4"};function us(n,t,_,ps,o,i){const a=m("jet-input-error"),y=m("jet-danger-button"),f=m("jet-button"),h=m("file-input"),v=m("AppLayout");return l(),C(v,{title:"Predigt bearbeiten"},{header:d(()=>t[6]||(t[6]=[s("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Predigt ändern ",-1)])),default:d(()=>[s("div",B,[s("div",I,[s("div",E,[s("form",{onSubmit:t[3]||(t[3]=g((...e)=>i.updatePost&&i.updatePost(...e),["prevent"])),class:"space-y-8 divide-y divide-gray-200"},[s("div",N,[s("div",S,[s("div",null,[s("div",R,[s("div",T,[t[7]||(t[7]=s("label",{for:"title",class:"block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"}," Titel ",-1)),s("div",D,[u(s("input",{"onUpdate:modelValue":t[0]||(t[0]=e=>o.form.title=e),type:"text",name:"title",id:"title",class:"max-w-lg block w-full shadow-sm focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm border-gray-300 rounded-md"},null,512),[[p,o.form.title]]),r(a,{message:o.form.errors.title,class:"mt-2"},null,8,["message"])])]),s("div",M,[t[8]||(t[8]=s("label",{for:"author",class:"block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"}," Author ",-1)),s("div",O,[u(s("input",{"onUpdate:modelValue":t[1]||(t[1]=e=>o.form.author=e),type:"text",name:"author",id:"author",class:"max-w-lg block w-full shadow-sm focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm border-gray-300 rounded-md"},null,512),[[p,o.form.author]]),r(a,{message:o.form.errors.author,class:"mt-2"},null,8,["message"])])]),s("div",q,[t[9]||(t[9]=s("label",{for:"published_at",class:"block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"}," Veröffentlicht ",-1)),s("div",z,[u(s("input",{"onUpdate:modelValue":t[2]||(t[2]=e=>o.form.published_at=e),id:"published_at",name:"published_at",type:"datetime-local",class:"max-w-lg block w-full shadow-sm focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm border-gray-300 rounded-md"},null,512),[[p,o.form.published_at]]),r(a,{message:o.form.errors.published_at,class:"mt-2"},null,8,["message"])])]),s("div",G,[t[10]||(t[10]=s("label",{for:"published_at",class:"block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"}," Erstellt ",-1)),s("div",H,[s("input",{disabled:"",value:_.post.created_at,name:"created_at",type:"datetime-local",class:"max-w-lg block w-full shadow-sm focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm border-gray-300 rounded-md"},null,8,K)])]),s("div",Q,[t[11]||(t[11]=s("label",{for:"published_at",class:"block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"}," Aktualisiert ",-1)),s("div",W,[s("input",{disabled:"",value:_.post.updated_at,name:"updated_at",type:"datetime-local",class:"max-w-lg block w-full shadow-sm focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm border-gray-300 rounded-md"},null,8,X)])])])])]),s("div",Y,[s("div",Z,[r(y,{disabled:o.form.processing,type:"button",onClick:i.deletePost},{default:d(()=>t[12]||(t[12]=[c("Löschen")])),_:1},8,["disabled","onClick"]),r(f,{disabled:o.form.processing},{default:d(()=>t[13]||(t[13]=[c("Speichern")])),_:1},8,["disabled"])])])])],32)]),s("div",$,[s("form",{onSubmit:t[5]||(t[5]=g((...e)=>i.updateAttachment&&i.updateAttachment(...e),["prevent"])),class:"space-y-8 divide-y divide-gray-200"},[s("div",ss,[s("div",ts,[s("div",null,[s("div",os,[s("div",es,[t[14]||(t[14]=s("label",{for:"published_at",class:"block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"}," Aufnahme ",-1)),s("div",rs,[r(h,{modelValue:o.audioForm.audio,"onUpdate:modelValue":t[4]||(t[4]=e=>o.audioForm.audio=e),error:o.audioForm.errors.audio,accept:"audio/mp3,audio/*;capture=microphone",class:"max-w-lg block w-full focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm",type:"file"},null,8,["modelValue","error"]),r(a,{message:o.audioForm.errors.audio,class:"mt-2"},null,8,["message"])])]),o.audioForm.audio?(l(),b("div",is,[t[15]||(t[15]=s("label",{for:"published_at",class:"block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"}," Anhören ",-1)),s("div",ms,[o.audioForm.audio.original_url?(l(),b("audio",{key:0,class:"bg-white py-2",controls:"",src:o.audioForm.audio.original_url},null,8,ds)):o.audio_url?(l(),b("audio",{key:1,class:"bg-white py-2",src:o.audio_url,ref:"fileAudio",controls:""},null,8,as)):x("",!0)])])):x("",!0)])])]),s("div",ls,[s("div",ns,[r(f,{disabled:o.audioForm.processing},{default:d(()=>t[16]||(t[16]=[c("Speichern")])),_:1},8,["disabled"])])])])],32)])])])]),_:1})}const ws=J(U,[["render",us]]);export{ws as default};
