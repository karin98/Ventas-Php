<?php

include '../Utils/ConexionDB.php';

class MetodosDAO
{

  public function ListarProductos()
  {

    $cnx = new ConexionDB();
    //Aqui llamamos a la conexion
    $cn = $cnx->getConexion();
    $res = $cn->prepare("select * from productos");
    $res->execute();

    foreach ($res as $row) {
      $lista[] = $row;
    }
    return $lista;
  }

  //Detalle del producto 
  public function ListarProductosCod($cod)
  {

    $cnx = new ConexionDB();
    //Aqui llamamos a la conexion
    $cn = $cnx->getConexion();
    $res = $cn->prepare("select * from productos where codPro=$cod");
    $res->execute();

    foreach ($res as $row) {
      $lista[] = $row;
    }
    return $lista;
  }
}
