<?php

enum GeneralConfig: string {
    // case host = 'localhost';
    // case username = 'security';
    // case password = 'security';
    // case database = 'seguridad';
    case dateConfig = 'Y-m-d H:i:s';
    case getSqlCommandQuery = 'SELECT password, salt FROM clientes WHERE email = ?';
    case encryptTokenAlgorith = 'HS256';
    case tokenKey = 'esta_es_mi_clave';
    case errorPageUrl = 'Location: server_error_500.html';
    case encryptAlgorith = 'sha256';
    //registro
    case welcomePageUrl_registro = 'Location: bienvenido.php';
    case registerPageUrl_registro = 'Location: Registro.php';
   
    case Inicio = 'Location: ../Inicio/Inicio.php';
    case loginPageUrl_error = 'Location: entrar.php';
    //compra
    case compraPageUrl = 'Location: F_compra.php';
   
    case InicioSesionUrl = 'Location: ../Ini_sesion/entrar.php';
    case tokenCookieName = 'jwt';
    case characterGame = 'UTF-8';
    case logFile = 'error.log';
    case logFileWarnings = 'warnings.log';
    case credentialFile = 'database.json';

    case accesoDenegado = 'Location: ../pr_token/accesodenegado.php';
    case accesoNoAutorizado = 'Location: ../pr_token/acceso_no_autorizado.php';

}