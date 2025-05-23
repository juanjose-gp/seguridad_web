<?php
session_start(); // Asegúrate de iniciar la sesión si usarás mensajes

require_once __DIR__ . '/../Includes/ConexionBD.php';
require_once __DIR__ . '/../enums/general_config.php';

$conexion = CreateConnection();

if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header(GeneralConfig::registerPageUrl_registro->value); // Redirección si no es POST
    exit();
}

// Obtener los datos enviados desde el formulario
$nombre_completo = cleanInput($_POST['nombre_completo']);
$edad = cleanInput($_POST['edad']);
$telefono = cleanInput($_POST['telefono']);
$fecha_nacimiento = cleanInput($_POST['fecha_nacimiento']);
$correo = cleanInput($_POST['correo']);
$contrasena = cleanInput($_POST['contrasena']);
$repetir_contrasena = cleanInput($_POST['repetir_contrasena']);

// Validar que los datos no estén vacíos
if (
    empty($nombre_completo) || empty($correo) || empty($contrasena) ||
    empty($edad) || empty($telefono) || empty($fecha_nacimiento)
) {
    header(GeneralConfig::registerPageUrl_registro->value);
    exit();
}

// Validar formato de correo electrónico
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header(GeneralConfig::registerPageUrl_registro->value);
    exit();
}

// Validar que las contraseñas coincidan
if ($contrasena !== $repetir_contrasena) {
    $_SESSION['error'] = "Las contraseñas no coinciden";
    header(GeneralConfig::registerPageUrl_registro->value);
    exit();
}

try {
    // Generar salt aleatorio
    $salt = random_bytes(16);
    $salt_hex = bin2hex($salt);

    $password_with_salt = $contrasena . $salt_hex;
    $hashed_password = hash(GeneralConfig::encryptAlgorith->value, $password_with_salt);

    // Consulta SQL con parámetros preparados (previene inyección SQL)
    $sql = "INSERT INTO clientes (nombre_completo, correo, edad, fecha_cumpleanos, contrasena, telefono, salt) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        redirectToRegister();
        exit();
    }

    $stmt->bind_param(
        "ssissss",
        $nombre_completo,
        $correo,
        $edad,
        $fecha_nacimiento,
        $hashed_password,
        $telefono,
        $salt_hex
    );

    if ($stmt->execute()) {
        redirectToWelcomePage();
    } else {
        redirectToRegister();
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conexion->close();

/**
 * Redirige al usuario a la página de bienvenida.
 */
function redirectToWelcomePage()
{
    header(GeneralConfig::welcomePageUrl_registro->value);
    exit();
}

/**
 * Redirige al usuario a la página de registro.
 */
function redirectToRegister()
{
    header(GeneralConfig::registerPageUrl_registro->value);
    exit();
}

/**
 * Limpia la entrada del usuario.
 */
function cleanInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES, GeneralConfig::characterGame->value);
    return $input;
}
?>
