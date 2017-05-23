<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="_css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="_css/tela-login.css">
	<link rel="icon" type="img/png" href="_imgs/icon-ice-cream.png">
	<link rel="stylesheet" type="text/css" href="_css/estoque.css">
	<link rel="stylesheet" type="text/css" href="_css/cadastro.css">
<div class="col-md-12 title">
      
<script type="text/javascript">
function vazio() {
	setTimeout ("window.location='financas'", 1000);
	}
	</script>
<?php 
include "conexao.php";
$data1=$_POST['data1'];
$data2=$_POST['data2'];
$res= mysql_query("SELECT sum(valor_total) FROM saida_produto WHERE data_saida > '$data1' AND data_saida < '$data2'");
if ($data1=='' or $data2 ==''){
	echo"<script language='javascript' type='text/javascript'>alert('<<FAVOR INSERIR AS DATAS>>');window.location.href='../GestaoMaisSaborFinal/financas'</script>";
	echo "<script>vazio()</script>";
}else{
	echo"<div class='col-md-12 title'>
        <h1>LUCRO</h1>
    </div>";

echo "
  <div class= 'col-md-12'></div>
  <div class='col-md-3'></div>
  <div class='col-md-6 fornecedores'>";
		while($item = mysql_fetch_array($res)){
			echo "O valor total das vendas no intervalo escolhido é de: <br><br>";
			 echo 'R$: '.$item['sum(valor_total)'] .'<br>';
		}
		echo "</div>";
	}
?>
<div class="col-md-12 btn">
	<form name="sair" method="post" action="financas">
          <div class="col-md-7"></div>
          <input class="col-md-2 btn-voltar" type="submit" value="VOLTAR">
          </form>
          </div>



<body>

</body>
</html>