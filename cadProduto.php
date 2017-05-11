<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
		<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
		<!-- Decidi criar uma pagina css exclusiva para a pagina de cadastro, achei mais funcional -->
		<link rel="stylesheet" type="text/css" href="_css/cadastro.css">
		<title>+Sabor</title>
	</head>

	<body>
		<!-- conteudo geral da página (mudei um pouco a sua estrutura espero que não se importe)-->
		<div class="col-md-12 bg">
			<div class="col-md-12 title">
				<h1>CADASTRO DE PRODUTOS</h1>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="col-md-12 form">
					<form name="singup" method="post" action="cadastrandoPro">		    	
						<label class="col-md-3">Nome: </label><input class="col-md-9" type="text" name="nome" placeholder="Digite o Nome do produto">
						<label class="col-md-3">Quantidade: </label><input class="col-md-9" type="text" name="qte" placeholder="Entre com a quantidade">
						<label class="col-md-3">Valor: </label><input class="col-md-9" type="text" name="valor" placeholder="Entre com valor do produto">
						<label class="col-md-3">Data Entrada: </label><input class="col-md-9" type="date" name="data">
						<div class="col-md-2"></div>
						<input class="col-md-5 btn-submit" type="submit" value="CADASTRAR">
						<div class="col-md-2"></div>
					</form>
				</div>
				<div class="col-md-12 btn">
					<form name="sair" method="post" action="estoque">
					<div class="col-md-9"></div>
					<input class="col-md-3 btn-voltar" type="submit" value="VOLTAR">
					</form>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</body>
</html>