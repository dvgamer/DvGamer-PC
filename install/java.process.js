function HttpRequest() {
	var req;
	if (window.XMLHttpRequest) {
		return req = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		return req = new ActiveXObject(Microsoft.XMLHTML);
	} else {
		return false;
	}
}
step = new Array('Welcome','Configuration','Connection','MySQL Setting','Create Database','Finish');
function getListStep(value) {
	var listStep="";
	var send,i;
	for (i in step) {
		send = "<div class=\"menu-list\" id=\"menu-" + i + "\">";
		if (value<i) {
			send += "<font color=\"#000000\">" + step[i] + "</font>";
		} else if (value==i) {
			send += "<font color=\"#000000\"><strong>" + step[i] + "</strong></font>";
		} else {
			send += step[i];
		}
		send += "</div>";
		listStep += send;
	}
	this.value = value;
	this.listStep = listStep;
	this.getListTitle = getListTitle;
	this.getListValue = getListValue;
}
function getListValue() {
	return (this.listStep);
}
function getListTitle() {
	return (step[this.value]);
}


function nextSetep(step) {
	req = new HttpRequest();
	listValue = new getListStep(step);
	var wait;;
	req.onreadystatechange = function() {
		if (req.readyState==4) {
			document.getElementById("bodySetup").innerHTML = req.responseText;
			document.getElementById("menulist").innerHTML = listValue.getListValue();
			if (step==0) { var welcome = " to DvGamMEr-PC.com"; } else { welcome=""; }
			document.getElementById("titleStep").innerHTML = listValue.getListTitle() + welcome;
			document.getElementById("loadding").innerHTML = "";
		} else {
			if (step==3 || step==5) {
				wait = step-1;
				waitValue = new getListStep(wait);
				document.getElementById("menulist").innerHTML = waitValue.getListValue();
				document.getElementById("titleStep").innerHTML = waitValue.getListTitle();	
			}
			preloading();
		}	
	}
	if (step==3) {
		var host = document.dbConfig.host.value;
		var user = document.dbConfig.user.value;
		var pass = document.dbConfig.pass.value;
		var data = document.dbConfig.data.value;
	
		req.open("GET","setup.php?set=" + step + "&host=" + host + "&user=" + user + "&pass=" + pass + "&data=" + data,true);
		req.send(null);
	} else {
		req.open("GET","setup.php?set=" + step,true);
		req.send(null);
	}
}
function setupFinish() {
	window.location = "";
}

function preloading() {
	var preload_flash = "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"  ";
	preload_flash += "codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" width=\"318\" height=\"30\">";
	preload_flash += "<param name=\"movie\" value=\"../images/preload.swf\" /><param name=\"quality\" value=\"high\" /><param name=\"wmode\" value=\"transparent\"/>";
    preload_flash += "<param name=\"menu\" value=\"false\" />";
	preload_flash += "<embed src=\"../images/preload.swf\" menu=\"false\"  width=\"316\" height=\"30\" quality=\"high\" type=\"application/x-shockwave-flash\" wmode=\"transparent\">";
	preload_flash += "</embed></object>";
	
	document.getElementById("bodySetup").innerHTML = "&nbsp;";
	document.getElementById("titleStep").innerHTML = "<center><strong>Please wait...</strong></center>";	
	document.getElementById("loadding").innerHTML = "<div class=loading align=center><br><strong>Please wait...</strong><br>" + preload_flash + "</div>";

}
