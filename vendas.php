<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/tela-login.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<link rel="stylesheet" type="text/css" href="_css/cadastro.css">
	<title>VENDAS</title>
</head>

<body>
		<div class="col-md-12 bg">
			<div class="col-md-12 title">
				<h1>VENDAS</h1>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="col-md-12 form">
					<form name="singup" method="post" action="vendendo">
							<label class="col-md-3">Produto: </label>
							<select name="nome_produto">
							<option>Selecione um Produto</option>
							<?php
								include "conexao.php";
								$rest=mysql_query("SELECT * FROM estoque order by nome_produtoE asc");
								while($row=mysql_fetch_assoc($rest)){?>
									<option><?php echo $row['nome_produtoE'];?></option>
									<?php
									}
							?>
							</select><br><br>
						<label class="col-md-3">QUANTIDADE: </label><input class="col-md-9" type="number" name="qtd" placeholder="Quantidade">
						<label class="col-md-3">VALOR UNT: </label><input class="col-md-9" type="real" name="valor" placeholder="valor">
						<label class="col-md-3">DATA SAIDA: </label><input class="col-md-9" type="date" name="data_saida">
						<label class="col-md-3">VENDEDOR: </label><input class="col-md-9" type="text" name="vendedor" placeholder="Seu nome">
						<div class="col-md-3"></div>
					<input class="col-md-4 btn-submit" type="submit" value="REGISTRAR VENDA">
					<div class="col-md-1"></div>
					</form>
					<form name="fim" method="post" action="listaVen">
					<input class="col-md-4 btn-submit" type="submit" value="VERIFICAR VENDAS">
					<div class="col-md-1"></div>
					</form>
					</form>
					</div>
					</div>
					<div class="col-md-12 btn">
					<form name="sair" method="post" action="principal">
					<div class="col-md-7"></div>
					<input class="col-md-2 btn-voltar" type="submit" value="VOLTAR">
					</form>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</body>
	</html>
