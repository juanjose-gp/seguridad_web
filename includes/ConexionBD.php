<?php
    // Manejador global de errores:
    set_exception_handler(function (/*$exception*/) {
        // error_log("Excepción no capturada: " . $exception->getMessage());
        header(GeneralConfig::errorPageUrl -> value);
        exit;
    });

    // Manejador de errores de PHP:
    set_error_handler(function ($errno, $errstr, $errfile, $errline) {
        if (!(error_reporting() & $errno)) return;
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    });

    // Pruebas:
    // throw new Exception("Prueba de excepción no controlada");
    // echo $variableInexistente;

    function CreateConnection()
    {
        $host = "localhost";
        $usuario_db = "root";
        $contrasena_db = "";
        $nombre_db = "bambueno";

        $conn = new mysqli($host, $usuario_db, $contrasena_db, $nombre_db);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        return $conn;
    }

    // Asegúrate de llamar esta función en cada archivo donde se necesita la conexión.
    $conn = CreateConnection();
?>