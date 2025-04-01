<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $action = $data['action'] ?? '';

    switch ($action) {
        case "cargarProductos":
            cargarProductos($pdo);
            break;
        case "obtenerProducto":
            obtenerProducto($pdo, $data['IdProducto']);
            break;
        case "editarProducto":
            editarProducto($pdo, $data);
            break;
        case "eliminarProducto":
            eliminarProducto($pdo, $data['IdProducto']);
            break;
        default:
            echo json_encode(["success" => false, "message" => "Acción no válida"]);
    }
}

function cargarProductos($pdo) {
$stmt = $pdo->prepare("SELECT p.IdProducto, p.nombreProducto, p.valorProducto, p.descripcion, p.cantidad, 
                              p.imagen, c.descripción AS categoria, pr.nombre AS proveedor 
                       FROM producto p
                       JOIN categoria c ON p.Id_Categoria = c.IdCategoria
                       JOIN proveedor pr ON p.Id_Proveedor = pr.IdProveedor");

    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function obtenerProducto($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM producto WHERE IdProducto = ?");
    $stmt->execute([$id]);
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
}

function editarProducto($pdo, $data) {
    $stmt = $pdo->prepare("UPDATE producto SET 
                            nombreProducto = :nombreProducto, 
                            valorProducto = :valorProducto, 
                            descripcion = :descripcion, 
                            cantidad = :cantidad 
                          WHERE IdProducto = :id");
    $stmt->bindParam(':nombreProducto', $data['nombreProducto']);
    $stmt->bindParam(':valorProducto', $data['valorProducto']);
    $stmt->bindParam(':descripcion', $data['descripcion']);
    $stmt->bindParam(':cantidad', $data['cantidad']);
    $stmt->bindParam(':id', $data['IdProducto'], PDO::PARAM_INT);

    echo json_encode(["success" => $stmt->execute(), "message" => "Producto actualizado correctamente"]);
}

function eliminarProducto($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM producto WHERE IdProducto = ?");
    echo json_encode(["success" => $stmt->execute([$id]), "message" => "Producto eliminado correctamente"]);
}
?>
