<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once '../Includes/Header.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <!-- Agregar los enlaces a los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
  <div class="container mt-5 mb-5 center">
    <div class="row center">
      <div class="card shadow col-md-6 offset-md-3">
        <div class="card-header">
          <h4 class="card-title text-center">¡Bienvenido!</h4>
        </div>
        <div class="card-body text-center">
          <p><strong>Se ha registrado correctamente </strong>.</p>
          <a href="../Ini_sesion/entrar.php" class="btn btn-outline-primary">Iniciar Sesión</a>
        </div>
      </div>
    </div>
  </div>

    <!-- Agregar el enlace al script de Bootstrap (requerido para algunos componentes interactivos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php require_once '../Includes/Footer.html' ?>
</body>

</html>

<!--//' OR '1'='1-->