<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$host = "localhost";
$user = "gustavo";
$pass = "root";
$banco = "maissabor";
$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>

</body>
</html>