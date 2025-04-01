<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreProducto = $_POST['nombreProducto'];
    $valorProducto = $_POST['valorProducto'];
    $descripcionProducto = $_POST['descripcionProducto'];
    $cantidadProducto = $_POST['cantidadProducto'];
    $proveedorProducto = $_POST['proveedorProducto'];
    $categoriaProducto = $_POST['categoriaProducto'];

    $target_dir = "../public/Images/"; // Asegúrate de que esta carpeta exista
    $target_file = $target_dir . basename($_FILES["imagenProducto"]["name"]);
    $imagenFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;
    
    // Validaciones
    if (file_exists($target_file)) {
        echo json_encode(['success' => false, 'message' => 'El archivo ya existe.']);
        exit;
    }

    if (!in_array($imagenFileType, ["jpg", "png", "jpeg", "gif"])) {
        echo json_encode(['success' => false, 'message' => 'Solo se permiten archivos JPG, PNG, JPEG y GIF.']);
        exit;
    }

    // Subir imagen
    if (move_uploaded_file($_FILES["imagenProducto"]["tmp_name"], $target_file)) {
        // Guardar en la base de datos
        $sql = "INSERT INTO producto (nombreProducto, valorProducto, descripcion, cantidad, imagen, Id_Proveedor, Id_Categoria) 
        VALUES (:nombreProducto, :valorProducto, :descripcionProducto, :cantidadProducto, :imagen, :proveedorProducto, :categoriaProducto)";


        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombreProducto', $nombreProducto);
        $stmt->bindParam(':valorProducto', $valorProducto);
        $stmt->bindParam(':descripcionProducto', $descripcionProducto);
        $stmt->bindParam(':cantidadProducto', $cantidadProducto);
        $stmt->bindParam(':imagen', $target_file); // Guardar la ruta de la imagen
        $stmt->bindParam(':proveedorProducto', $proveedorProducto);
        $stmt->bindParam(':categoriaProducto', $categoriaProducto);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Producto agregado correctamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al guardar en la base de datos']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al subir la imagen']);
    }
}
?>
