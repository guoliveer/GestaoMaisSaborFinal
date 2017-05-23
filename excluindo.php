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
	setTimeout ("window.location='excluirPro'", 1000);
	}
	</script>
<?php 
include "conexao.php";
$nome=$_POST['nome_produto'];
if ($nome=='Selecione um Produto') {
	echo"<script language='javascript' type='text/javascript'>alert('<<FAVOR ESCOLHER UM PRODUTO>>');window.location.href='../GestaoMaisSaborFinal/excluirPro'</script>";
	echo "<script>vazio()</script>";
}else{
	echo"<div class='col-md-12 title'>
        <h1>PRODUTO EXCLUIDO</h1>
    </div>";
echo "<center><img src=\"_imgs/ok6.png\" alt=\"imagem\" /></center>";
$sql = mysql_query("DELETE FROM `maissabor`.`estoque` WHERE `nome_produtoE`='$nome';
	
");
}
?>

<script type="text/javascript">
	setTimeout ("window.location='excluirPro'", 1000);
	</script>


</html>