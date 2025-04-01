<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    // ✅ Cargar productos
    if ($data['action'] == "cargarProductos") {
        $stmt = $pdo->prepare("SELECT p.IdProducto, p.nombreProducto, p.valorProducto, p.descripción, p.cantidad, 
                                      p.imagen, c.nombreCategoria AS categoria, pr.nombre AS proveedor 
                               FROM producto p
                               JOIN categoria c ON p.Id_Categoria = c.IdCategoria
                               JOIN proveedor pr ON p.Id_Proveedor = pr.IdProveedor");
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($productos);
    }

    // ✅ Obtener datos de un producto por ID
    if ($data['action'] == "obtenerProducto") {
        $id = $data['IdProducto'];
        $stmt = $pdo->prepare("SELECT * FROM producto WHERE IdProducto = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($producto);
    }

    // ✅ Editar un producto
    if ($data['action'] == "editarProducto") {
        $stmt = $pdo->prepare("UPDATE producto SET 
                                nombreProducto = :nombreProducto, 
                                valorProducto = :valorProducto, 
                                descripción = :descripcion, 
                                cantidad = :cantidad 
                              WHERE IdProducto = :id");
        $stmt->bindParam(':nombreProducto', $data['nombreProducto']);
        $stmt->bindParam(':valorProducto', $data['valorProducto']);
        $stmt->bindParam(':descripcion', $data['descripción']);
        $stmt->bindParam(':cantidad', $data['cantidad']);
        $stmt->bindParam(':id', $data['IdProducto'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Producto actualizado correctamente."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al actualizar el producto."]);
        }
    }

    // ✅ Eliminar un producto
    if ($data['action'] == "eliminarProducto") {
        $id = $data['IdProducto'];
        $stmt = $pdo->prepare("DELETE FROM producto WHERE IdProducto = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Producto eliminado correctamente."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al eliminar el producto."]);
        }
    }
}
?>