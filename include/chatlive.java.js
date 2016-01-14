var persistclose=0;
var startX = 20;
var startY = 0;

function iecompattest() {
	return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function get_cookie(Name) {
	var search = Name + "=";
	var returnvalue = ""
	if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) {
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

var verticalpos="fromtop"


function staticbar(){

   var ns = (navigator.appName.indexOf("Netscape") != -1);
   var d = document;
   function ml(id){
      var el=d.getElementById(id);
      if (!persistclose || persistclose && get_cookie("remainclosed")=="")
      el.style.visibility="visible"
      if(d.layers)el.style=el;
      el.sP=function(x,y){this.style.right=x+"px";this.style.bottom=y+"px";};
      el.x = startX;
      if (verticalpos=="fromtop")
      el.y = startY;
      else{
      el.y = ns ? pageYOffset + innerHeight : iecompattest().scrollTop + iecompattest().clientHeight;
      el.y -= startY;
      }
      return el;
   }
   window.stayTopLeft=function(){
      if (verticalpos=="fromtop"){
      var pY = ns ? pageYOffset : iecompattest().scrollTop;
      ftlObj.y -= (pY + startY + ftlObj.y);
      }
      else{
      var pY = ns ? pageYOffset - innerHeight : iecompattest().scrollTop + iecompattest().clientHeight;
      ftlObj.y -= (pY + startY + ftlObj.y);
      }
      ftlObj.sP(ftlObj.x, ftlObj.y);
      setTimeout("stayTopLeft()", 10);
   }
   ftlObj = ml("Microsoft_Live_Messenger_PresenceButton_44b112ad6136dc8c");
   stayTopLeft();
}

if (window.addEventListener)
window.addEventListener("load", staticbar, false)
else if (window.attachEvent)
window.attachEvent("onload", staticbar)
else if (document.getElementById)
window.onscroll=staticbar
