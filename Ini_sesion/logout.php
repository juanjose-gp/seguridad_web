<?php
// Inicia o reanuda la sesión actual.
// Es necesario para poder destruirla correctamente.
session_start();

// Destruye todos los datos asociados a la sesión actual en el servidor.
// Esto cierra efectivamente la sesión del usuario.
session_destroy();

// Se redirecciona al usuario a la página de inicio con la sesion ya cerrada.
header("Location: ../Inicio/Inicio.php");

exit;
?>
