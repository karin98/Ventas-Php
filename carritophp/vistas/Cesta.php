<!DOCTYPE <!DOCTYPE html>
<?php
session_start();
include '../DAO/MetodosDAO.php';
?>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <h2 align="center">Cesta de Productos</h2>
    <table border="1" align="center" width="400" class="table">

      <tr>
        <th scope="col">Producto</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Costo</th>
      </tr>
      <?php
      //Si la variable de sesion tiene algo
      if (isset($_SESSION['cesta'])) {
        $total = 0;
        //recorremos la sesion 
        foreach ($_SESSION['cesta'] as $id => $x) {
          $objMetodos = new MetodosDAO();
          $lista = $objMetodos->ListarProductosCod($id);
          //Trae la lista del array y como son dos dentro de otro array se coloca 
          $nombre = $lista[0][1];
          $precio = $lista[0][2];
          $costo = $x * $precio;
          $total = $total + $costo;

      ?>
          <tr>
            <td><?php echo $nombre; ?></td>
            <td><?php echo $precio; ?></td>
            <!-- Colocamos un vinculo para diminuir el producto-->
            <!--Enviamos el ID y la accion -->
            <td><?php echo $x; ?><a href="../DAO/tiendaDAO.php?id=<?php echo $id; ?> &accion=eliminar" class="btn btn-secondary">Disminuir</a></td>
            <td><?php echo $costo; ?></td>
          </tr>
        <?php
        }
        ?>
        <tr>
          <td colspan="3">Total: </td>
          <td><?php echo $total; ?></td>
        </tr>
      <?php
      }
      ?>
    </table>
    <h6 align="center">
      <a href="catalogo.php" class="btn btn-primary">Seguir comprando</a>
      <a href="../DAO/tiendaDAO.php?accion=vacio&op=2" class="btn btn-primary">Eliminar Pedido</a>

      <button class="btn btn-secondary">Realizar pago</button>

    </h6>
  </div>



  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>