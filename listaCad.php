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
echo "
  <div class= 'col-md-3'></div>
  <div class='col-md-6 fornecedores'>
    <div class='col-md-3 nome'>
      <p>Nome </p>
    </div>
    <div class='col-md-3 end'>
      <p>Endereço </p>
    </div>    
    <div class='col-md-3 cid'>
      <p>Cidade </p>
    </div>
    <div class='col-md-3 pro'>
      <p>Produto </p>
    </div>
     ";
      while($escrever=mysql_fetch_array($res)){
        echo "<div class='col-md-3 sabor'>".$escrever['nome']."</div>";
        echo "<div class='col-md-3 sabor'>".$escrever['endereco']."</div>";
        echo "<div class='col-md-3 sabor'>".$escrever['cidade']."</div>";
        echo "<div class='col-md-3 sabor'>".$escrever['produto']."</div>";

      }
echo "</div>";
?>
<form name="Volta" method="post" action="fornecedores.html">
    <center><input type="submit" value="voltar"></center>
  </form>
</div>
  </body>
</html>