
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$host = "localhost";
$user = "gustavo";
$pass = "root";
$banco = "maissabor";
$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>
<html>

<head>
	<title>Autenticação</title>
<script type="text/javascript">
function loginfeito() {
	setTimeout ("window.location='principal.html'", 3000);
	}

function loginfailed() {
	setTimeout ("window.location='index.html'", 3000);
	}
	</script>
</head>
<body>

<?php
$login=$_POST['login'];
$senha=$_POST['senha'];
$sql = mysql_query("SELECT * FROM usuarios WHERE login='$login' and senha='$senha'") or dir (mysql_error());
$row = mysql_num_rows($sql);
if ($row > 0) {
	session_start();
	$_SESSION['login']=$_POST['login'];
	$_SESSION['senha']=$_POST['senha'];
	echo "<center><img src=\"_imgs/bv2.png\" alt=\"imagem\" /></center>";
	echo "<script>loginfeito()</script>";
} else {
	echo"<script language='javascript' type='text/javascript'>alert('Grupo ou senha inválidos');window.location.href='../beta/index.html'</script>";
	echo "<script>loginfailed()</script>";
}


?>

</body>
</html>