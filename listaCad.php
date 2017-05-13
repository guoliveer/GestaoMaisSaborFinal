<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
    <link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
    <!-- Essa página ou praticamente copiei a página de cadastro de usuário -->
    <link rel="stylesheet" type="text/css" href="_css/cadastro.css">
    <link rel="stylesheet" type="text/css" href="_css/estoque.css">
    <title>+Sabor</title>
  </head>

  <body>
  <div class="col-md-12 title">
        <h1>LISTA DE FORNECEDORES</h1>
    </div>


  <div style="color:black">
  <?php

include "conexao.php";


$res = mysql_query("select * from fornecedor"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */
echo "
  <div class= 'col-md-1'></div>
  <div class='col-md-10 fornecedores'>
  <div class= 'col-md-1'></div>
    <div class='col-md-2 nome'>
      <p>Nome </p>
    </div>
    <div class='col-md-6 cid'>
      <p>Cidade </p>
    </div>
    <div class='col-md-2 pro'>
      <p>Produto </p>
    </div>
     ";
      while($escrever=mysql_fetch_array($res)){
        echo "<div class='col-md-12 sabor'>"; 
        #echo "<hr class='style11'>";      
        echo "<div class='col-md-4 <p>'>".$escrever['nome']."</div>";
        echo "<div class='col-md-4 '>".$escrever['cidade']."</div>";
        echo "<div class='col-md-4 '>".$escrever['produto']."</p></div></div>";


      }
      ?>
      <div class="col-md-12"></div>
      <div class="col-md-7"></div>
      <form name="novo" method="post" action="fornecedores">
      <input class="col-md-3 btn-submit" type="submit" value="CADASTRAR FORNECEDOR">
      </div>
      </form>
<div class="col-md-9"></div>
<form name="Volta" method="post" action="principal">
    <input class="col-md-2 btn-voltar" type="submit" value="voltar">
  </form>
</div>
  </body>
</html>