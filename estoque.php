 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/tela-login.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<title>ESTOQUE</title>
</head>
<body>

<html>
 <head>
  <title>Exibir dados com PHP/MySql</title>
 </head>
<body>



<div style="color:white">


<?php


include "conexao.php";
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$res = mysql_query("SELECT A.nome_produtoE,A.qtdeE,B.data_entrada
  FROM estoque A
 INNER JOIN entrada_produto B ON B.nome_produto = A.nome_produtoE"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */
echo "<table><tr><td>Nome do Picolé</td>$nbsp<td>Quantidade</td><td>Data Entrada</td></tr>";

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
while($escrever=mysql_fetch_array($res)){

/*Escreve cada linha da tabela*/
echo "<tr><td>" . $escrever['nome_produtoE'] ."</td><td>" . $escrever['qtdeE'] ."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>" . $escrever['data_entrada']."</td></tr>";

}/*Fim do while*/

echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/


?>
  
</div>
<div class="col-md-12 btn">
					<form name="sair" method="post" action="index.html">
					<div class="col-md-9"></div>
					<input class="col-md-3 btn-voltar" type="submit" value="VOLTAR">
					</form>
				</div>


</body>
</html>

</body>
</html>