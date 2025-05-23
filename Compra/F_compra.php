<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';  
require_once '../Includes/Header.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "clave_secreta_super_segura"; // Debe ser la misma usada al generar el token

// Verificar que el token exista en sesión
if (!isset($_SESSION['token'])) {
    // Mostrar mensaje y botón en vez de redirigir
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Acceso Denegado</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    </head>
    <body class="bg-light">
      <div class="container mt-5 text-center">
        <div class="alert alert-warning">
          <h4>Debes iniciar sesión o registrarse para realizar una compra.</h4>
        </div>
        <a href="../Ini_sesion/entrar.php?redirect=../Compra/F_compra.php" class="btn btn-primary">
          Iniciar Sesión / Registrarse
        </a>
      </div>
    </body>
    </html>
    <?php
    exit; // No mostrar formulario si no hay sesión
}

try {
    $decoded = JWT::decode($_SESSION['token'], new Key($secret_key, 'HS256'));
    if ($decoded->exp < time()) {
        session_destroy();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>Sesión Expirada</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
        </head>
        <body class="bg-light">
          <div class="container mt-5 text-center">
            <div class="alert alert-warning">
              <h4> Tu sesión ha expirado. Por favor inicia sesión nuevamente.</h4>
            </div>
            <a href="../Ini_sesion/entrar.php?redirect=../Compra/F_compra.php" class="btn btn-primary">
              Iniciar Sesión / Registrarse
            </a>
          </div>
        </body>
        </html>
        <?php
        exit;
    }
} catch (Exception $e) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Acceso Inválido</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    </head>
    <body class="bg-light">
      <div class="container mt-5 text-center">
        <div class="alert alert-danger">
          <h4>⛔ Acceso inválido. Por favor inicia sesión.</h4>
        </div>
        <a href="../Ini_sesion/entrar.php?redirect=../Compra/F_compra.php" class="btn btn-primary">
          Iniciar Sesión / Registrarse
        </a>
      </div>
    </body>
    </html>
    <?php
    exit;
}
?>

<!-- Si todo está bien, muestra el formulario -->

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulario de Compra</title>
  <link  
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    crossorigin="anonymous" />
</head>

<body>
  <div class="container mt-5 mb-5">
    <form id="registroForm" action="F_conexion.php" method="post">
      <div class="row justify-content-center">
        <div class="col-8 card shadow">
          <div class="card-header text-center">
            <h4>Realizar Compra</h4>
          </div>
          <div class="card-body">
            <div class="form-floating mb-4">
              <select class="form-select" id="id_producto" name="id_producto" required>
                <option value="1">Samsung Galaxy S24FE</option>
                <option value="2">Portatil ASUS Vivobook</option>
                <option value="3">Parlante JBL Flip 6</option>
              </select>
              <label for="id_producto">Producto</label>
            </div>
            <div class="form-floating mb-4">
              <input type="number" class="form-control" id="cantidad_producto" name="cantidad_producto" required />
              <label for="cantidad_producto">Cantidad de Producto</label>
            </div>
            <div class="form-floating mb-4">
              <input type="text" class="form-control" id="medio_pago" name="medio_pago" required/>
              <label for="medio_pago">Medio de pago</label>
            </div>
            <div class="form-floating mb-4">
              <input type="text" class="form-control" id="direccion" name="direccion" required />
              <label for="direccion">Dirección de envío</label>
            </div>
            <div class="mb-4 text-center">
              <button type="submit" class="btn btn-outline-primary w-25">
                Comprar
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="ValidacionesC.js"></script>
</body>
<?php require_once '../Includes/Footer.html' ?>

</html>
