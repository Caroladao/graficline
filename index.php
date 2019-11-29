<?php
include("adm/funcoes.php");
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Graficline</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/responsiveslides.css">
  <link rel="stylesheet" href="css/owl.theme.css">
  <link rel="stylesheet" href="css/owl.transitions.css">
<link rel="stylesheet" href=" css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="css/estilo1.css">

</head>
  <body>
<nav style="border-width:0px" id="fixed" class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="row">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

       <a class="navbar-brand" href="#">
        <img alt="logo" src="images/graficlinelogo.png" width="150px">
      </a>
 </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="collapse">
      <ul class="nav navbar-nav">
      </ul>
      <ul id="ul" class="nav navbar-nav navbar-right">
        <li><a  href="javascript: link('home',1000);">Home</a></li>
        <li><a href="javascript: link('quem',1000);">Quem somos</a></li>
        <li><a  href="javascript: link('servicos',1500);">Serviços</a></li>
        <li><a  href="javascript: link('contato',2000);">Contato</a></li>
        <li id="dropdown" class="dropdown">
          <a href="#" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i><span class="caret"></span></a>
          <ul id="dropdown_menu" class="dropdown-menu">
            <li><a href="adm/login2.php">Login</a></li>
          </ul>
        </li>
      </ul>
    </div>
</div>
  </div><!-- /.container-fluid -->
</nav>

  <section id="home">


<div class="container">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img id="img_slider" src="images/slide1.png" alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <img id="img_slider" src="images/slide2.png" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img id="img_slider" src="images/slide3.png" alt="...">
      <div class="carousel-caption">
      </div>
    </div>

    <div class="item">
      <img id="img_slider" src="images/slide4.png" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<!---nao mexer-->

    </section>
<div id="fluid_quem" class="container-fluid">
<div class="container">
<section id="quem">
<div class="row">
<div class="col-md-12">
  <h3 id="titulo" class="text-center">Quem Somos</h3>
  <br>
<p id="texto">No ano de 2016, quatro alunos da Etec de Itanhaém se uniram afim de desenvolver um sistema informatizado que a princípio, comtempla gráficas de pequeno e médio porte.</p>
<p id="texto">A empresa é formada por profissionais apaixonados por Design e Programação, Técnicos recém formados com pró atividade para levar adiante o projeto que, além de desenvolver suas características profissionais pessoais os prepara para atuar em equipe no mercado de trabalho. </p>
<p id="texto">A GRAFICLINE nasceu da ânsia pelo aprendizado e constante busca de atualização. Um empresa recém criada que procura facilitar o cotidiano de pequenas empresas. Além disso, busca consolidação nas áreas de Design Gráfico, Web Design, Marketing Digital e áreas correlatas. </p>
<p id="texto">A equipe é formada por Alexsandro dos Santos, Caroline Adão, Elisa Vieira e Jorge Freitas. Será um prazer fazer negócio com você, facilitar seu dia a dia, colaborar com a permanência da sua empresa no mercado em meio a crise e de quebra, nos tornarmos parceiros vitalícios. Sucesso garantido!</p>

</div>
</div>
<div class="row">
  <h3 id="titulo" class="text-center">Valores</h3> <br>

  <div class="col-md-3 col-xs-6 col-xs-offset-3  col-sm-3 col-sm-offset-0">
      <center><img src="images/agilidade.png" class="img-responsive">
      <h3 class="text-center">Agilidade</h3></center>
    </div>

<div class="col-md-3 col-xs-6 col-xs-offset-3  col-sm-3 col-sm-offset-0">
      <center><img src="images/comprometimento.png" class="img-responsive">
      <h3 class="text-center">Comprometimento</h3></center> 
    </div>


    <div class="col-md-3 col-xs-6 col-xs-offset-3  col-sm-3 col-sm-offset-0">
      <center><img src="images/etica.png" class="img-responsive">
      <h3 class="text-center">Ética</h3></center> 
    </div>

    <div class="col-md-3 col-xs-6 col-xs-offset-3  col-sm-3 col-sm-offset-0">
      <center><img src="images/inovacao.png" class="img-responsive">
      <h3 class="text-center">inovação</h3></center> 
    </div>
</div>
</section>
</div>
</div>
<div id="fluid_servicos" class="container-fluid">
  <div class="container">
  <section id="servicos">
<div class="row">
<div class="col-md-12">
  <h3 id="titulo" class="text-center">Serviços</h3>
  <br>
<p id="texto">DESIGN GRÁFICO | Logotipo, Identidade Visual, Manual de Identidade Visual, Gerenciamento de Mídias Sociais (Facebook, Instagram, Twitter, Snapchat etc.), Cartões de Visita e papelaria personalizada. Materiais para divulgação como Banners e folhetos</p>
<p id="texto">WEB DESIGN | Sites institucionais, Sites com sistema admin, Sistemas de gerenciamento e organização empresarial. Criação e Gerenciamento de lojas virtuais e blogs via WordPress. Layout, programação e disparo de emails marketing.  
</p><br>
<div class="row">
    <div class="col-md-3 col-xs-8 col-xs-offset-2 col-sm-3 col-sm-offset-0">
      <img src="images/social.png" class="img-responsive">
      
    </div>

<div class="col-md-3 col-xs-8 col-xs-offset-2 col-sm-3 col-sm-offset-0">
      <img src="images/logotipo.png" class="img-responsive">
    </div>


    <div class="col-md-3 col-xs-8 col-xs-offset-2 col-sm-3 col-sm-offset-0">
      <img src="images/admin.png" class="img-responsive">
    </div>

    <div class="col-md-3 col-xs-8 col-xs-offset-2 col-sm-3 col-sm-offset-0">
      <img src="images/papelaria.png" class="img-responsive">
    </div>
</div>

<br><p id="texto">Nossa equipe é amplamente qualificada e tem como objetivo atender as necessidades da sua empresa. A sua marca estará em boas mãos, a funcionalidade e logística interna pode facilmente ser influenciada por nossos serviços. Entre em contato!</p>
</div>
</div>

</div>
<div class="row">
<div class="container">
  <h3 id="titulo" class="text-center">Clientes</h3>
  <br>
  <p id="texto">
  Esse site em que você navega é um dos serviços que disponibilizamos aos nossos clientes. Um site institucional com sistema administrativo que permite upload e busca de arquivos, filtrados por nome do cliente, título do serviço ou até mesmo número da O.S.. O cliente da sua gráfica poderá acompanhar o pedido diretamente no seu site. Você terá poder de cadastrar e excluir empresas pras quais você presta serviços. A economia de papel e tempo é fantástica.</br>
  Um chat interno pode facilitar a comunicação interna de sua empresa. Tudo isso mais o que você precisar no seu site! Basta entrar em contato conosco e solicitar um orçamento. 
  </p>
  <p id="texto">Buscamos com paciência e tempo, criar um vinculo com nossos clientes e sermos seus solucionadores de problemas oficiais. Permita-nos apresentarmos alguns deles e lhe incentivar a solicitar nossos serviços.</p>
</div>
</div>
<div class="row">
<div class="container">
<BR>
  <div id="owl-demo">
          
  <div class="item"><img id="slider" src="images/CLIENTE.png" alt="Owl Image"></div>
  <div class="item"><img id="slider" src="images/CLIENTE.png" alt="Owl Image"></div>
  <div class="item"><img id="slider" src="images/CLIENTE.png" alt="Owl Image"></div>
  <div class="item"><img id="slider" src="images/CLIENTE.png" alt="Owl Image"></div>
  <div class="item"><img id="slider" src="images/CLIENTE.png" alt="Owl Image"></div>
  <div class="item"><img id="slider" src="images/CLIENTE.png" alt="Owl Image"></div>
  <div class="item"><img id="slider" src="images/CLIENTE.png" alt="Owl Image"></div>
  <div class="item"><img id="slider" src="images/CLIENTE.png" alt="Owl Image"></div>
 
</div>

</div>
</div>
<br>

</section>
</div>
</div>
<div id="fluid_contato" class="container-fluid">
<div class="container">
<section id="contato">
<div class="row">
  <h3 id="titulo" class="text-center">
    Fale Conosco
  </h3>
  <br>
<p id="texto">Entre em contato conosco caso queira tirar um dúvida, solicitar um serviço ou orçamento. Se você for um parceiro em potencial estamos a disposição, entre em contato conosco e nos envie sua proposta.</p>
<p id="texto">
  Abaixo várias formas de nos contatar, inclusive pelo formulário. Responderemos o mais breve possível!
</p>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-4">
    <form class="form-horizontal" action="index.php">
  <div class="form-group">
    <label for="nome" class="col-xs-2 col-sm-1 col-md-2 control-label">Nome:</label>
    <div class="col-xs-8 col-xs-offset-1 col-sm-7 col-sm-offset-2 col-md-offset-1 col-md-8">
      <input type="text" class="form-control" id="nome" placeholder="Nome">
    </div>
  </div>
  <div class="form-group">
    <label for="empresa" class="col-xs-2 col-sm-1 col-md-2 control-label">Empresa:</label>
    <div class="col-xs-8 col-xs-offset-1 col-sm-7 col-sm-offset-2 col-md-offset-1 col-md-8">
      <input type="text" class="form-control" id="empresa" placeholder="nome da empresa">
    </div>
  </div>
  <div class="form-group">
    <label for="setor" class="col-xs-2 col-sm-2 col-md-1 control-label">Setor:</label>
    <div class="col-xs-8 col-xs-offset-1 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-7">
      <input type="text" class="form-control" id="setor" placeholder="setor">
    </div>
  </div>
  <div class="form-group">
    <label for="assunto" class="col-xs-2 col-sm-2 col-md-2 control-label">Assunto:</label>
    <div class="col-xs-8 col-xs-offset-1 col-sm-7 col-md-offset-1 col-sm-offset-1 col-md-8">
      <input type="text" class="form-control" id="assunto" placeholder="assunto">
    </div>
  </div>
  <div class="form-group">
    <label for="mensagem" class="col-xs-2 col-xs-2 col-sm-2 col-md-2 control-label">Mensagem:</label>
    <div class="col-xs-8 col-xs-offset-1 col-sm-7  col-md-offset-1 col-sm-offset-1 col-md-8">
      <textarea class="form-control" rows="4" id="assunto" placeholder="Mensagem"></textarea>
    </div>
  </div>
   <div class="form-group">
    <div class="col-xs-offset-7 col-xs-5 col-sm-offset-6 col-sm-4 col-xs-offset-8 col-xs-4 col-md-offset-6 col-md-5">
      <input id="botao2" type="submit" value="enviar">
    </div>
  </div>
  <?php
if(isset($_POST['setor'])){

  $setor = $_POST['setor'];
  $cont = $_POST['mensagem']; 
  $nome = $_POST['nome']; 
  $empresa = $_POST['empresa']; 
  $email = $_POST['email'];
  $assunto = "GraficLine, $nome - $empresa";
  $mensagem = "Nome: $nome - $empresa \nSetor: $setor \nEmail: $email \n \nMensagem: $cont"; 

  mail('carolineadao1@gmail.com',$assunto,$mensagem,"From: $nome <$email>");

  echo '<script> alert("Enviado com sucesso."); </script>';
}
?>
</form>
  </div>
  <div class="col-sm-6 col-md-4">
    <h3 id="titulo" class="text-center">Acompanhe seu pedido</h3>
  
    <div class="form-group">
      <label for="codigo" class="col-sm-2 control-label">Código:</label>
      <div class="col-sm-10 col-xs-12">
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Digite o código do pedido...">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-9 col-sm-3 col-xs-offset-8 col-xs-4 col-md-offset-9 col-md-3">
        <button id="btnPedido" data-toggle="modal" data-target="#myModal">enviar</button>
      </div>
    </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" align="center"><b>Acompanhe seu Pedido</b></h4>
      </div>
      <div class="modal-body">
      <div id="dados"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
    </div>

  <div class="col-md-4">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7276.651674394051!2d-46.890455219456946!3d-24.230379948012086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94d02a5fe5cc5587%3A0xdbf75298222dbaab!2sitanhaem!5e0!3m2!1spt-BR!2sbr!4v1477267084466" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>

</div>

</section>
</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/js.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
<script>

  $(document).on('click','#btnPedido',function(){
     //alert("acompanha.php?codigo="+$('#codigo').val());
     var c = $('#codigo').val();
     $('#dados').load("adm/acompanha.php?codigo="+c);
     $('myModal').modal(show);
     
  });

$(document).ready(function(){

$("#owl-demo").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
    pagination: false,
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });

$('.carousel').carousel({
  interval:5000
});

});
</script>

  </body>
</html>