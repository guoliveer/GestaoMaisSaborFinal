<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/tela-login.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<link rel="stylesheet" type="text/css" href="_css/estoque.css">
	<link rel="stylesheet" type="text/css" href="_css/cadastro.css">
<script type="text/javascript">
function vazio() {
	setTimeout ("window.location='fornecedores'", 1000);
	}
	</script>
<?php
include "conexao.php";
$login=$_POST['login'];
$sql = mysql_query("SELECT * FROM usuarios WHERE login='$login'") or dir (mysql_error());
$row = mysql_num_rows($sql);
if ($row > 0) {
	session_start();
	$_SESSION['login']=$_POST['login'];
	echo"<script language='javascript' type='text/javascript'>alert('ESSE LOGIN JÁ EXISTE');history.go(-1);</script>";
	}else if ($login==''){
	echo"<script language='javascript' type='text/javascript'>alert('PREENCHA TODOS OS CAMPOS');history.go(-1);</script>";
	} else {
			echo "<div class='col-md-12 title'>
				<h1>USUÁRIO CADASTRADO</h1>
		</div>";
	echo "<center><img src=\"_imgs/ok6.png\" alt=\"imagem\" /></center>";
		$nome=$_POST['nome'];
		$cpf=$_POST['cpf'];
		$login=$_POST['login'];
		$senha=$_POST['senha'];
		$sql = mysql_query("INSERT INTO usuarios(nome,cpf,login,senha)
		VALUES('$nome','$cpf','$login','$senha')");
		}

?>

<script type="text/javascript">
	setTimeout ("window.location='index'", 1000);
	</script>

<body>

</body>
</html>