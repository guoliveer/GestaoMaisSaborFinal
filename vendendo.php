<!DOCTYPE html>
<html>
<?php
include "conexao.php";

?>



<?php 
$nome=$_POST['nome_produto'];
$qtd=$_POST['qtd'];
$data=$_POST['data_saida'];
$valor=$_POST['valor'];
$valor_total=$qtd*$valor;
$data_saida=$_POST['data_saida'];
$vendedor=$_POST['vendedor'];
$sql = mysql_query("INSERT INTO saida_produto(nome_produto, qtde, valor_total, data_saida, vendedor)
VALUES('$nome','$qtd', '$valor_total', '$data','$vendedor')");
echo "<h1><center>Venda feita</h1></center>";

?>

<script type="text/javascript">
	setTimeout ("window.location='vendas.php'", 1000);
	</script>

<body>

</body>
</html>