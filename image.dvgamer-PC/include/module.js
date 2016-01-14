var persistclose=0 // ให้ใส่เป็น 0 หรือไม่ก็ 1 (โดย 0 หมายถึง เมื่อกดปิดแล้ว กด REFRESH กรอบข้อความจะขึ้นมาอีก แต่ถ้า 1 กรอบข้อความจะไม่ขึ้นมาอีกแล้ว)
var startX = 0 // ตำแหน่งแสดงกรอบข้อความ นับจากด้านซ้าย
var startY = 175 // ตำแหน่งแสดงกรอบข้อความ นับจากด้านบน

function iecompattest(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function get_cookie(Name) {
var search = Name + "="
var returnvalue = "";
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

function closebar(){
if (persistclose)
document.cookie="remainclosed=1"
document.getElementById("modulebar").style.visibility="hidden"
}

function staticbar(){

var ns = (navigator.appName.indexOf("Netscape") != -1);
var d = document;
function ml(id){
var el=d.getElementById(id);
if (!persistclose || persistclose && get_cookie("remainclosed")=="")
el.style.visibility="visible"
if(d.layers)el.style=el;
el.sP=function(x,y){this.style.left=x+"px";this.style.top=y+"px";};
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
ftlObj.y += (pY + startY - ftlObj.y)/8;
}
else{
var pY = ns ? pageYOffset + innerHeight : iecompattest().scrollTop + iecompattest().clientHeight;
ftlObj.y += (pY - startY - ftlObj.y)/8;
}
ftlObj.sP(ftlObj.x, ftlObj.y);
setTimeout("stayTopLeft()", 10);
}
ftlObj = ml("modulebar");
stayTopLeft();
}

if (window.addEventListener)
window.addEventListener("load", staticbar, false)
else if (window.attachEvent)
window.attachEvent("onload", staticbar)
else if (document.getElementById)
window.onload=staticbar

