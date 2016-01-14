<?php
require_once("include/function.step.php");
require_once("include/language.thai.php");
	switch ($_GET['set']) {
		case 0 : ?>
		    <table width="500" align="center" cellpadding="2" cellspacing="0">
              <tr>
                <td id="title"><?php echo _WELCOME_SETUP; ?></td>
             </tr>
             <tr>
               <td align="center"><input type="button" name="setup" value="Installs" onClick="nextSetep(1)"></td>
             </tr>
            </table>
        <?php 
		break;
		case 1 : ?>
         <form name="dbConfig">
              <table width="500" align="center" cellpadding="2" cellspacing="0">
                <tr>
                  <td width="137" align="right">Host Name :</td>
                  <td width="161"><input type="text" name="host" value="localhost"></td>
                  <td width="188" valign="middle"><em>defualt "localhost"</em></td>
                </tr>          
                <tr>
                  <td align="right">Username :</td>
                  <td><input type="text" name="user" value="dvgamer" ></td>
                  <td><em>defualt "'root"</em></td>
                </tr>          
                <tr>
                  <td align="right">Password :</td>
                  <td><input type="password" name="pass" value="dvg7po8ai" ></td>
                  <td>&nbsp;</td>
                </tr>          
                <tr>
                  <td align="right">Database Name :</td>
                  <td><input type="text" name="data" value="dvgamer_pc"></td>
                  <td>&nbsp;</td>
                </tr>     
                <tr>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3" align="center">
                  <input type="button" name="submit" value="ตกลง" onClick="nextSetep(3)">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <input type="reset" name="reset" value="ล้างฟอร์ม">
                    </td>
                  </tr>
              </table>
              </form>
  <?php break;
		case 3:
		
		$dvgdb = new mysql_config();
		$dvgdb->setHostname($_GET['host']);
		$dvgdb->setUsername($_GET['user']);
		$dvgdb->setPassword($_GET['pass']);
		if ($dvgdb->getConnection()){
			echo "<table width=\"500\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\"><tr>";
			echo "<td align=\"center\">Connection Complete.</td></td></tr>";
			echo "<td align=\"center\"><br><input type=\"button\" value=\"Create Table\" onClick=\"nextSetep(5)\"><br><br><br></td></tr></table>";
		} else {
			echo "<table width=\"500\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\"><tr>";
			echo "<td align=\"center\"><br><input type=\"button\" value=\"Back\" onClick=\"nextSetep(1)\"></td></tr></table>";
		}
		mysql_select_db($dvgdb->setDatabase($_GET['data']));
		
		break;
		case 5:
			echo "<table width=\"500\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\"><tr>";
			echo "<td align=\"center\"><br><input type=\"button\" value=\"Complate Installs\" onclick=\"window.location='http://" . $_SERVER['HTTP_HOST'] . "'\" \"></td></tr></table>";
		break;
	}
	?>
	<?php
/*
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
	echo " dvgamer_info  <br>";
} else {
	echo " dvgamer_info  <br>";
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
								   PRIMARY KEY (list_id))
								   DEFAULT CHARSET=tis620;";
$result = mysql_query($sql);
if ($result) {
	echo " dvg_listgame <br>";
} else {
	echo " dvg_listgame <br>";
}

$sql = "CREATE TABLE dvg_genre (
								   genre_id INT(4) NOT NULL AUTO_INCREMENT,
								   Name VARCHAR(255) NOT NULL,
								   PRIMARY KEY (genre_id));";
$result = mysql_query($sql);
if ($result) {
	echo " dvg_genre <br>";
	
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
	echo " dvg_genre <br>";
}

$sql = "CREATE TABLE dvg_box (
								   box_id INT(4) NOT NULL AUTO_INCREMENT,
								   name VARCHAR(255) NOT NULL,
								   PRIMARY KEY (box_id));";
$result = mysql_query($sql);
if ($result) {
	echo " dvg_box <br>";
	
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
	echo " dvg_box <br>";
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
	echo " dvg_mainmenu <br>";
	
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('หน้าแรก','home.png','home','all');";
$result = mysql_query($sql);
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('ข้อมูลเกมส์','listgame.png','listgame','info');";
$result = mysql_query($sql);
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('ข้อมูลสมาชิก','listuser.png','listuser','info');";
$result = mysql_query($sql);
$sql = "Insert into dvg_mainmenu (name,icon,link,menu) Values ('ข้อมูลเว็บไซต์','siteinfo.png','siteinfo','info');";
$result = mysql_query($sql);

} else {
	echo " dvg_mainmenu <br>";
}
mysql_query("USE dvgamer_user;");
$sql = "CREATE TABLE dvg_profile (
								   admin_id INT(2) NOT NULL AUTO_INCREMENT,
								   username VARCHAR(20) NOT NULL,
								   password VARCHAR(32) NOT NULL,
								   PRIMARY KEY (admin_id));";
$result = mysql_query($sql);
if ($result) {
	echo " dvg_profile <br>";
$username = "admin";
$password = md5("dvg7po8ai");
$sql = "Insert into dvg_profile (username,password) Values ('$username','$password');";

$result = mysql_query($sql);
} else {
	echo " dvg_profile <br>";
}
*/
?>
