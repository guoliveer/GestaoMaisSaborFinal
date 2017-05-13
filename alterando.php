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
	setTimeout ("window.location='altera'", 3000);
	}
	</script>

<?php 
include "conexao.php";
$nome=$_POST['nome_produto'];
$qt = mysql_query("SELECT qtdeE FROM estoque WHERE nome_produtoE='$nome'");
$qtd=$_POST['qtd'];
$data=$_POST['data_entrada'];
$valor=$_POST['valor'];
if ($nome=='Selecione um Produto' or $qtd==''){
	echo"<script language='javascript' type='text/javascript'>alert('<<FAVOR PREENCHER TODOS OS CAMPOS>>');window.location.href='../GestaoMaisSaborFinal/altera'</script>";
	echo "<script>vazio()</script>";
}else{
	echo"<div class='col-md-12 title'>
        <h1>PRODUTO ALTERADO</h1>
    </div>";
$sql = mysql_query("UPDATE `maissabor`.`estoque` SET `qtdeE`='$qtd',`data_entrada`='$data', `valor_unitario`='$valor' WHERE `nome_produtoE`='$nome';
");
echo "<center><img src=\"_imgs/ok6.png\" alt=\"imagem\" /></center>";
}
?>


<script type="text/javascript">
	setTimeout ("window.location='estoque'", 1000);
	</script>

<body>

</body>
</html>

