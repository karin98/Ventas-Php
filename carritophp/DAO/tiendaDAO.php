<?php
//Para manipular el catalogo y la cesta por ello el uso de sesion
session_start();

include './MetodosDAO.php';
//OP = para lista o cesta
//OP=opcion
$op = $_REQUEST['op'];

switch ($op) {
  case 1:
    //limpiamos la lista con unsert
    unset($_SESSION['lista']);
    //instanciamos al metodosDAo
    $objMetodo = new MetodosDAO();
    $lista = $objMetodo->ListarProductos();
    $_SESSION['lista'] = $lista;
    header("Location: ../Vistas/Catalogo.php");
    break;

  case 2:
    if (isset($_REQUEST['id'])) {
      $id = $_REQUEST['id'];
    } else {
      $id = 1;
    }

    if (isset($_REQUEST['accion'])) {
      $accion = $_REQUEST['accion'];
    } else {
      $accion = 'vacio';
    }

    switch ($accion) {
      case 'agregar':
        $can = $_REQUEST['txtCan'];
        if (isset($_SESSION['cesta'][$id]))
          $_SESSION['cesta'][$id] += $can;
        else
          $_SESSION['cesta'][$id] = $can;

        break;

      case 'eliminar':
        if (isset($_SESSION['cesta'][$id])) {
          $_SESSION['cesta'][$id]--;

          if ($_SESSION['cesta'][$id] == 0)
            unset($_SESSION['cesta'][$id]);
        }

        break;

      case 'vacio':
        unset($_SESSION['cesta']);
        break;
    }
    header("Location:../vistas/Cesta.php");


    break;
}
