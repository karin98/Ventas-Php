<?php
require_once '../conexion.php';
$cnn=conectar();

$stmt = $cnn->prepare("CALL sp_leerProducto()");
$stmt->execute();
$stmt=$stmt->fetchAll();


?>