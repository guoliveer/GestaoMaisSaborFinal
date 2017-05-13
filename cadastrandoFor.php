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
$nome=$_POST['nome'];
$endereco=$_POST['endereco'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$produto=$_POST['produto'];
$cnpj=$_POST['cnpj'];
if ($nome=='' or $produto==''){
	echo"<script language='javascript' type='text/javascript'>alert('<<FAVOR PREENCHA TODOS OS CAMPOS>>');window.location.href='../GestaoMaisSaborFinal/fornecedores'</script>";
	echo "<script>vazio()</script>";
}else{
	$sql = mysql_query("INSERT INTO fornecedor(nome,endereco,rua,numero,cidade,estado,produto,cnpj)
VALUES('$nome','$endereco','$rua','$numero','$cidade','$estado','$produto','cnpj')");
	echo "<div class='col-md-12 title'>
				<h1>FORNECEDOR CADASTRADO</h1>
		</div>";
	echo "<center><img src=\"_imgs/ok6.png\" alt=\"imagem\" /></center>";
}
?>

<script type="text/javascript">
	setTimeout ("window.location='listaCad'", 1000);
	</script>
</html>