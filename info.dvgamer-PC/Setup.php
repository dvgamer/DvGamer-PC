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
	exit("�������ö�������͡Ѻ MySQL Server ��");
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
	echo "������ҧ�ҹ������ dvgamer_info ��������� <br>";
} else {
	echo "�������ö���ҧ�ҹ������ dvgamer_info �� <br>";
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
	echo "������ҧ���� dvg_listgame �����<br>";
} else {
	echo "�������ö���ҧ���� dvg_listgame ��<br>";
}

$sql = "CREATE TABLE dvg_genre (
								   genre_id INT(4) NOT NULL AUTO_INCREMENT,
								   Name VARCHAR(255) NOT NULL,
								   PRIMARY KEY (genre_id));";
$result = mysql_query($sql);
if ($result) {
	echo "������ҧ���� dvg_genre �����<br>";
	
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
	echo "�������ö���ҧ���� dvg_genre ��<br>";
}

$sql = "CREATE TABLE dvg_box (
								   box_id INT(4) NOT NULL AUTO_INCREMENT,
								   name VARCHAR(255) NOT NULL,
								   PRIMARY KEY (box_id));";
$result = mysql_query($sql);
if ($result) {
	echo "������ҧ���� dvg_box �����<br>";
	
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
	echo "�������ö���ҧ���� dvg_box ��<br>";
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
	echo "������ҧ���� dvg_mainmenu �����<br>";
	
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('˹���á','home.png','home','all');";
$result = mysql_query($sql);
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('����������','listgame.png','listgame','info');";
$result = mysql_query($sql);
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('��������Ҫԡ','listuser.png','listuser','info');";
$result = mysql_query($sql);
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('���������䫵�','siteinfo.png','siteinfo','info');";
$result = mysql_query($sql);

} else {
	echo "�������ö���ҧ���� dvg_mainmenu ��<br>";
}
mysql_query("USE dvgamer_user;");
$sql = "CREATE TABLE dvg_profile (
								   admin_id INT(2) NOT NULL AUTO_INCREMENT,
								   username VARCHAR(20) NOT NULL,
								   password VARCHAR(32) NOT NULL,
								   PRIMARY KEY (admin_id));";
$result = mysql_query($sql);
if ($result) {
	echo "������ҧ���� dvg_profile �����<br>";
$username = "admin";
$password = md5("dvg7po8ai");
$sql = "Insert into dvg_profile (username,password) Values ('$username','$password');";

$result = mysql_query($sql);
} else {
	echo "�������ö���ҧ���� dvg_profile ��<br>";
}

mysql_close($link);
?>
</body>
</html>