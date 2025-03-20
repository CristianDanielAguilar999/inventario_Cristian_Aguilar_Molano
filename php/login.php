<?php
require_once 'conexion.php';
session_start();

header('Content-Type: application/json');

// Si no se recibe una solicitud POST, solo devuelve el rol actual de la sesión
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["rol" => $_SESSION['rol'] ?? ""]);
    exit;
}

// Obtener los datos enviados desde JavaScript
$data = json_decode(file_get_contents('php://input'), true);
$nombreUsuario = $data['nombreUsuario'] ?? '';
$contrasena = $data['contrasena'] ?? '';
$rol = $data['Rol'] ?? '';

// Verificar que los datos estén completos
if (empty($nombreUsuario) || empty($contrasena) || empty($rol)) {
    echo json_encode(['estado' => 'error', 'mensaje' => 'Faltan datos']);
    exit;
}

// Preparar la consulta SQL
$stmt = $pdo->prepare('SELECT contrasena, rol FROM usuario WHERE nombre = :nombre AND rol = :rol');
$stmt->bindParam(':nombre', $nombreUsuario);
$stmt->bindParam(':rol', $rol);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si el usuario existe y la contraseña es correcta
if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
    // Guardar en la sesión
    $_SESSION['nombre'] = $nombreUsuario;
    $_SESSION['rol'] = $usuario['rol'];

    echo json_encode(['estado' => 'exito', 'rol' => $usuario['rol']]);
} else {
    echo json_encode(['estado' => 'error', 'mensaje' => 'Credenciales incorrectas']);
}
?>
