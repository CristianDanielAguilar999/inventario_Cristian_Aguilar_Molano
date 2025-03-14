<?php

$host = '127.0.0.1';  // dirección base de datos
$db = 'inventario'; // Nombre de la base de datos
$user = 'root';
$pass ='';
$charset ='utf8mb4';

$conexion = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION, // Habilitar Excepción en errores
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Devolver datos como array asociativo
];

try {
    $pdo = new PDO($conexion, $user, $pass, $options);
    echo "Conexión exitosa a la base de datos";
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
//Visualizar producto
$sql = "select * from producto";
$stmt = $pdo->query($sql);
?>

<!doctype html>
<html lang="es">
<head>
    <title>Lista de Productos</title>
</head>
<body>
    <h1>lista Producto</h1>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descrpcion</th>
            <th>Costo</th>
            <th>Cantidad</th>
        </tr>
        <?php while ($fila = $stmt->fetch()): ?>
            <tr>
                <td><?php echo $fila['Nombre']; ?></td>
                <td><?php echo $fila['Descripcion']; ?></td>
                <td><?php echo $fila['Precio']; ?></td>
                <td><?php echo $fila['Cantidad']; ?></td>
            </tr>
        <?php endwhile ?>
    </table>
</body>
</html>
