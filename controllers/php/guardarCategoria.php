<?php
require_once '../../config/conexion.php';

global $pdo;
$datos = json_decode(file_get_contents('php://input'), true);

if (!$datos) {
    echo "No se recibieron datos.";
    exit;
}

if (!isset($datos['nombreCategoria'], $datos['descripciónCategoria'], $datos['codigoCategoria'], $datos['estadoCategoria'])) {
    echo "Faltan datos en la solicitud.";
    exit;
}

$nombreCategoria = $datos['nombreCategoria'];
$descripcion = $datos['descripciónCategoria']; // Con tilde en el array
$codigoCategoria = $datos['codigoCategoria'];
$estado = $datos['estadoCategoria'];

try {
    $sql = "INSERT INTO categoria (nombreCategoria, descripción, codigoCategoria, estado) 
            VALUES (:nombre, :descripcion, :codigo, :estado)"; // 🔹 Aquí QUITÉ la tilde en :descripcion

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombreCategoria,
        ':descripcion' => $descripcion, // 🔹 Aquí también QUITÉ la tilde
        ':codigo' => $codigoCategoria,
        ':estado' => $estado
    ]);

    echo "Categoría agregada correctamente";
} catch (PDOException $e) {
    echo "Error al agregar categoría: " . $e->getMessage();
}
?>
