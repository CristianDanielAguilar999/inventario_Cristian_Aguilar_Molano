<?php
require_once 'conexion.php';

session_start();

if (!isset($_SESSION['nombre'])) {
  header('Location: login.php');
  exit;
}

$nombre = $_SESSION['nombre'];

$stmt = $pdo->prepare('SELECT * FROM usuario WHERE nombre = :nombre');
$stmt->bindParam(':nombre', $nombre);
$stmt->execute();
$usuario = $stmt->fetch();

echo json_encode($usuario);

