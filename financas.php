<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/tela-login.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<title>FINANÇAS</title>
</head>
<body>
	<div class="col-md-12 conteudo">
		<h1>Finanças</h1>
		<?php
		include "conexao.php";

		$res= mysql_query("SELECT sum(valor_total) FROM saida_produto WHERE data_saida > '2017/04/01' AND data_saida < '2017/04/31'");
		while($item = mysql_fetch_array($res)){
		   echo $item['sum(valor_total)'] .'<br>';
		}
		
		?>
		
	</div>

</body>
</html>


