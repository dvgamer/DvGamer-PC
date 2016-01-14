<html>
<head>
<?php 
require_once("include/language.thai.php");
?>
<title><?php echo _DVG_TITLE_NAME; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo _DVG_CHARSET; ?>"></head><head>
<style type="text/css">
body {background:url(images/bg/AssasinCreed.jpg) right top no-repeat; bgcolor:#FFFFFF;}
</style>
<link rel="shortcut icon" href="images/DvGIcon.ico">
<script language="javascript" src="include/ajax.dvgamer-pc.js"></script>
<link href="include/css/template_css.css" rel="stylesheet" type="text/css">
<style type="text/css">img, div, input { behavior:url(include/css/iepngfix.htc); }</style>

</head>
<body>

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" class="logo">
 <tr>
    <td height="240" valign="top">
     
     <table width="675" height="95" border="0" align="center" cellpadding="0" cellspacing="0" class="menu">
  		<tr>
        	<td width="220">
            <?php 
			
			/*
			$host="messenger.services.live.com";
			$port="80";
			$path="/users/44b112ad6136dc8c@apps.messenger.live.com/presence?dt=&mkt=en-US";
			
			$fp=fsockopen($host,$port);
			fputs($fp,"POST $path HTTP/1.1\r\n");
			fputs($fp,"Host: $host\r\n");
			fputs($fp,"Content-type: image/gif\r\n");
			fputs($fp,"Content-length: ".strlen($data)."\r\n");
			fputs($fp,"Connection: close\r\n\r\n");

			while(!feof($fp)){
			     $result.=fgets($fp,128);
			     }
			fclose($fp);
			
			list($temp,$a)=split('"status": "',$result);
			list($status,$temp)=split('", "displayName"',$a);
			
			list($temp,$a)=split('"displayName": "',$result);
			list($displayName,$temp)=split('", "id": "',$a);

				echo $displayName . "<br>";
			if($status == "Offline"){
			   echo"Offline";
			}elseif ($status == "Busy"){
			   echo"Busyaaaa";
			}elseif ($status == "Away"){
			   echo"Away";
			}else{
				echo "Online";
			}*/
			
			?>
            </td>
     		<td width="30" background="images/header/Header_Left.png">&nbsp;</td>
     		<td width="415" align="center" valign="top" background="images/header/Header_Body.png"><strong>
            <div><img src="images/icon/home.png" border="0"><br>Home</div>
            <div><img src="images/icon/down.png" border="0"><br>Download</div>
            <div><img src="images/icon/buygame.png" border="0"><br>BuyGame</div>
            <div><img src="images/icon/board.png" border="0"><br>Webboard</div>
            <div><img src="images/icon/info.png" border="0"><br>Help</div>
            </strong></td>
     		<td width="30" background="images/header/Header_Right.png">&nbsp;</td>
  		</tr>
	 </table>
    <table width="350" height="110" border="0" align="right" cellpadding="0" cellspacing="0" class="login">
       <tr>
         <td height="110" width="13" background="images/login-bg1.png" style="background-repeat:no-repeat;">&nbsp;</td>
         <td width="256" valign="top" background="images/login-bg2.png" style="background-repeat:repeat-x;"><div id="title">
           <label><strong>Login ::</strong></label>
           <table width="255" border="0" cellspacing="2" cellpadding="2">
            <tr>
                <td><input name="username" type="text" id="username" maxlength="20">&nbsp;&nbsp;<input name="pass" type="password" id="password" maxlength="20"></td>
            </tr>
            <tr>
                <td align="center"><span id="text-ligin">Please login or Register.</span></td>
             </tr>
            </table>
            <center><strong><a href="#">Register</a> / <a href="#">Forget?</a></strong></center>
           
         </div>
         </td>
         <td width="70" align="center" background="images/login-bg2.png" style="background-repeat:repeat-x;">
           <div><a href="#">
           <input type="image" src="images/login.png"\>
           <strong>Login</strong></a></div>
         </td>
         <td width="11" align="center" background="images/login-bg2.png" style="background-repeat:repeat-x;">&nbsp;</td>
       </tr>
      </table>
     </td>
  </tr>
  <tr valign="top">
     <td>
     <table class="MainBody-1" width="85%" align="center" cellpadding="0" cellspacing="0">
  		<tr>        
     	  <td align="center" valign="top" class="module" style="padding:20px 0 20px 0;">
            <a onClick="Loading();"><div class="menu-list">Run Loading</div></a>
            <a onClick="unLoading();"><div class="menu-list">Close Loading</div></a>
            <a><div class="menu-list">Test Menu1</div></a>
            <a href=""><div class="menu-list">Test Menu2</div></a>
            <a href=""><div class="menu-list">Test Menu3</div></a>
          </td>
     	  <td align="left" valign="top" style="padding:10px;">
            <div id="preload">&nbsp;</div>
            <div id="header">
             &nbsp;
             </div>
            <div id="bodyContent">
              ......... <br>
              Not Details<br> 
              <?php echo date('Y-m-d H:i.s', $_SERVER['REQUEST_TIME']).'<br>'. $_SERVER['REQUEST_TIME'].'<br>'; 
			  $datetime = strtotime("09/24/1970");
			  echo $datetime.'<br>';
			  echo date('Y-m-d', $datetime).'<br>';
			  echo 'Day-> '.date('d', $_SERVER['REQUEST_TIME']).'<br>';
			  echo 'Month-> '.date('m', $_SERVER['REQUEST_TIME']).'<br>';
			  echo 'Year-> '.date('Y', $_SERVER['REQUEST_TIME']).'<br>';
			  ?><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
           </div>
          </td>
  		</tr>
	 </table>
     </td>
  </tr>
  <tr>
    <td>
    <?php require("footer.php"); ?>
    </td>
   </tr>
</table>
</body>

     <!-- 
     <table class="MainBody-2" width="85%" align="center" cellpadding="0" cellspacing="0">
  		<tr id="head">
     	  <td id="L">&nbsp;</td>
          <td id="C">&nbsp;</td>
          <td id="R">&nbsp;</td>
  		</tr>
  		<tr id="body">
     	  <td id="L">&nbsp;</td>
          <td id="C">
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          </td>
          <td id="R">&nbsp;</td>
  		</tr>
  		<tr id="foot">
     	  <td id="L">&nbsp;</td>
          <td id="C">&nbsp;</td>
          <td id="R">&nbsp;</td>
  		</tr>
	 </table>
 -->

</html>