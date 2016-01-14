<?
function Sum($New)
{
	for ($i = 1; $i <= $New ;$i+=2)
	{
		$sum += $i;
	}
	print $sum;
}

?>

<html>
<head>
<title>Test</title>
</head>

<body>
<?php
Sum(50);
?>
</body>
</html>
