// JavaScript info.DvGamer-PC.com
var getId;
function statechange(getId)
{
	if (req.readyState==4) {
		var x=document.getElementById(getId);
		x.innerHTML=req.responseText;
	}
	else{
		var x=document.getElementById(getId);
		x.innerHTML="Please wait...";
	}
}