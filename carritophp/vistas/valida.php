<?php
require_once '../conexion.php';

//Llamamos a la conexion
$mensaje="";
$cnn = conectar();


$nombre =$_REQUEST ['nombre'];
$email=$_REQUEST['email'];
$password=$_REQUEST['pass'];
$ocupacion =$_REQUEST['TipoUsuario'];
$estado=$_REQUEST['estado'];
$dni=$_REQUEST['dni'];

	$stmt = $cnn->prepare("CALL sp_ClienteCrear(?,?,?,?,?,?)");
		$stmt->execute(array(
    $nombre
    ,$email
    ,$password
    ,$ocupacion
    ,$estado
    ,$dni
  ));

  $stmt= $stmt->fetchAll();

			if($stmt[0] > 0){
				$mensaje='Registro con exito! :D';
			}else{
				$mensaje='No se registrar :c ';
      }
      echo $mensaje;
      //Variable de mensaje = sms
  	header('Location: Catalogo.php?sms='.$mensaje);
?>

