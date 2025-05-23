
<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once '../Includes/Header.php' ?>
    <meta charset="UTF-8" />
    <title>Acceso Denegado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

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
            <div class="card p-4 shadow col-md-6 offset-md-3">
                <div class="card-header text-center">
                    <h1 class="text-danger mb-3">Acceso Denegado</h1>
                </div>
                <div class="card-body text-center">
                    <p class="lead mb-4">No tienes permisos para acceder a esta página.</p>
                    <a href="../Inicio/Inicio.php" class="btn btn-primary">Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>
    <?php require_once '../Includes/Footer.html' ?>
</body>
</html>
