<!DOCTYPE html>
<?php
session_start();
$usuario=$_SESSION['username'];
include '../mostrarProd.php';
//$lista = $_SESSION['lista'];
//mostramos para ver si trae la lista
//echo sizeof($lista);
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <LINK rel=StyleSheet href="../CSS/loginStyle.css" type="text/css">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
  <!--MENU-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="Catalogo.php">Menu</a><br>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="#">Cesta</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="cerrarLogin.php">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
  </nav>

  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"> <?php echo " <div>Bienvenido: $usuario </div>"; ?>
    </li>
  </ol>
  </nav>

  <!--MOSTRAR PRODUCTO-->

  <h2 align="center" style="margin-top: 40px;">Catalogo de productos</h2>
  <div class="container">
    <table border="0" width="700" align="center" class="table">
      <tr align="center">
        <?php
    
        $num = 0;
        foreach ($stmt as $reg) {
          //Hacemos que cada 3 productos que haya un salto de fila(<tr>) y la variable
          // num se vuelve en 1
          if ($num == 3) {
            echo "<tr align='center'>";
            $num = 1;
          } else {
            $num++;
          }
        ?>
          <th><img src="../imagenes/<?php echo $reg[3]; ?>" width="120" height="120"><br><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" onclick="enviar(<?php echo $reg[0]; ?>)">Agregar</button>
          </th>

        <?php

        }

        ?>
      </tr>
    </table>
  </div>
  


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle del Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card" style="width: 18rem;">
  <img src="" class="card-img-top" alt="">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!--OBTENER EL MENSAJE DE LA URL-->
<script>
function obtenerValorParametro(sParametroNombre) {
  var sPaginaURL = window.location.search.substring(1);
  var sURLVariables = sPaginaURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
      var sParametro = sURLVariables[i].split('=');
      if (sParametro[0] == sParametroNombre) {
        return sParametro[1];
      }
    }
  return null;
}

window.onload=function(){ 
  var mensaje= obtenerValorParametro('sms');
  if(mensaje !== null){
    mensaje = mensaje.replace(/\+|%20/g, " ");
    alert(mensaje);
  }
}
</script>



  <!--Funcion Ajax para la descripcion-->

  <script>
    var resultado = document.getElementById("mostrar");

    function enviar(c) {

      var xmlhttp;
      //Validamos el navegador
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();

      } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }

      //creamos otra funcion para acceder al div
      xmlhttp.onreadystatechange = function() {
        //200=encontro pagina
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          resultado.innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET", "Detalle.php?cod=" + c, true);
      xmlhttp.send();

    }
  </script>


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>