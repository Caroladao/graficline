<?php
$a = "localhost"; //servidor
$b = "root"; //usuario
$c = "usbw"; //senha
$d = "graficline"; //nome do SEU banco..
$con = new mysqli($a,$b,$c,$d);
// $a = "mysql.hostinger.com.br"; //servidor
// $b = "u323246991_alex"; //usuario
// $c = "997911628"; //senha
// $d = "u323246991_tcc"; //nome do SEU banco..
// $con = new mysqli($a,$b,$c,$d);

if (mysqli_connect_errno()){
	trigger_error(mysqli_connect_error());
}

if($_GET){
$codigo=$_GET['codigo'];
if($codigo==""){
echo"Por favor digite um código para visualizar algum pedido!";
}
else{
 $sql= 'SELECT * FROM upload WHERE cd_upload= '.$codigo;
 $tem = $con->query($sql);
 $total=$tem->num_rows;
 if($total==0){
 	echo"Não existe nenhum pedido com esse código!";
 }
 else{

		 while($pedido=$tem->fetch_array()){
			echo "<b> Nome da Arte: ".$pedido['nm_upload']."</b><br>";
			echo "<b> Código: ".$pedido['cd_upload']."</b><br>";
			echo "<b> Status: </b>";
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
			echo '<a style="color:black;" href="adm/arte/'.$pedido['cd_usuario'].'/'.$pedido['arte'].'" target="_blank">
		                    <i class="fa fa-picture-o fa-2x"></i>
		                    </a> '.$pedido['arte'];
		    echo "<br>";
			echo '<a style="color:black;" href="adm/os/'.$pedido['cd_usuario'].'/'.$pedido['os_upload'].'" target="_blank">
		                    <i class="fa fa-file fa-2x"></i>
		                    </a> '.$pedido['os_upload'];
		    
		}
}
}
}
?>