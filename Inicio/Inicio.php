<?php
require "Conexion.php";
$conexion = ConexionOK();
$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-4">
        <div class="row ">
            <?php while ($fila = $resultado->fetch_assoc()): ?>
                <div class="col-md-4 mb-4 ">
                    <div class="card shadow-sm h-100 ">
                        <div class="text-center">
                            <img src="../<?= $fila['imagen_url'] ?>" class="card-img-top" alt="<?= $fila['nombre'] ?>" style="width: 250px; height: auto;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $fila['nombre'] ?></h5>
                            <p class="card-text"><?= $fila['descripcion'] ?></p>
                            <p class="card-text"><strong>$<?= number_format($fila['precio'], 0, ',', '.') ?></strong></p>
                            <div class="d-flex justify-content-center">
                                <a href="../Productos/Articulo.php?id_producto=<?= $fila['id_producto'] ?>" class="btn btn-outline-primary">Ver más</a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>