<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/tela-login.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<link rel="stylesheet" type="text/css" href="_css/cadastro.css">
	<title>EXCLUIR</title>
</head>

<body>
		<div class="col-md-12 bg">
			<div class="col-md-12 title">
				<h1>EXCLUIR PRODUTO</h1>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="col-md-12 form">
					<form name="singup" method="post" action="excluindo">	
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
						<input class="col-md-4 btn-submit" type="submit" value="EXCLUIR"></div>
						<div class="col-md-2"></div>
					</form>
				</div>
				<div class="col-md-12 btn">
					<form name="sair" method="post" action="estoque">
					<div class="col-md-7"></div>
					<input class="col-md-2 btn-voltar" type="submit" value="VOLTAR">
					</form>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</body>
	</html>