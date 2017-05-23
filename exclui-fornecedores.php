
<?php

	session_start();

	include "conexao2.php";
	$id = $_POST['exclui'];

	$sql = "DELETE FROM fornecedor WHERE id = '$id' ";
	mysqli_query($strcon,$sql) or die (header('location:listaCad.php'));
	mysqli_close($strcon);
	echo"<script language='javascript' type='text/javascript'>alert('Registro Deletado');window.location.href='listaCad.php'</script>";
?>
