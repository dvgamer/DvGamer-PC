<?php ob_start(); ?>
<html>
<head>
<?php 
include ("include/info.dvgamer.php");
?>
<title><?php echo $DVG_TITLE; ?></title>
</head><head>
<style type="text/css">
body {background:url(images/bg/AssasinCreed.jpg) right top no-repeat; bgcolor:#FFFFFF;}
</style>
<link rel="shortcut icon" href="images/DevilG.ico">
<link href="include/dvgamer_css.css" rel="stylesheet" type="text/css">
<link href="include/template_css.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="include/module.js"></script>

</head><body>
<table class="logo" height="311" border="0" cellpadding="0" cellspacing="0">
  <tr>
     <td  id="logo" width="600" ><img src="images/info.DvG_logo.png" border="0"></td>
     <td valign="top"><?php require("include/header_top.php"); ?></td>
  </tr>
</table>
<?php Moduleleft($adminlogin,$adminuser);  ?>
<table class="main" width="70%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td>
        <div class="main_head"><div>
          <div><strong>.: <a href="index.php?option=home"><?php echo $DVG_HOME; ?></a> --&gt; <?php echo $DVG_EDITGAME; ?> :.</strong><br>
          <img class="line" src="images/head_line.png"></div></div></div>
        </td>
    </tr>
    <tr>
      <td>
          <div class="main_body" style="margin-bottom:12px">
          <div><div><br />

            <center>
            <?php
			$sql = "Delete from dvg_listgame where list_id=$delglist_id;";
		  	$result = mysql_query($sql);
			if($result) {
				echo "<h1>$DELETE_GAME_COMPLATE</h1>";
			} else {
				echo "<h1>$DELETE_GAME_ERROR</h1>";
				echo "<br>". mysql_error();
			}
			echo " <input type=\"button\" class=\"button\" onClick=\"location.href='index.php?option=listgame'\" value=\"$DELETE_GAME_OK\">";
			?>
            </center>
            </div>
          </div></div>
          </div>
                </td>
    </tr>
    <tr>
        <td>
        <div class="main_foot" style="margin-top:-12px;"><div><div>
        &nbsp;
        </div></div></div>
        </td>
    </tr>
</table><br>
</body>
</html>
<?php ob_end_flush(); ?>