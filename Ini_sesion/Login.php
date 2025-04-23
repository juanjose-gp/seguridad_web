<?php
session_start();
include '../Ini_sesion/Conexion.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['correo']) || !isset($_POST['contrasena'])) {
        $error = "Faltan datos del formulario.";
    } else {
        $correo = trim($_POST['correo']);
        $contrasena = $_POST['contrasena'];

        if (!$conn) {
            $error = "Error de conexión a la base de datos.";
        } else {
            $stmt = $conn->prepare("SELECT id_cliente, nombre_completo, contrasena, salt FROM clientes WHERE correo = ?");
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows === 1) {
                $stmt->bind_result($id_cliente, $nombre_completo, $hashed_password, $salt);
                $stmt->fetch();

                $input_hash = hash('sha256', $contrasena . $salt);

                if ($input_hash === $hashed_password) {
                    $_SESSION['cliente'] = $nombre_completo;
                    header("Location: ../Inicio/Inicio.php");
                    exit;
                } else {
                    $error = "Contraseña incorrecta.";
                }
            } else {
                $error = "Usuario no encontrado.";
            }

            $stmt->close();
            $conn->close();
        }
    }
}

// Si llega por GET o hubo error, cargamos el formulario:
include 'entrar.php';
