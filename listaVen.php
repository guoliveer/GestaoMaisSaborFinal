  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
      <link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
      <link rel="stylesheet" type="text/css" href="_css/cadastro.css">
      <!-- Essa página ou praticamente copiei a página de cadastro de usuário -->
      <link rel="stylesheet" type="text/css" href="_css/estoque.css">
      <title>+Sabor</title>
    </head>

    <body>
    <div class="col-md-12 title">
          <h1>VENDAS REALIZADAS</h1>
        </div>


    <div style="color:black">
    <?php

  include "conexao.php";


  $res = mysql_query("select * from saida_produto"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */
  echo "
    <div class= 'col-md-1'></div>
    <div class='col-md-10 estoque'>
      <div class='col-md-1'></div>
      <div class='col-md-1 nome'>
        <p>Produto </p>
      </div>
      <div class='col-md-1'></div>
      <div class='col-md-2 nome'>
        <p>Quantidade</p>
      </div>    
      <div class='col-md-2 cid'>
        <p>Valor Total </p>
      </div>
      <div class='col-md-2 pro'>
        <p>Data da Venda </p>
      </div>
      <div class='col-md-2pro'>
        <p>Vendedor</p>
      </div>
          ";
        while($escrever=mysql_fetch_array($res)){
          echo "<div class='col-md-12 sabor'>";
          echo "<div class='col-md-3 '>".$escrever['nome_produto']."</div>";
          echo "<div class='col-md-2 '>".$escrever['qtde']."</div>";
          echo "<div class='col-md-2 '>".$escrever['valor_total']."</div>";
          echo "<div class='col-md-2 '>".$escrever['data_saida']."</div>";
          echo "<div class='col-md-3 '>".$escrever['vendedor']."</p>";
          $prodId=$escrever['id'];
        echo"<form method='post' action='exclui-vendas.php' id='form' name='form'>
                      <input style= 'position:absolute; background:url(_imgs/exclui.png); background-repeat: no-repeat; border:none; top:-2vh; right:3vw; padding-left: 0%; color: rgba(0,0,0,.0)' value='$prodId' type='submit' name='exclui'> 
                     </form>
                    </div>
                </div>";
          }     
 ?>
            
   </div>
    </body>
    <div class="col-md-9"></div>
    <form name="Volta" method="post" action="vendas">
      <input class="col-md-2 btn-voltar" type="submit" value="voltar">
    </form>
  </html>