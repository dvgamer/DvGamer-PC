<?php
	mysql_query("USE dvgamer_admin;");
	$sql = "Select * from dvg_mainmenu;";
	$menuhead = mysql_query($sql);
?>
<div id="headbar"><div><div>
<?php for ($i=0; $i<=3; $i++) {
	echo "<div><a href=\"index.php?option=";
	echo mysql_result($menuhead, $i, 'link') . "\">";
	echo "<img src=\"images/";
	echo mysql_result($menuhead, $i, 'icon') . "\" border=\"0\"><br><strong>";
	echo mysql_result($menuhead, $i, 'Name') . "</strong></a></div>";
}
?>
</div></div></div>
