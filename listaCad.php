<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
    <link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
    <!-- Essa página ou praticamente copiei a página de cadastro de usuário -->
    <link rel="stylesheet" type="text/css" href="_css/cadastro.css">
    <title>+Sabor</title>
  </head>

  <body>


  <div style="color:white">
  <?php

include "conexao.php";


$res = mysql_query("select * from fornecedor"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */
echo "<table><tr><td>Nome</td><td>Endereco</td><td>Rua</td><td>Numero</td><td>Cidade</td><td>Estado</td><td>Produto</td><td>CNPJ</td></tr>";

/*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
while($escrever=mysql_fetch_array($res)){

/*Escreve cada linha da tabela*/
echo "<tr><td>" . $escrever['nome'] . "</td><td>" . $escrever['endereco'] ."</td><td>" . $escrever['rua']. "</td><td>" . $escrever['numero']. "</td><td>". $escrever['cidade'] . "</td><td>" . $escrever['cidade'] . "</td><td>" . $escrever['estado'] . "</td><td>" . $escrever['produto'] . "</td><td>" . $escrever['cnpj']."</td></tr>";

}/*Fim do while*/

echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/


?>



<form name="Volta" method="post" action="fornecedores.html">
    <center><input type="submit" value="voltar"></center>
  </form>
</div>
  </body>
</html>