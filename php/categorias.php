<?php
require_once 'conexion.php'; // Asegúrate de que este archivo tenga la conexión a la BD

header("Content-Type: application/json");

try {
    // Obtener todas las categorías de la base de datos
    $stmt = $pdo->query("SELECT IdCategoria, nombreCategoria, descripción, codigoCategoria, estado FROM categoria ORDER BY IdCategoria ASC");
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($categorias);
} catch (PDOException $e) {
    echo json_encode(["error" => "Error al obtener categorías: " . $e->getMessage()]);
}
?>
