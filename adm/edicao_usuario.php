<?php
include("../adm/funcoes.php");
session_start();
if(!isset($_SESSION['cliente'])&&!isset($_SESSION['adm'])){
  header("location:login2.php");
}
else if($_SESSION['adm']==1){
  header("location:adm.php");
}
if($_POST){
        AtualizarUsuario2($_POST['cd'],$_POST['nome'],$_POST['cpf'],$_POST['usuario'],$_POST['senha'],$_POST['data']);
    }
    if(!isset($_GET['cd'])){
      header("location:index.php");
    }
    if(isset($_GET['cd'])){
        $usuario = SelecionarUsuario($_GET['cd']);

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Painel de Controle | Edição </title>

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
        <li class="dropdown" id="inativo"><a href="index.php">Pedidos</a></li>
<li class="dropdown" id="ativo">
          <a href="#"  aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li id="ativo1"><a href="edicao_usuarios.php?cd=<?php echo $_SESSION['cd_usuario'];?>">Conta</a></li>
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
<h3 class="text-center">Edição de Usuário</h3>

<form action="edicao_usuarios.php" method="post" class="form-horizontal">

<input type="hidden" name="cd" value="<?php echo $_GET['cd'];?>" readonly><br>

  
  <div class="form-group">
    <label for="nome" class="col-sm-2 col-sm-offset-2 control-label">Nome:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario['nm_usuario'];?>">
    </div>
  </div>

  <div class="form-group">
    <label for="cpf" class="col-sm-2 col-sm-offset-2 control-label">CPF:</label>
    <div class="col-sm-4">
      <input type="number" class="form-control" id="cpf" name="cpf" value="<?php echo $usuario['cpf_usuario'];?>" >
    </div>
  </div>


<div class="form-group">
    <label for="usuario" class="col-sm-2 col-sm-offset-2 control-label">Usuário:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario['user_usuario'];?>" >
    </div>
  </div>

  <div class="form-group">
    <label for="senha" class="col-sm-2 col-sm-offset-2 control-label">Senha:</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $usuario['senha_usuario'];?>" >
    </div>
  </div>

  <div class="form-group">
    <label for="data" class="col-sm-2 col-sm-offset-2 control-label">Data de nascimento:</label>
    <div class="col-sm-4">
      <input type="date" class="form-control" id="data" name="data" value="<?php echo $usuario['nasc_usuario'];?>" >
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