<!DOCTYPE html>
<html>

<?php 
include "conexao.php";
$nome=$_POST['nome_produto'];
$sql = mysql_query("DELETE FROM `maissabor`.`estoque` WHERE `nome_produtoE`='$nome';
");
echo "<h1><center>Produto Excluido</h1></center>";
?>

<script type="text/javascript">
	setTimeout ("window.location='estoque.php'", 3000);
	</script>

<body>

</body>
</html>