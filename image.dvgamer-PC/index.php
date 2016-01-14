<?php ob_start(); session_start(); ?>
<html>
<head>
<?php 

include ("include/images.dvgamer.php");
?>
<title><?php echo $DVG_TITLE; ?></title>
</head><head>
<style type="text/css">
body {background:url(images/bg/Crysis.jpg) right top no-repeat; bgcolor:#FFFFFF;}
</style>
<link rel="shortcut icon" href="images/DvGIcon.ico">
<link href="include/dvgamer_css.css" rel="stylesheet" type="text/css">
<link href="include/template_css.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="include/module.js"></script>

</head><body>
<table class="logo" height="311" border="0" cellpadding="0" cellspacing="0" >
  <tr>
     <td  id="logo" width="600" ><img src="images/images.DvG_Logo.png" border="0"></td>
     <td valign="top">&nbsp;</td>
  </tr>
</table>
	<table class="main" width="60%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td>
        <div class="main_head"><div><div>
        &nbsp;
        </div></div></div>
        </td>
    </tr>
    <tr>
      <td>
      <form class="main_body" method="post" action="<?php $PHP_SELF; ?>" style="margin-bottom:0px;"><div><div>
  <table width="220" height="119px" border="0" align="center" id="login">
   <tr>
    <td colspan="2" align="center"><strong>
	<?php 
	if ($usercheck) {
		echo $LOGIN_TEXT; 
	} else {
		echo $LOGIN_FAIL_TEXT1; 
	}
	?>
    </strong></td></strong>
   </tr>
   <tr>
    <td align="right">Username : </td>
    <td align="center"><input name="user" type="text" id="userinput" size="20" maxlength="15" value="<?php echo $uname; ?>" /></td>
   </tr>
   <tr>
    <td align="right">Password : </td>
    <td align="center"><input name="passwd" type="password" id="keyinput" size="20" maxlength="15" /></td>
   </tr>
   <tr>
    <td colspan="2" align="center"><input type="submit" name="login" id="button" value="&nbsp;Login&nbsp;" /></td>
   </tr>
  </table>
  </div></div></form>
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

</body>
</html>
<?php ob_end_flush(); ?>