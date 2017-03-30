<!DOCTYPE html>
<html>
<?php
include "conexao.php";

?>



<?php 
$nome=$_POST['nome_produto'];
$qtd=$_POST['qtd'];
$id=$_POST['id_produto'];
$data=$_POST['data_saida'];
$valor=$_POST['valor'];
$vendedor=$_POST['vendedor'];
$sql = mysql_query("INSERT INTO saida_produto(nome_produto, id_produto, qtde, valor_unitario, vendedor)
VALUES('$nome','$id','$qtd', '$valor', '$vendedor')");
echo "<h1><center>Venda feita</h1></center>";

?>

<script type="text/javascript">
	setTimeout ("window.location='vendas.html'", 3000);
	</script>

<body>

</body>
</html>