<?php ob_start(); session_start(); ?>
<html>
<head>
<?php 
include ("include/info.dvgamer.php");
define('_DVG_TITLE_NAME','Testing title page for DvGAmer.PC.com');
?>
<title><?php echo _DVG_TITLE_NAME; ?></title>
</head><head>
<style type="text/css">
body {background:url(images/bg/AssasinCreed.jpg) right top no-repeat; bgcolor:#FFFFFF;}
</style>
<link rel="shortcut icon" href="images/DvGIcon.ico">
<link href="include/dvgamer_css.css" rel="stylesheet" type="text/css">
<link href="include/template_css.css" rel="stylesheet" type="text/css">

</head><body>
<table height="311" border="0" cellpadding="0" cellspacing="0" class="logo">
  <tr>
     <td  id="logo" width="600" background="images/info.DvG_logo.png">&nbsp;</td>
  </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
     <td valign="top"><?php require("include/top_mainmenu.php"); ?></td>
  </tr>
</table>
<br><br><br><br><br>
<?php 
if (!$option) {
?>
	<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
    <tr>
        <td>
        <div class="main_head"><div><div>
        &nbsp;
        </div></div></div>
        </td>
    </tr>
    <tr>
      <td>
        <div class="main_body"><div><div id="MainBody">
        <center>&nbsp;
        </center><br />
        </div></div></div>
      </td>
    </tr>
    <tr>
        <td>
        <div class="main_foot"><div><div>
        &nbsp;
        </div></div></div>
        </td>
    </tr>
</table><br>

<?php } MainBody($option,$page,$sort,$by,$id,$adminlogin,$adminuser); ?>

</body>
</html>
<?php ob_end_flush(); ?>