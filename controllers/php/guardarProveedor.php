<?php
require_once 'conexion.php';

$datos = json_decode(file_get_contents('php://input'), true);

$nombre = $datos['nombre'];
$dirección = $datos['dirección'];
$edad = $datos['edad'];
$ciudad = $datos['ciudad'];
$email = $datos['email'];

$sql = "INSERT INTO proveedor (nombre, dirección, telefono, ciudad, email) VALUES ('$nombre', '$dirección', '$edad', '$ciudad', '$email')";

if ($pdo->query($sql) === true) {
  echo json_encode(array('mensaje' => 'Proveedor agregado correctamente'));
} else {
  echo json_encode(array('mensaje' => 'Error al agregar proveedor: ' . $pdo->errorInfo()[2]));
}

$pdo = null;

