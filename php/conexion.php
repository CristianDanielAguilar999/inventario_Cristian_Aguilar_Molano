<?php

$host = '127.0.0.1'; // dirección base de datos
$db = 'Inventarri'; // Nombre de la base de datos
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$conexion = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Habilitar Excepción en errores
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Devolver datos como array asociativo
];
try {
    $pdo = new PDO($conexion, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}


