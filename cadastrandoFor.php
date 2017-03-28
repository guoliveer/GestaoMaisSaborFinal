<!DOCTYPE html>
<html>

<?php 
include "conexao.php";
$nome=$_POST['nome'];
$endereco=$_POST['endereco'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$produto=$_POST['produto'];
$cnpj=$_POST['cnpj'];
$sql = mysql_query("INSERT INTO fornecedor(nome,endereco,rua,numero,cidade,estado,produto,cnpj)
VALUES('$nome','$endereco','$rua','$numero','$cidade','$estado','$produto','cnpj')");
echo "<h1><center>Cadastro efeutado com sucesso</h1></center>";
?>

<script type="text/javascript">
	setTimeout ("window.location='index.html'", 3000);
	</script>

<body>

</body>
</html>