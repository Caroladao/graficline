<?php
//ini_set( 'default_charset', 'utf-8');

$a = "localhost"; //servidor
$b = "root"; //usuario
$c = ""; //senha
$d = "seguranca"; //nome do SEU banco..
$con = new mysqli($a,$b,$c,$d);
// $a = "mysql.hostinger.com.br"; //servidor
// $b = "u323246991_alex"; //usuario
// $c = "997911628"; //senha
// $d = "u323246991_tcc"; //nome do SEU banco..
// $con = new mysqli($a,$b,$c,$d);

if (mysqli_connect_errno())
	trigger_error(mysqli_connect_error());

//conectando..
function Login($usuario,$senha){
$sql = 'SELECT * FROM usuario WHERE ';
$sql.= 'user_usuario="'.$usuario.'" AND ';
$sql.= 'senha_usuario="'.$senha.'"';
$tem = $GLOBALS['con']->query($sql);
	if($tem->num_rows >0){
		$usuario = $tem->fetch_array();
		$_SESSION['cliente']=1;
		$_SESSION['adm']=0;
		$_SESSION['cd_usuario'] = $usuario['cd_usuario'];
		$_SESSION['nome'] = $usuario['nm_usuario'];
		$_SESSION['nm_usuario'] = $usuario['user_usuario'];
		$_SESSION['senha_usuario'] = $usuario['senha_usuario'];
		$_SESSION['cpf'] = $usuario['cpf_usuario'];
		$_SESSION['cnpj_usuario'] = $usuario['cnpj_usuario'];
		//redirecionar
		vai("index.php");
		//echo $sql;
	}
else{
$sql = 'SELECT * FROM adm WHERE ';
$sql.= 'user_adm="'.$usuario.'" AND ';
$sql.= 'senha_adm="'.$senha.'"';
$tem = $GLOBALS['con']->query($sql);
	if($tem->num_rows >0){
		$adm = $tem->fetch_array();
		$_SESSION['adm']=2;
		$_SESSION['cliente']=0;
		$_SESSION['cd_adm'] = $adm['cd_adm'];
		$_SESSION['nome'] = $adm['nm_adm'];
		$_SESSION['nm_adm'] = $adm['user_adm'];
		$_SESSION['senha_adm'] = $adm['senha_adm'];
		//redirecionar
		vai("adm.php");
		//echo $sql;
}
else{


		//mensagem de dados inválidos

		echo '
		<div class=col-md-offset-1 col-md-10 >	
		<div class="alert alert-danger text-center">
                        <i class="fa fa-error fa-3x"></i>&nbsp;Usuário ou Senha inválidos.
                    </div>
                    </div>';
	}
}
}

function AcompanhaPedido($codigo){
	// $sql2='SELECT * FROM upload';
	// 	$resultados1= $GLOBALS['con']->query($sql2);
	// 	$total=$resultados1->num_rows;	
	// 	$porpagina=10;
	// 	$pag = isset($_GET['pag'])?(($_GET['pag'])*$porpagina)-$porpagina : 0;

	// 	$sql ='SELECT upload.cd_upload,upload.nm_upload,upload.desc_upload,usuario.cd_usuario, upload.os_upload,usuario.nm_usuario,upload.status,upload.erro
	// 	FROM usuario usuario
	// 	INNER JOIN upload upload ON usuario.cd_usuario = upload.cd_usuario';

	// 	$sql.=' ORDER BY cd_upload desc';
	// 	$resultados= $GLOBALS['con']->query($sql);


	// 	$sql3 ='SELECT upload.cd_upload,upload.nm_upload,upload.desc_upload,usuario.cd_usuario, upload.os_upload,usuario.nm_usuario,upload.status,upload.erro
	// 	FROM usuario usuario
	// 	INNER JOIN upload upload ON usuario.cd_usuario = upload.cd_usuario
	// 	WHERE upload.erro != "Nenhuma mensagem."';	

	// if($total2==0){



	// echo '';

$sql = 'SELECT * FROM upload WHERE cd_upload='.$codigo;
$tem = $GLOBALS['con']->query($sql);
	if($tem->num_rows >0){
		$cod = $tem->fetch_array();
		//redirecionar
		echo '<div id="pedido">
Nome do pedido = '.$cod['nm_upload'].'
		</div>';
	}
else{
		//mensagem de dados inválidos

		echo '
		<div class=col-md-offset-1 col-md-10 >	
		<div class="alert alert-danger text-center">
                        <i class="fa fa-error fa-3x"></i>&nbsp;Código do Pedido incorreto.
                    </div>
                    </div>';
	}
}

function vai($pag){
  echo '<script>window.location="'.$pag.'";</script>';
}
function oi($msg,$tipo){
	echo '<script>
$.notify("'.$msg.'","'.$tipo.'");
	</script>';
}
function teste(){
	echo '';
}

function CadastrarUsuariof($email,$data,$cpf,$nome,$usuario,$senha,$tel){
$sql2 = 'SELECT * FROM usuario WHERE ';
$sql2.= 'nm_usuario="'.$nome.'"';
$tem = $GLOBALS['con']->query($sql2);
// if($tem->num_rows >0){
// 	echo "<script>alert('usuário com o mesmo nome já existente');</script>";
// }
// else{
	$sql= 'INSERT INTO usuario VALUES';
	$sql.= '(null,"'.$email.'"';
	$sql.= ',"'.$data.'"';
	$sql.= ',"'.$cpf.'"';
	$sql.= ',"null"';
	$sql.= ',"'.$nome.'"';
	$sql.= ',"'.$usuario.'"';
	$sql.= ',"'.$senha.'"';
	$sql.= ',"'.$tel.'")';
	$cadastrar = $GLOBALS['con']->query($sql);
	if($cadastrar){
?>
<script src="../js/jquery.min.js"></script>
<script src="Source/jBox.js"></script>
<script src="Source/noty.js"></script>
<script type="text/javascript">
$(document).ready(function(){
new Noty({
  progressBar:false,
  timeout:3000,
  theme:'bootstrap-v4',
  type:'success',
  layout:'topCenter',
    text: 'Usuário cadastrado!',
}).show();
});
</script>
<?php
	}
// }
}
function CadastrarUsuarioj($email,$cnpj,$nome,$usuario,$senha,$tel){
$sql2 = 'SELECT * FROM usuario WHERE ';
$sql2.= 'nm_usuario="'.$nome.'"';
$tem = $GLOBALS['con']->query($sql2);
if($tem->num_rows >0){
	echo "<script>alert('usuário com o mesmo nome já existente');</script>";
}
else{
	$sql= 'INSERT INTO usuario VALUES';
	$sql.= '(null,"'.$email.'"';
	$sql.= ',"null"';
	$sql.= ',"null"';
	$sql.= ',"'.$cnpj.'"';
	$sql.= ',"'.$nome.'"';
	$sql.= ',"'.$usuario.'"';
	$sql.= ',"'.$senha.'"';
	$sql.= ',"'.$tel.'")';
	$cadastrar = $GLOBALS['con']->query($sql);
	if($cadastrar){
?>
<script src="../js/jquery.min.js"></script>
<script src="Source/jBox.js"></script>
<script src="Source/noty.js"></script>
<script type="text/javascript">
$(document).ready(function(){
new Noty({
  progressBar:false,
  timeout:3000,
  theme:'bootstrap-v4',
  type:'success',
  layout:'topCenter',
    text: 'Usuário cadastrado!',
}).show();
});
</script>
<?php
	}		
	}
}

function ListarStatus($forma,$status){

	$sql = 'SELECT * FROM upload ORDER BY status ASC';
	$resultados= $GLOBALS['con']->query($sql);
//$sql='SELECT * from upload where status';
//$resultados= $GLOBALS['con']->query($sql);
	while($st = $resultados->fetch_array()){
	if($forma=="select"){
		echo '<option value="0">0</option>
			  <option value="1">1</option>
		  	  <option value="2">2</option>
			  <option value="3">3</option>';
			}


/*if($upload['status'] == 0){
					echo "<td>Arte aprovada</td>";
					}
					else if($upload['status'] == 1){
					echo "<td>Em produção</td>";
					}
					else if($upload['status'] == 2){
					echo "<td>Acabamento</td>";
					}
					else{
					echo "<td>Concluída</td>";
					}*/
}
}


function ListarUsuarios($forma,$codigo){
$sql2='SELECT * FROM usuario';
$resultados1= $GLOBALS['con']->query($sql2);
$total=$resultados1->num_rows;	
$porpagina=10;
$pag = isset($_GET['pag'])?(($_GET['pag'])*$porpagina)-$porpagina : 0;

$sql ='SELECT *from usuario';

if(isset($_GET['buscar'])){
$sql.=' WHERE usuario.nm_usuario LIKE "%'.$_GET['buscar'].'%" or usuario.user_usuario LIKE "%'.$_GET['buscar'].'%" ORDER BY nm_usuario asc';
$resultados= $GLOBALS['con']->query($sql);
}

else{
$sql.=' ORDER BY nm_usuario asc';
$resultados= $GLOBALS['con']->query($sql);
}

$total=$resultados->num_rows;
echo"Total: ". $total."<br>";
$paginas = ceil($total / $porpagina);

$sql3 ='SELECT *from usuario';

if(isset($_GET['buscar'])){
$sql3.=' WHERE usuario.nm_usuario LIKE "%'.$_GET['buscar'].'%" or usuario.user_usuario LIKE "%'.$_GET['buscar'].'%"';
 $sql3.=" ORDER BY cd_usuario asc limit $pag,$porpagina";
}
else{
 $sql3.=" ORDER BY cd_usuario asc limit $pag,$porpagina";	
}
$resultados2= $GLOBALS['con']->query($sql3);

	if($total==0){
		?>
<style>

#buscar{
display:none;
}
#pesquisar{
display:none;
}

</style>
		<?php
		echo '<div class="col-md-12">
<h4 class="text-left">Nenhum usuário encontrado!<h4>
		</div>';
	}
	else{
?>
<style>

#buscar{
display:block;
}
#pesquisar{
display:block;
}

</style>
<?php
}
echo'<div  id="table" class="table-responsive">
<div style="relative" id="table" class="table-responsive">
<table class="table  table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>Cod.</th>
<th>Nome do cliente</th>
<th>Email</th>
<th>Telefone</th>
<th>Nome de usuário</th>
<th>Controles</th>
</tr>
</thead>
<tbody>';
	while($usuario = $resultados2->fetch_array()){
		if($forma == "select"){
			if($codigo==$usuario['cd_usuario'])
echo '<option selected value="'.$usuario['cd_usuario'].'">'.$usuario['nm_usuario'].'</option>';
else{
	echo '<option value="'.$usuario['cd_usuario'].'">'.$usuario['nm_usuario'].'</option>';
}
}
else{
		echo '
		<tr class="odd gradeX">
					<td>'.$usuario['cd_usuario'].'</td>
                    <td>'.$usuario['nm_usuario'].'</td>
                    <td>'.$usuario['email'].'</td>';
                                     
                    echo'<td>'.$usuario['telefone'].'</td>
                    <td>'.$usuario['user_usuario'].'</td>';
                    echo '<td>
					<a href="#"><i data-toggle="modal" data-target="#myModal'.$usuario['cd_usuario'].'" class="fa fa-trash-o fa-2x"></i></a>
					<div class="modal fade" id="myModal'.$usuario['cd_usuario'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h3 class="text-center" id="myModalLabel">Deseja mesmo excluir?</h3>
				        <div class="text-center"><h4>Cliente: '.$usuario['nm_usuario'].'</h4>
        				</div>
				      </div>
				      <div class="modal-footer">
				        <center><button style="width:200px;" type="button" class="btn btn-default" data-dismiss="modal">Não</button>
				        <a href="?excluir='.$usuario['cd_usuario'].'">
				        <button style="width:200px;" type="button" class="btn btn-success">Sim</button></a></center>
				      </div>
				    </div>
				  </div>
				</div>
                    <a href="edicao_usuarios.php?cd='.$usuario['cd_usuario'].'">
                    <i class="fa fa-edit fa-2x"></i></a>
                    </td>
               </tr>';
}
}
echo'</tbody>
</table>
</div>
</div>
</div>';

echo '<center><div id="paginacao">';
for($i=1;$i<=$paginas;$i++){

	echo '<a id="cor_botao" href="edicao.php?';
	echo '&pag='.$i.'&';
	if(isset($_GET['buscar'])){
	echo 'buscar='.$_GET['buscar'];
	}
	echo '"><button id="link_botao">'.$i.' </button></a>
	';
}
echo '<div></center><br><br>';

}

function ExcluirUsuario($cd){
$sql='DELETE FROM upload WHERE cd_usuario='.$cd;
$sql2='DELETE FROM usuario WHERE cd_usuario='.$cd;
	$foi = $GLOBALS['con']->query($sql);
	$foi2 = $GLOBALS['con']->query($sql2);
	if($foi&&$foi2){
		header("location:edicao.php");
}
}

function SelecionarUsuario($cd){
$sql='SELECT * FROM usuario where cd_usuario='.$cd;
$resultado= $GLOBALS['con']->query($sql);
$usuario = $resultado->fetch_array();
return ($usuario);
}
function AtualizarUsuario($cd,$nome,$email,$cpf,$cnpj,$usuario,$senha,$data,$telefone){
	if($cpf==""){	
	$sql='UPDATE usuario SET nm_usuario= "'.$nome.'", senha_usuario ="'.$senha.'", user_usuario="'.$usuario.'",cnpj_usuario ="'.$cnpj.'",nasc_usuario ="'.$data.'",email ="'.$email.'",telefone ="'.$telefone.'" WHERE cd_usuario ='.$cd;
}
else{
$sql='UPDATE usuario SET nm_usuario= "'.$nome.'", senha_usuario ="'.$senha.'", user_usuario="'.$usuario.'",cpf_usuario ="'.$cpf.'",nasc_usuario ="'.$data.'",email ="'.$email.'",telefone ="'.$telefone.'" WHERE cd_usuario ='.$cd;	
}
	$resultado= $GLOBALS['con']->query($sql);
	if($resultado){
		 echo'<script>
		 alert("Usuário atualizado!");
		 window.location="edicao.php";
		 </script>';
		 $_SESSION['nome'] = $nome;
		$_SESSION['nm_usuario'] = $usuario;
		$_SESSION['senha_usuario'] = $senha;

	}
}

function AtualizarUsuario2($cd,$nome,$cpf,$usuario,$senha,$data){
	$sql='UPDATE usuario SET nm_usuario= "'.$nome.'", senha_usuario ="'.$senha.'", user_usuario="'.$usuario.'",cpf_usuario ="'.$cpf.'",nasc_usuario ="'.$data.'" WHERE cd_usuario ='.$cd;
	$resultado= $GLOBALS['con']->query($sql);
	if($resultado){
		 echo'<script>
		 alert("Usuario atualizado!");
		 window.location="index.php";
		 </script>';
		$_SESSION['nome'] = $nome;
		$_SESSION['nm_usuario'] = $usuario;
		$_SESSION['senha_usuario'] = $senha;
		
	}
}

function SelecionarAdm($cd){
$sql='SELECT * FROM adm where cd_adm='.$_SESSION['cd_adm'];
$resultado= $GLOBALS['con']->query($sql);
$adm = $resultado->fetch_array();
return ($adm);
}

function AtualizarAdm($cd,$nome,$user,$senha){
	$sql='UPDATE adm SET nm_adm= "'.$nome.'", user_adm ="'.$user.'", senha_adm="'.$senha.'" WHERE cd_adm ='.$cd;
	$resultado= $GLOBALS['con']->query($sql);
	if($resultado){
		 echo'<script>
		 alert("Administrador Atualizado!");
		 window.location="edicao_adm.php";
		 </script>';
		$_SESSION['nome'] = $nome;
		$_SESSION['nm_adm'] = $user;
		$_SESSION['senha_adm'] = $senha;
		
	}
}

function ListarAdm($forma,$cd){
$sql2='SELECT * FROM adm WHERE cd_adm='.$_SESSION['cd_adm'];
$resultados1= $GLOBALS['con']->query($sql2);
$total=$resultados1->num_rows;	
$porpagina=10;
$pag = isset($_GET['pag'])?(($_GET['pag'])*$porpagina)-$porpagina : 0;

$sql ='SELECT *from adm';

if(isset($_GET['buscar'])){
$sql.=' WHERE adm.nm_adm LIKE "%'.$_GET['buscar'].'%" or adm.user_adm LIKE "%'.$_GET['buscar'].'%" ORDER BY nm_adm asc';
$resultados= $GLOBALS['con']->query($sql);
}

else{
$sql.=' ORDER BY nm_adm asc';
$resultados= $GLOBALS['con']->query($sql);
}

$total=$resultados->num_rows;
$paginas = ceil($total / $porpagina);

$sql3 ='SELECT *from adm WHERE cd_adm='.$_SESSION['cd_adm'] ;

if(isset($_GET['buscar'])){
$sql3.=' WHERE adm.nm_adm LIKE "%'.$_GET['buscar'].'%" or adm.user_adm LIKE "%'.$_GET['buscar'].'%"';
 $sql3.=" ORDER BY cd_adm asc limit $pag,$porpagina";
}
else{
 $sql3.=" ORDER BY cd_adm asc limit $pag,$porpagina";	
}
$resultados2= $GLOBALS['con']->query($sql3);

	if($total==0){
		?>
<style>

#buscar{
display:none;
}
#pesquisar{
display:none;
}

</style>
		<?php
		echo '<div class="col-md-12">
<h4 class="text-left">Tem erro ai!!!!!!!!<h4>
		</div>';
	}
	else{
?>
<style>

#buscar{
display:block;
}
#pesquisar{
display:block;
}

</style>
<?php
}
echo'<div  id="table" class="table-responsive">
<div style="relative" id="table" class="table-responsive">
<table class="table  table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>Cod.</th>
<th>Nome do Administrador</th>
<th>Login</th>
<th>Controles</th>
</tr>
</thead>
<tbody>';
	while($adm = $resultados2->fetch_array()){
		if($forma == "select"){
			if($codigo==$adm['cd_adm'])
echo '<option selected value="'.$adm['cd_adm'].'">'.$adm['nm_adm'].'</option>';
else{
	echo '<option value="'.$adm['cd_adm'].'">'.$adm['nm_adm'].'</option>';
}
}
else{
		echo '
		<tr class="odd gradeX">
					<td>'.$adm['cd_adm'].'</td>
                    <td>'.$adm['nm_adm'].'</td>';
                                     
                    echo'<td>'.$adm['user_adm'].'</td>';
                    echo '<td>
					<a href="#"><i data-toggle="modal" data-target="#myModal'.$adm['cd_adm'].'" class="fa fa-trash-o fa-2x"></i></a>
					<div class="modal fade" id="myModal'.$adm['cd_adm'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h3 class="text-center" id="myModalLabel">Deseja mesmo excluir?</h3>
				      </div>
				      <div class="modal-footer">
				        <center><button style="width:200px;" type="button" class="btn btn-default" data-dismiss="modal">Não</button>
				        <a href="?excluir='.$adm['cd_adm'].'">
				        <button style="width:200px;" type="button" class="btn btn-success">Sim</button></a></center>
				      </div>
				    </div>
				  </div>
				</div>
                    <a href="conta_adm.php?cd='.$adm['cd_adm'].'">
                    <i class="fa fa-edit fa-2x"></i></a>
                    </td>
               </tr>';
}
}
echo'</tbody>
</table>
</div>
</div>
</div>';

}

function ExcluirAdm($cd){
// $caminho="os/".$cd;
// unlink($caminho);
// echo $caminho;

$sql2='DELETE FROM adm WHERE cd_adm='.$cd;
	
	$foi2 = $GLOBALS['con']->query($sql2);
	if($foi2){
		header("location:sair.php");
}
}


/// Upload------------------------------------------
function SalvarUpload($nome,$desc,$usuario){
$arqType = $_FILES['foto']['type'];
$tiposPermitidos= array('application/pdf');
   $destino= "os/".$usuario."/";
	//verificando se ele não existe
	if(!is_dir($destino)){
		//cria o diretorio
		mkdir($destino);
    # Definir o diretório onde salvar os arquivos.
}

	$arqType2 = $_FILES['arte']['type'];
   	$destino2= "arte/".$usuario."/";
	//verificando se ele não existe
	if(!is_dir($destino2)){
		//cria o diretorio
		mkdir($destino2);
    # Definir o diretório onde salvar os arquivos.
	}

    $destino.=$_FILES["foto"]["name"];
    $destino2.=$_FILES["arte"]["name"];

    $arte=$_FILES["arte"]["name"];
	$os=$_FILES["foto"]["name"];

 	if (array_search($arqType, $tiposPermitidos) === false) {
      echo '<script>alert("O tipo de arquivo enviado é inválido!");</script>';
    // Não houveram erros, move o arquivo
    }
    else{
    	if(
	move_uploaded_file($_FILES['foto']['tmp_name'],$destino)||
	move_uploaded_file($_FILES['arte']['tmp_name'],$destino2)){

	$sql= 'INSERT INTO upload VALUES ';
	$sql.= '(null,"'.$nome.'"';
	$sql.= ',"'.$desc.'"';
	$sql.= ',"'.$_SESSION['cd_adm'].'"';
	$sql.= ',"'.$usuario.'"';
	$sql.= ',"'.$os.'"';
	$sql.= ',"'.$arte.'"';
	$sql.= ',0,"Nenhuma mensagem.") ';
	$salvar = $GLOBALS['con']->query($sql);
}
	if($salvar){
	?>
<script src="../js/jquery.min.js"></script>
<script src="Source/jBox.js"></script>
<script src="Source/noty.js"></script>
<script type="text/javascript">
$(document).ready(function(){
new Noty({
  progressBar:false,
  timeout:3000,
  theme:'bootstrap-v4',
  type:'success',
  layout:'topCenter',
    text: 'Upload feito com sucesso!'
}).show();
});
</script>
<?php
	
}
else{
	echo '<script> alert($sql); </script>';
}
}
}
	//$sql = 'SELECT upload.cd_upload,upload.nm_upload,upload.desc_upload,usuario.cd_usuario, upload.os_upload,usuario.nm_usuario
//FROM usuario usuario
//INNER JOIN upload upload ON usuario.cd_usuario = upload.cd_usuario';

function ListarPedidos(){
	$sql = 'SELECT * FROM upload WHERE cd_usuario='.$_SESSION['cd_usuario'];
	$resultados = $GLOBALS['con']->query($sql);
	$total=$resultados->num_rows;
 
 $porpagina=9;
 $pag = isset($_GET['pag'])?(($_GET['pag'])*$porpagina)-$porpagina : 0;

$sql2 = 'SELECT * FROM upload WHERE cd_usuario='.$_SESSION['cd_usuario'];

if(isset($_GET['buscar'])){
	$sql2.=' and nm_upload LIKE"%'.$_GET['buscar'].'%"';
$resultados2 = $GLOBALS['con']->query($sql2);
}

else{
	$resultados2 = $GLOBALS['con']->query($sql2);
}

$total2=$resultados2->num_rows;
echo '<div class="container">';
 echo"Total: ".$total2;
 echo '</div>';
$paginas = ceil($total2 / $porpagina);

$sql3 ='SELECT * FROM upload WHERE cd_usuario='.$_SESSION['cd_usuario']; 

if(isset($_GET['buscar'])){
	$sql3.=' and nm_upload LIKE"%'.$_GET['buscar'].'%" limit '."$pag,$porpagina";
	
}
else{
$sql3.=" limit $pag,$porpagina";
}

$resultados3= $GLOBALS['con']->query($sql3);

	echo "<ul>";
	while($pedido = $resultados3->fetch_array()){
		
		echo '<li style="display:inline-block; margin:1%; margin-left:10%; text-align:center">';
		echo '<a style="color:black;" href="arte/'.$pedido['cd_usuario'].'/'.$pedido['arte'].'" target="_blank"><img src="../images/iconart.png" width="45%"></a>';
		echo"<br>";
		echo"<br><b> Nome: </b>";
		echo "<b>";
		echo $pedido['nm_upload'];
		echo "</b>";
		echo"<br><b> O.S.: </b>";
		echo '<a  style="color:black;" href="os/'.$pedido['cd_usuario'].'/'.$pedido['os_upload'].'" target="_blank">'.$pedido['os_upload'].'</a>';
		echo"<br><b>";
		if($pedido['status'] == 0){
			echo '<b style="color:purple; margin:0px;">Arte em andamento';
		}
		else if($pedido['status'] == 1){
			echo '<b style="color:orange; margin:0px;">Arte aprovada';
		}
		else if($pedido['status'] == 2){
			echo '<b style="color:red; margin:0px;">Impressão';
		}
		else if($pedido['status'] == 3){
			echo '<b style="color:blue; margin:0px;">Acabamento';
		}
		else{
			echo '<b style="color:green; margin:0px;">Concluída';};
		echo "</b><br>";
		echo '<button type="button" data-toggle="modal" data-target="#myModal'.$pedido['cd_upload'].'" style="font-size: 9pt;" class="btn btn-default">Mensagem</button>';
		
		echo '<div class="modal fade" id="myModal'.$pedido['cd_upload'].'" role="dialog">
		    <div class="modal-dialog modal-lg">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Mensagem - "'.$pedido['nm_upload'].'"</h4>
		        </div>
		        <div class="modal-body">
		        <form action="index.php" method="post">
  				<textarea name="mensagem" id="mensagem" style="width:95%; height:150px;"></textarea>
  				<input type="hidden" name="cd" id="cd" value="'.$pedido['cd_upload'].'"readonly>


		        </div>
		        <div class="modal-footer">
		          <button type="submit" style="font-size: 9pt; width:100px;" class="btn btn-default" value="enviar">Enviar</button>
		          <button type="button" style="font-size: 9pt; width:100px;" class="btn btn-default" data-dismiss="modal">Fechar</button>
		        </div>
		        </form>
		    </div>
		  </div>
		</div>';
		echo '</li>';		
	}
	
	echo "</ul>";
	if($total==0){
	echo '<div class="col-md-12">
	<h4 class="text-left">Nenhum pedido feito!<h4>
	</div>';
	}

	/* $erro = $_POST['erro'];
	$sql7='UPDATE upload SET erro ="'.$erro.'" WHERE cd_upload ='.$_SESSION['cd_usuario'];		
	$resultado= $GLOBALS['con']->query($sql7);
	if($resultado){
			echo'<script>
			alert("Mensagem enviada!");
			</script>';		
		}
		else{
			echo'<script>
			alert("Erro ao reportar a os!");
			</script>';

		} */
echo '<center><div id="paginacao">';
for($i=1;$i<=$paginas;$i++){

	echo '<a id="cor_botao" href="index.php?';
	echo '&pag='.$i.'&';
	if(isset($_GET['buscar'])){
	echo 'buscar='.$_GET['buscar'];
	}
	echo '"><button id="link_botao">'.$i.' </button></a>
	';
}
echo '<div></center><br><br>';
}
function ReportarErro($mensagem,$codigo){
	if($mensagem==""){
			echo'<script>
			alert("Campo vazio!");
			</script>';		
	}
	else{
	$sql7=' UPDATE upload SET erro = "'.$mensagem.'" WHERE cd_upload ='.$codigo;		
	$resultado= $GLOBALS['con']->query($sql7);
	if($resultado){
			echo'<script>
			alert("Mensagem enviada!");
			</script>';		
		}
		else{
			echo'<script>
			alert("Erro ao reportar a os!");
			</script>';

		}
}
}
function ListarMensagem(){
	$sql2='SELECT * FROM upload';
		$resultados1= $GLOBALS['con']->query($sql2);
		$total=$resultados1->num_rows;	
		$porpagina=10;
		$pag = isset($_GET['pag'])?(($_GET['pag'])*$porpagina)-$porpagina : 0;

		$sql ='SELECT upload.cd_upload,upload.nm_upload,upload.desc_upload,usuario.cd_usuario, upload.os_upload,usuario.nm_usuario,upload.status,upload.erro,upload.arte
		FROM usuario usuario
		INNER JOIN upload upload ON usuario.cd_usuario = upload.cd_usuario';

		if(isset($_GET['buscar'])){
		$sql.=' WHERE usuario.nm_usuario LIKE "%'.$_GET['buscar'].'%" or upload.nm_upload LIKE "%'.$_GET['buscar'].'%"';
		$resultados= $GLOBALS['con']->query($sql);
		}

		else{
		$sql.=' ORDER BY cd_upload desc';
		$resultados= $GLOBALS['con']->query($sql);
		}

		$total= $resultados->num_rows;
		$paginas = ceil($total / $porpagina);

		$sql3 ='SELECT upload.cd_upload,upload.nm_upload,upload.desc_upload,usuario.cd_usuario, upload.os_upload,usuario.nm_usuario,upload.status,upload.erro,upload.arte
		FROM usuario usuario
		INNER JOIN upload upload ON usuario.cd_usuario = upload.cd_usuario
		WHERE upload.erro != "Nenhuma mensagem."';
		if(isset($_GET['buscar'])){
		$sql3.=' WHERE usuario.nm_usuario LIKE "%'.$_GET['buscar'].'%" or upload.nm_upload LIKE "%'.$_GET['buscar'].'%"';
		 $sql3.=" limit $pag,$porpagina";
		}
		else{
		 $sql3.=" ORDER BY cd_upload desc limit $pag,$porpagina";	
		}
		$resultados2= $GLOBALS['con']->query($sql3);
		$total2= $resultados2->num_rows;	

	if($total2==0){
		?>
		<style>

		#buscar{
		display:none;
		}
		#pesquisar{
		display:none;
		}

		</style>
				<?php
				echo '<div class="col-md-12">
		<h3 class="text-left">Não há nenhuma mensagem.<h3>
				</div>';
			}
			else{
		?>
		<style>

		#buscar{
		display:block;
		}
		#pesquisar{
		display:block;
		}

		</style>
				<?php
		echo'<div class="col-md-10 col-md-offset-1">
		<div margin="1%"  id="table" class="table-responsive">
		<div style="relative"  id="table" class="table-responsive">
		<table class="table  table-bordered table-hover" id="dataTables-example">
		<thead>
		<tr>
		<th>Cod.</th>

		<th>Nome</th>
		<th>Status</th>
		<th>Arte</th>
		<th>Cliente</th>
		<th>Mensagem</th>
		</tr>
		</thead>
		<tbody>';
			while($upload = $resultados2->fetch_array()){
				echo '
				<tr class="odd gradeX">
							<td>'.$upload['cd_upload'].'</td>
		                    <td>'.$upload['nm_upload'].'</td>';
		                    if($upload['status'] == 0){
							echo "<td>Arte em andamento</td>";
							}
							else if($upload['status'] == 1){
							echo "<td>Arte Aprovada</td>";
							}
							else if($upload['status'] == 2){
							echo "<td>Impressão</td>";
							}
							else if($upload['status'] == 3){
							echo "<td>Acabamento</td>";
							}
							else{
							echo "<td>Concluída</td>";
							}
							echo '<td><a href="arte/'.$upload['cd_usuario'].'/'.$upload['arte'].'" target="_blank">
		                    <i class="fa fa-picture-o fa-2x"></i>
		                    </a> <a href="os/'.$upload['cd_usuario'].'/'.$upload['os_upload'].'" target="_blank">
		                    <i class="fa fa-file fa-2x"></i>
		                    </a> '.$upload['os_upload'].'</td>';
		                    echo '<td>'.$upload['nm_usuario'].'</td>';
							echo '<td>'.$upload['erro'].'</td></tr>';
		}
		echo'</tbody>
		</table>
		</div>
		</div>
		</div>
		</div>
		<br>';
		}
		}
function ListarUploads(){
	$sql2='SELECT * FROM upload';
$resultados1= $GLOBALS['con']->query($sql2);
$total=$resultados1->num_rows;	
$porpagina=10;
$pag = isset($_GET['pag'])?(($_GET['pag'])*$porpagina)-$porpagina : 0;

$sql ='SELECT upload.cd_upload,upload.nm_upload,upload.desc_upload,usuario.cd_usuario, upload.os_upload,usuario.nm_usuario,upload.status,upload.erro,upload.arte
FROM usuario usuario
INNER JOIN upload upload ON usuario.cd_usuario = upload.cd_usuario';

if(isset($_GET['buscar'])){
$sql.=' WHERE usuario.nm_usuario LIKE "%'.$_GET['buscar'].'%" or upload.nm_upload LIKE "%'.$_GET['buscar'].'%"';
$resultados= $GLOBALS['con']->query($sql);
}

else{
$sql.=' ORDER BY cd_upload desc';
$resultados= $GLOBALS['con']->query($sql);
}

$total=$resultados->num_rows;
echo"Total: ". $total."<br>";
$paginas = ceil($total / $porpagina);


$sql3 ='SELECT upload.cd_upload,upload.nm_upload,upload.desc_upload,usuario.cd_usuario, upload.os_upload,usuario.nm_usuario,upload.status,upload.erro,upload.arte
FROM usuario usuario
INNER JOIN upload upload ON usuario.cd_usuario = upload.cd_usuario';

if(isset($_GET['buscar'])){
$sql3.=' WHERE usuario.nm_usuario LIKE "%'.$_GET['buscar'].'%" or upload.nm_upload LIKE "%'.$_GET['buscar'].'%"';
 $sql3.=" limit $pag,$porpagina";
}
else{
 $sql3.=" ORDER BY cd_upload desc limit $pag,$porpagina";	
}
$resultados2= $GLOBALS['con']->query($sql3);

	if($total==0){
		?>
<style>

#buscar{
display:none;
}
#pesquisar{
display:none;
}

</style>
		<?php
		echo '<div class="col-md-12">
<h4 class="text-left">Nenhum upload feito!<h4>
		</div>';
	}
	else{
?>
<style>

#buscar{
display:block;
}
#pesquisar{
display:block;
}

</style>
<?php
}
echo'<div  id="table" class="table-responsive">
<div style="relative" id="table" class="table-responsive">
<table class="table  table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
<th>Cod.</th>
<th>Nome</th>
<th>Descrição</th>
<th>Os</th>
<th>Arte</th>
<th>Cliente</th>
<th>Status</th>
<th>Mensagens</th>
<th>Controles</th>
</tr>
</thead>
<tbody>';
	while($upload = $resultados2->fetch_array()){
		echo '
		<tr class="odd gradeX">
					<td>'.$upload['cd_upload'].'</td>
                    <td>'.$upload['nm_upload'].'</td>
                    <td>'.$upload['desc_upload'].'</td>';
                                     
                    echo'<td>'.$upload['os_upload'].'</td>
                    <td>'.$upload['arte'].'</td>
                    <td>'.$upload['nm_usuario'].'</td>';
                    if($upload['status'] == 0){
					echo "<td>Arte em andamento</td>";
					}
					else if($upload['status'] == 1){
					echo "<td>Arte Aprovada</td>";
					}
					else if($upload['status'] == 2){
					echo "<td>Impressão</td>";
					}
					else if($upload['status'] == 3){
					echo "<td>Acabamento</td>";
					}
					else{
					echo "<td>Concluída</td>";
					}
					echo '<td>'.$upload['erro'].'</td>';
                    echo '<td>
					<a href="#"><i data-toggle="modal" data-target="#myModal'.$upload['cd_upload'].'" class="fa fa-trash-o fa-2x"></i></a>
					<div class="modal fade" id="myModal'.$upload['cd_upload'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h3 class="text-center" id="myModalLabel">Deseja mesmo excluir?</h3>
				        <div class="text-center"><h4>Cliente: '.$upload['nm_usuario'].'</h4>
        				<h4>Arte: '.$upload['nm_upload'].'</h4></div>
				      </div>
				      <div class="modal-footer">
				        <center><button style="width:200px;" type="button" class="btn btn-default" data-dismiss="modal">Não</button>
				        <a href="?caminho=os/'.$upload['cd_usuario']."/".$upload['os_upload'].'&excluir='.$upload['cd_upload'].'">
				        <button style="width:200px;" type="button" class="btn btn-success">Sim</button></a></center>
				      </div>
				    </div>
				  </div>
				</div>
                    <a href="edicao_upload.php?cd='.$upload['cd_upload'].'">
                    <i class="fa fa-edit fa-2x"></i></a>
                    <a href="os/'.$upload['cd_usuario'].'/'.$upload['os_upload'].'" target="_blank">
                    <i class="fa fa-file fa-2x"></i>
                    </a>';
 if($upload['arte']!=""){
                    echo '<a href="arte/'.$upload['cd_usuario'].'/'.$upload['arte'].'" target="_blank">
                    <i class="fa fa-eye fa-2x"></i>
                    </a>';
                }
                    echo '</td>
               </tr>';
}
echo'</tbody>
</table>
</div>
</div>
</div>';

echo '<center><div id="paginacao">';
for($i=1;$i<=$paginas;$i++){

	echo '<a id="cor_botao" href="edicao2.php?';
	echo '&pag='.$i.'&';
	if(isset($_GET['buscar'])){
	echo 'buscar='.$_GET['buscar'];
	}
	echo '"><button id="link_botao">'.$i.' </button></a>
	';
}
echo '<div></center><br><br>';
}




function ExcluirUpload($caminho,$cd){
if(isset($caminho)){
	unlink($caminho);
}
	$sql='DELETE FROM upload WHERE cd_upload='.$cd;
	$foi = $GLOBALS['con']->query($sql);
	if($foi){
		header("location:edicao2.php");
	}
	else{
		echo"ops";
	}
}
/*
<div style="position:absolute;margin-top:-8px;" class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="?excluir='.$upload['cd_upload'].'">Excluir</a></li>
    <li><a href="edicao_upload.php?cd='.$upload['cd_upload'].'">Edição</a></li>
    <li><a href="'.$upload['os_upload'].'" target="_blank">Visualizar</a></li>
  </ul>
</div>
*/

function SelecionarUpload($cd){
$sql='SELECT * FROM upload where cd_upload='.$cd;
$resultado= $GLOBALS['con']->query($sql);
$upload = $resultado->fetch_array();
return ($upload);
}
function AtualizarUpload($cd,$nome,$desc,$usuario,$status){
$arqType = $_FILES['foto']['type'];
$tiposPermitidos= array('application/pdf');
   $destino= "os/".$usuario."/";
	//verificando se ele não existe
    $destino.=$_FILES["foto"]["name"];
	$os=$_FILES["foto"]["name"];

	$destino2= "arte/".$usuario."/";
	$destino2.=$_FILES["arte"]["name"];
	$arte=$_FILES["arte"]["name"];

	echo $os;
	echo $arte;	

if(move_uploaded_file($_FILES['foto']['tmp_name'],$destino)|| move_uploaded_file($_FILES['arte']['tmp_name'],$destino2)){
$sql=' UPDATE upload SET nm_upload="'.$nome.'",desc_upload="'.$desc.'",cd_adm="'.$_SESSION['cd_adm'].'",cd_usuario ="'.$usuario.'",os_upload="'.$os.'",arte="'.$arte.'",status="'.$status.'",erro="Nenhuma mensagem." WHERE cd_upload='.$cd;
 $salvar = $GLOBALS['con']->query($sql); 	
}
 if($salvar){
// header("location:edicao2.php");	
 echo '<script>alert("deu certo");</script>';
}
else{
echo '<script>alert("erro");</script>';	
}
}

function ListarUploadAdm(){
	$sql='SELECT * FROM upload WHERE cd_adm='.$_SESSION['cd_adm'];
	$resultados= $GLOBALS['con']->query($sql);
	$total=$resultados->num_rows;
	echo $total;

}

function ListarUploadAdm2(){
	$sql2='SELECT * FROM upload';
$resultados1= $GLOBALS['con']->query($sql2);
$total=$resultados1->num_rows;	
$porpagina=6;
$pag = isset($_GET['pag'])?(($_GET['pag'])*$porpagina)-$porpagina : 0;

$sql ='SELECT upload.cd_upload,upload.nm_upload,upload.desc_upload,usuario.cd_usuario, upload.os_upload,usuario.nm_usuario,upload.status,upload.arte
FROM usuario usuario
INNER JOIN upload upload ON usuario.cd_usuario = upload.cd_usuario';

if(isset($_GET['buscar'])){
$sql.=' WHERE usuario.nm_usuario LIKE "%'.$_GET['buscar'].'%" or upload.nm_upload LIKE "%'.$_GET['buscar'].'%"';
$resultados= $GLOBALS['con']->query($sql);
}

else{
$sql.=' ORDER BY cd_upload desc';
$resultados= $GLOBALS['con']->query($sql);
}

$total=$resultados->num_rows;
$paginas = ceil($total / $porpagina);

$sql3 ='SELECT upload.cd_upload,upload.nm_upload,upload.desc_upload,usuario.cd_usuario, upload.os_upload,usuario.nm_usuario,upload.status,upload.arte
FROM usuario usuario
INNER JOIN upload upload ON usuario.cd_usuario = upload.cd_usuario';
if(isset($_GET['buscar'])){
$sql3.=' WHERE usuario.nm_usuario LIKE "%'.$_GET['buscar'].'%" or upload.nm_upload LIKE "%'.$_GET['buscar'].'%"';
 $sql3.=" limit $pag,$porpagina";
}
else{
 $sql3.=" ORDER BY cd_upload desc limit $pag,$porpagina";	
}
$resultados2= $GLOBALS['con']->query($sql3);

	if($total==0){
		echo '<div class="col-md-12">
	<h4 class="text-left">Nenhum upload recente!<h4>
		</div>';
	}
	else{

	/* $sql='SELECT * FROM upload WHERE cd_adm='.$_SESSION['cd_adm'];
	$resultados= $GLOBALS['con']->query($sql);
	$total=$resultados->num_rows;

	$sql2='SELECT * FROM upload WHERE cd_adm='.$_SESSION['cd_adm'];
	$resultados2= $GLOBALS['con']->query($sql2);
	$total2=$resultados2->num_rows;
	while($uploads = $resultados2->fetch_array()){*/
		while($upload = $resultados2->fetch_array()){

		echo '<li style="display:inline-block; margin:1%; margin-left:10%; text-align:center">';
		echo '<a style="color:black;" href="arte/'.$upload['cd_usuario'].'/'.$upload['arte'].'" target="_blank"><img src="../images/iconart.png" width="45%"></a>';
		echo"<br> <b> Cliente: </b>";
		echo $upload['nm_usuario'];
		echo"<br> <b> O.S.: </b>";
		echo '<a  style="color:black;" href="os/'.$upload['cd_usuario'].'/'.$upload['os_upload'].'" target="_blank">'.$upload['os_upload'].'</a>';
		echo"<br> <b> Nome: </b>";
		echo $upload['nm_upload'];
		echo " - ";
		echo $upload['cd_upload'];		
		echo"<br><b> Status:</b> ";
		if($upload['status'] == 0){
			echo '<b style="color:purple; margin:0px;">Arte em andamento';
		}
		else if($upload['status'] == 1){
			echo '<b style="color:orange; margin:0px;">Arte aprovada';
		}
		else if($upload['status'] == 2){
			echo '<b style="color:red; margin:0px;">Impressão';
		}
		else if($upload['status'] == 3){
			echo '<b style="color:blue; margin:0px;">Acabamento';
		}
		else{
			echo '<b style="color:green; margin:0px;">Concluída';};
		echo "</b><br>";
		echo '<a href="edicao2.php"><button type="button" data-toggle="modal" data-target="#myModal" style="font-size: 9pt; width:150px;" class="btn btn-default">Editar</button></a>';
		echo '</li>';		
	}
	
	echo "</ul>";
	if($total==0){
	echo '<div class="col-md-12">
	<h4 class="text-left">Nenhum pedido feito!<h4>
	</div>';
	}

}
}

function CadastrarAdm($nome,$user,$senha){
$sql1 = 'SELECT * FROM adm WHERE ';
$sql1.= 'user_adm="'.$user.'"';
$tem = $GLOBALS['con']->query($sql1);
if($tem->num_rows >0){
	echo "<script>alert('Administrador com o mesmo login já existente');</script>";
}
else{
	$sql3= 'INSERT INTO adm VALUES';
	$sql3.= '(null,"'.$nome.'"';
	$sql3.= ',"'.$user.'"';
	$sql3.= ',"'.$senha.'")';
	$cadastrar = $GLOBALS['con']->query($sql3);
	if($cadastrar){
?>
<script src="../js/jquery.min.js"></script>
<script src="Source/jBox.js"></script>
<script src="Source/noty.js"></script>
<script type="text/javascript">
$(document).ready(function(){
new Noty({
  progressBar:false,
  timeout:3000,
  theme:'bootstrap-v4',
  type:'success',
  layout:'topCenter',
    text: 'Administrador cadastrado!',
}).show();
});
</script>
<?php
	}
}
}


// function Adm(){
// 	if(!isset($_SESSION['adm'])){
// 	header("location:login.php");
// }
// }


/* echo '
		<tr class="odd gradeX">
					<td>'.$upload['cd_upload'].'</td>
                    <td>'.$upload['nm_upload'].'</td>
                    <td>'.$upload['desc_upload'].'</td>';
                                     
                    echo'<td>'.$upload['os_upload'].'</td>
                    <td>'.$upload['nm_usuario'].'</td>';
                    if($upload['status'] == 0){
					echo "<td>Arte aprovada</td>";
					}
					else if($upload['status'] == 1){
					echo "<td>Em produção</td>";
					}
					else if($upload['status'] == 2){
					echo "<td>Acabamento</td>";
					}
					else{
					echo "<td>Arte Concluída</td>";
					}
                    echo '<td>
                    <a href="?caminho='.$upload['os_upload'].'&excluir='.$upload['cd_upload'].'">
					<i class="fa fa-trash-o fa-2x"></i>
				</a>
                    <a href="edicao_upload.php?cd='.$upload['cd_upload'].'">
                    <i class="fa fa-edit fa-2x"></i></a>
                    <a href="'.$upload['os_upload'].'" target="_blank">
                    <i class="fa fa-eye fa-2x"></i>
                    </a>
                    </td>
                    */


                    ?>