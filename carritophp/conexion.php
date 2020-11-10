<?php


function conectar()
{
  try {
    $user = "root";
    $pass = "root";
    $bd = "tiendafc";
    $conexion = new PDO("mysql:host=localhost:3306;dbname=" . $bd, $user, $pass);
    return $conexion;
  } catch (PDOException $e) {
    echo "Error de conexion :C";
    die();
    // devuelve error
    return false;
  }
 
}

 

?>