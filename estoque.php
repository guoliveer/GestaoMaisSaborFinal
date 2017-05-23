 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/estoque.css">
	<link rel="stylesheet" type="text/css" href="_css/cadastro.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<title>ESTOQUE</title>
</head>
<body>
 <div class="col-md-12 title">
        <h1>PRODUTOS EM ESTOQUE</h1>
      </div>

<?php


include "conexao.php";
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$res = mysql_query("SELECT * from estoque order by nome_produtoE asc"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */
echo "
	<div class=	'col-md-2'></div>
	<div class='col-md-8 estoque'>
		<div class='col-md-5 nome'>
			<p>Nome do Picolé </p>
		</div>
		<div class='col-md-2 qtd'>
			<p>Quantidade </p>
		</div>		
		<div class='col-md-5 data'>
			<p>Data Entrada </p>
		</div>	
		";
			while($escrever=mysql_fetch_array($res)){
				echo "<div class='col-md-12 sabor'>";
				echo "<div class='col-md-5  <p>'>".$escrever['nome_produtoE']."</div>";
				echo "<div class='col-md-2 '>".$escrever['qtdeE']."</div>";
				echo "<div class='col-md-5 '>".$escrever['data_entrada']."</p>";
				$prodId=$escrever['id'];
				echo"<form method='post' action='exclui-registros.php' id='form' name='form'>
                    	<input style= 'position:absolute; background:url(_imgs/exclui.png); background-repeat: no-repeat; border:none; top:0vh; right:-5vw; padding-left: 0%; color: rgba(0,0,0,.0)' value='$prodId' type='submit' name='exclui'> 
                     </form>
                    </div>
                </div>";


			}
?>
			<div class="col-md-12"></div>
			<form name="atualiza" method="post" action="altera">
			            <input class="col-md-4 btn-submit" type="submit" value="ATUALIZAR ESTOQUE">			            
			          </form>
			<form name="cadastrar" method="post" action="cadProduto">
			          <input class="col-md-4 btn-submit" type="submit" value="CADASTRAR PRODUTO">
			          </form>
			<form name="excluir" method="post" action="excluirPro">
          			<input class="col-md-4 btn-submit" type="submit" value="EXCLUIR PRODUTO">
          			</form>
          	</div>
    <div class="col-md-8"></div>      		
	<div class="col-md-2"> 
		<form name="sair" method="post" action="principal">
			<input class="col-md-12 btn-voltar" type="submit" value="VOLTAR">
		</div>


</body>
</html>

</body>
</html>