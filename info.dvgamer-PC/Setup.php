<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
</head>
<body>
<?php
$host = "localhost";
$user = "root";
$password = "dvg7po8ai";
$link = mysql_connect($host, $user, $password);

if (!$link) {
	exit("ไม่สามารถเชื่อมต่อกับ MySQL Server ได้");
}

$sql = "CREATE DATABASE dvgamer_info;";
$result = mysql_query($sql);
$sql = "CREATE DATABASE dvgamer_board;";
$result = mysql_query($sql);
$sql = "CREATE DATABASE dvgamer_req;";
$result = mysql_query($sql);
$sql = "CREATE DATABASE dvgamer_buy;";
$result = mysql_query($sql);
$sql = "CREATE DATABASE dvgamer_user;";
$result = mysql_query($sql);
$sql = "CREATE DATABASE dvgamer_admin;";
$result = mysql_query($sql);
if ($result) {
	echo "การสร้างฐานข้อมูล dvgamer_info สำเร็จแล้ว <br>";
} else {
	echo "ไม่สามารถสร้างฐานข้อมูล dvgamer_info ได้ <br>";
}

mysql_query("USE dvgamer_info;");
$sql = "CREATE TABLE dvg_listgame (
								   list_id INT(4) NOT NULL AUTO_INCREMENT,
								   genre_id INT(4) NOT NULL,
								   box_id INT(4) NOT NULL,
								   gName VARCHAR(255) NOT NULL,
								   gSizes INT(5) DEFAULT '0' NOT NULL,
								   gUnit INT(1) DEFAULT '0' NOT NULL,
								   grelease DATE NOT NULL,
								   gHowto TEXT NOT NULL,
								   PRIMARY KEY (list_id));";
$result = mysql_query($sql);
if ($result) {
	echo "การสร้างเทเบิล dvg_listgame สำเร็จ<br>";
} else {
	echo "ไม่สามารถสร้างเทเบิล dvg_listgame ได้<br>";
}

$sql = "CREATE TABLE dvg_genre (
								   genre_id INT(4) NOT NULL AUTO_INCREMENT,
								   Name VARCHAR(255) NOT NULL,
								   PRIMARY KEY (genre_id));";
$result = mysql_query($sql);
if ($result) {
	echo "การสร้างเทเบิล dvg_genre สำเร็จ<br>";
	
$sql = "Insert into dvg_genre (name) Values ('Action');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Advenure');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Casino');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Fighting');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Puzzle');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Racing');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('RPG');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Shooting');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Shooter');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Simulation');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Sport');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Strategy');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Music &Rhythm');";
$result = mysql_query($sql);
$sql = "Insert into dvg_genre (name) Values ('Other');";
$result = mysql_query($sql);
} else {
	echo "ไม่สามารถสร้างเทเบิล dvg_genre ได้<br>";
}

$sql = "CREATE TABLE dvg_box (
								   box_id INT(4) NOT NULL AUTO_INCREMENT,
								   name VARCHAR(255) NOT NULL,
								   PRIMARY KEY (box_id));";
$result = mysql_query($sql);
if ($result) {
	echo "การสร้างเทเบิล dvg_box สำเร็จ<br>";
	
$sql = "Insert into dvg_box (name) Values ('Other-O1');";
$result = mysql_query($sql);
$sql = "Insert into dvg_box (name) Values ('Other-O2');";
$result = mysql_query($sql);
$sql = "Insert into dvg_box (name) Values ('S Rank-S1');";
$result = mysql_query($sql);
$sql = "Insert into dvg_box (name) Values ('S Rank-S2');";
$result = mysql_query($sql);
$sql = "Insert into dvg_box (name) Values ('Legend-L1');";
$result = mysql_query($sql);
} else {
	echo "ไม่สามารถสร้างเทเบิล dvg_box ได้<br>";
}

mysql_query("USE dvgamer_admin;");
$sql = "CREATE TABLE dvg_mainmenu (
								   mm_id INT(1) NOT NULL AUTO_INCREMENT,
								   name VARCHAR(50) NOT NULL,
								   icon VARCHAR(20) NOT NULL,
								   link VARCHAR(100) NOT NULL,
								   menu VARCHAR(20) NOT NULL,
								   PRIMARY KEY (mm_id));";
$result = mysql_query($sql);
if ($result) {
	echo "การสร้างเทเบิล dvg_mainmenu สำเร็จ<br>";
	
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('หน้าแรก','home.png','home','all');";
$result = mysql_query($sql);
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('ข้อมูลเกมส์','listgame.png','listgame','info');";
$result = mysql_query($sql);
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('ข้อมูลสมาชิก','listuser.png','listuser','info');";
$result = mysql_query($sql);
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('ข้อมูลเว็บไซต์','siteinfo.png','siteinfo','info');";
$result = mysql_query($sql);

} else {
	echo "ไม่สามารถสร้างเทเบิล dvg_mainmenu ได้<br>";
}
mysql_query("USE dvgamer_user;");
$sql = "CREATE TABLE dvg_profile (
								   admin_id INT(2) NOT NULL AUTO_INCREMENT,
								   username VARCHAR(20) NOT NULL,
								   password VARCHAR(32) NOT NULL,
								   PRIMARY KEY (admin_id));";
$result = mysql_query($sql);
if ($result) {
	echo "การสร้างเทเบิล dvg_profile สำเร็จ<br>";
$username = "admin";
$password = md5("dvg7po8ai");
$sql = "Insert into dvg_profile (username,password) Values ('$username','$password');";

$result = mysql_query($sql);
} else {
	echo "ไม่สามารถสร้างเทเบิล dvg_profile ได้<br>";
}

mysql_close($link);
?>
</body>
</html>