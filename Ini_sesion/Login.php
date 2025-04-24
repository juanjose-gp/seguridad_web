<?php
session_start();
/**
    * require_once en vez de includes 
    *ya que me permite se solo se cargue una vez, evita errores de dooble cargar. 
    * _DIR_ es por si la pagina se escala y tiene muchos archivos 
    *funciona siempre, no importa desde dónde se ejecute el script, porque parte del lugar real donde está el archivo
 */
require_once __DIR__ . '/../Includes/ConexionBD.php';

// nos guarda el mensaje de error si lo hay para despues deflejaro 
$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['correo']) || !isset($_POST['contrasena'])) {
        $error = "Faltan datos del formulario.";
    } else {
        //trim me elimina los espacios.
        //se agignan los datos a las variables
        $correo = trim($_POST['correo']);
        $contrasena = $_POST['contrasena'];

        //si la BD esta conectada correctamente preparamos la consulta para buscar a el cliente por el correo
        if (!$conn) {
            $error = "Error de conexión a la base de datos.";
        } else {
            $stmt = $conn->prepare("SELECT id_cliente, nombre_completo, contrasena, salt FROM clientes WHERE correo = ?");
            // "s" indica que el parámetro es de tipo (string)
            $stmt->bind_param("s", $correo);
            $stmt->execute();//ejecuta la consulta
            $stmt->store_result();//guarda la consulta

            if ($stmt->num_rows === 1) {
                //si se encuentra el resultado vinculamos las columnas de la consulta con variables 
                $stmt->bind_result($id_cliente, $nombre_completo, $hashed_password, $salt);
                $stmt->fetch();//traemos los datos

                // se calcula el hash de la contraseña ingresada concatenado con el 'salt' de la base de datos
                $input_hash = hash('sha256', $contrasena . $salt);

                // Comparamos el hash generado con la contraseña almacenada en la base de datos
                if ($input_hash === $hashed_password) {
                    $_SESSION['cliente'] = $nombre_completo;
                    header("Location: ../Inicio/Inicio.php");
                    exit;
                } else {
                    $error = "Contraseña incorrecta.";
                }
            } else {
                $error = "Usuario incorrecto.";
            }

            $stmt->close();
            $conn->close();
        }
    }
    
    // Guardar el error en la sesión para mostrarlo en el frontend
    $_SESSION['error'] = $error;
    
    // Redirigir de nuevo al formulario
    header("Location: entrar.php");
    exit;
}
?>