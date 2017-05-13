<!DOCTYPE html>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/tela-login.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<link rel="stylesheet" type="text/css" href="_css/cadastro.css">
<html>
	    <script type="text/javascript">
function vazio() {
	setTimeout ("window.location='vendas'", 1000);
	}
	</script>
<?php 
include "conexao.php";
$nome=$_POST['nome_produto'];
$qtd=$_POST['qtd'];
$data=$_POST['data_saida'];
$valor=$_POST['valor'];
$valor_total=$qtd*$valor;
$vendedor=$_POST['vendedor'];
if ($nome=='Selecione um Produto' or $qtd=='' or $valor=='' or $dat) {
	echo"<script language='javascript' type='text/javascript'>alert('<<FAVOR PREENCHER TODOS OS CAMPOS>>');window.location.href='../GestaoMaisSaborFinal/vendas'</script>";
	echo "<script>vazio()</script>";
}else{
	echo"<div class='col-md-12 title'>
        <h1>VENDA REGISTRADA</h1>
    </div>";
$sql = mysql_query("INSERT INTO saida_produto(nome_produto, qtde, valor_total, data_saida, vendedor)
VALUES('$nome','$qtd', '$valor_total', '$data','$vendedor')");
echo "<center><img src=\"_imgs/ok6.png\" alt=\"imagem\" /></center>";
}
?>
<script type="text/javascript">
	setTimeout ("window.location='vendas'", 1000);
	</script>

</html>