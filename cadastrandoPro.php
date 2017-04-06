<!DOCTYPE html>
<html>

<?php 
include "conexao.php";
$nome=$_POST['nome'];
$qtd=$_POST['qte'];
$valor=$_POST['valor'];
$data=$_POST['data'];
$sql = mysql_query("INSERT INTO estoque (nome_produtoE,qtdeE,valor_unitario,data_entrada)
VALUES('$nome','$qtd','$valor','$data')");
echo "<h1><center>Cadastro efeutado com sucesso</h1></center>";
?>

<script type="text/javascript">
	setTimeout ("window.location='estoque.php'", 3000);
	</script>

<body>

</body>
</html>