 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/estoque.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<title>ESTOQUE</title>
</head>
<body>

<form name="atualiza" method="post" action="altera.php">
			<div class="col-md-2"></div>
            <input class="col-md-3 btn-listar" type="submit" value="ATUALIZAR ESTOQUE">
            
          </form>
<form name="cadastrar" method="post" action="cadProduto.php">
          <input class="col-md-3 btn-listar" type="submit" value="CADASTRAR PRODUTO">
          </form>
<form name="excluir" method="post" action="excluirPro.php">
          <input class="col-md-3 btn-listar" type="submit" value="EXCLUIR PRODUTO">
          </form>
</div>
</div>
<?php


include "conexao.php";
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$res = mysql_query("SELECT * from estoque order by nome_produtoE asc"); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */

echo "
	<div class=	'col-md-3'></div>
	<div class='col-md-6 estoque'>
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
				echo "<div class='col-md-5 sabor'>".$escrever['nome_produtoE']."</div>";
				echo "<div class='col-md-2 sabor'>".$escrever['qtdeE']."</div>";
				echo "<div class='col-md-5 sabor'>".$escrever['data_entrada']."</div>";

			}
echo "</div>
	";
?>
<div class="col-md-8 btn">
					<form name="sair" method="post" action="principal.php">
					<input class="col-md-8 btn-voltar" type="submit" value="VOLTAR">
					</form>
				</div>


</body>
</html>

</body>
</html>