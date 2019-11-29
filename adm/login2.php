
<?php
include("../adm/funcoes.php");
session_start();

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../favicon.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="../css/estilo1.css">

</head>
  <body>
  <section id="login">
  <div id="ir_home">
    <a href="../index.php"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Ir para o site</a>
  </div>
<div class="container">
  <?php
if($_POST){
if(isset($_POST['usuario']))
$_SESSION['cliente'] =$_POST['usuario'] ;
$_SESSION['cliente1'] = $_POST['senha'];
Login($_POST['usuario'],$_POST['senha']);
}
?>
  <div class="col-md-8 col-md-offset-4">
  <img id="user_img" src="../images/user.png" class="img-responsive">
  </div>
<div class="col-md-10 col-md-offset-2">
<form action="login2.php" method="post" class="form-horizontal">
  <div class="form-group">
    <label for="usuario" class="col-sm-2 control-label">Usuario:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" autofocus>
    </div>
  </div>
  <div class="form-group">
    <label for="senha" class="col-sm-2 control-label">Senha:</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Lembrar
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Entrar</button>
    </div>
  </div>
</form>
</div>
  
</div>
  </section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/js.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>