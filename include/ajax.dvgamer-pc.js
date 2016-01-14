function HttpRequest() {
	xmlHttp = false;
	if (window.XMLHttpRequest) {
		return xmlHttp = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		return xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	} else { 
		return false;
	}
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
			document.getElementById("titleStep").innerHTML = "Please wait...";
			document.getElementById("bodySetup").innerHTML = "<br><br><br><br><br><br><br><br><br><br>";	
			document.getElementById("loadding").innerHTML = "<div class=loading align=center>Please wait...<br><img src=images/loading.gif alt=loading hspace=4 vspace=4></div>";
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

function Loading() {
	var preload_flash = "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"  ";
	preload_flash += "codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" width=\"318\" height=\"30\">";
	preload_flash += "<param name=\"movie\" value=\"images/preload.swf\" /><param name=\"quality\" value=\"high\" /><param name=\"wmode\" value=\"transparent\"/>";
    preload_flash += "<param name=\"menu\" value=\"false\" />";
	preload_flash += "<embed src=\"images/preload.swf\" menu=\"false\"  width=\"316\" height=\"30\" quality=\"high\" type=\"application/x-shockwave-flash\" wmode=\"transparent\">";
	preload_flash += "</embed></object>";
	
	document.getElementById("header").innerHTML = "&nbsp;";
	document.getElementById("bodyContent").innerHTML = "<center><strong>Please wait...</strong></center>";	
	document.getElementById("preload").innerHTML = "<div class=loading><br><center><strong>Please wait...</strong>" + preload_flash + "</center></div>";
}
function unLoading() {
	document.getElementById("header").innerHTML = "&nbsp;";
	document.getElementById("bodyContent").innerHTML = "<br><br><br><br><br><br><br><br><br><br>";	
	document.getElementById("preload").innerHTML = "&nbsp;";
}
