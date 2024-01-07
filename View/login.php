<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../css/estilo_login.css">
    <script src="../js/login_index.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>


<?php
if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    if ($valor == 1) {
        ?>
        <script>            
            window.onload = function cargarPagina() { 
                swal("El usuario o contraseña ingresados son incorrectos")
                .then((value) => {
                  window.location.replace("../View/login.php");            
                });                   
        };
        </script>
        <?php
    }
}

?>

<?php
if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    if ($valor == 2) {
        ?>
        <script>            
            window.onload = function cargarPagina() { 
                swal("No se ha encontrado un usuario con el correo ingresado")
                .then((value) => {
                window.location.replace("../View/login.php");            
                });                   
        };
        </script>
        <?php
    }
}

?>


<?php
if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    if ($valor == 2) {
        ?>
        <script>            
            window.onload = function cargarPagina() { 
                swal("No se ha encontrado un usuario con el correo ingresado")
                .then((value) => {
                window.location.replace("../View/login.php");            
                });                   
        };
        </script>
        <?php
    }
}

?>

<?php
if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    if ($valor == 3) {
        ?>
        <script>            
            window.onload = function cargarPagina() { 
                swal("Ya existe una cuenta con el correo ingresado")
                .then((value) => {
                window.location.replace("../View/login.php");            
                });                   
        };
        </script>
        <?php
    }
}

?>

<?php
if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    if ($valor == 4) {
        ?>
        <script>            
            window.onload = function cargarPagina() { 
                swal("Registro exitoso")
                .then((value) => {
                window.location.replace("../View/login.php");            
                });                   
        };
        </script>
        <?php
    }
}

?>






















  
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="https://images.pexels.com/photos/3978831/pexels-photo-3978831.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
      </div>
      <div class="back">
        <img class="backImg" src="https://images.pexels.com/photos/3978831/pexels-photo-3978831.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Inicio de sesión</div>
          <form action="../Model/inicioSesion.php" method="post" onsubmit="return validarEmail()">
          <!-- <form onsubmit="return validarEmail()"> -->
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <!-- <input type="email" name="email_IS" placeholder="Ingrese su email" required> -->
                <input type="email" name="email_IS" id="email_IS" placeholder="Ingrese su email" required onblur="validarEmail()">
                <br>
                <!-- <small id="email-error" style="color: red; display: none;">Por favor ingrese un email válido</small> -->
              </div>
              <small id="email-error" style="color: red; display: none;">Por favor ingrese un email válido</small>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="contrasena_IS" placeholder="Ingrese su contraseña" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Ingresar">
                <!-- <input type="submit" value="Ingresar" onclick="mensajeVentana(event)"> -->
              </div>
              <div class="text sign-up-text">¿No tiene una cuenta? <label for="flip">Regístrese ahora</label></div>
            </div>
          </form>
        </div>
        <div class="signup-form">
          <div class="title">Registro</div>
          <form action="../Model/registroUsuario.php" method="post" onsubmit="return comprobarParaEnvio()">
            <div class="input-boxes">
              
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="nombre_RU" id="nombre_RU" placeholder="Ingrese su nombre" required onblur="validarNom()">
                <!-- <span class="error-message" id="nombreError"></span> -->
              </div>
              <small id="nombre-error" style="color: red; display: none;">Por favor ingrese un nombre válido</small>
              
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="apellido_RU" id="apellido_RU" placeholder="Ingrese su apellido" required onblur="validarAp()">
              </div>
              <small id="apellido-error" style="color: red; display: none;">Por favor ingrese un apellido válido</small>
              
              <div class="input-box">
                <i class="fas fa-calendar-alt"></i>
                <input type="date" name="fecha_nac_RU" id="fecha_nac_RU" placeholder="Ingrese su fecha de nacimiento" min="1933-01-01" onchange="validarFecha()" required>
              </div>
              <small id="fecha-error" style="color: red; display: none;"></small>
              
              <div class="input-box">
                <i class="fas fa-phone-alt"></i>
                <input type="text" name="telefono_RU" id="telefono_RU" placeholder="Ingrese su número de teléfono" maxlength="10" required onblur="validarTel()">
              </div>
              <small id="telefono-error" style="color: red; display: none;">Por favor ingrese un número de teléfono válido en Ecuador</small>


              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email_RU" id="email_RU" placeholder="Ingrese su email" required onblur="validarEmailRU()">
              </div>
              <small id="email_RU-error" style="color: red; display: none;"></small>

              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="contrasena_RU" id="contrasena_RU" placeholder="Ingrese su contraseña" minlength="8" maxlength="15" required>
              </div>

              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="contrasena_RU_rep" id="contrasena_RU_rep" placeholder="Repita su contraseña" minlength="8" maxlength="15" required onchange="validarContrasenaRep()">
              </div>
              <small id="contrasena_RU_rep-error" style="color: red; display: none;">Las contraseñas ingresadas no coinciden</small>
              
              <div class="button input-box">
                <input type="submit" value="Registrarme">
              </div>
              <div class="text sign-up-text">¿Ya dispone de una cuenta? <label for="flip">Inicie sesión</label></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>