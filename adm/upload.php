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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Painel de Controle | ADM</title>

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
            <li id="ativo1"><a href="usuarios.php">Cadastrar</a></li>
             <li id="inativo1" ><a href="edicao.php">Editar</a></li>
          </ul>
        </li>
<li id="ativo" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false">Uploads <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li id="ativo1"><a href="upload.php">Adicionar</a></li>
             <li id="inativo1"><a href="edicao2.php">Editar</a></li>
          </ul>
        </li>

<li id="inativo" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li id="inativo"><a href="edicao_adm.php">Conta</a></li>
            <li><a href="cadastroadm.php">Cadastrar Adm</a></li>
             <li id="inativo"><a href="sair.php">Sair</a></li>
          </ul>
        </li>

      </ul>
    </div>
</div>
  </div><!-- /.container-fluid -->
</nav>

<div id="adm_pagina" class="col-md-12">
<br>
<h3 class="text-center">Salvar Upload</h3>
<br>
<form id="upload" action="upload.php" method="post" enctype="multipart/form-data" class="form-horizontal">
  
  <div class="form-group">
    <label for="nome" class="col-sm-1 col-sm-offset-3 control-label">Nome do upload:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
  </div>

  <div class="form-group">
    <label for="cpf" class="col-sm-1 col-sm-offset-3 control-label">Descrição:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="desc" name="desc" >
    </div>
  </div>

  <div class="form-group">
    <label for="foto" class="col-sm-1 col-sm-offset-3 control-label">Arquivo OS:</label>
    <div class="col-sm-4">
      <input type="file" class="form-control" id="foto" name="foto" required>
    </div>
  </div>

  <div class="form-group">
    <label for="arte" class="col-sm-1 col-sm-offset-3 control-label">Arte:</label>
    <div class="col-sm-4">
      <input type="file" enctype="multi/part" class="form-control" id="arte" name="arte" >
    </div>
  </div>

  <div class="form-group">
    <label for="usuario" class="col-sm-1 col-sm-offset-3 control-label">Usuário:</label>
    <div class="col-sm-4">
  <select class="form-control" name="usuario" id="usuario" required>
<?php
ListarUsuarios("select");
?>
</select>
</div>
</div>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button  type="submit" class="btn btn-default">Cadastrar</button>
    </div>
  </div>
</form>

<?php
 if(isset($_POST['nome'])){
SalvarUpload($_POST['nome'],$_POST['desc'],$_POST['usuario']);
}
?>

<br><br>
 <br><br><br>
 
<!-- Small modal -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/js.js"></script>
     <script src="Source/noty.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>

<script>
  $(document).ready(function(){
        $("#usuario").change(function(){
         var usuario = $(this).val();
         //$('#categoria').load('ajax_categoria.php?id='+sessao);
        });
    });


</script>


  </body>
</html>