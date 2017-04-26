<!DOCTYPE html>
<html>
<?php
include "conexao.php";

?>


<?php
$login=$_POST['login'];
$sql = mysql_query("SELECT * FROM usuarios WHERE login='$login'") or dir (mysql_error());
$row = mysql_num_rows($sql);
if ($row > 0) {
	session_start();
	$_SESSION['login']=$_POST['login'];
	echo"<script language='javascript' type='text/javascript'>alert('Esse Login ja existe!');history.go(-1);</script>";
	} else {
		$nome=$_POST['nome'];
		$cpf=$_POST['cpf'];
		$login=$_POST['login'];
		$senha=$_POST['senha'];
		$sql = mysql_query("INSERT INTO usuarios(nome,cpf,login,senha)
		VALUES('$nome','$cpf','$login','$senha')");
		echo "<h1><center>Cadastro efeutado com sucesso</h1></center>";

}

?>

<script type="text/javascript">
	setTimeout ("window.location='index.html'", 3000);
	</script>

<body>

</body>
</html>