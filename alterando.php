<!DOCTYPE html>
<html>
<?php
include "conexao.php";

?>



<?php 
$nome=$_POST['nome_produto'];
$qtd=$_POST['qtd'];
$data=$_POST['data_entrada'];
$valor=$_POST['valor'];
$sql = mysql_query("INSERT INTO entrada_produto(nome_produto, qtde, valor_unitario, data_entrada)
VALUES('$nome','$qtd', '$valor', '$data')");
echo "<h1><center>Novo Produto Cadastrado</h1></center>";

?>

<script type="text/javascript">
	setTimeout ("window.location='estoque.php'", 3000);
	</script>

<body>

</body>
</html>