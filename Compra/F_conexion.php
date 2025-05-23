<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../Includes/ConexionBD.php';
require_once __DIR__ . '/../enums/general_config.php';

$conexion = CreateConnection();
if ($conexion->connect_error) {
    die("Error en la conexión con la base de datos: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header(GeneralConfig::compraPageUrl->value);
    exit();
}

$id_producto = (int) cleanInput($_POST['id_producto']);
$cantidad_producto = (int) cleanInput($_POST['cantidad_producto']);
$medio_pago = cleanInput($_POST['medio_pago']);
$direccion = cleanInput($_POST['direccion']);

if (empty($id_producto) || empty($cantidad_producto) || empty($medio_pago) || empty($direccion)) {
    redirectToCompra(); // Si hay algún campo vacío, redirige a la página de compra
}

$sql = "INSERT INTO compras (cantidad_producto, medio_pago, direccion, id_producto) 
        VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error al preparar la consulta: " . $conexion->error);
}

if (!$stmt->bind_param("issi", $cantidad_producto, $medio_pago, $direccion, $id_producto)) {
    die("Error en bind_param: " . $stmt->error);
}

if ($stmt->execute()) {
    redirectToProductPage(); // Redirige a la página de productos si la inserción es exitosa
} else {
    echo "Ocurrió un problema al intentar registrar la compra: " . $stmt->error;
    redirectToCompra(); // Si hay error en la ejecución, redirige a la página de compra
}

$stmt->close();
$conexion->close();

/**
 * Redirige al usuario a la página de productos
 */
function redirectToProductPage() {
    header(GeneralConfig::loginPageUrlInicio->value);
    exit();
}

/**
 * Redirige al usuario a la página de compra si tiene error
 */
function redirectToCompra() {
    header(GeneralConfig::compraPageUrl->value);
    exit();
}

function cleanInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, GeneralConfig::characterGame->value);
}

?>
