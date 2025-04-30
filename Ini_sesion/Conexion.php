<?php
function CreateConnection()
{
    $host = "localhost";
    $usuario_db = "security";
    $contrasena_db = "security";
    $nombre_db = "seguridad";

    $conn = new mysqli($host, $usuario_db, $contrasena_db, $nombre_db);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    return $conn;
}

// Asegúrate de llamar esta función en cada archivo donde se necesita la conexión.
$conn = CreateConnection();
