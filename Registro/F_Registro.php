<?php
$conexion = CreateConnection();
if ($conexion->connect_error) {
    echo "Error en la conexión a la base de datos";
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: Registro.php");
    echo "Post";
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
if (empty($nombre_completo) || empty($correo) || empty($contrasena) || empty($edad) || empty($telefono) || empty($fecha_nacimiento)) {
    header("Location: Registro.php");
    echo "llegaron";
    exit();
}
// Validar que el correo electrónico tenga un formato válido
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header("Location: Registro.php");
    exit();
}

if ($contrasena !== $repetir_contrasena) {
    $_SESSION['error'] = "Las contraseñas no coinciden";
    header("Location: Registro.php");
    exit();
}
try {
    //Generar sal para agregar el factor de pseudoaleatoriedad
    $salt = random_bytes(16); // Genera un salt aleatorio de 32 caracteres hexadecimales
    $salt_hex = bin2hex($salt); // Convierte el salt a hexadecimal

    $password_with_salt = $contrasena . $salt_hex; // Combina la contraseña con el salt

    $hashed_password = hash('sha256', $password_with_salt); // Hashea la contraseña con el salt

    // Código vulnerable a inyección SQL
    $sql = "INSERT INTO clientes (nombre_completo, correo, edad, fecha_cumpleanos, contrasena, telefono, salt) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Preparar la consulta
    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        redirectToRegister();
        exit();
    }

    // Ejecutar la consulta directamente sin preparar ni sanitizar


    $stmt->bind_param(
        "ssissss", // s: string, i: int
        $nombre_completo,
        $correo,
        $edad,
        $fecha_nacimiento,
        $hashed_password,
        $telefono,
        $salt_hex
    );

    // Ejecutar la consulta
    // Aquí se ejecuta la consulta SQL, lo que puede ser vulnerable a inyección SQL

    if ($stmt->execute()) {
        redirectToWelcomePage();
    } else {
        redirectToRegister();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}



// Verificar si se registró el usuario


$conexion->close();

/**
 * Redirige al usuario a la página de bienvenida.
 */
function redirectToWelcomePage()
{
    header("Location: bienvenido.php");
    exit();
}

/**
 * Redirige al usuario a la página de login.
 */
function redirectToRegister()
{
    header("Location: Registro.php");
    exit();
}

// Función para limpiar la entrada del usuario
// Esta función es vulnerable a inyección SQL y no debería usarse en producción
function cleanInput($input)
{
    // Eliminar espacios en blanco al inicio y al final
    $input = trim($input);
    // Eliminar barras invertidas
    $input = stripslashes($input);
    // Convertir caracteres especiales a entidades HTML
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}



// Crear conexión a la base de datos
function CreateConnection()
{
    try {
        // Datos de conexión a la base de datos
        $host = "localhost";
        $usuario_db = "seguridad";
        $contrasena_db = "jujo0218";
        $nombre_db = "seguridad";

        // Conexión a la base de datos
        $conexion = new mysqli($host, $usuario_db, $contrasena_db, $nombre_db);
        return $conexion;
    } catch (Exception $ex) {
        echo "Error en la conexión a la base de datos" . $ex->getMessage();
        exit();
    }
}
