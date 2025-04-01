<?php

require_once '../../config/conexion.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['NombreUsuario'];
    $apellido = $_POST['ApellidoUsuario'];
    $edad = $_POST['Edad'];
    $direccion = $_POST['Dirección'];
    $email = $_POST['Email'];
    $telefono = $_POST['Telefono'];
    $contrasena = $_POST['Contrasena'];
    $rol = $_POST['Rol'];
  
    // Validar campos
    if (empty($nombre) || empty($apellido) || empty($edad) || empty($direccion) || empty($email) || empty($telefono) || empty($contrasena) || empty($rol)) {
      echo json_encode(['mensaje' => 'Por favor, complete todos los campos']);
      return;
    }

    // Registrar usuario
    try {
      $contrasenaHash = password_hash($contrasena, PASSWORD_BCRYPT);
      $stmt = $pdo->prepare('INSERT INTO usuario (nombre, apellido, edad, dirección, email, telefono, contrasena, rol) VALUES (:nombre, :apellido, :edad, :direccion, :email, :telefono, :contrasena, :rol)');
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':apellido', $apellido);
      $stmt->bindParam(':edad', $edad);
      $stmt->bindParam(':direccion', $direccion);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':telefono', $telefono);
      $stmt->bindParam(':contrasena', $contrasenaHash);
      $stmt->bindParam(':rol', $rol);
      $stmt->execute();
    echo json_encode(['mensaje' => 'Registro exitoso']);
    header('Location: ../../views/html/Index.html');exit;
    } catch (PDOException $e) {
      echo json_encode(['mensaje' => 'Error al registrar: ' . $e->getMessage()]);
    }
}
