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

$res = mysql_query("select * from estoque"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */
echo "<table><tr><td>Nome do Picolé</td>$nbsp<td>Quantidade</td><td>ID</td></tr>";

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
while($escrever=mysql_fetch_array($res)){

/*Escreve cada linha da tabela*/
echo "<tr><td>" . $escrever['nome'] ."</td><td>" . $escrever['quantidade'] ."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>" . $escrever['id']."</td></tr>";

}/*Fim do while*/

echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/


?>
  
</div>

<form name="alterar" method="post" action="altera.php">
		
		<h1><center>Atualizar dados</center></h1>		    	
		<center>ID:<input type="number" name="id"><br><br>
		Quantidade Nova: <input type="text" name="qtd"><br><br>
		<p><input type="submit" value="Alterar"></center>
	</form>
<form name="Volta" method="post" action="principal.html">
		<center><input type="submit" value="voltar"></center>
	</form>





</body>
</html>

</body>
</html>