<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once '../Includes/Header.php' ?>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card p-4 shadow">
          <h4 class="text-center mb-4">Iniciar Sesión</h4>
            <!-- Esta condicion me esta verificando los datos del formulario, si se cumple
             me va a traer los mensajes configurados en elbackend (clave incorrecta o usuario incorrecto)-->
          <?php if (isset($_SESSION['error']) && $_SESSION['error'] !== ''): ?>
            <div class="alert alert-danger">
              <?php 
              echo $_SESSION['error']; 
              unset($_SESSION['error']); 
              ?>
            </div>
            <!-- Se usa endif en lugar de {} para cerrar el bloque porque tenemos mezclado PHP y HTML, 
             son buenas bracticas-->
          <?php endif; ?>

          <form id="EnviarForm" action="Login.php" method="POST">
            <div class="mb-3">
              <label for="correo" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
              <label for="contrasena" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2" >Entrar</button>
            <h6 class="text-center">¿No tienes una cuenta?<br> <a  href="../Registro/Registro.php">Registrate.</a></h6>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <script src="ValidacionesI.js"></script>
</body>
<?php require_once '../Includes/Footer.html' ?>
</html>
