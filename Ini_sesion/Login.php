<?php
// Inicia la sesión para manejar las variables de sesión
session_start();

include 'Conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica si los datos requeridos existen
    if (!isset($_POST['correo']) || !isset($_POST['contrasena'])) {
        exit("Faltan datos del formulario.");
    }

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    if (!$conn) {
        exit("Error de conexión a la base de datos.");
    }

    // Prepara la consulta SQL para evitar inyecciones SQL
    $stmt = $conn->prepare("SELECT id_cliente, nombre_completo, contrasena, salt FROM clientes WHERE correo = ?");
    $stmt->bind_param("s", $correo); // Vincula la variable $correo al parámetro de la consulta
    $stmt->execute(); // Ejecuta la consulta
    $stmt->store_result(); // Almacena el resultado

    // Verifica si se encontró un usuario con el correo proporcionado
    if ($stmt->num_rows === 1) {
        // Vincula los resultados a las variables
        $stmt->bind_result($id_cliente, $nombre_completo, $hashed_password, $salt);
        $stmt->fetch(); // Extrae los resultados

        // Compara el hash de la contraseña
        // Se utiliza SHA-256 con el salt para realizar la comparación
        $input_hash = hash('sha256', $contrasena . $salt);

        // Si las contraseñas coinciden, el usuario se autentica
        if ($input_hash === $hashed_password) {
            $_SESSION['cliente'] = $nombre_completo;

            header("Location: ../Inicio/Inicio.php");
            exit;
        } else {

            exit("Contraseña incorrecta.");
        }
    } else {

        exit("Usuario no encontrado.");
    }

    // Cierra la sentencia y la conexión a la base de datos
    $stmt->close();
    $conn->close();
} else {
    // Si el método HTTP no es POST, muestra un error
    exit("Método no permitido.");
}
