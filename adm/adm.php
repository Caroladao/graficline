<?php
include("../adm/funcoes.php");
session_start();
if(!isset($_SESSION['adm'])&&!isset($_SESSION['cliente'])){
  header("location:login2.php");
}
else if($_SESSION['cliente']==1){
  header("location:index.php");
}

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Painel de Controle | ADM</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href=" ../css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="../css/estilo1.css">
<link rel="stylesheet" href="../css/adm.css">

</head>
  <body>
<nav style="border-width:0px" id="fixed" class="navbar navbar-default">
  <div class="row">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

       <a class="navbar-brand " href="#">
        <img alt="logo" src="../images/graficlinelogo.png" width="150px">
      </a>
 </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="collapse">
      <ul class="nav navbar-nav navbar-right">
        <li id="ativo"><a href="adm.php">Home</a></li>

<li id="inativo" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false">Usuários <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li><a href="usuarios.php">Cadastrar</a></li>
             <li><a href="edicao.php">Editar</a></li>
          </ul>
        </li>
<li id="inativo" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false">Uploads <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li><a href="upload.php">Adicionar</a></li>
             <li><a href="edicao2.php">Editar</a></li>
          </ul>
        </li>

<li id="inativo" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li><a href="edicao_adm.php">Conta</a></li>
            <li><a href="cadastroadm.php">Cadastrar Adm</a></li>
             <li><a href="sair.php">Sair</a></li>
          </ul>
        </li>

      </ul>
    </div>
</div>
  </div><!-- /.container-fluid -->
</nav>
<div id="adm_pagina" class="col-md-12">
<div class="row">
<center><img src="../images/adm.png" style="width:65%;"></center>
<?php
echo '<hr>';
echo'<h3>Olá '.$_SESSION['nome'].', Bem vindo(a)!</h3>';
echo '<hr>';
ListarMensagem();
echo '</div>'
?>
<!-- <div class="col-md-10">
<i class="fa fa-archive fa-5x"><span style="position:absolute;bottom: 0px;color:white;background:black;" class="badge"><?php echo ListarUploadAdm();?></span></i>
</div><br><br><br> -->
<hr><h3>Ultimos Updates:</h3>
<?php echo ListarUploadAdm2();?>


</div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/js.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>