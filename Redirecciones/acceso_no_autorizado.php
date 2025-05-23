<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once '../Includes/Header.php' ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acceso no autorizado</title>

        <link  
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
        rel="stylesheet"
        crossorigin="anonymous" />

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
        <div class="container mt-5 mb-5">
          <div class="row center">
              <div class="card shadow col-md-6 offset-md-3">
                <div class="card-header text-center">
                    <h5>Acceso no autorizado</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">ROL SIN ACCESO</h5>
                    <p class="card-text">Parece ser que tu rol definido no tiene permitido acceder a esta sección</p>
                    <a href="../Inicio/Inicio.php" class="btn btn-outline-primary">Ir al inicio</a>
                </div>
              </div>
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
        <?php require_once '../Includes/Footer.html' ?>
    </body>
</html>