<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/tela-login.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<link rel="stylesheet" type="text/css" href="_css/cadastro.css">
	<title>FINANÇAS</title>
</head>
<body>
		<div class="col-md-12 title">
				<h1>FINANÇAS</h1>
		<div class="col-md-3"></div>
		<div class="col-md-6 form">
					 <form name="financias" method="post" action="listaFinancias.php">              
                        <label class="col-md-12">Escolha o intervalo tempo para verificar o lucro: </label><br><br>
                        <input class="col-md-6" type="date" name="data1">
                        <input class="col-md-6" type="date" name="data2">
                        <div class="col-md-4"></div>
                        <input class="col-md-4 btn-submit" type="submit" value="VERIFICAR">
                        </form>
                        </div>
	</div>
	</div>
	<div class="col-md-12 btn">
	<form name="sair" method="post" action="principal.php">
          <div class="col-md-7"></div>
          <input class="col-md-2 btn-voltar" type="submit" value="VOLTAR">
          </form>
          </div>

</body>
</html>


