document.addEventListener("DOMContentLoaded",function(){var i=null,c=null,r=(document.querySelector("#wpbody"),document.querySelector("#shortcode-preview")),e=document.querySelector("#copy-shortcode"),s=document.querySelector("#copy-shortcode-msg"),l=document.querySelector("#placeholder-preview"),t=document.querySelector("#copy-placeholder"),a=document.querySelector("#copy-placeholder-msg"),d=document.querySelector("#icon-preview"),n=(document.querySelectorAll("ul.simpleicons-list li"),document.querySelector(".simpleicons-list-wrapper")),u=document.querySelector("ul.simpleicons-list"),o=(u.cloneNode(!0),document.querySelector("#simple-icons-search")),m=document.querySelector(".search-results"),p=document.createElement("div"),h=0,v=void 0,f=!1,g=!1,L=!1;p.classList.add("simpleicons-loader");var y=document.createElement("div");y.classList.add("simpleicons-loadmore-wrapper");var C=document.createElement("div");function q(){!1===g&&!0===L&&(g=!0,b("Load more triggered."),h++,S(v))}function S(n){var o={action:"simpleicons_search_icons",search:n,page:h};0===o.page&&(m.innerHTML=""),0===o.page&&(u.innerHTML=""),x(!0),T(!1),b('Request initiated for search: "'+n+'", page: "'+h+'"'),jQuery.post(ajaxurl,o,function(e){if(e=JSON.parse(e),v==n){if(e.search_term=n,b(e),0===o.page&&(u.innerHTML=""),e.icons&&0!==e.icons.length){for(var t=0;t<e.icons.length;t++)listitem=document.createElement("li"),listitem.dataset.icontitle=e.icons[t].slug,listitem.innerHTML=e.icons[t].svg,listitem.addEventListener("click",function(){var e;e=this.dataset.icontitle,c=i,i=e,function(){var e=document.querySelector(`[data-icontitle="${c}"]`),t=document.querySelector(`[data-icontitle="${i}"]`);e&&e.classList.remove("selected");r.textContent=`[simple_icon name="${i}"]`,s.textContent="",l.textContent=`#${i}#`,a.textContent="",t.classList.add("selected"),d.innerHTML="",$svg=t.firstChild.cloneNode(!0),d.appendChild($svg),window.scrollTo(0,0)}()}),u.appendChild(listitem);m.innerHTML=""===v?"All "+e.total_icons+" icons":e.total_icons+" matching results",x(!1),T(e.more_items)}else x(!(u.innerHTML='No icons found. <a target="_blank" title="Request an icon" href="https://github.com/simple-icons/simple-icons/issues?q=is%3Aopen+is%3Aissue+label%3A%22new+icon%22">Request an icon</a>')),T(!1);g=!1,b('Request finished for search: "'+n+'", page: "'+h+'"')}else b('Cancelled search for: "'+n+'"')})}function x(e){e?n.appendChild(p):n.contains(p)&&n.removeChild(p)}function T(e){L=e?(n.appendChild(y),!0):(n.contains(y)&&n.removeChild(y),!1)}function E(t,e){navigator.clipboard?navigator.clipboard.writeText(e).then(function(){t.textContent="copied to clipboard!",t.classList.add("fadeOut")},function(e){t.textContent="error: "+e}):function(t,e){var n=document.createElement("textarea");t.classList.remove("fadeOut"),n.value=e,r.appendChild(n),n.focus(),n.select();try{var o=document.execCommand("copy")?"copied to clipboard!":"error";t.textContent=o,t.classList.add("fadeOut")}catch(e){t.textContent="error: "+e}r.removeChild(n)}(t,e)}function b(e){simple_icons_settings.debug&&console.log(e)}C.classList.add("button"),C.innerHTML="Load More",y.appendChild(C),o.addEventListener("input",function(){b("Input changed to: "+this.value);var e=this.value;!1!==f&&clearTimeout(f),f=setTimeout(function(){b('Inside timeout function for search: "'+e+'"'),h=0,S(e),f=!1,v=e},300)}),C.addEventListener("click",function(){q()}),S(),e.addEventListener("click",function(){var e=r.textContent;E(s,e)}),t.addEventListener("click",function(){var e=l.textContent;E(a,e)})});