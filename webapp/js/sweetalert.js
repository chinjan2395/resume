!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):e.Sweetalert2=t()}(this,function(){"use strict";function e(){null===v.previousBodyPadding&&document.body.scrollHeight>window.innerHeight&&(v.previousBodyPadding=document.body.style.paddingRight,document.body.style.paddingRight=I()+"px")}function t(){null!==v.previousBodyPadding&&(document.body.style.paddingRight=v.previousBodyPadding,v.previousBodyPadding=null)}function n(){if(void 0===arguments[0])return console.error("SweetAlert2 expects at least 1 attribute!"),!1;var e=f({},K);switch(typeof arguments[0]){case"string":e.title=arguments[0],e.text=arguments[1]||"",e.type=arguments[2]||"";break;case"object":f(e,arguments[0]),e.extraParams=arguments[0].extraParams,"email"===e.input&&null===e.inputValidator&&(e.inputValidator=function(e){return new Promise(function(t,n){var o=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;o.test(e)?t():n("Invalid email address")})});break;default:return console.error('SweetAlert2: Unexpected type of argument! Expected "string" or "object", got '+typeof arguments[0]),!1}U(e);var t=y();return new Promise(function(n,i){function a(t,n){for(var o=x(e.focusCancel),r=0;r<o.length;r++){t+=n,t===o.length?t=0:-1===t&&(t=o.length-1);var i=o[t];if(O(i))return i.focus()}}function s(t){var n=t||window.event,r=n.keyCode||n.which;if(-1!==[9,13,32,27].indexOf(r)){for(var l=n.target||n.srcElement,s=x(e.focusCancel),c=-1,u=0;u<s.length;u++)if(l===s[u]){c=u;break}9===r?(n.shiftKey?a(c,-1):a(c,1),N(n)):13===r||32===r?-1===c&&(e.focusCancel?H(V,n):H(E,n)):27===r&&e.allowEscapeKey===!0&&(o.closeModal(e.onClose),i("esc"))}}e.timer&&(t.timeout=setTimeout(function(){o.closeModal(e.onClose),i("timer")},e.timer));var c=function(n){switch(n=n||e.input){case"select":case"textarea":case"file":return L(t,l[n]);case"checkbox":return t.querySelector("."+l.checkbox+" input");case"radio":return t.querySelector("."+l.radio+" input:checked")||t.querySelector("."+l.radio+" input:first-child");case"range":return t.querySelector("."+l.range+" input");default:return L(t,l.input)}},u=function(){var t=c();if(!t)return null;switch(e.input){case"checkbox":return t.checked?1:0;case"radio":return t.checked?t.value:null;case"file":return t.files.length?t.files[0]:null;default:return e.inputAutoTrim?t.value.trim():t.value}};e.input&&setTimeout(function(){var e=c();e&&B(e)},0);var d,f=function(t){e.showLoaderOnConfirm&&o.showLoading(),e.preConfirm?e.preConfirm(t,e.extraParams).then(function(r){o.closeModal(e.onClose),n(r||t)},function(e){o.hideLoading(),e&&o.showValidationError(e)}):(o.closeModal(e.onClose),n(t))},h=function(t){var n=t||window.event,r=n.target||n.srcElement,a=C(),l=k(),s=a===r||a.contains(r),c=l===r||l.contains(r);switch(n.type){case"mouseover":case"mouseup":e.buttonsStyling&&(s?a.style.backgroundColor=m(e.confirmButtonColor,-.1):c&&(l.style.backgroundColor=m(e.cancelButtonColor,-.1)));break;case"mouseout":e.buttonsStyling&&(s?a.style.backgroundColor=e.confirmButtonColor:c&&(l.style.backgroundColor=e.cancelButtonColor));break;case"mousedown":e.buttonsStyling&&(s?a.style.backgroundColor=m(e.confirmButtonColor,-.2):c&&(l.style.backgroundColor=m(e.cancelButtonColor,-.2)));break;case"click":if(s&&o.isVisible())if(e.input){var d=u();e.inputValidator?(o.disableInput(),e.inputValidator(d,e.extraParams).then(function(){o.enableInput(),f(d)},function(e){o.enableInput(),e&&o.showValidationError(e)})):f(d)}else f(!0);else c&&o.isVisible()&&(o.closeModal(e.onClose),i("cancel"))}},g=t.querySelectorAll("button");for(d=0;d<g.length;d++)g[d].onclick=h,g[d].onmouseover=h,g[d].onmouseout=h,g[d].onmousedown=h;S().onclick=function(){o.closeModal(e.onClose),i("close")},r.onclick=function(t){t.target===r&&e.allowOutsideClick&&(o.closeModal(e.onClose),i("overlay"))};var E=C(),V=k();e.reverseButtons?E.parentNode.insertBefore(V,E):E.parentNode.insertBefore(E,V),v.previousWindowKeyDown=window.onkeydown,window.onkeydown=s,e.buttonsStyling&&(E.style.borderLeftColor=e.confirmButtonColor,E.style.borderRightColor=e.confirmButtonColor),o.showLoading=o.enableLoading=function(){q(b()),q(E,"inline-block"),P(E,"loading"),P(t,"loading"),E.disabled=!0,V.disabled=!0},o.hideLoading=o.disableLoading=function(){e.showConfirmButton||(M(E),e.showCancelButton||M(b())),A(E,"loading"),A(t,"loading"),E.disabled=!1,V.disabled=!1},o.enableButtons=function(){E.disabled=!1,V.disabled=!1},o.disableButtons=function(){E.disabled=!0,V.disabled=!0},o.enableConfirmButton=function(){E.disabled=!1},o.disableConfirmButton=function(){E.disabled=!0},o.enableInput=function(){var e=c();if(!e)return!1;if("radio"===e.type)for(var t=e.parentNode.parentNode,n=t.querySelectorAll("input"),o=0;o<n.length;o++)n[o].disabled=!1;else e.disabled=!1},o.disableInput=function(){var e=c();if(!e)return!1;if(e&&"radio"===e.type)for(var t=e.parentNode.parentNode,n=t.querySelectorAll("input"),o=0;o<n.length;o++)n[o].disabled=!0;else e.disabled=!0},o.recalculateHeight=function(){var e=y()||o.init(),t=e.style.display;e.style.minHeight="",q(e),e.style.minHeight=e.scrollHeight+1+"px",e.style.display=t},o.showValidationError=function(e){var n=t.querySelector("."+l.validationerror);n.innerHTML=e,q(n);var o=c();B(o),P(o,"error")},o.resetValidationError=function(){var e=t.querySelector("."+l.validationerror);M(e);var n=c();n&&A(n,"error")},o.getProgressSteps=function(){return e.progressSteps},o.setProgressSteps=function(t){e.progressSteps=t,U(e)},o.showProgressSteps=function(){q(w())},o.hideProgressSteps=function(){M(w())},o.enableButtons(),o.hideLoading(),o.resetValidationError();var T,j=["input","file","range","select","radio","checkbox","textarea"];for(d=0;d<j.length;d++){var D=l[j[d]],I=L(t,D);if(T=c(j[d])){for(var K in T.attributes)if(T.attributes.hasOwnProperty(K)){var R=T.attributes[K].name;"type"!==R&&"value"!==R&&T.removeAttribute(R)}for(var Q in e.inputAttributes)T.setAttribute(Q,e.inputAttributes[Q])}I.className=D,e.inputClass&&P(I,e.inputClass),M(I)}var Y;switch(e.input){case"text":case"email":case"password":case"number":case"tel":T=L(t,l.input),T.value=e.inputValue,T.placeholder=e.inputPlaceholder,T.type=e.input,q(T);break;case"file":T=L(t,l.file),T.placeholder=e.inputPlaceholder,T.type=e.input,q(T);break;case"range":var Z=L(t,l.range),F=Z.querySelector("input"),J=Z.querySelector("output");F.value=e.inputValue,F.type=e.input,J.value=e.inputValue,q(Z);break;case"select":var $=L(t,l.select);if($.innerHTML="",e.inputPlaceholder){var _=document.createElement("option");_.innerHTML=e.inputPlaceholder,_.value="",_.disabled=!0,_.selected=!0,$.appendChild(_)}Y=function(t){for(var n in t){var o=document.createElement("option");o.value=n,o.innerHTML=t[n],e.inputValue===n&&(o.selected=!0),$.appendChild(o)}q($),$.focus()};break;case"radio":var G=L(t,l.radio);G.innerHTML="",Y=function(t){for(var n in t){var o=1,r=document.createElement("input"),i=document.createElement("label"),a=document.createElement("span");r.type="radio",r.name=l.radio,r.value=n,r.id=l.radio+"-"+o++,e.inputValue===n&&(r.checked=!0),a.innerHTML=t[n],i.appendChild(r),i.appendChild(a),i["for"]=r.id,G.appendChild(i)}q(G);var s=G.querySelectorAll("input");s.length&&s[0].focus()};break;case"checkbox":var X=L(t,l.checkbox),ee=c("checkbox");ee.type="checkbox",ee.value=1,ee.id=l.checkbox,ee.checked=Boolean(e.inputValue);var te=X.getElementsByTagName("span");te.length&&X.removeChild(te[0]),te=document.createElement("span"),te.innerHTML=e.inputPlaceholder,X.appendChild(te),q(X);break;case"textarea":var ne=L(t,l.textarea);ne.value=e.inputValue,ne.placeholder=e.inputPlaceholder,q(ne);break;case null:break;default:console.error('SweetAlert2: Unexpected type of input! Expected "text" or "email" or "password", "select", "checkbox", "textarea" or "file", got "'+e.input+'"')}if("select"!==e.input&&"radio"!==e.input||(e.inputOptions instanceof Promise?(o.showLoading(),e.inputOptions.then(function(e){o.hideLoading(),Y(e)})):"object"==typeof e.inputOptions?Y(e.inputOptions):console.error("SweetAlert2: Unexpected type of inputOptions! Expected object or Promise, got "+typeof e.inputOptions)),z(e.animation,e.onOpen),a(-1,1),r.scrollTop=0,"undefined"!=typeof MutationObserver&&!p){var oe=W(function(){o.recalculateHeight()},50);p=new MutationObserver(oe),p.observe(t,{childList:!0,characterData:!0,subtree:!0})}})}function o(){var e=arguments,t=y();return null===t&&(o.init(),t=y()),o.isVisible()&&o.close(),n.apply(this,e)}var r,i="swal2-",a=function(e){var t={};for(var n in e)t[e[n]]=i+e[n];return t},l=a(["container","in","modal","overlay","close","content","spacer","confirm","cancel","icon","image","input","file","range","select","radio","checkbox","textarea","validationerror","progresssteps","activeprogressstep","progresscircle","progressline"]),s=a(["success","warning","info","question","error"]),c={title:"",text:"",html:"",type:null,customClass:"",animation:!0,allowOutsideClick:!0,allowEscapeKey:!0,showConfirmButton:!0,showCancelButton:!1,preConfirm:null,confirmButtonText:"OK",confirmButtonColor:"#3085d6",confirmButtonClass:null,cancelButtonText:"Cancel",cancelButtonColor:"#aaa",cancelButtonClass:null,buttonsStyling:!0,reverseButtons:!1,focusCancel:!1,showCloseButton:!1,showLoaderOnConfirm:!1,imageUrl:null,imageWidth:null,imageHeight:null,imageClass:null,timer:null,width:500,padding:20,background:"#fff",input:null,inputPlaceholder:"",inputValue:"",inputOptions:{},inputAutoTrim:!0,inputClass:null,inputAttributes:{},inputValidator:null,progressSteps:[],currentProgressStep:null,progressStepsDistance:"40px",onOpen:null,onClose:null},u='<div class="'+l.modal+'" style="display: none" tabIndex="-1"><ul class="'+l.progresssteps+'"></ul><div class="'+l.icon+" "+s.error+'"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="'+l.icon+" "+s.question+'">?</div><div class="'+l.icon+" "+s.warning+'">!</div><div class="'+l.icon+" "+s.info+'">i</div><div class="'+l.icon+" "+s.success+'"><span class="line tip"></span> <span class="line long"></span><div class="placeholder"></div> <div class="fix"></div></div><img class="'+l.image+'"><h2></h2><div class="'+l.content+'"></div><input class="'+l.input+'"><input type="file" class="'+l.file+'"><div class="'+l.range+'"><output></output><input type="range"></div><select class="'+l.select+'"></select><div class="'+l.radio+'"></div><label for="'+l.checkbox+'" class="'+l.checkbox+'"><input type="checkbox"></label><textarea class="'+l.textarea+'"></textarea><div class="'+l.validationerror+'"></div><hr class="'+l.spacer+'"><button type="button" class="'+l.confirm+'">OK</button><button type="button" class="'+l.cancel+'">Cancel</button><span class="'+l.close+'">&times;</span></div>',d=document.getElementsByClassName(l.container);d.length?r=d[0]:(r=document.createElement("div"),r.className=l.container,r.innerHTML=u);var p,f=function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n]);return e},m=function(e,t){e=String(e).replace(/[^0-9a-f]/gi,""),e.length<6&&(e=e[0]+e[0]+e[1]+e[1]+e[2]+e[2]),t=t||0;for(var n="#",o=0;3>o;o++){var r=parseInt(e.substr(2*o,2),16);r=Math.round(Math.min(Math.max(0,r+r*t),255)).toString(16),n+=("00"+r).substr(r.length)}return n},v={previousWindowKeyDown:null,previousActiveElement:null,previousBodyPadding:null},h=function(e){return r.querySelector("."+e)},y=function(){return h(l.modal)},g=function(){var e=y();return e.querySelectorAll("."+l.icon)},b=function(){return h(l.spacer)},w=function(){return h(l.progresssteps)},C=function(){return h(l.confirm)},k=function(){return h(l.cancel)},S=function(){return h(l.close)},x=function(e){var t=[C(),k()];return e&&t.reverse(),t.concat(Array.prototype.slice.call(y().querySelectorAll("button:not([class^="+i+"]), input:not([type=hidden]), textarea, select")))},E=function(e,t){return e.classList.contains(t)},B=function(e){if(e.focus(),"file"!==e.type){var t=e.value;e.value="",e.value=t}},P=function(e,t){if(e&&t){var n=t.split(/\s+/);n.forEach(function(t){e.classList.add(t)})}},A=function(e,t){if(e&&t){var n=t.split(/\s+/);n.forEach(function(t){e.classList.remove(t)})}},L=function(e,t){for(var n=0;n<e.childNodes.length;n++)if(E(e.childNodes[n],t))return e.childNodes[n]},q=function(e,t){t||(t="block"),e.style.opacity="",e.style.display=t},M=function(e){e.style.opacity="",e.style.display="none"},V=function(e){for(;e.firstChild;)e.removeChild(e.firstChild)},O=function(e){return e.offsetWidth||e.offsetHeight||e.getClientRects().length},T=function(e,t){e.style.removeProperty?e.style.removeProperty(t):e.style.removeAttribute(t)},H=function(e){if("function"==typeof MouseEvent){var t=new MouseEvent("click",{view:window,bubbles:!1,cancelable:!0});e.dispatchEvent(t)}else if(document.createEvent){var n=document.createEvent("MouseEvents");n.initEvent("click",!1,!1),e.dispatchEvent(n)}else document.createEventObject?e.fireEvent("onclick"):"function"==typeof e.onclick&&e.onclick()},N=function(e){"function"==typeof e.stopPropagation?(e.stopPropagation(),e.preventDefault()):window.event&&window.event.hasOwnProperty("cancelBubble")&&(window.event.cancelBubble=!0)},j=function(){var e=document.createElement("div"),t={WebkitAnimation:"webkitAnimationEnd",OAnimation:"oAnimationEnd oanimationend",msAnimation:"MSAnimationEnd",animation:"animationend"};for(var n in t)if(t.hasOwnProperty(n)&&void 0!==e.style[n])return t[n];return!1}(),D=function(){var e=y();window.onkeydown=v.previousWindowKeyDown,v.previousActiveElement&&v.previousActiveElement.focus&&v.previousActiveElement.focus(),clearTimeout(e.timeout)},I=function(){var e=document.createElement("div");e.style.width="50px",e.style.height="50px",e.style.overflow="scroll",document.body.appendChild(e);var t=e.offsetWidth-e.clientWidth;return document.body.removeChild(e),t},W=function(e,t,n){var o;return function(){var r=this,i=arguments,a=function(){o=null,n||e.apply(r,i)},l=n&&!o;clearTimeout(o),o=setTimeout(a,t),l&&e.apply(r,i)}},K=f({},c),R=[],U=function(e){var t=y();for(var n in e)c.hasOwnProperty(n)||"extraParams"===n||console.warn('SweetAlert2: Unknown parameter "'+n+'"');t.style.width="number"==typeof e.width?e.width+"px":e.width,t.style.padding=e.padding+"px",t.style.background=e.background;var o=t.querySelector("h2"),r=t.querySelector("."+l.content),i=C(),a=k(),u=t.querySelector("."+l.close);o.innerHTML=e.title.split("\n").join("<br>");var d;if(e.text||e.html){if("object"==typeof e.html)if(r.innerHTML="",0 in e.html)for(d=0;d in e.html;d++)r.appendChild(e.html[d].cloneNode(!0));else r.appendChild(e.html.cloneNode(!0));else r.innerHTML=e.html||e.text.split("\n").join("<br>");q(r)}else M(r);e.showCloseButton?q(u):M(u),t.className=l.modal,e.customClass&&P(t,e.customClass);var p=w(),f=parseInt(null===e.currentProgressStep?swal.getQueueStep():e.currentProgressStep,10);e.progressSteps.length?(q(p),V(p),f>=e.progressSteps.length&&console.warn("SweetAlert2: Invalid currentProgressStep parameter, it should be less than progressSteps.length (currentProgressStep like JS arrays starts from 0)"),e.progressSteps.forEach(function(t,n){var o=document.createElement("li");if(P(o,l.progresscircle),o.innerHTML=t,n===f&&P(o,l.activeprogressstep),p.appendChild(o),n!==e.progressSteps.length-1){var r=document.createElement("li");P(r,l.progressline),r.style.width=e.progressStepsDistance,p.appendChild(r)}})):M(p);var m=g();for(d=0;d<m.length;d++)M(m[d]);if(e.type){var v=!1;for(var h in s)if(e.type===h){v=!0;break}if(!v)return console.error("SweetAlert2: Unknown alert type: "+e.type),!1;var S=t.querySelector("."+l.icon+"."+s[e.type]);switch(q(S),e.type){case"success":P(S,"animate"),P(S.querySelector(".tip"),"animate-success-tip"),P(S.querySelector(".long"),"animate-success-long");break;case"error":P(S,"animate-error-icon"),P(S.querySelector(".x-mark"),"animate-x-mark");break;case"warning":P(S,"pulse-warning")}}var x=t.querySelector("."+l.image);e.imageUrl?(x.setAttribute("src",e.imageUrl),q(x),e.imageWidth?x.setAttribute("width",e.imageWidth):x.removeAttribute("width"),e.imageHeight?x.setAttribute("height",e.imageHeight):x.removeAttribute("height"),x.className=l.image,e.imageClass&&P(x,e.imageClass)):M(x),e.showCancelButton?a.style.display="inline-block":M(a),e.showConfirmButton?T(i,"display"):M(i);var E=b();e.showConfirmButton||e.showCancelButton?q(E):M(E),i.innerHTML=e.confirmButtonText,a.innerHTML=e.cancelButtonText,e.buttonsStyling&&(i.style.backgroundColor=e.confirmButtonColor,a.style.backgroundColor=e.cancelButtonColor),i.className=l.confirm,P(i,e.confirmButtonClass),a.className=l.cancel,P(a,e.cancelButtonClass),e.buttonsStyling?(P(i,"styled"),P(a,"styled")):(A(i,"styled"),A(a,"styled"),i.style.backgroundColor=i.style.borderLeftColor=i.style.borderRightColor="",a.style.backgroundColor=a.style.borderLeftColor=a.style.borderRightColor=""),e.animation===!0?A(t,"no-animation"):P(t,"no-animation")},z=function(t,n){var o=y();t?(P(o,"show-swal2"),P(r,"fade"),A(o,"hide-swal2")):A(o,"fade"),q(o),r.style.overflowY="hidden",j&&!E(o,"no-animation")?o.addEventListener(j,function i(){o.removeEventListener(j,i),r.style.overflowY="auto"}):r.style.overflowY="auto",P(r,"in"),P(document.body,l["in"]),e(),v.previousActiveElement=document.activeElement,null!==n&&"function"==typeof n&&n.call(this,o)};return o.isVisible=function(){var e=y();return O(e)},o.queue=function(e){R=e;var t=y()||o.init(),n=function(){R=[],t.removeAttribute("data-queue-step")};return new Promise(function(e,r){!function i(a,l){a<R.length?(t.setAttribute("data-queue-step",a),o(R[a]).then(function(){i(a+1,l)},function(e){n(),r(e)})):(n(),e())}(0)})},o.getQueueStep=function(){return y().getAttribute("data-queue-step")},o.insertQueueStep=function(e,t){return t&&t<R.length?R.splice(t,0,e):R.push(e)},o.deleteQueueStep=function(e){"undefined"!=typeof R[e]&&R.splice(e,1)},o.close=o.closeModal=function(e){var n=y();A(n,"show-swal2"),P(n,"hide-swal2");var o=n.querySelector("."+l.icon+"."+s.success);A(o,"animate"),A(o.querySelector(".tip"),"animate-success-tip"),A(o.querySelector(".long"),"animate-success-long");var i=n.querySelector("."+l.icon+"."+s.error);A(i,"animate-error-icon"),A(i.querySelector(".x-mark"),"animate-x-mark");var a=n.querySelector("."+l.icon+"."+s.warning);A(a,"pulse-warning"),D(),j&&!E(n,"no-animation")?n.addEventListener(j,function c(){n.removeEventListener(j,c),E(n,"hide-swal2")&&(M(n),A(r,"in"),A(document.body,l["in"]),t())}):(M(n),A(r,"in"),A(document.body,l["in"]),t()),null!==e&&"function"==typeof e&&e.call(this,n)},o.clickConfirm=function(){C().click()},o.clickCancel=function(){k().click()},o.init=function(){if("undefined"==typeof document)return void console.error("SweetAlert2 requires document to initialize");if(!document.getElementsByClassName(l.container).length){document.body.appendChild(r);var e=y(),t=L(e,l.input),n=L(e,l.file),i=e.querySelector("."+l.range+" input"),a=L(e,l.select),s=e.querySelector("."+l.checkbox+" input"),c=L(e,l.textarea);return t.oninput=function(){o.resetValidationError()},t.onkeyup=function(e){e.stopPropagation(),13===e.keyCode&&o.clickConfirm()},n.onchange=function(){o.resetValidationError()},i.oninput=function(){o.resetValidationError(),i.previousSibling.value=i.value},i.onchange=function(){o.resetValidationError(),i.previousSibling.value=i.value},a.onchange=function(){o.resetValidationError()},s.onchange=function(){o.resetValidationError()},c.oninput=function(){o.resetValidationError()},e}},o.setDefaults=function(e){if(!e)throw new Error("userParams is required");if("object"!=typeof e)throw new Error("userParams has to be a object");f(K,e)},o.resetDefaults=function(){K=f({},c)},o.version="5.0.7",window.sweetAlert=window.swal=o,function(){"complete"===document.readyState||"interactive"===document.readyState&&document.body?o.init():document.addEventListener("DOMContentLoaded",function e(){document.removeEventListener("DOMContentLoaded",e,!1),o.init()},!1)}(),"function"==typeof Promise?Promise.prototype.done=Promise.prototype.done||function(){return this["catch"](function(){})}:console.warn("SweetAlert2: Please inlude Promise polyfill BEFORE including sweetalert2.js if IE10+ support needed."),o});