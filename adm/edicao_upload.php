<?php
include("../adm/funcoes.php");
session_start();
if(!isset($_SESSION['adm'])&&!isset($_SESSION['cliente'])){
  header("location:login2.php");
}
else if($_SESSION['cliente']==1){
  header("location:index.php");
}
if($_POST){
        AtualizarUpload($_POST['cd'],$_POST['nome'],$_POST['desc'],$_POST['usuario'],$_POST['status']);
}
     if(!isset($_GET['cd'])){
       header("location:edicao2.php");
     }
    if(isset($_GET['cd'])){
        $upload = SelecionarUpload($_GET['cd']);
        $s =$upload['status'];
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
        <li id="inativo"><a href="adm.php">Home</a></li>

<li id="inativo" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false">Usuários <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li id="inativo1"><a href="usuarios.php">Cadastrar</a></li>
             <li id="inativo1"><a href="edicao.php">Editar</a></li>
          </ul>
        </li>
<li id="ativo" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false">Uploads <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li id="inativo1"><a href="upload.php">Adicionar</a></li>
             <li id="inativo1"><a href="edicao2.php">Editar</a></li>
          </ul>
        </li>

<li id="inativo" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li id="inativo1"><a href="edicao_adm.php">Conta</a></li>
            <li><a href="cadastroadm.php">Cadastrar Adm</a></li>
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
<h3 class="text-center">Edição de Upload</h3>

<form id="edicao" action="edicao_upload.php" method="post" enctype="multipart/form-data" class="form-horizontal">
  <input type="hidden" name="cd" value="<?php echo $_GET['cd'];?>" readonly><br>
  <div class="form-group">
    <label for="nome" class="col-sm-1 col-sm-offset-3 control-label">Nome do upload:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $upload['nm_upload'];?>">
    </div>
  </div>

  <div class="form-group">
    <label for="cpf" class="col-sm-1 col-sm-offset-3 control-label">Descrição:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $upload['desc_upload'];?>">
    </div>
  </div>

  <div class="form-group">
    <label  for="foto" class="col-sm-1 col-sm-offset-3 control-label">Arquivo OS:</label>
    <div class="col-sm-6">
      <input type="file" class="form-control" id="foto" name="foto" >
    </div>
  </div>

   <div class="form-group">
    <label for="arquivo" class="col-sm-1 col-sm-offset-3 control-label">Arquivo da O.S. atual:</label>
    <div class="col-sm-6">
    <a style="color:black;" href="os/<?php echo $upload['cd_usuario'],'/',$upload['os_upload'] ;?>" target="_blank"><i class="fa fa-file-text-o fa-3x" aria-hidden="true"></i></a> <?php echo '&nbsp Nome da O.S.:&nbsp'.$upload['os_upload'];?>
    </div>
  </div>

  <div class="form-group">
    <label  for="arte" class="col-sm-1 col-sm-offset-3 control-label">Arte:</label>
    <div class="col-sm-6">
      <input type="file" class="form-control" id="arte" name="arte" >
    </div>
  </div>

   <div class="form-group">
    <label for="artee" class="col-sm-1 col-sm-offset-3 control-label">Arte atual:</label>
    <div class="col-sm-6">
    <a style="color:black;" href="os/<?php echo $upload['cd_usuario'],'/',$upload['arte'] ;?>" target="_blank"><i class="fa fa-picture-o fa-3x" aria-hidden="true"></i></a> <?php echo '&nbsp Nome da arte:&nbsp '.$upload['arte'];?>
    </div>
  </div>

  <!-- <img src="adm/os/1/post1.jpg" width="150px"> -->
<div class="form-group">
  <label for="usuario" class="col-sm-1 col-sm-offset-3 control-label">Usuário:</label>
  <div class="col-sm-6">
<select name="usuario" class="form-control" id="usuario" value="<?php echo $upload['cd_usuario'];?>">
<?php
ListarUsuarios("select",$upload['cd_usuario']);
?>
</select>
</div>
</div>

<div class="form-group">
  <label for="status" class="col-sm-1 col-sm-offset-3 control-label">Status:</label>
  <div class="col-md-6">
<select class="form-control" name="status" id="status">
	<option name="status" value="0" <?php if($s =="0")  echo "selected"; ?>>Arte em Andamento</option>
	<option name="status" value="1" <?php if($s =="1")  echo "selected"; ?>>Arte Aprovada</option>
	<option name="status" value="2" <?php if($s =="2")  echo "selected"; ?>>Impressão</option>
  <option name="status" value="3" <?php if($s =="3")  echo "selected"; ?>>Acabamento</option>
	<option name="status" value="4" <?php if($s =="4")  echo "selected"; ?>>Concluída</option>
</select>
</div>
</div>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button  type="submit" class="btn btn-default">Atualizar</button>
    </div>
  </div>
</form>




</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/js.js"></script>
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>
<?php
}
?>