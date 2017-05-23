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
	setTimeout ("window.location='cadProduto'", 1000);
	}
	</script>
<?php 
include "conexao.php";
$nome=$_POST['nome'];
$qtd=$_POST['qte'];
$valor=$_POST['valor'];
$data=$_POST['data'];
if ($nome=='' or $qtd=='') {
	echo"<script language='javascript' type='text/javascript'>alert('<<FAVOR PREENCHER TODOS OS CAMPOS>>');window.location.href='../GestaoMaisSaborFinal/cadProduto'</script>";
	echo "<script>vazio()</script>";
}else{
	echo"<div class='col-md-12 title'>
        <h1>PRODUTO CADASTRADO</h1>
    </div>";
$sql = mysql_query("INSERT INTO estoque (nome_produtoE,qtdeE,valor_unitario,data_entrada)
VALUES('$nome','$qtd','$valor','$data')");
echo "<center><img src=\"_imgs/ok6.png\" alt=\"imagem\" /></center>";
}
?>
<script type="text/javascript">
	setTimeout ("window.location='cadProduto'", 1000);
	</script>
</html>