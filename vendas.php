<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/tela-login.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<title>VENDAS</title>
</head>

<body>
		<div class="col-md-12 bg">
			<div class="col-md-12 title">
				<h1>CADASTRO DE VENDAS</h1>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="col-md-12 form">
					<form name="singup" method="post" action="vendendo.php">	
				<?
				include "conexao.php";
				$query = mysql_query("SELECT id_produto, nome_produto FROM estoque");

				?>
				 <select>
				 <option>Selecione...</option>
				 
				 <?php while($prod = mysql_fetch_array($query)) { ?>
				 <option value="<?php echo $prod['id_produto'] ?>"><?php echo $prod['id_produto'] ?></option>
				 <?php } ?>
				 
				 </select>

				</form></div>
						<label class="col-md-3">Produto: </label>
						<label class="col-md-3">QUANTIDADE: </label><input class="col-md-9" type="text" name="qtd" placeholder="Quantidade">
						<label class="col-md-3">ID PRODUTO: </label><input class="col-md-9" type="text" name="id_produto" placeholder="Entre com Id do produto">
						
						<label class="col-md-3">VALOR UNITARIO: </label><input class="col-md-9" type="real" name="valor" placeholder="valor">
						<label class="col-md-3">VENDEDOR: </label><input class="col-md-9" type="text" name="vendedor" placeholder="Seu nome">
						<div class="col-md-2"></div>
						<input class="col-md-8 btn-submit" type="submit" value="VENDA">
						<div class="col-md-2"></div>
					</form>
				</div>
				<div class="col-md-12 btn">
					<form name="sair" method="post" action="index.html">
					<div class="col-md-9"></div>
					<input class="col-md-3 btn-voltar" type="submit" value="VOLTAR">
					</form>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</body>
	</html>
