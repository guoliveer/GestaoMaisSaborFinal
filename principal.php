<!DOCTYPE html>
<html>
<head>
	<title>+Sabor</title>
	<meta charset="utf-8">
	<!-- Importando jquery -->
	<script src="_js/jquery.min.js"></script>
	<script src="_js/bootstrap.min.js"></script>
	
	<!-- Importando boostrap e fa-icons -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	
	<!-- minhas paginas css -->	
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">

	<link rel="stylesheet" type="text/css" href="_css/menu-sup.css">
	<link rel="stylesheet" type="text/css" href="_css/footer.css">
	<link rel="stylesheet" type="text/css" href="_css/principal.css">

	<?php  
      session_start();
      if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset ($_SESSION['nome']) == true))
      {
      	unset($_SESSION['login']);
      	unset($_SESSION['senha']);
      	header('location:index.php');
      	}
      $login = $_SESSION['login'];
      $senha = $_SESSION['senha'];

      $mysqli = new mysqli('localhost','root','','maissabor') or die('Erro ao conectar ao banco de dados');
      $result = $mysqli->query("SELECT nome FROM usuarios WHERE login = '$login'");
         if($result){
          while ($row = $result->fetch_assoc()){
            $logado =  utf8_encode($row["nome"]);
          }
          $result->free();
      }
      ?>
</head>
<body>
 <!-- MENU  SUPERIOR-->
    <div class="col-md-12 menu">
      <div class="col-md-2 lateral-user">
      <i class="fa fa-user fa-2x" aria-hidden="true"></i>
      <p>
      <?php 
         echo"Bem vindo $logado";
       ?></p>
      </div>
      <div class="col-md-9 menu-princ">
      <ul>
        <li class="col-xs-2 home-nav"><a href="principal"><i class="fa fa-home fa-2x"></i><br>HOME</a></li>
        <li class="col-xs-2 est-nav"><a href="estoque"><i class="fa fa-cubes fa-2x" aria-hidden="true"></i><br>ESTOQUE</a></li>
        <li class="col-xs-2 ven-nav"><a href="vendas"><i class="fa fa-credit-card fa-2x" aria-hidden="true""></i><br>VENDAS</a></li>
        <li class="col-xs-2 fin-nav"><a href="financas"><i class="fa fa-money fa-2x" aria-hidden="true"></i><br>FINANÇAS</a></li>
        <li class="col-xs-2 for-nav"><a href="listaCad"><i class="fa fa-users fa-2x"></i><br>FORNECEDORES</a></li>
        <li class="col-xs-2 for-nav"><a href="gis"><i class="fa fa-users fa-2x"></i><br>INTELIGÊNCIA</a></li>

      </ul>
    </div>
    <div class="col-md-1 logout">
       <a href="logout"><i class="fa fa-user-times fa-2x"></i><br>SAIR</a>
    </div>
  </div>
<!-- FIM MENU -->

<!-- Conteúdo geral da página -->
	<div class="col-md-12 titulo">
		<h1>GESTÃO +SABOR</h1>
	</div>	
	<div class="col-md-12 card">
	<div class="col-md-1"></div>
		<div class="col-md-2 card">
			<a href="estoque">
				<div class="col-xs-12 card-est">
					<i class="fa fa-cubes fa-2x" aria-hidden="true"></i>
					<h1>ESTOQUE</h1>
				</div>
			</a>
		</div>
		<div class="col-xs-2 card">
			<a href="vendas">
				<div class="col-xs-12 card-ven">
					<i class="fa fa-credit-card fa-2x" aria-hidden="true""></i>
					<h1>VENDAS</h1>
				</div>
			</a>
		</div>
		<div class="col-xs-2 card">
			<a href="financas">
				<div class="col-xs-12 card-fin">
					<i class="fa fa-money fa-2x" aria-hidden="true"></i>
					<h1>FINANÇAS</h1>
				</div>
			</a>
		</div>
		<div class="col-xs-2 card">
			<a href="listaCad">
				<div class="col-xs-12 card-for">
					<i class="fa fa-users fa-2x"></i>
					<h1>FORNECEDORES</h1>
				</div>
			</a>
		</div>
		<div class="col-xs-2 card">
			<a href="listaCad">
				<div class="col-xs-12 card-gis">
					<i class="fa fa-users fa-2x"></i>
					<h1>INTELIGÊNCIA</h1>
				</div>
			</a>
		</div>
		<div class="col-md-1"></div>

	</div>
<!-- footer -->
<div class="col-md-12 footer">
	<div class="col-xs-9 conteudo-1"></div>
	<div class="col-xs-3 conteudo-2">
		<p>Desenvolvido por: Gustavo Oliveira</p>
	</div>
</div>
</body>
</html>