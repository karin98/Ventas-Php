<!Doctype <!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <LINK rel=StyleSheet href="../CSS/loginStyle.css" type="text/css">
    <title>login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
  </head>
  <body>
   
<!--Menu-->

<!--MENU-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="Catalogo.php">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="login.php" data-toggle="modal" data-target="#">Login </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cesta</a>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
  </nav>



<!--LOGIN Y REGISTRO-->

<div class="form-modal">
    
    <div class="form-toggle">
        <button id="login-toggle" onclick="toggleLogin()">Log in</button>
        <button id="signup-toggle" onclick="toggleSignup()">Sign up</button>
    </div>

    <div id="login-form">
        <form action="iniciaLogin.php" id="from2" method="POST">
            <input type="text" name="email" id="email"  placeholder="Correo"/>
            <input type="password" name="pass" id="pass" placeholder="Password"/>
            <button type="submit" class="btn login">Login</button>
          <p><a href="javascript:void(0)" onclick="toggleSignup()">Registrarse</a> </p>
          
        </form>
    </div>

    <div id="signup-form">
        <form  action="valida.php"  id="form" method="POST">
          
            <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo"/>
            <input type="email" name="email" id="email" placeholder="Correo"/>
            <input type="password" name="pass" id="pass" placeholder="Password"/>
            <!--RADIO BUTTONS-->
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Estado:</label><br>
            <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="activo" name="estado" value="open" class="custom-control-input">
            <label class="custom-control-label" for="activo">Open</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
           <input type="radio" id="inactivo" name="estado" value="off" class="custom-control-input">
          <label class="custom-control-label" for="inactivo">Off</label>
          </div>
           <input type="text" name="TipoUsuario" id="TipoUsuario" placeholder="Ocupación"/>
            <input type="text" id="dni" name="dni"  placeholder="DNI"/>
          <!--RADIO BUTTONS-->
            <button type="submit" class="btn signup"><i class="fa fa-spinner fa-pulse"></i> Crear Cuenta
          </button> 
            
        </form>
    </div>

</div>



<script src="../js/login.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>