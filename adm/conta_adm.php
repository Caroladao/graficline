<?php
include("funcoes.php");
session_start();
if(!isset($_SESSION['adm'])&&!isset($_SESSION['cliente'])){
  header("location:login2.php");
}
else if($_SESSION['cliente']==1){
  header("location:index.php");
}
if($_POST){
        AtualizarAdm($_POST['cd'],$_POST['nome'],$_POST['user'],$_POST['senha']);
    }
    if(isset($_GET['cd'])){
        $adm = SelecionarAdm($_GET['cd']);

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Painel de Controle | Edição Adm</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href=" ../css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="../css/estilo1.css">
<link rel="stylesheet" href="Source/noty.css">
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
        <li id="inativo"><a href="adm.php">Home</a></li>

<li id="inativo" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false">Usuários <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li id="inativo1"><a href="usuarios.php">Cadastrar</a></li>
             <li id="inativo1"><a href="edicao.php">Editar</a></li>
          </ul>
        </li>
<li id="inativo" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false">Uploads <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li id="inativo1"><a href="upload.php">Adicionar</a></li>
             <li id="inativo1"><a href="edicao2.php">Editar</a></li>
          </ul>
        </li>

<li id="ativo" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li id="ativo1"><a href="edicao_adm.php">Conta</a></li>
            <li id="inativo1"><a href="cadastroadm.php">Cadastrar Adm</a></li>
             <li id="inativo1"><a href="sair.php">Sair</a></li>
          </ul>
        </li>

      </ul>
    </div>
</div>
  </div><!-- /.container-fluid -->
</nav>

<div id="adm_pagina" class="col-md-12">

<br>
<h3 class="text-center">Edição do Administrador</h3>

<form action="edicao_adm.php" method="post" class="form-horizontal">

<input type="hidden" name="cd" value="<?php echo $_GET['cd'];?>" readonly><br>

  
  <div class="form-group">
    <label for="nome" class="col-sm-2 col-sm-offset-2 control-label">Nome:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $adm['nm_adm'];?>">
    </div>
  </div>


<div class="form-group">
    <label for="user" class="col-sm-2 col-sm-offset-2 control-label">Login:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="user" name="user" value="<?php echo $adm['user_adm'];?>" >
    </div>
  </div>

  <div class="form-group">
    <label for="senha" class="col-sm-2 col-sm-offset-2 control-label">Senha:</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $adm['senha_adm'];?>" >
    </div>
  </div>



  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-default">Atualizar</button>
    </div>
  </div>
  </form>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/js.js"></script>
    <script src="Source/noty.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>
<?php
}
?>