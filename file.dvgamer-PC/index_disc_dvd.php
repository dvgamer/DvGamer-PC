<html>
<head>
<title>Testing PHP Module</title>

<meta http-equiv="Content-Type" content="text/html; charset=windows-874"></head>
<script language="javascript">
function sizeProcess(size,type) {
	var amount=0;
	do {
		amount = amount + 1 
		var conSize = size/amount;     
	} while (conSize>type);
	
	// Check Type
	if (type==695) {
		var price = 25;
	} else if (type==4480) {
		var price = 50;
	} else {
		var price = 100;
	}
	
	//none
	this.price = price;
	this.amount = amount;
	this.conSize = conSize;
	this.getSizeOn = getSizeOn;
	this.getUnitOn = getUnitOn;
	this.getPriceOn = getPriceOn;
}

function getSizeOn() {
	return (this.conSize.toFixed(0));
}
function getUnitOn() {
	return (this.amount);
}
function getPriceOn() {
	return (this.amount * this.price);
}

function PriceCheck(){
	var sizeCD = new sizeProcess(document.form1.sizelable.value,695);
	var sizeDVD5 = new sizeProcess(document.form1.sizelable.value,4480);
	var sizeDVD9 = new sizeProcess(document.form1.sizelable.value,8150);
	
	document.getElementById("dvd9UnitBox").innerHTML = "<strong>DVD9 Size Process:</strong><br><strong>�ӹǹ:</strong> " + sizeDVD9.getUnitOn();
	document.getElementById("dvd9UnitBox").innerHTML += " ��<br><strong>��Ҵ:</strong> " + sizeDVD9.getSizeOn() + " MB<br><strong>�Ҥ�:</strong> " + sizeDVD9.getPriceOn() + " �ҷ";
	
	document.getElementById("dvd5UnitBox").innerHTML = "<strong>DVD5 Size Process:</strong><br><strong>�ӹǹ:</strong> " + sizeDVD5.getUnitOn();
	document.getElementById("dvd5UnitBox").innerHTML += " ��<br><strong>��Ҵ: </strong>" + sizeDVD5.getSizeOn() + " MB<br><strong>�Ҥ�:</strong> " + sizeDVD5.getPriceOn() + " �ҷ";
	
	document.getElementById("cdUnitBox").innerHTML = "<strong>CD Size Process:</strong><br><strong>�ӹǹ:</strong> " + sizeCD.getUnitOn();
	document.getElementById("cdUnitBox").innerHTML += " ��<br><strong>��Ҵ:</strong> " + sizeCD.getSizeOn() + " MB<br><strong>�Ҥ�:</strong> " + sizeCD.getPriceOn() + " �ҷ";
} 

</script>
<body>
<form name="form1">
  <p>
    <input type="text" name="sizelable" onKeyDown="PriceCheck()" onChange="PriceCheck()">
    &gt;&gt;&gt;&gt; 
    <input type="text" name="sizelable2">
  </p>
  <p>
    <label>
      <input type="button" name="test" value="Complete Value" onClick="PriceCheck()">
    </label>
  </p>
</form>
<div id="dvd9UnitBox"><strong>DVD9 Size Process:</strong><br></div><br>
<div id="dvd5UnitBox"><strong>DVD5 Size Process:</strong><br></div><br>
<div id="cdUnitBox"><strong>CD Size Process:</strong><br></div>

</body>
</html>