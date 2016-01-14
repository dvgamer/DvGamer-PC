<?php
function ChgDateThai($cdate) {
	include ("language/thai.php");
	$chgdate = explode("-", $cdate);
	$day = $chgdate[2];
	$month = $chgdate[1];
	$year = $chgdate[0];
	switch ($month) {
		case 01: $month = $DATE_JAN; break;
		case 02: $month = $DATE_FEB; break;
		case 03: $month = $DATE_MAR; break;
		case 04: $month = $DATE_APR; break;
		case 05: $month = $DATE_MAY; break;
		case 06: $month = $DATE_JUN; break;
		case 07: $month = $DATE_JUL; break;
		case 08: $month = $DATE_AUG; break;
		case 09: $month = $DATE_SEP; break;
		case 10: $month = $DATE_OCT; break;
		case 11: $month = $DATE_NOV; break;
		case 12: $month = $DATE_DEC; break;
	}
	$cdate = $DATE_DAY . $day . "&nbsp;" . $month . $DATE_YEAR . ($year + 543);
	return $cdate;
}

function ChgToHTML($str) {
	$str = htmlspecialchars($str);
	$str = nl2br($str);
	return $str;
}

function  GenreName($ID) {
	$sql = "Select name from dvg_genre where genre_id=$ID;";
	$result = mysql_query($sql);
	return mysql_result($result, 0, 'name');
}

function  BoxName($ID) {
	$sql = "Select name from dvg_box where box_id=$ID;";
	$result = mysql_query($sql);
	return mysql_result($result, 0, 'name');
}

function Moduleleft($login,$user) {
	$sql = "Select * from dvg_module where priority='0';";
	$modmenu = mysql_query($sql);
	$modrow = mysql_num_rows($modmenu);
?>
<div id="modulebar"><div><div >
<div class="nameMenu"><strong>User Menu</strong></div>
<?php for ($i=0; $i<=$modrow-1; $i++) {
	echo "<a href=\"";
	echo mysql_result($modmenu, $i, 'link') . "\">";
	if ($i == $modrow-1) {
		echo "<div style=\"border-bottom:#CCC dotted 1px;\"";
	} else {
		echo "<div";
	}
	echo " class=\"module-left\">";
	echo mysql_result($modmenu, $i, 'Name') . "</div></a>";
}

if ($login) { 
	$sql = "Select * from dvg_module where priority='1';";
	$modmenu = mysql_query($sql);
	$modrow = mysql_num_rows($modmenu); ?>
<div class="nameMenu"><strong>Other Menu</strong></div>
<?php for ($i=0; $i<=$modrow-1; $i++) {
	echo "<a href=\"";
	echo mysql_result($modmenu, $i, 'link') . "\">";
	if ($i == $modrow-1) {
		echo "<div style=\"border-bottom:#CCC dotted 1px;\"";
	} else {
		echo "<div";
	}
	echo " class=\"module-left\">";
	echo mysql_result($modmenu, $i, 'Name') . "</div></a>";
}
}

if ($login and $user == "admin") {
	$sql = "Select * from dvg_module where priority='2';";
	$modmenu = mysql_query($sql);
	$modrow = mysql_num_rows($modmenu);	?>
<div class="nameMenu"><strong>Admin Menu</strong></div>
<?php for ($i=0; $i<=$modrow-1; $i++) {
	echo "<a href=\"";
	echo mysql_result($modmenu, $i, 'link') . "\">";
	if ($i == $modrow-1) {
		echo "<div style=\"border-bottom:#CCC dotted 1px;\"";
	} else {
		echo "<div";
	}
	echo " class=\"module-left\">";
	echo mysql_result($modmenu, $i, 'Name') . "</div></a>";
	}
}
echo "</div></div></div>";
}
?>