<!DOCTYPE html>
<html>
<?php
include "conexao.php";

?>



<?php 
$nome=$_POST['nome'];
$cpf=$_POST['cpf'];
$login=$_POST['login'];
$senha=$_POST['senha'];
$sql = mysql_query("INSERT INTO usuarios(nome,cpf,login,senha)
VALUES('$nome','$cpf','$login','$senha')");
echo "<h1><center>Cadastro efeutado com sucesso</h1></center>";
?>

<script type="text/javascript">
	setTimeout ("window.location='index.html'", 3000);
	</script>

<body>

</body>
</html>