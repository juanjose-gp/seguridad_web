<?php

$conexion = ConexionOK();
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

function ConexionOk()
{
    try {
        $host = "localhost";
        $usuario_db = "seguridad";
        $contrasena_db = "jujo0218";
        $nombre_db = "seguridad";

        return new mysqli($host, $usuario_db, $contrasena_db, $nombre_db);
    } catch (Exception $ex) {
        die("Error en la conexión a la base de datos: " . $ex->getMessage());
    }
}
