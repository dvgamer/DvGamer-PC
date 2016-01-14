<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ทดสอบส่งเมล์</title>
</head>

<body>
<?php
error_reporting(E_ALL);
require 'Mail.php';
$mail = Mail::factory('mail');
$headers = array('From'=> 'me@mydomain.com', 'Subject' => 'Hawdy');

$succ = $mail ->send('webmaster@dvgmail.pc', $headers, 'Glad to meet you.');

if (PEAR::isError($succ)) {
	echo 'Email Sending failed: ' . $succ ->getMessage();
} else {
	echo 'Email sent Succecfully.';
}
?>
</body>
</html>