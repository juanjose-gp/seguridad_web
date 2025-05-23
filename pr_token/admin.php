<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "clave_secreta_super_segura";

// Verifica el token y el rol
if (!isset($_SESSION['token'])) {
    header("Location: acceso_no_autorizado.php");
    exit;
}

try {
    $decoded = JWT::decode($_SESSION['token'], new Key($secret_key, 'HS256'));
    if ($decoded->rol !== 'admin') {
         header("Location: accesodenegado.php");
        exit;
    }
} catch (Exception $e) {
    header("Location: ../Inicio/Inicio.php");
    exit;
}
?>
<?php require_once '../Includes/Header.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administrador</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card p-4 shadow">
          <h4 class="text-center mb-4">👑 Panel de Administración</h4>
          <p class="text-center">Bienvenido <strong><?php echo htmlspecialchars($decoded->nombre); ?></strong>. Estás en la zona exclusiva para administradores.</p>
          <hr>
          <div class="mt-3">
            <ul>
              <li>📊 Gestión de reportes del sistema</li>
              <li>👥 Administración de usuarios</li>
              <li>⚙️ Configuraciones avanzadas del sistema</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php require_once '../Includes/Footer.html'; ?>
</html>
