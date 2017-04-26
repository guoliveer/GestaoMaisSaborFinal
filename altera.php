<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/tela-login.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<title>CADASTRAR PRODUTO</title>
</head>

<body>
		<div class="col-md-12 bg">
			<div class="col-md-12 title">
				<h1>ATULIZAR ESTOQUE</h1>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="col-md-12 form">
					<form name="singup" method="post" action="alterando.php">	
						<label class="col-md-3">Produto: </label>
						<select name="nome_produto">
							<option>Selecione um Produto</option>
							<?php
								include "conexao.php";
								$rest=mysql_query("SELECT * FROM estoque");
								while($row=mysql_fetch_assoc($rest)){?>
									<option><?php echo $row['nome_produtoE'];?></option>
									<?php
									}
							?>
							</select><br><br>
						<label class="col-md-3">QUANTIDADE: </label><input class="col-md-9" type="text" name="qtd" placeholder="Quantidade">
						<label class="col-md-3">VALOR: </label><input class="col-md-9" type="real" name="valor" placeholder="valor">
						<label class="col-md-3">DATA ENTRADA: </label><input class="col-md-9" type="date" name="data_entrada" placeholder="ANO-MES-DIA">
						<div class="col-md-2"></div>
						<input class="col-md-8 btn-submit" type="submit" value="ATULIZAR">
						<div class="col-md-2"></div>
					</form>
				</div>
				<div class="col-md-12 btn">
					<form name="sair" method="post" action="principal.php">
					<div class="col-md-9"></div>
					<input class="col-md-3 btn-voltar" type="submit" value="VOLTAR">
					</form>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</body>
	</html>