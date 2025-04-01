<?php
require_once '../../config/conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$dirección = $_POST['dirección'];
$email = $_POST['email'];

$sql = "UPDATE usuario SET apellido='$apellido', edad='$edad', dirección='$dirección', email='$email' WHERE nombre='$nombre'";

if ($pdo->query($sql) === true) {
    echo "Datos actualizados correctamente";
} else {
    echo "Error al actualizar datos: " . $pdo->errorInfo()[2];
}

$pdo = null;

