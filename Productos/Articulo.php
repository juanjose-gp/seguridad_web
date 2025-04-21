<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../Includes/Header.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <?php
    if (isset($_GET['id_producto'])) {
        $id = $_GET['id_producto'];

        require '../Inicio/Conexion.php';
        $conexion = ConexionOK();

        $query = "SELECT * FROM productos WHERE id_producto = $id";
        $resultado = $conexion->query($query);
        $producto = $resultado->fetch_assoc();

        if ($producto) {
            // Si encontró el producto, lo muestra
    ?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h1><?= $producto['nombre'] ?></h1>
                        <!-- Imagen del producto -->
                        <div class="text-center">
                            <img src="../<?= $producto['imagen_url'] ?>" class="rounded " alt="<?= $producto['nombre'] ?>" width="400">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p><?= $producto['descripcion'] ?></p>
                        <p><strong>Precio:</strong> $<?= number_format($producto['precio'], 0, ',', '.') ?></p>
                        <div class="d-flex justify-content-center">
                            <a href="../Compra/F_compra.php" class="btn btn-outline-primary">Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        } else {
            // Si no encontró el producto en la base de datos
            echo "Producto no encontrado en la base de datos.";
        }
    } else {
        // Si no llegó el parámetro id_producto por la URL
        echo "Producto no encontrado.";
    }
    ?>
</head>
<?php require_once '../Includes/Footer.php' ?>
</body>

</html>