<?php
require_once '../conexion.php';
session_start();
//Llamamos a la conexion
$mensaje="";
$cnn = conectar();

//Llamamos a las variables del login

$correo = $_POST['email'];
$pas = $_POST['pass'];

$smt = $cnn->prepare("Call sp_logueo(?,?)");
$smt->execute(
	[$correo,$pas]

);

//Recorremos con un foreach para obtener el valor del procedure
foreach ($smt as $resultado){
//	print_r ($resultado);

	if($resultado[0]>0) {
	//	echo "exito";
	$_SESSION['username']= $correo;
		 echo "<script>
                alert('Exito Brother xD');
                window.location= 'Catalogo.php'
					</script>";
		
	}else{
		//echo":c";
		echo	"<script>
                alert('Usuario no registrado o password incorrecto :c');
                window.location= 'login.php'
					</script>";
		
	}
	
	

}

?>