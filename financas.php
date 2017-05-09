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
	<div class="col-md-12 conteudo">
		<h1>Finanças</h1>

		<div class="col-md-12 form">
		
        <div class="col-md-12">
	       <form name="financias" method="post" action="listaFinancias.php">              
                        <label class="col-md-4">Escolha seu intervalo de tempo para verificar o lucro: </label>
                        <input class="col-md-4" type="date" name="data1">
                        <input class="col-md-4" type="date" name="data2">
                        <input class="col-md-8 btn-submit" type="submit" value="VERIFICAR">
                        </form>
	</div>
	</div>
	<form name="sair" method="post" action="principal.php">
          <div class="col-md-3"></div>
          <input class="col-md-3 btn-voltar" type="submit" value="VOLTAR">
          </form>

</body>
</html>


