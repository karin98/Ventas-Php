<!DOCTYPE html>
<?php
include '../DAO/MetodosDAO.php';
//recibimos el codigo
$cod = $_REQUEST['cod'];
//instanciamos
$objMetodos = new MetodosDAO();
$lista = $objMetodos->ListarProductosCod($cod);
//llamamos de la lista lo que necesito
foreach ($lista as $row) {
  $nombre = $row[1];
  $precio = $row[2];
  $detalle = $row[5];
}

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
  <form align="center" action="../DAO/tiendaDAO.php">
    <table border="0">
      <tr>
        <th rowspan="4">
          <img src="../imagenes/<?php echo $nombre; ?>.jpg" width="200" height="170">
        </th>
        <th><?php echo $nombre; ?></th>
      </tr>
      <tr>
        <td align="justify"><?php echo $detalle; ?></td>
      </tr>
      <tr>
        <td align="justify">Precio: S/. <?php echo $precio; ?></td>
      </tr>
      <tr>
        <td align="right">Ingrese la cantidad:<input type="number" min="1" max="100" value="1" name="txtCan"></td>
      </tr>
      <tr>
        <th align="right" colspan="2">
          <button type="button" class="btn btn-danger">Cerrar</button>
          <button type="button" class="btn btn-success" onclick="submit()">Agregar a Carrito</button>

        </th>
      </tr>
    </table>
    <input type="hidden" name="id" value="<?php echo $cod; ?>">
    <input type="hidden" name="accion" value="agregar">
    <input type="hidden" name="op" value="2">

  </form>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>