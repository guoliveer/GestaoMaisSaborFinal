<!DOCTYPE html>
<html>
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$host = "localhost";
$user = "gustavo";
$pass = "root";
$banco = "maissabor";
$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>
<head>
    <title>Altera</title>

<script type="text/javascript">
function loginfeito() {
	setTimeout ("window.location='estoque.php'", 3000);
	}
	</script>

</head>
<body>


	<?php
$id=$_POST['id'];
$qdt=$_POST['qtd'];
$sql = mysql_query("UPDATE `estoque` SET `quantidade` = '$qdt' WHERE `estoque`.`id` = $id");
echo "<h1><center>Alterado</h1></center>";
echo "<script>loginfeito()</script>";
?>


</body>
</html>