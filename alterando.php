<!DOCTYPE html>
<html>
<?php
include "conexao.php";

?>



<?php 


$nome=$_POST['nome_produto'];
$qt = mysql_query("SELECT qtdeE FROM estoque WHERE nome_produtoE='$nome'");
$qtd=$_POST['qtd'];
$data=$_POST['data_entrada'];
$valor=$_POST['valor'];
$sql = mysql_query("UPDATE `maissabor`.`estoque` SET `qtdeE`='$qtd',`data_entrada`='$data', `valor_unitario`='$valor' WHERE `nome_produtoE`='$nome';
");
echo "<h1><center>Produto Atualizado</h1></center>";

?>

<script type="text/javascript">
	setTimeout ("window.location='estoque.php'", 3000);
	</script>

<body>

</body>
</html>

